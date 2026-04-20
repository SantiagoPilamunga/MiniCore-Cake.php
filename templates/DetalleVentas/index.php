<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DetalleVenta> $detalleVentas
 */
?>
<div class="detalleVentas index content">
    <?= $this->Html->link(__('New Detalle Venta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detalle Ventas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('venta_id') ?></th>
                    <th><?= $this->Paginator->sort('producto_id') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalleVentas as $detalleVenta): ?>
                <tr>
                    <td><?= $this->Number->format($detalleVenta->id) ?></td>
                    <td><?= $detalleVenta->hasValue('venta') ? $this->Html->link($detalleVenta->venta->id, ['controller' => 'Ventas', 'action' => 'view', $detalleVenta->venta->id]) : '' ?></td>
                    <td><?= $detalleVenta->hasValue('producto') ? $this->Html->link($detalleVenta->producto->id, ['controller' => 'Productos', 'action' => 'view', $detalleVenta->producto->id]) : '' ?></td>
                    <td><?= $detalleVenta->cantidad === null ? '' : $this->Number->format($detalleVenta->cantidad) ?></td>
                    <td><?= $detalleVenta->precio === null ? '' : $this->Number->format($detalleVenta->precio) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detalleVenta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detalleVenta->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $detalleVenta->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $detalleVenta->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>