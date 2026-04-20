<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vendedores Model
 *
 * @method \App\Model\Entity\Vendedore newEmptyEntity()
 * @method \App\Model\Entity\Vendedore newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Vendedore> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vendedore get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Vendedore findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Vendedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Vendedore> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vendedore|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Vendedore saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Vendedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vendedore>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vendedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vendedore> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vendedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vendedore>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vendedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vendedore> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VendedoresTable extends Table
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

        $this->setTable('vendedores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->allowEmptyString('nombre');

        $validator
            ->decimal('porcentaje_comision')
            ->allowEmptyString('porcentaje_comision');

        return $validator;
    }
}
