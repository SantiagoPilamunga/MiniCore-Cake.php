<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vendedore $vendedore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendedore'), ['action' => 'edit', $vendedore->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendedore'), ['action' => 'delete', $vendedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendedore->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendedore'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vendedores view content">
            <h3><?= h($vendedore->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($vendedore->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendedore->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Porcentaje Comision') ?></th>
                    <td><?= $vendedore->porcentaje_comision === null ? '' : $this->Number->format($vendedore->porcentaje_comision) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>