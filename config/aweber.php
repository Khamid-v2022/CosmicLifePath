<?php

return [
    'client_id'        => env('AWEBER_CLIENT_ID'),
    'client_secret'    => env('AWEBER_CLIENT_SECRET'),
    'redirect_uri'     => env('AWEBER_REDIRECT_URI'),

    'access_token'     => env('AWEBER_ACCESS_TOKEN'),
    'refresh_token'    => env('AWEBER_REFRESH_TOKEN'),
    'token_expires_at' => env('AWEBER_TOKEN_EXPIRES_AT', 0), 

    'account_id'       => env('AWEBER_ACCOUNT_ID'),
    'list_id'          => env('AWEBER_LIST_ID'),
];