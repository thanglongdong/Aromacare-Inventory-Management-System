<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
/**
 * Recipes Controller
 *
 * @property \App\Model\Table\RecipesTable $Recipes
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function recipeindex()
    {
        $recipes = $this->Recipes->find();

        $this->set(compact('recipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function recipeview($id = null)
    {
        $Products = TableRegistry::getTableLocator()->get('Products');
        $ProductsIngredients = TableRegistry::getTableLocator()->get('ProductsIngredients');

        $recipe = $this->Recipes->get($id, [
            'contain' => ['Products'],
        ]);

//        $Product= $Products
//            ->find()
//            ->where(['recipe_id' => $recipe->id])
//            ->first();
//
//        $ProductIngredient= $ProductsIngredients
//            ->find()
//            ->where(['product_id' => $Product->id])
//            ->all();

        $this->set(compact('recipe'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function recipeadd()
    {
        $recipe = $this->Recipes->newEmptyEntity();
        if ($this->request->is('post')) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'recipeindex']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $this->set(compact('recipe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function recipeedit($id = null)
    {
        $recipe = $this->Recipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'recipeindex']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $this->set(compact('recipe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function recipedelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipe = $this->Recipes->get($id);
        if ($this->Recipes->delete($recipe)) {
            $this->Flash->success(__('The recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'recipeindex']);
    }
}
