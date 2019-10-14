<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Meals Controller
 *
 * @property \App\Model\Table\MealsTable $Meals
 *
 * @method \App\Model\Entity\Meal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MealsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $meals = $this->paginate($this->Meals);

        $this->set(compact('meals'));
    }

    /**
     * View method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meal = $this->Meals->get($id, [
            'contain' => ['Users', 'MenuItems']
        ]);

        $this->set('meal', $meal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meal = $this->Meals->newEntity();
        if ($this->request->is('post')) {
            $meal = $this->Meals->patchEntity($meal, $this->request->getData());
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('The meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meal could not be saved. Please, try again.'));
        }
        $users = $this->Meals->Users->find('list', ['limit' => 200]);
        $menuItems = $this->Meals->MenuItems->find('list', ['limit' => 200]);
        $this->set(compact('meal', 'users', 'menuItems'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meal = $this->Meals->get($id, [
            'contain' => ['MenuItems']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meal = $this->Meals->patchEntity($meal, $this->request->getData());
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('The meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meal could not be saved. Please, try again.'));
        }
        $users = $this->Meals->Users->find('list', ['limit' => 200]);
        $menuItems = $this->Meals->MenuItems->find('list', ['limit' => 200]);
        $this->set(compact('meal', 'users', 'menuItems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meal = $this->Meals->get($id);
        if ($this->Meals->delete($meal)) {
            $this->Flash->success(__('The meal has been deleted.'));
        } else {
            $this->Flash->error(__('The meal could not be deleted. Please, try again.'));
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