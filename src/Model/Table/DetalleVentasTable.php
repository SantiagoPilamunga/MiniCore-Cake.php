<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleVentas Model
 *
 * @property \App\Model\Table\VentasTable&\Cake\ORM\Association\BelongsTo $Ventas
 * @property \App\Model\Table\ProductosTable&\Cake\ORM\Association\BelongsTo $Productos
 *
 * @method \App\Model\Entity\DetalleVenta newEmptyEntity()
 * @method \App\Model\Entity\DetalleVenta newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DetalleVenta> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetalleVenta get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DetalleVenta findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DetalleVenta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DetalleVenta> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleVenta|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DetalleVenta saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleVenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleVenta>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleVenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleVenta> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleVenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleVenta>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DetalleVenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DetalleVenta> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetalleVentasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('detalle_ventas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ventas', [
            'foreignKey' => 'venta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Productos', [
            'foreignKey' => 'producto_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('venta_id')
            ->allowEmptyString('venta_id');

        $validator
            ->integer('producto_id')
            ->allowEmptyString('producto_id');

        $validator
            ->integer('cantidad')
            ->allowEmptyString('cantidad');

        $validator
            ->decimal('precio')
            ->allowEmptyString('precio');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['venta_id'], 'Ventas'), ['errorField' => 'venta_id']);
        $rules->add($rules->existsIn(['producto_id'], 'Productos'), ['errorField' => 'producto_id']);

        return $rules;
    }
}
