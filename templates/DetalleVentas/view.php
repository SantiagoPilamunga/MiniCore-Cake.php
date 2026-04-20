<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleVenta $detalleVenta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detalle Venta'), ['action' => 'edit', $detalleVenta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detalle Venta'), ['action' => 'delete', $detalleVenta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleVenta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detalle Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detalle Venta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detalleVentas view content">
            <h3><?= h($detalleVenta->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Venta') ?></th>
                    <td><?= $detalleVenta->hasValue('venta') ? $this->Html->link($detalleVenta->venta->id, ['controller' => 'Ventas', 'action' => 'view', $detalleVenta->venta->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Producto') ?></th>
                    <td><?= $detalleVenta->hasValue('producto') ? $this->Html->link($detalleVenta->producto->id, ['controller' => 'Productos', 'action' => 'view', $detalleVenta->producto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($detalleVenta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $detalleVenta->cantidad === null ? '' : $this->Number->format($detalleVenta->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $detalleVenta->precio === null ? '' : $this->Number->format($detalleVenta->precio) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>