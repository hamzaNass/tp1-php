<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenuItems Controller
 *
 * @property \App\Model\Table\MenuItemsTable $MenuItems
 *
 * @method \App\Model\Entity\MenuItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus']
        ];
        $menuItems = $this->paginate($this->MenuItems);

        $this->set(compact('menuItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => ['Menus', 'Meals']
        ]);

        $this->set('menuItem', $menuItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuItem = $this->MenuItems->newEntity();
        if ($this->request->is('post')) {
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
            if ($this->MenuItems->save($menuItem)) {
                $this->Flash->success(__('The menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
        }
        $menus = $this->MenuItems->Menus->find('list', ['limit' => 200]);
        $meals = $this->MenuItems->Meals->find('list', ['limit' => 200]);
        $this->set(compact('menuItem', 'menus', 'meals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => ['Meals']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
            if ($this->MenuItems->save($menuItem)) {
                $this->Flash->success(__('The menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
        }
        $menus = $this->MenuItems->Menus->find('list', ['limit' => 200]);
        $meals = $this->MenuItems->Meals->find('list', ['limit' => 200]);
        $this->set(compact('menuItem', 'menus', 'meals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuItem = $this->MenuItems->get($id);
        if ($this->MenuItems->delete($menuItem)) {
            $this->Flash->success(__('The menu item has been deleted.'));
        } else {
            $this->Flash->error(__('The menu item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        
        if (in_array($action, ['add', 'delete', 'edit'])) {
            return true;
        }
    
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }
}
}