<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AWeberController extends Controller
{
    public function authorize()
    {
        $params = http_build_query([
            'response_type' => 'code',
            'client_id'     => config('aweber.client_id'),
            'redirect_uri'  => route('aweber.callback'),
            'scope'         => 'subscriber.write subscriber.read-extended account.read list.read',
            'state'         => csrf_token(),
        ]);

        return redirect('https://auth.aweber.com/oauth2/authorize?' . $params);
    }

    public function callback(Request $request)
    {
        // state
        abort_unless($request->state === session('_token'), 403, 'Invalid state');

        // code → access_token 
        $response = Http::asForm()->withBasicAuth(
            config('aweber.client_id'),
            config('aweber.client_secret')
        )->post('https://auth.aweber.com/oauth2/token', [
            'grant_type'   => 'authorization_code',
            'code'         => $request->code,
            'redirect_uri' => route('aweber.callback'),
        ]);

        abort_unless($response->successful(), 500, 'AWeber token exchange failed');

        $tokens = $response->json();

        
        // dump([
        //     'AWEBER_ACCESS_TOKEN'    => $tokens['access_token'],
        //     'AWEBER_REFRESH_TOKEN'   => $tokens['refresh_token'],
        //     'AWEBER_TOKEN_EXPIRES_AT'=> now()->addSeconds($tokens['expires_in'])->timestamp,
        // ]);

        // return 'AWeber OAuth completed. Save the values to the .env file.';

        // $accountResponse = Http::withToken($tokens['access_token'])->get('https://api.aweber.com/1.0/accounts');

        // dump([
        //     'tokens' => [
        //         'AWEBER_ACCESS_TOKEN'     => $tokens['access_token'],
        //         'AWEBER_REFRESH_TOKEN'    => $tokens['refresh_token'],
        //         'AWEBER_TOKEN_EXPIRES_AT' => now()->addSeconds($tokens['expires_in'])->timestamp,
        //     ],
        //     'accounts' => $accountResponse->json(),
        // ]);

        $response = Http::withToken($tokens['access_token'])->get("https://api.aweber.com/1.0/accounts/{$accountId}/lists");
        dump($response->json());
        
        return 'AWeber Auth Complete.';
    }
}
