<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venta> $ventas
 */
?>
<div class="ventas index content">
    <?= $this->Html->link(__('New Venta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link('Gestión de Comisiones', ['action' => 'comisiones']) ?>
    <h3><?= __('Ventas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= __('Cliente') ?></th>
                        <th><?= __('Vendedor') ?></th>
                        <th><?= $this->Paginator->sort('total') ?></th>
                        <th><?= __('Comisión') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?= $this->Number->format($venta->id) ?></td>

                    <td>
                        <?= $venta->cliente ? h($venta->cliente->nombre) : 'Sin cliente' ?>
                    </td>

                    <td>
                        <?= $this->Number->format($venta->vendedor_id)?>
                    </td>

                    <td>
                        <?= $this->Number->format($venta->total) ?>
                    </td>

                    <td>
                        <?= $this->Number->format($venta->comision) ?>
                    </td>

                    <td>
                        <?= h($venta->created) ?>
                    </td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $venta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venta->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $venta->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $venta->id),
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