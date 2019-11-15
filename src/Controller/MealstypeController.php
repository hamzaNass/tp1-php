<?php
namespace App\Controller;

use App\Controller\AppController;



/**
 * Mealstype Controller
 *
 * @property \App\Model\Table\MealstypeTableTable $Roomtype
 *
 * @method \App\Model\Entity\Mealstype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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

        $this->set(compact('mealstypes'));
    }

    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 150,
        /*        'fields' => [
          'id', 'name', 'description'
          ],
         */ 'sortWhitelist' => [
            'id', 'name',
        ]
    ];

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['autocompletedemo', 'findMealstype', 'add', 'edit', 'delete']);
        //$this->viewBuilder()->setLayout('monopage');
    }

    public function findMealstype() {

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

    }

}
