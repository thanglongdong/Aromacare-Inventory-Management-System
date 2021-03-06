<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\IngredientsTable&\Cake\ORM\Association\BelongsToMany $Ingredients
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\BelongsTo $Recipes
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Recipes', [
            'foreignKey' => 'recipe_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsToMany('Ingredients', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'ingredient_id',
            'joinTable' => 'products_ingredients',
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
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name','validName',[
                'rule'=>'isName',
                'message'=> 'Please enter a valid name without special characters',
                'provider'=>'table'
            ]);
//            ->alphaNumeric('name', 'Please enter a valid name without special characters');

        $validator
            ->scalar('type')
            ->maxLength('type', 64)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price')
            ->add('price', 'range', [
                'rule' => ['range',0,8000],
                'message' => 'Please enter a valid price from $0 - $8000.'
            ]);

        $validator
            ->scalar('size')
            ->maxLength('size', 64)
            ->requirePresence('size', 'create')
            ->notEmptyString('size')
            ->add('size', 'range', [
                'rule' => ['range',0,10000],
                'message' => 'Please enter a valid size from 0 - 10000ml.'
            ]);

        $validator
            ->integer('stock')
            ->requirePresence('stock', 'create')
            ->notEmptyString('stock')
            ->add('stock', 'range', [
                'rule' => ['range',-1000,8000],
                'message' => 'Please enter a valid number from -1000 to 8000.'
            ]);

        $validator
            ->scalar('sku')
            ->maxLength('sku', 64)
            ->requirePresence('sku', 'create')
            ->notEmptyString('sku');

        return $validator;
    }

    public function isName($value){
        if (!preg_match('/[^a-z0-9 ]/i',$value) && (substr($value,0,1)!=' ')){
            return true;
        }
        return false;
    }
}
