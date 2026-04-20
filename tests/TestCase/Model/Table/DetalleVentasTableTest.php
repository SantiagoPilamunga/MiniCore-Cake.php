<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleVentasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleVentasTable Test Case
 */
class DetalleVentasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleVentasTable
     */
    protected $DetalleVentas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.DetalleVentas',
        'app.Ventas',
        'app.Productos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DetalleVentas') ? [] : ['className' => DetalleVentasTable::class];
        $this->DetalleVentas = $this->getTableLocator()->get('DetalleVentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DetalleVentas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DetalleVentasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\DetalleVentasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
