<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipes Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Recipe newEmptyEntity()
 * @method \App\Model\Entity\Recipe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recipe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recipe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RecipesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('recipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Products', [
            'foreignKey' => 'recipe_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('method')
            ->allowEmptyString('method');

        return $validator;
    }
}
