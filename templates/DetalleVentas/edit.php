<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleVenta $detalleVenta
 * @var string[]|\Cake\Collection\CollectionInterface $ventas
 * @var string[]|\Cake\Collection\CollectionInterface $productos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detalleVenta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detalleVenta->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detalle Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detalleVentas form content">
            <?= $this->Form->create($detalleVenta) ?>
            <fieldset>
                <legend><?= __('Edit Detalle Venta') ?></legend>
                <?php
                    echo $this->Form->control('venta_id', ['options' => $ventas, 'empty' => true]);
                    echo $this->Form->control('producto_id', ['options' => $productos, 'empty' => true]);
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('precio');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
