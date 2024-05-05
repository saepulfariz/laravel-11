<?php

$asset_url = env('ASSET_URL', 'http://localhost');
if ($asset_url == 'http://localhost') {
    if (isset($_SERVER['HTTP_HOST'])) {
        // $explodeFolder = url('');
        $explodeFolder = explode('/index.php', $_SERVER['SCRIPT_NAME'])[0];
        $cekPublicFolder = explode('/public', $explodeFolder);
        $url = ($_SERVER['SERVER_PORT'] != 80) ?  $explodeFolder  : ((count($cekPublicFolder) == 1) ? $explodeFolder . ''  : $cekPublicFolder[0]);
        $asset_url = ($_SERVER['SERVER_PORT'] != 80) ?  $explodeFolder  : ((count($cekPublicFolder) == 1) ? $explodeFolder . '/public' : $cekPublicFolder[0] . '/public');

        // $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ?  $folderProject : $folderProject;
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? 'https://' . $_SERVER['HTTP_HOST'] . $url : 'http://' . $_SERVER['HTTP_HOST'] . $url;
        $asset_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? 'https://' . $_SERVER['HTTP_HOST'] . $asset_url : 'http://' . $_SERVER['HTTP_HOST'] . $asset_url;

        defined('BASE_URL') || define('BASE_URL', $url);
        defined('ASSET_URL') || define('ASSET_URL', $asset_url);

        $serverme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? 'https://' . $_SERVER['HTTP_HOST'] : 'http://' . $_SERVER['HTTP_HOST'];
        defined('SERVERME') || define('SERVERME', $serverme);
    } else {
        defined('BASE_URL') || define('BASE_URL', '');
        defined('ASSET_URL') || define('ASSET_URL', '');
        defined('SERVERME') || define('SERVERME', '');
    }
}

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    // 'url' => env('APP_URL', 'http://localhost'),
    // 'asset_url' => env('ASSET_URL', 'http://localhost'),
    'url' => env('APP_URL', BASE_URL),
    'asset_url' => env('ASSET_URL', ASSET_URL),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
