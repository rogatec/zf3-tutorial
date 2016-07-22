<?php
/**
 * zf3 - module.config.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 08:24
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */

namespace Album;

use Album\Controller\AlbumController;
use Album\Factory\AlbumTableFactory;
use Album\Factory\AlbumTableGatewayFactory;
use Album\Model\AlbumTable;
use Album\Model\AlbumTableGateway;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'album' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => AlbumController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ] ,
    ],
    
    // best practise instead of using serviceConfig closures
    'service_manager' => [
        'factories' => [
            AlbumTable::class => AlbumTableFactory::class,
            AlbumTableGateway::class => AlbumTableGatewayFactory::class,
        ],
    ],
    
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
