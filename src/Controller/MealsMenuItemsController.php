<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MealsMenuItems Controller
 *
 * @property \App\Model\Table\MealsMenuItemsTable $MealsMenuItems
 *
 * @method \App\Model\Entity\MealsMenuItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MealsMenuItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Meals', 'MenuItems']
        ];
        $mealsMenuItems = $this->paginate($this->MealsMenuItems);

        $this->set(compact('mealsMenuItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Meals Menu Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mealsMenuItem = $this->MealsMenuItems->get($id, [
            'contain' => ['Meals', 'MenuItems']
        ]);

        $this->set('mealsMenuItem', $mealsMenuItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mealsMenuItem = $this->MealsMenuItems->newEntity();
        if ($this->request->is('post')) {
            $mealsMenuItem = $this->MealsMenuItems->patchEntity($mealsMenuItem, $this->request->getData());
            if ($this->MealsMenuItems->save($mealsMenuItem)) {
                $this->Flash->success(__('The meals menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meals menu item could not be saved. Please, try again.'));
        }
        $meals = $this->MealsMenuItems->Meals->find('list', ['limit' => 200]);
        $menuItems = $this->MealsMenuItems->MenuItems->find('list', ['limit' => 200]);
        $this->set(compact('mealsMenuItem', 'meals', 'menuItems'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meals Menu Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mealsMenuItem = $this->MealsMenuItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mealsMenuItem = $this->MealsMenuItems->patchEntity($mealsMenuItem, $this->request->getData());
            if ($this->MealsMenuItems->save($mealsMenuItem)) {
                $this->Flash->success(__('The meals menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meals menu item could not be saved. Please, try again.'));
        }
        $meals = $this->MealsMenuItems->Meals->find('list', ['limit' => 200]);
        $menuItems = $this->MealsMenuItems->MenuItems->find('list', ['limit' => 200]);
        $this->set(compact('mealsMenuItem', 'meals', 'menuItems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meals Menu Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mealsMenuItem = $this->MealsMenuItems->get($id);
        if ($this->MealsMenuItems->delete($mealsMenuItem)) {
            $this->Flash->success(__('The meals menu item has been deleted.'));
        } else {
            $this->Flash->error(__('The meals menu item could not be deleted. Please, try again.'));
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
