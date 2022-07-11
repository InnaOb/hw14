<?php

return [
    'dropbox' => [
        'client_id' => env('OAUTH_DROPBOX_CLIENT_ID'),
        'client_secret' => env('OAUTH_DROPBOX_CLIENT_SECRET'),
        'callback_uri' => env('OAUTH_DROPBOX_CALLBACK_URI'),
    ]
];
