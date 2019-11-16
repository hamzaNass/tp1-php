<?php
namespace App\Controller;

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;


/**
 * Mealstype Controller
 *
 * @property \App\Model\Table\MealstypeTable $Mealstype
 *
 * @method \App\Model\Entity\Mealstype[] paginate($object = null, array $settings = [])
 */

class MealstypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $mealstypes = $this->paginate($this->Mealstype);

        //$this->set(compact('mealstypes'));
        //$mealstypes = $this->Mealstype($this->Mealstype);

        $this->set(compact('mealstypes'));
        $this->set('_serialize', ['mealstypes']);
    }

    public function initialize() {
        parent::initialize();
       // $this->Auth->allow(['autocompletedemo', 'findMealstype', 'add', 'edit', 'delete']);
    }

  /*  public function findMealstype() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Mealstype->find('all', array(
                'conditions' => array('Mealstype.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }

    public function autocompletedemo() {

    }*/

    /**
     * View method
     *
     * @param string|null $id Mealstype id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mealstype = $this->Mealstype->get($id, [
            'contain' => []
        ]);

        $this->set('mealstype', $mealstype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mealstype = $this->Mealstype->newEntity();
        if ($this->request->is('post')) {
            $mealstype = $this->Mealstype->patchEntity($mealstype, $this->request->getData());
            if ($this->Mealstype->save($mealstype)) {
                $this->Flash->success(__('The mealstype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mealstype could not be saved. Please, try again.'));
        }
        $this->set(compact('mealstype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mealstype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mealstype = $this->Mealstype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mealstype = $this->Mealstype->patchEntity($mealstype, $this->request->getData());
            if ($this->Mealstype->save($mealstype)) {
                $this->Flash->success(__('The mealstype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mealstype could not be saved. Please, try again.'));
        }
        $this->set(compact('mealstype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mealstype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mealstype = $this->Mealstype->get($id);
        if ($this->Mealstype->delete($mealstype)) {
            $this->Flash->success(__('The mealstype has been deleted.'));
        } else {
            $this->Flash->error(__('The mealstype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
