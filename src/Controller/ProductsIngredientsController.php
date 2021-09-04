<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductsIngredients Controller
 *
 * @property \App\Model\Table\ProductsIngredientsTable $ProductsIngredients
 * @method \App\Model\Entity\ProductsIngredient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsIngredientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $productsIngredients = $this->ProductsIngredients->find()->contain(['Products', 'Ingredients']);
        $this->set(compact('productsIngredients'));
    }


    /**
     * View method
     *
     * @param string|null $id Products Ingredient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsIngredient = $this->ProductsIngredients->get($id, [
            'contain' => ['Products', 'Ingredients'],
        ]);

        $this->set(compact('productsIngredient'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsIngredient = $this->ProductsIngredients->newEmptyEntity();
        if ($this->request->is('post')) {
            $productsIngredient = $this->ProductsIngredients->patchEntity($productsIngredient, $this->request->getData());
            if ($this->ProductsIngredients->save($productsIngredient)) {
                $this->Flash->success(__('The products ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products ingredient could not be saved. Please, try again.'));
        }
        $products = $this->ProductsIngredients->Products->find('list', ['limit' => 200]);
        $ingredients = $this->ProductsIngredients->Ingredients->find('list', ['limit' => 200]);
        $this->set(compact('productsIngredient', 'products', 'ingredients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Ingredient id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsIngredient = $this->ProductsIngredients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsIngredient = $this->ProductsIngredients->patchEntity($productsIngredient, $this->request->getData());
            if ($this->ProductsIngredients->save($productsIngredient)) {
                $this->Flash->success(__('The products ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products ingredient could not be saved. Please, try again.'));
        }
        $products = $this->ProductsIngredients->Products->find('list', ['limit' => 200]);
        $ingredients = $this->ProductsIngredients->Ingredients->find('list', ['limit' => 200]);
        $this->set(compact('productsIngredient', 'products', 'ingredients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Ingredient id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsIngredient = $this->ProductsIngredients->get($id);
        if ($this->ProductsIngredients->delete($productsIngredient)) {
            $this->Flash->success(__('The products ingredient has been deleted.'));
        } else {
            $this->Flash->error(__('The products ingredient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
