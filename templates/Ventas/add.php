<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venta $venta
 * @var \Cake\Collection\CollectionInterface|string[] $clientes
 */
?>
<h1>Nueva Venta</h1>

<?= $this->Form->create($venta) ?>

<?= $this->Form->control('cliente_id', ['options' => $clientes]) ?>

<?= $this->Form->control('vendedor_id', ['options' => $vendedores, 'label' => 'Vendedor']) ?>

<h3>Productos</h3>

<div id="productos">
    <div>
        <?= $this->Form->control('detalle_ventas.0.producto_id', ['options' => $productos]) ?>
        <?= $this->Form->control('detalle_ventas.0.cantidad') ?>
        <?= $this->Form->control('detalle_ventas.0.precio') ?>
    </div>
</div>

<button type="button" onclick="agregarProducto()">Agregar Producto</button>

<?= $this->Form->button('Guardar') ?>
<?= $this->Form->end() ?>

<script>
let index = 1;

function agregarProducto() {
    const div = document.createElement('div');

    div.innerHTML = `
        <select name="detalle_ventas[${index}][producto_id]">
            <?php foreach ($productos as $id => $nombre): ?>
                <option value="<?= $id ?>"><?= $nombre ?></option>
            <?php endforeach; ?>
        </select>

        <input type="number" name="detalle_ventas[${index}][cantidad]" placeholder="Cantidad">
        <input type="number" step="0.01" name="detalle_ventas[${index}][precio]" placeholder="Precio">
    `;

    document.getElementById('productos').appendChild(div);
    index++;
}
</script>
