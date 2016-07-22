<?php
/**
 * zf3 - MyAdapter.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 15:18
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */

namespace Album\Controller\Plugin;


use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver;
use Zend\Db\Adapter\Platform;

class MyAdapter implements AdapterInterface
{
    
    /**
     * @return Driver\DriverInterface
     */
    public function getDriver()
    {
        // TODO: Implement getDriver() method.
    }
    
    /**
     * @return Platform\PlatformInterface
     */
    public function getPlatform()
    {
        // TODO: Implement getPlatform() method.
    }
}
