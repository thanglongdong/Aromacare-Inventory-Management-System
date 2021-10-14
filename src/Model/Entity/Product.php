<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property float $price
 * @property string $size
 * @property int $stock
 * @property string $sku
 * @property int|null $recipe_id
 *
 * @property \App\Model\Entity\Recipe $recipe
 * @property \App\Model\Entity\Ingredient[] $ingredients
 */
class Product extends Entity
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
        'name' => true,
        'type' => true,
        'price' => true,
        'size' => true,
        'stock' => true,
        'sku' => true,
        'recipe_id' => true,
        'recipe' => true,
        'ingredients' => true,
    ];
}
