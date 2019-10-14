<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MealsMenuItems Model
 *
 * @property \App\Model\Table\MealsTable&\Cake\ORM\Association\BelongsTo $Meals
 * @property \App\Model\Table\MenuItemsTable&\Cake\ORM\Association\BelongsTo $MenuItems
 *
 * @method \App\Model\Entity\MealsMenuItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\MealsMenuItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MealsMenuItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MealsMenuItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MealsMenuItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MealsMenuItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MealsMenuItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MealsMenuItem findOrCreate($search, callable $callback = null, $options = [])
 */
class MealsMenuItemsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('meals_menu_items');
        $this->setDisplayField('meal_id');
        $this->setPrimaryKey(['meal_id', 'menu_item_id']);

        $this->belongsTo('Meals', [
            'foreignKey' => 'meal_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MenuItems', [
            'foreignKey' => 'menu_item_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['meal_id'], 'Meals'));
        $rules->add($rules->existsIn(['menu_item_id'], 'MenuItems'));

        return $rules;
    }
}
