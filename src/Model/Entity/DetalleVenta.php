<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleVenta Entity
 *
 * @property int $id
 * @property int|null $venta_id
 * @property int|null $producto_id
 * @property int|null $cantidad
 * @property string|null $precio
 *
 * @property \App\Model\Entity\Venta $venta
 * @property \App\Model\Entity\Producto $producto
 */
class DetalleVenta extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'venta_id' => true,
        'producto_id' => true,
        'cantidad' => true,
        'precio' => true,
        'venta' => true,
        'producto' => true,
    ];
}
