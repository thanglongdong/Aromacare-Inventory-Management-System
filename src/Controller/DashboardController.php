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
        $ingredientsEntriesCopy = $ingredients
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

        foreach ($ingredientsEntries as $ingredient) {
            $threshold = $ingredient->threshold;
            $stock = $ingredient->stock;
            $current = $stock - $threshold;

            if ($current <0) {
                $past++;
            }
            if (($current >= 0) && ($current < 2)) {
                $lessTwo++;
            }
            if (($current >= 2) && ($current < 5)) {
                $twoToFive++;
            }
            if (($current >= 5) && ($current < 10)) {
                $fiveToTen++;
            }
            if ($current >= 10) {
                $tenPlus++;
            }
        }

        $dataPoints = array( //data points for bar chart
            array("y" => $past, "label" => "Passed Threshold" ),
            array("y" => $lessTwo, "label" => "Within 2" ),
            array("y" => $twoToFive, "label" => "2 to 5" ),
            array("y" => $fiveToTen, "label" => "5 to 10" ),
            array("y" => $tenPlus, "label" => "10+" )
        );

        $list = array();
        for ($i=0; $i<10; $i++) {
            $newNumber = 999;
            foreach ($ingredientsEntriesCopy as $ingredient) {
                $number = $ingredient->stock - $ingredient->threshold;

                if ($number < $newNumber && $ingredient->price >= 0 && $number>=0) {
                    $newNumber = $number;
//                    debug($newNumber);
//                    debug($ingredient->id);
                    $lowestValue = $number;
                    $lowestID = $ingredient->id;
                }
            }
            foreach ($ingredientsEntriesCopy as $ingredient) {
                if($ingredient->id == $lowestID){
                    $ingredient->price = -($ingredient->price);

                    $lowestNumber = $ingredient->stock - $ingredient->threshold;
                    $lowestName = $ingredient->name;
//                    debug($lowestID);
//                    debug($lowestNumber);
//                    debug($lowestName);

                    array_push($list,$lowestNumber,$lowestName);
                }
            }

        }

        $dataPoints1= array(
            array("y" => $list[18], "label"=> $list[19] ),
            array("y" => $list[16], "label"=> $list[17] ),
            array("y" => $list[14], "label"=> $list[15] ),
            array("y" => $list[12], "label"=> $list[13] ),
            array("y" => $list[10], "label"=> $list[11] ),
            array("y" => $list[8], "label"=> $list[9] ),
            array("y" => $list[6], "label"=> $list[7]),
            array("y" => $list[4], "label"=> $list[5] ),
            array("y" => $list[2], "label"=> $list[3] ),
            array("y" => $list[0], "label"=> $list[1] )
        );


        $this->set('ingredients', $ingredientsEntries);
        $this->set('dataPoints', $dataPoints);
        $this->set('dataPoints1', $dataPoints1);

        $this->set('product', $productCount);
        $this->set('ingredient', $ingredientCount);
        $this->set('supplier', $supplierCount);


    }


}
