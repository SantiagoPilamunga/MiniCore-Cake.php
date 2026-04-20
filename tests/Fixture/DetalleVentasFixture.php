<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleVentasFixture
 */
class DetalleVentasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'venta_id' => 1,
                'producto_id' => 1,
                'cantidad' => 1,
                'precio' => 1.5,
            ],
        ];
        parent::init();
    }
}
