<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $products = $this->Products->find();
        $this->set(compact('products'));
    }


    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $ProductsIngredients = TableRegistry::getTableLocator()->get('ProductsIngredients');
        $Ingredients = TableRegistry::getTableLocator()->get('Ingredients');

        $product = $this->Products->get($id, [
            'contain' => ['Ingredients'],
        ]);
        $key= $this->request->getQuery();


        if (!empty($key['produceQuantity'])) {  //if not empty (user inputted) - do this
            if (is_numeric($key['produceQuantity'])&&$key['produceQuantity']>0) { //if entered stuff is int do this

                $produceQuantity = $key['produceQuantity'];
                $product_ingredient=$ProductsIngredients
                    ->find()
                    ->where(['product_id' => $product->id])
                    ->all();
                $ingredientResult=true;

                foreach ($product_ingredient as $eachproduct_ingredient){ // use foreach loop to check whether each ingredients required is enough or not, if all of them are enough, variable ingredientResult = true
                    $eachingredient = $Ingredients
                        ->find()
                        ->where(['id' => $eachproduct_ingredient->ingredient_id])
                        ->first();
                    $amount=$eachproduct_ingredient->amount;
                    $updatedStock=$eachingredient->stock-$produceQuantity*$amount;
                    $eachingredient->stock= $updatedStock;
                    if($updatedStock<0){
                        $ingredientResult=false;
                        $produceResult = 'unsuccess';
                        break;
                    }
                }
                if($ingredientResult==true){ //we have checked all the related ingredients stock are enough to make that amount of products, we update the stock of ingredients and product
                    foreach ($product_ingredient as $eachproduct_ingredient){
                        $eachingredient = $Ingredients
                            ->find()
                            ->where(['id' => $eachproduct_ingredient->ingredient_id])
                            ->first();

                        $amount=$eachproduct_ingredient->amount;
                        $updatedStock=$eachingredient->stock-$produceQuantity*$amount;
                        $eachingredient->stock= $updatedStock;
                        $Ingredients->save($eachingredient);
                    }
                    $stock = $product->stock;
                    $produceResult =  $stock + $produceQuantity;
                    $product->stock= $produceResult;
                    $this->Products->save($product);

                }
            }
            else {  //if not int, return message error
                $produceResult = 'invalid'; //handled in view
            }

        } //else, no user input - do this
        else{
            $produceResult = null;
        }

        if (!empty($key['inputQuantity'])) {  //if not empty (user inputted) - do this
            if (is_numeric($key['inputQuantity'])&&$key['inputQuantity']>0) { //if entered stuff is int do this
                $inputQuantity = $key['inputQuantity'];
                $stock = $product->stock;
                $result =  $stock - $inputQuantity;
                $product->stock= $result;
                $this->Products->save($product);
            }
            else {  //if not int, return message error
                $result = 'unsuccess'; //handled in view
            }

        } //else, no user input - do this
        else{
            $result = null;
        }
        $this->set('produceResult', $produceResult);
        $this->set('result', $result);
        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $ingredients = $this->Products->Ingredients->find('list', ['limit' => 200]);
        $recipes = $this->Products->Recipes->find('list', ['keyField' => 'id', 'valueField' => 'method','limit' => 200]);
        $this->set(compact('product', 'ingredients','recipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Ingredients'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
//                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $ingredients = $this->Products->Ingredients->find('list', ['limit' => 200]);
        $recipes = $this->Products->Recipes->find('list', ['keyField' => 'id', 'valueField' => 'method','limit' => 200]);
        $this->set(compact('product', 'ingredients','recipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function export()
    {
        $time = FrozenTime::now();
        $this->response = $this->response->withDownload('products(' . $time->i18nFormat('dd-MMM-yy') .').csv');
        $products = $this->Products->find();
        $_serialize = 'products';
        $_header = ['ID', 'Name', 'Size', 'Price (AUD)', 'Stock', 'SKU'];
        $_extract = ['id', 'name', 'size', 'price', 'stock', 'sku'];
        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('products', '_serialize', '_header', '_extract'));
    }

    public function addOne($id = null)
    {
        $product = $this->Products->get($id);
        $product->stock = $product->stock + 1;
        if ($this->Products->save($product)) {
            $this->Flash->success(__('Stock for "' . $product->name . '" has been correctly adjusted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Stock could not be adjusted'));
        return $this->redirect(['action' => 'index']);
    }

    public function minusOne($id = null)
    {
        $product = $this->Products->get($id);
        $product->stock = $product->stock - 1;
        if ($this->Products->save($product)) {
            $this->Flash->success(__('Stock for "' . $product->name . '" has been correctly adjusted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Stock could not be adjusted'));
        return $this->redirect(['action' => 'index']);
    }

    public function addFive($id = null)
    {
        $product = $this->Products->get($id);
        $product->stock = $product->stock + 5;
        if ($this->Products->save($product)) {
            $this->Flash->success(__('Stock for "' . $product->name . '" has been correctly adjusted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Stock could not be adjusted'));
        return $this->redirect(['action' => 'index']);
    }

    public function minusFive($id = null)
    {
        $product = $this->Products->get($id);
        $product->stock = $product->stock - 5;
        if ($this->Products->save($product)) {
            $this->Flash->success(__('Stock for "' . $product->name . '" has been correctly adjusted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Stock could not be adjusted'));
        return $this->redirect(['action' => 'index']);
    }

}
