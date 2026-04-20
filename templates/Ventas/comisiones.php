<h2>Gestión de Comisiones</h2>

<form method="get">
    <label>Fecha Inicio:</label>
    <input type="date" name="inicio">

    <label>Fecha Fin:</label>
    <input type="date" name="fin">

    <button type="submit">Filtrar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Vendedor</th>
            <th>Total Ventas</th>
            <th>% Comisión</th>
            <th>Comisión Total</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($comisiones as $c): ?>
            <tr>
                <td><?= h($c->nombre_vendedor) ?></td>

                <td>$<?= number_format($c->total_ventas, 2) ?></td>

                <td><?= $c->porcentaje ?>%</td>

                <td>$<?= number_format($c->total_comision, 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>