<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ventas Controller
 *
 * @property \App\Model\Table\VentasTable $Ventas
 */
class VentasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Ventas->find()
            ->contain(['Clientes', 'Vendedores']);

        //Filtro por fechas
        if ($this->request->getQuery('inicio') && $this->request->getQuery('fin')) {
            $inicio = $this->request->getQuery('inicio');
            $fin = $this->request->getQuery('fin');

            $query->where([
                'created >=' => $inicio,
                'created <=' => $fin
            ]);
        }

        //Obtener ventas
        $ventas = $this->paginate($query);

        //Resumen por vendedor
        $resumenQuery = $this->Ventas->find()
            ->select([
                'vendedor_id',
                'total_ventas' => 'SUM(total)',
                'total_comision' => 'SUM(comision)'
            ])
            ->group('vendedor_id')
            ->contain(['Vendedores']);

        if (!empty($inicio) && !empty($fin)) {
            $resumenQuery->where([
                'created >=' => $inicio,
                'created <=' => $fin
            ]);
        }

        $resumen = $resumenQuery->all();

        $this->set(compact('ventas', 'resumen'));
    }

    /**
     * View method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venta = $this->Ventas->get($id, contain: ['Clientes', 'DetalleVentas.Productos']);
        $this->set(compact('venta'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venta = $this->Ventas->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $total = 0;

            foreach ($data['detalle_ventas'] as $detalle) {
                $total += $detalle['cantidad'] * $detalle['precio'];
            }

            $data['total'] = $total;

            // Calcular comisión

            $vendedor = $this->Ventas->Vendedores->get($data['vendedor_id']);
            $comision = $total * ($vendedor->porcentaje_comision / 100);

            $data['comision'] = $comision;

            $venta = $this->Ventas->patchEntity($venta, $data, [
                'associated' => ['DetalleVentas']
            ]);

            if ($this->Ventas->save($venta)) {
                $this->Flash->success('Venta registrada correctamente');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Error al guardar');
        }

        $clientes = $this->Ventas->Clientes->find('list');
        $productos = $this->Ventas->DetalleVentas->Productos->find('list');

        $this->set(compact('venta', 'clientes', 'productos','vendedor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venta = $this->Ventas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venta = $this->Ventas->patchEntity($venta, $this->request->getData());
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venta could not be saved. Please, try again.'));
        }
        $clientes = $this->Ventas->Clientes->find('list', limit: 200)->all();
        $this->set(compact('venta', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venta = $this->Ventas->get($id);
        if ($this->Ventas->delete($venta)) {
            $this->Flash->success(__('The venta has been deleted.'));
        } else {
            $this->Flash->error(__('The venta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function comisiones()
    {
        $query = $this->Ventas->find()
            ->select([
                'Ventas.vendedor_id',
                'total_ventas' => 'SUM(Ventas.total)',
                'total_comision' => 'SUM(Ventas.comision)',
                // Debes seleccionar los campos del vendedor para que estén disponibles
                'nombre_vendedor' => 'Vendedores.nombre', 
                'porcentaje' => 'Vendedores.porcentaje_comision'
            ])
            ->contain(['Vendedores'])
            ->group([
                'Ventas.vendedor_id',
                'Vendedores.id',
                'Vendedores.nombre',
                'Vendedores.porcentaje_comision'
            ]);

        // Filtro por fechas
        if ($this->request->getQuery('inicio') && $this->request->getQuery('fin')) {
            $query->where([
                'Ventas.created >=' => $this->request->getQuery('inicio'),
                'Ventas.created <=' => $this->request->getQuery('fin')
            ]);
        }

        $comisiones = $query->all();
        $this->set(compact('comisiones'));
    }
}
