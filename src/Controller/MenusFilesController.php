<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenusFiles Controller
 *
 * @property \App\Model\Table\MenusFilesTable $MenusFiles
 *
 * @method \App\Model\Entity\MenusFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenusFilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus', 'Files']
        ];
        $menusFiles = $this->paginate($this->MenusFiles);

        $this->set(compact('menusFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Menus File id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menusFile = $this->MenusFiles->get($id, [
            'contain' => ['Menus', 'Files']
        ]);

        $this->set('menusFile', $menusFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menusFile = $this->MenusFiles->newEntity();
        if ($this->request->is('post')) {
            $menusFile = $this->MenusFiles->patchEntity($menusFile, $this->request->getData());
            if ($this->MenusFiles->save($menusFile)) {
                $this->Flash->success(__('The menus file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menus file could not be saved. Please, try again.'));
        }
        $menus = $this->MenusFiles->Menus->find('list', ['limit' => 200]);
        $files = $this->MenusFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('menusFile', 'menus', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menus File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menusFile = $this->MenusFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menusFile = $this->MenusFiles->patchEntity($menusFile, $this->request->getData());
            if ($this->MenusFiles->save($menusFile)) {
                $this->Flash->success(__('The menus file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menus file could not be saved. Please, try again.'));
        }
        $menus = $this->MenusFiles->Menus->find('list', ['limit' => 200]);
        $files = $this->MenusFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('menusFile', 'menus', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menus File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menusFile = $this->MenusFiles->get($id);
        if ($this->MenusFiles->delete($menusFile)) {
            $this->Flash->success(__('The menus file has been deleted.'));
        } else {
            $this->Flash->error(__('The menus file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        
        if (in_array($action, ['add', 'tags', 'delete', 'edit'])) {
            return true;
        }
    
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }
}
}