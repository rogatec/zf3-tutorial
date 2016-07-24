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
use Album\Form\AlbumForm;
use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Http\Request;
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
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');
        
        /** @var Request $request */
        $request = $this->getRequest();
        
        if (!$request->isPost()) {
            return ['form' => $form];
        }
        
        $album = new Album();
        $form->setInputFilter($album->getInputFilter());
        $form->setData($request->getPost());
        
        if (!$form->isValid()) {
            return ['form' => $form];
        }
        
        $album->exchangeArray($form->getData());
        $this->table->saveAlbum($album);
        
        return $this->redirect()->toRoute('album');
        
    }
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if ($id === 0) {
            return $this->redirect()->toRoute('album', ['action' => 'add']);
        }
        
        try {
            $album = $this->table->getAlbum($id);
        } catch(\Exception $e) {
            return $this->redirect()->toRoute('album', ['action' => 'index']);
        }
        
        $form = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setValue('Edit');
        
        /** @var Request $request */
        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];
        
        if (!$request->isPost()) {
            return $viewData;
        }
        
        $form->setInputFilter($album->getInputFilter());
        $form->setData($request->getPost());
        
        if (!$form->isValid()) {
            return $viewData;
        }
        
        $this->table->saveAlbum($album);
        
        return $this->redirect()->toRoute('album', ['action' => 'index']);
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if ($id === 0) {
            return $this->redirect()->toRoute('album');
        }
        
        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteAlbum($id);
            }
            
            return $this->redirect()->toRoute('album');
        }
        
        return [
            'id' => $id,
            'album' => $this->table->getAlbum($id),
        ];
    }
}
