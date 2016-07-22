<?php
/**
 * zf3 - AlbumController.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 08:28
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */

namespace Album\Controller;


use Abavo\Controller\Plugin\ConfigLoaderPlugin;
use Album\Model\AlbumTable;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Debug\Debug;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    /**
     * @var AlbumTable
     */
    private $table;
    
    /**
     * @var Adapter
     */
    private $svAdapter;
    
    public function __construct(AlbumTable $table, Adapter $svAdapter)
    {
        $this->table = $table;
        $this->svAdapter = $svAdapter;
    }
    
    public function indexAction()
    {
        return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]);
    }
    
    public function gotoAction()
    {
        // second adapter
//        $db = new Sql($this->svAdapter);
//        $select = $db->select('projects');
//        $select->where(['id' => 139]);
//        $stmt   = $db->prepareStatementForSqlObject($select);
//        $result = $stmt->execute();
//
//        Debug::dump($result->current());die();
        
        /** @var ConfigLoaderPlugin $cfg */
        $cfg = $this->plugin(ConfigLoaderPlugin::class);

        return $this->redirect()->toUrl($cfg->getValue('sv_url'));
    }
    
    public function addAction()
    {
        
    }
    
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
}
