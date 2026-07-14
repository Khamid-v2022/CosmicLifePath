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
        $listId = config('aweber.list_id');

        return $this->postSubscriber($listId, [
            'email'           => $email,
            'name'            => $name,
            'tags'            => ['interested', $signSlug],
            'status'          => 'subscribed',
            'update_existing' => true,
        ], $email);
    }

    // ─────────────────────────────────────────
    // Add affiliate signup subscriber
    // ─────────────────────────────────────────
    public function addAffiliateSubscriber(string $email, string $name, string $clickbankId): bool
    {
        $listId = config('aweber.affiliate_list_id') ?: config('aweber.list_id');

        $payload = [
            'email'           => $email,
            'name'            => $name,
            'tags'            => ['affiliate', 'affiliate-signup'],
            'status'          => 'subscribed',
            'update_existing' => true,
        ];

        $clickbankField = config('aweber.affiliate_clickbank_field');
        if ($clickbankField) {
            $payload['custom_fields'] = [
                $clickbankField => $clickbankId,
            ];
        } else {
            $safeTag = 'cb-' . strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $clickbankId));
            if ($safeTag !== 'cb-') {
                $payload['tags'][] = $safeTag;
            }
        }

        return $this->postSubscriber($listId, $payload, $email);
    }

    private function postSubscriber(string $listId, array $payload, string $email): bool
    {
        try {
            $accountId = config('aweber.account_id');

            $url = "{$this->baseUrl}/accounts/{$accountId}/lists/{$listId}/subscribers";

            $accessToken = $this->getValidAccessToken();

            $response = Http::withToken($accessToken)
                ->post($url, $payload);

            if ($response->status() === 401) {
                Log::warning('AWeber access token rejected. Refreshing token.');

                $tokens = $this->loadTokens();

                $accessToken = $this->refreshAccessToken(
                    $tokens['refresh_token']
                );

                $response = Http::withToken($accessToken)
                    ->post($url, $payload);
            }

            Log::info('AWeber subscriber response', [
                'status' => $response->status(),
                'body'   => $response->json(),
                'email'  => $email,
                'list_id'=> $listId,
            ]);

            if (in_array($response->status(), [200, 201])) {
                Log::info('AWeber subscriber synced', [
                    'email' => $email,
                    'tags'  => $payload['tags'] ?? [],
                ]);

                return true;
            }

            Log::error('AWeber addSubscriber failed', [
                'status' => $response->status(),
                'body'   => $response->json(),
                'email'  => $email,
                'list_id'=> $listId,
            ]);

            return false;
        } catch (\Throwable $e) {
            Log::error('AWeber exception in postSubscriber', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
                'email'   => $email,
                'list_id' => $listId,
            ]);

            return false;
        }
    }
}