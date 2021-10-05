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

        $productCount = $products
            ->find()
            ->all()
            ->count();
        $ingredientCount = $ingredients
            ->find()
            ->all()
            ->count();
        $supplierCount = $suppliers
            ->find()
            ->all()
            ->count();

        $past = 0;
        $lessTwo = 0;
        $twoToFive = 0;
        $fiveToTen = 0;
        $tenPlus = 0;

        foreach ($ingredients as $ingredient) {
            $threshold = $ingredient->threshold;
            $stock = $ingredient->stock;
            $current = $stock - $threshold;

            if ($current <0) {$past++;}
            if (($current >= 0) && ($current < 2)) {$lessTwo++;}
            if (($current >= 2) && ($current < 5)) {$twoToFive++;}
            if (($current >= 5) && ($current < 10)) {$fiveToTen++;}
            if ($current >= 10) {$tenPlus++;}

        }

        $dataPoints = array( //data points for bar chart
            array("y" => $past, "label" => "Previous" ),
            array("y" => $lessTwo, "label" => "Last Week" ),
            array("y" => $twoToFive, "label" => "This Week" ),
            array("y" => $fiveToTen, "label" => "Next Week" ),
            array("y" => $tenPlus, "label" => "After" )
        );



        $this->set('ingredients', $ingredientsEntries);
        $this->set('dataPoints', $dataPoints);

        $this->set('product', $productCount);
        $this->set('ingredient', $ingredientCount);
        $this->set('supplier', $supplierCount);


    }


}
