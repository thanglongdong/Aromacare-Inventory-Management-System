<?php
declare(strict_types=1);
namespace App\Controller;

/**
 * Dashboard Controller
 *
 */

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{

    public function index()
    {
        $products = TableRegistry::getTableLocator()->get('Products');
        $ingredients = TableRegistry::getTableLocator()->get('Ingredients');
        $suppliers = TableRegistry::getTableLocator()->get('Suppliers');

        $ingredientsEntries = $ingredients
            ->find()
            ->all();

        $product = $products
            ->find()
            ->all()
            ->count();
        $ingredient = $ingredients
            ->find()
            ->all()
            ->count();
        $supplier = $suppliers
            ->find()
            ->all()
            ->count();

        $this->set('ingredients', $ingredientsEntries);

        $this->set('product', $product);
        $this->set('ingredient', $ingredient);
        $this->set('supplier', $supplier);


    }


}
