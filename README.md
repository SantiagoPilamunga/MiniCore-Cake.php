# MiniCoreVentas - CakePHP

## Descripción

**MiniCoreVentas** es una aplicación web desarrollada con **CakePHP** que permite gestionar ventas, clientes y vendedores, además de calcular automáticamente las comisiones en función del porcentaje asignado a cada vendedor.

El sistema incluye filtrado por rango de fechas, visualización de ventas y una vista especializada de **gestión de comisiones**, donde se muestra un resumen claro del desempeño de cada vendedor.

---

## Características

* Registro de ventas con cálculo automático de total y comisión.
* Relación entre clientes, vendedores y productos.
* Visualización de ventas con datos descriptivos (no IDs).
* Filtro de ventas por rango de fechas.
* Cálculo automático de comisiones por vendedor.
* Vista de **gestión de comisiones** con resumen por vendedor.
* Uso de paginación para optimizar la visualización.
* Manejo de relaciones ORM con CakePHP.
* Interfaz web generada con Bake y adaptada manualmente.

---

## Estructura del Proyecto

```
ventas_app/
│
├── src/
│   ├── Controller/
│   │   └── VentasController.php
│   ├── Model/
│   │   ├── Table/
│   │   │   ├── VentasTable.php
│   │   │   ├── ClientesTable.php
│   │   │   ├── VendedoresTable.php
│   │   │   ├── ProductosTable.php
│   │   │   └── DetalleVentasTable.php
│   │   └── Entity/
│   │
├── templates/
│   ├── Ventas/
│   │   ├── index.php
│   │   ├── add.php
│   │   ├── view.php
│   │   └── comisiones.php
│   │
├── config/
│   └── app.php
│
├── webroot/
│
└── README.md
```

---

## Base de Datos

El sistema utiliza MySQL con las siguientes tablas principales:

* `clientes`
* `vendedores`
* `ventas`
* `detalle_ventas`
* `productos`

---

## Requisitos

* PHP 8.x
* Composer
* MySQL
* Servidor local (XAMPP, Laragon, etc.)

---

## Instalación

1. **Clonar el repositorio:**

```bash
git clone <URL_DEL_REPOSITORIO>
cd ventas_app
```

---

2. **Instalar dependencias:**

```bash
composer install
```

---

3. **Configurar la base de datos:**

Editar el archivo:

```
config/app_local.php
```

Configurar:

```php
'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'ventas_db',
    ],
]
```

---

4. **Crear la base de datos:**

```sql
CREATE DATABASE ventas_db;
```

---

5. **Crear tablas (ejemplo simplificado):**

```sql
CREATE TABLE vendedores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    porcentaje_comision DECIMAL(5,2)
);

CREATE TABLE clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100)
);

CREATE TABLE ventas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_id INT,
    vendedor_id INT,
    total DECIMAL(10,2),
    comision DECIMAL(10,2),
    created DATE
);
```

---

6. **Insertar datos de prueba:**

```sql
INSERT INTO vendedores (id, nombre, porcentaje_comision) VALUES
(1, 'Perico P', 10),
(2, 'Zoila B', 12),
(3, 'Aquiles C', 8),
(4, 'Johny M', 15);

INSERT INTO clientes (id, nombre) VALUES
(1, 'Cliente General');
```

---

7. **Ejecutar el proyecto:**

```bash
bin/cake server
```

Abrir en navegador:

```
http://localhost:8765/ventas
```

---

## Funcionalidades Implementadas

### Gestión de Ventas

* Registro de ventas con múltiples productos.
* Cálculo automático del total.
* Cálculo automático de comisión basado en el vendedor.

---

### Filtro por Fechas

Se implementó un filtro dinámico:

```php
created >= inicio AND created <= fin
```

Aplicado tanto en:

* listado de ventas
* resumen de comisiones

---

### Gestión de Comisiones

Se creó una vista personalizada:

```
/ventas/comisiones
```

Muestra:

* Nombre del vendedor
* Total de ventas
* Porcentaje de comisión
* Comisión total generada

---

### Relaciones ORM

Se utilizaron asociaciones:

```php
Ventas belongsTo Clientes
Ventas belongsTo Vendedores
Ventas hasMany DetalleVentas
DetalleVentas belongsTo Productos
```

---

## Uso

* Registrar una venta desde el botón **"New Venta"**.
* Seleccionar cliente, vendedor y productos.
* Visualizar las ventas en la tabla principal.
* Filtrar por fechas.
* Acceder a la vista **Gestión de Comisiones**.
* Analizar el rendimiento de vendedores.

---

## Personalización

* Puedes modificar los porcentajes de comisión directamente en la tabla `vendedores`.
* Puedes agregar nuevos productos y extender el sistema.
* Se puede integrar lógica avanzada de reglas de comisión.

---

## Conclusión

El sistema implementa un modelo completo de gestión de ventas utilizando CakePHP, aplicando buenas prácticas de:

* Arquitectura MVC
* ORM
* Paginación
* Filtros dinámicos
* Cálculo automático de negocio

---

## Autor

Proyecto desarrollado como práctica académica utilizando CakePHP.
