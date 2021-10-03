<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;
/**
 * Ingredients Controller
 *
 * @property \App\Model\Table\IngredientsTable $Ingredients
 * @method \App\Model\Entity\Ingredient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IngredientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ingredients = $this->Ingredients->find()->contain(['Suppliers']);
        $this->set(compact('ingredients'));
    }

    /**
     * View method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingredient = $this->Ingredients->get($id, [
            'contain' => ['Suppliers', 'Products'],
        ]);

        $this->set(compact('ingredient'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingredient = $this->Ingredients->newEmptyEntity();
        if ($this->request->is('post')) {
            $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->getData());
            if ($this->Ingredients->save($ingredient)) {
                $this->Flash->success(__('The ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
        }
        $suppliers = $this->Ingredients->Suppliers->find('list', ['limit' => 200]);
        $products = $this->Ingredients->Products->find('list', ['limit' => 200]);
        $this->set(compact('ingredient', 'suppliers', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingredient = $this->Ingredients->get($id, [
            'contain' => ['Products'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            /* Information for email*/
            $Suppliers = TableRegistry::getTableLocator()->get('Suppliers');

            $Supplier= $Suppliers
                ->find()
                ->where(['id' => $ingredient->supplier_id])
                ->first();
            /* End information for email */
            $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->getData());
            $threshold = $ingredient->threshold;

            if ($this->Ingredients->save($ingredient)) {
                //send email
                if ($ingredient->stock < $threshold) {
                    $mailer = new Mailer('default');
                    $mailer
                        ->setEmailFormat('html')
                        ->setTo(Configure::read('InventoryEmail.to'))
                        ->setFrom(Configure::read('InventoryEmail.from'))
                        ->setSubject("Threshold of $ingredient->name was met")
                        ->viewBuilder()
                        ->setTemplate('inventory');

                    $mailer->setViewVars([
                        'name'=> $ingredient->name,
                        'stock'=> $ingredient->stock,
                        'supplier'=> $ingredient->supplier_id,
                        'id'=> $ingredient->id,
                        'supplierEmail'=>$Supplier->email,
                        'supplierName'=>$Supplier->name
                    ]);
                    $email_result = $mailer->deliver();
                }

                $this->Flash->success(__('The ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
        }
        $suppliers = $this->Ingredients->Suppliers->find('list', ['limit' => 200]);
        $products = $this->Ingredients->Products->find('list', ['limit' => 200]);
        $this->set(compact('ingredient', 'suppliers', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingredient = $this->Ingredients->get($id);
        if ($this->Ingredients->delete($ingredient)) {
            $this->Flash->success(__('The ingredient has been deleted.'));
        } else {
            $this->Flash->error(__('The ingredient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
