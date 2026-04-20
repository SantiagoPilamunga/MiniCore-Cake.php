<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="productos view content">
            <h3><?= h($producto->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($producto->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($producto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $producto->precio === null ? '' : $this->Number->format($producto->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $producto->stock === null ? '' : $this->Number->format($producto->stock) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Detalle Ventas') ?></h4>
                <?php if (!empty($producto->detalle_ventas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Venta Id') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->detalle_ventas as $detalleVenta) : ?>
                        <tr>
                            <td><?= h($detalleVenta->id) ?></td>
                            <td><?= h($detalleVenta->venta_id) ?></td>
                            <td><?= h($detalleVenta->cantidad) ?></td>
                            <td><?= h($detalleVenta->precio) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DetalleVentas', 'action' => 'view', $detalleVenta->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DetalleVentas', 'action' => 'edit', $detalleVenta->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'DetalleVentas', 'action' => 'delete', $detalleVenta->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $detalleVenta->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>