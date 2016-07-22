<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

use Abavo\Controller\Factory\ConfigLoaderFactory;
use Abavo\Controller\Plugin\ConfigLoaderPlugin;

return [
    'db' => [
        'driver' => 'Pdo',
        'dsn'    => 'mysql:dbname=u_teckert_zf3;host=localhost;charset=utf8',
        'username' => 'teckert',
        'password' => 'teckert'
    ],
    
    'controller_plugins' => [
        'factories' => [
            ConfigLoaderPlugin::class => ConfigLoaderFactory::class,
        ],
    ],
    
    'abavo_values' => [
        'sv_url' => 'https://hsv.teckert.linux.abc-intranet.de',
    ],
];
