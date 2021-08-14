<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ingredient Entity
 *
 * @property int $id
 * @property string $name
 * @property int $stock
 * @property float $price
 * @property int $supplier_id
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\Product[] $products
 */
class Ingredient extends Entity
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
        'stock' => true,
        'price' => true,
        'supplier_id' => true,
        'supplier' => true,
        'products' => true,
    ];
}
