<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meals Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MenuItemsTable&\Cake\ORM\Association\BelongsToMany $MenuItems
 *
 * @method \App\Model\Entity\Meal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Meal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Meal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Meal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Meal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Meal findOrCreate($search, callable $callback = null, $options = [])
 */
class MealsTable extends Table
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

        $this->setTable('meals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('MenuItems', [
            'foreignKey' => 'meal_id',
            'targetForeignKey' => 'menu_item_id',
            'joinTable' => 'meals_menu_items'
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('date_meal')
            ->maxLength('date_meal', 255)
            ->requirePresence('date_meal', 'create')
            ->notEmptyString('date_meal');

        $validator
            ->integer('cost_meal')
            ->requirePresence('cost_meal', 'create')
            ->notEmptyString('cost_meal');

        $validator
            ->scalar('other_details')
            ->maxLength('other_details', 255)
            ->requirePresence('other_details', 'create')
            ->notEmptyString('other_details');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
