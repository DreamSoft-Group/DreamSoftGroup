<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin Allowlist
    |--------------------------------------------------------------------------
    |
    | Comma-separated list of email addresses that are allowed to access the
    | Filament admin panel. If empty, any user with a verified email ending
    | in "@dreamsoftgroup.com" will be allowed (backwards compatible).
    |
    */

    'admin_allowlist' => env('DREAMLAB_ADMIN_ALLOWLIST', ''),
];
