<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsIngredient Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $ingredient_id
 * @property string $amount
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Ingredient $ingredient
 */
class ProductsIngredient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_id' => true,
        'ingredient_id' => true,
        'amount' => true,
        'product' => true,
        'ingredient' => true,
    ];
}
