<?php
/**
 * zf3 - AlbumTableFactory.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 08:54
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */

namespace Album\Factory;


use Album\Model\Album;
use Album\Model\AlbumTable;
use Album\Model\AlbumTableGateway;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class AlbumTableFactory implements AbstractFactoryInterface
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
        $dbAdapter = $container->get('db1');
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Album());
    
        $tableGateway = new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
        
        return new AlbumTable($tableGateway);
    }
    
    /**
     * Can the factory create an instance for the service?
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        return in_array('Traversable', class_implements($requestedName), true);
    }
}
