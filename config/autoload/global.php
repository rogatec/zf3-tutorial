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
use Zend\Db\Adapter\AdapterAbstractServiceFactory;

return [
    'db' => [
        'adapters' => [
            'db1' => [
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=zf3;host=localhost',
                'driver_options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ],
            ],
            'db2' => [
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=redmine;host=localhost',
                'driver_options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ],
            ],
        ],
    ],
    
    'service_manager' => [
        'abstract_factories' => [
            AdapterAbstractServiceFactory::class,
        ],
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
