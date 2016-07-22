<?php
/**
 * zf3 - ConfigLoaderPlugin.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 11:33
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */

namespace Abavo\Controller\Plugin;


use InvalidArgumentException;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class ConfigLoaderPlugin extends AbstractPlugin
{
    protected $config;
    
    public function __construct(array $config)
    {
        $this->config = $config;
    }
    /**
     * @param string $key
     * @param string|null $default
     *
     * @return string|null
     */
    public function getValue($key, $default = null)
    {
        if(isset($this->config['abavo_values'][$key])) {
            return $this->config['abavo_values'][$key];
        }
        
        if (!$default) {
            throw new InvalidArgumentException("default is null - key '{$key}' not found in configuration");
        }
        
        return $default;
    }
}
