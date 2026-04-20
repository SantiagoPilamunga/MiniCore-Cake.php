<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DetalleVentas Controller
 *
 * @property \App\Model\Table\DetalleVentasTable $DetalleVentas
 */
class DetalleVentasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DetalleVentas->find()
            ->contain(['Ventas', 'Productos']);
        $detalleVentas = $this->paginate($query);

        $this->set(compact('detalleVentas'));
    }

    /**
     * View method
     *
     * @param string|null $id Detalle Venta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleVenta = $this->DetalleVentas->get($id, contain: ['Ventas', 'Productos']);
        $this->set(compact('detalleVenta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalleVenta = $this->DetalleVentas->newEmptyEntity();
        if ($this->request->is('post')) {
            $detalleVenta = $this->DetalleVentas->patchEntity($detalleVenta, $this->request->getData());
            if ($this->DetalleVentas->save($detalleVenta)) {
                $this->Flash->success(__('The detalle venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle venta could not be saved. Please, try again.'));
        }
        $ventas = $this->DetalleVentas->Ventas->find('list', limit: 200)->all();
        $productos = $this->DetalleVentas->Productos->find('list', limit: 200)->all();
        $this->set(compact('detalleVenta', 'ventas', 'productos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle Venta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleVenta = $this->DetalleVentas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleVenta = $this->DetalleVentas->patchEntity($detalleVenta, $this->request->getData());
            if ($this->DetalleVentas->save($detalleVenta)) {
                $this->Flash->success(__('The detalle venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle venta could not be saved. Please, try again.'));
        }
        $ventas = $this->DetalleVentas->Ventas->find('list', limit: 200)->all();
        $productos = $this->DetalleVentas->Productos->find('list', limit: 200)->all();
        $this->set(compact('detalleVenta', 'ventas', 'productos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle Venta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleVenta = $this->DetalleVentas->get($id);
        if ($this->DetalleVentas->delete($detalleVenta)) {
            $this->Flash->success(__('The detalle venta has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle venta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
