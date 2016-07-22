<?php
/**
 * zf3 - AlbumControllerFactory.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 13:24
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */

namespace Album\Factory;


use Album\Controller\AlbumController;
use Album\Model\AlbumTable;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Debug\Debug;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class AlbumControllerFactory implements FactoryInterface
{
    
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $albumTable = $container->get(AlbumTable::class);
        $svAdapter = $container->get('sv');
        die("z");
        $pvAdapter = $container->get('pv');
        
        Debug::dump($svAdapter);
        Debug::dump($pvAdapter);
        die();
        
        return new AlbumController($albumTable, $svAdapter, $pvAdapter);
    }
}
