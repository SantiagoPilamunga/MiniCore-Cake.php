<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venta Entity
 *
 * @property int $id
 * @property int|null $cliente_id
 * @property string|null $total
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\DetalleVenta[] $detalle_ventas
 */
class Venta extends Entity
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
        'cliente_id' => true,
        'total' => true,
        'created' => true,
        'cliente' => true,
        'detalle_ventas' => true,
    ];
}
