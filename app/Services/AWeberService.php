<?php
// app/Services/AWeberService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AWeberService
{
    private string $baseUrl = 'https://api.aweber.com/1.0';

    // ─────────────────────────────────────────
    // token file path
    // ─────────────────────────────────────────
    private function tokenPath(): string
    {
        return storage_path('app/aweber_tokens.json');
    }

    // ─────────────────────────────────────────
    // Save token
    // ─────────────────────────────────────────
    private function saveTokens(string $accessToken, string $refreshToken, int $expiresIn): void
    {
        file_put_contents($this->tokenPath(), json_encode([
            'access_token'  => $accessToken,
            'refresh_token' => $refreshToken,
            'expires_at'    => now()->addSeconds($expiresIn)->timestamp,
        ]));
    }

    // ─────────────────────────────────────────
    // Load token
    // ─────────────────────────────────────────
    private function loadTokens(): array
    {
        $path = $this->tokenPath();

        if (file_exists($path)) {
            return json_decode(file_get_contents($path), true);
        }

        // 
        return [
            'access_token'  => config('aweber.access_token'),
            'refresh_token' => config('aweber.refresh_token'),
            'expires_at'    => (int) config('aweber.token_expires_at'),
        ];
    }

    // ─────────────────────────────────────────
    // return valid access token (refresh if expired)
    // ─────────────────────────────────────────
    private function getValidAccessToken(): string
    {
        $tokens = $this->loadTokens();

        // refresh if expired (5min buffer)
        $isExpired = now()->timestamp >= ($tokens['expires_at'] - 300);

        if ($isExpired) {
            Log::info('AWeber access token expired, refreshing...');
            return $this->refreshAccessToken($tokens['refresh_token']);
        }

        return $tokens['access_token'];
    }

    // ─────────────────────────────────────────
    // New token generate by Refresh Token
    // ─────────────────────────────────────────
    private function refreshAccessToken(string $refreshToken): string
    {
        Log::info('Refreshing AWeber access token');
        $response = Http::asForm()->withBasicAuth(
            config('aweber.client_id'),
            config('aweber.client_secret')
        )->post('https://auth.aweber.com/oauth2/token', [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $refreshToken,
        ]);

        if (!$response->successful()) {
            Log::error('AWeber token refresh failed', [
                'status' => $response->status(),
                'body'   => $response->json(),
            ]);
            throw new \RuntimeException('AWeber token refresh failed: ' . $response->body());
        }

        $tokens = $response->json();

        // Save the token to file
        $this->saveTokens(
            $tokens['access_token'],
            $tokens['refresh_token'],
            $tokens['expires_in']
        );

        Log::info('AWeber token refreshed successfully', [
            'expires_in' => $tokens['expires_in'],
        ]);

        return $tokens['access_token'];
    }

    // ─────────────────────────────────────────
    // Add subscriber (main entry point)
    // ─────────────────────────────────────────
    public function addSubscriber(string $email, string $name, string $signSlug): bool
    {
        try {

            $accountId = config('aweber.account_id');
            $listId    = config('aweber.list_id');

            $url = "{$this->baseUrl}/accounts/{$accountId}/lists/{$listId}/subscribers";

            $payload = [
                'email'           => $email,
                'name'            => $name,
                'tags'            => ['interested', $signSlug],
                'status'          => 'subscribed',
                'update_existing' => true,
            ];

            // try first time with current access token
            $accessToken = $this->getValidAccessToken();

            $response = Http::withToken($accessToken)
                ->post($url, $payload);

            // IF Access Token expired, Refresh
            if ($response->status() === 401) {

                Log::warning('AWeber access token rejected. Refreshing token.');

                $tokens = $this->loadTokens();

                $accessToken = $this->refreshAccessToken(
                    $tokens['refresh_token']
                );

                // try second time with new access token
                $response = Http::withToken($accessToken)
                    ->post($url, $payload);
            }

            Log::info('AWeber subscriber response', [
                'status' => $response->status(),
                'body'   => $response->json(),
                'email'  => $email,
            ]);

            if (in_array($response->status(), [200, 201])) {

                Log::info('AWeber subscriber synced', [
                    'email' => $email,
                    'tags'  => ['interested', $signSlug],
                ]);

                return true;
            }

            Log::error('AWeber addSubscriber failed', [
                'status' => $response->status(),
                'body'   => $response->json(),
                'email'  => $email,
            ]);

            return false;

        } catch (\Throwable $e) {

            Log::error('AWeber exception in addSubscriber', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
                'email'   => $email,
            ]);

            return false;
        }
    }
}