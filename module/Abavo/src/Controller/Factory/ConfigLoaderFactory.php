<?php
/**
 * zf3 - ConfigLoaderFactory.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 11:58
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */

namespace Abavo\Controller\Factory;


use Abavo\Controller\Plugin\ConfigLoaderPlugin;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ConfigLoaderFactory implements FactoryInterface
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
        return new ConfigLoaderPlugin($container->get('config'));
    }
}
