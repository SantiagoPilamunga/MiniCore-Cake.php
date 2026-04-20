<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleVenta $detalleVenta
 * @var \Cake\Collection\CollectionInterface|string[] $ventas
 * @var \Cake\Collection\CollectionInterface|string[] $productos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Detalle Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detalleVentas form content">
            <?= $this->Form->create($detalleVenta) ?>
            <fieldset>
                <legend><?= __('Add Detalle Venta') ?></legend>
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
