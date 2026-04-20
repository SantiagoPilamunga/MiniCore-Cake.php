<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venta $venta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Venta'), ['action' => 'edit', $venta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Venta'), ['action' => 'delete', $venta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Venta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ventas view content">
            <h3><?= h($venta->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $venta->hasValue('cliente') ? $this->Html->link($venta->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $venta->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($venta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $venta->total === null ? '' : $this->Number->format($venta->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($venta->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Detalle Ventas') ?></h4>
                <?php if (!empty($venta->detalle_ventas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Producto') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($venta->detalle_ventas as $detalleVenta) : ?>
                        <tr>
                            <td><?= h($detalleVenta->id) ?></td>
                            <td><?= h($detalleVenta->producto->nombre) ?></td>
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