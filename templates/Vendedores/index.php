<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vendedore> $vendedores
 */
?>
<div class="vendedores index content">
    <?= $this->Html->link(__('New Vendedore'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendedores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_comision') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendedores as $vendedore): ?>
                <tr>
                    <td><?= $this->Number->format($vendedore->id) ?></td>
                    <td><?= h($vendedore->nombre) ?></td>
                    <td><?= $vendedore->porcentaje_comision === null ? '' : $this->Number->format($vendedore->porcentaje_comision) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vendedore->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendedore->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $vendedore->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $vendedore->id),
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