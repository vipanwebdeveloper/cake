<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Examples Controller
 *
 *
 * @method \App\Model\Entity\Example[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamplesController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $query = $this->Examples->find();

        $this->set('examples', $this->paginate($query, [
            'order' => [$this->Examples->aliasField('modified') => 'desc']]
        ));
    }

    /**
     * View method
     *
     * @param string|int $id Example id.
     *
     * @return void
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When there is no record.
     * @throws \Cake\Datasource\Exception\InvalidPrimaryKeyException When $primaryKey has an
     *      incorrect number of elements.
     */
    public function view($id)
    {
        $example = $this->Examples->get($id, [
            'contain' => [
                ]
        ]);

        $this->set('example', $example);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $example = $this->Examples->newEntity();
        if ($this->request->is('post')) {
            $example = $this->Examples->patchEntity($example, $this->request->data);
            if ($this->Examples->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The example could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('example'));
    }

    /**
     * Edit method
     *
     * @param string|int $id Example id.
     *
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When there is no record.
     * @throws \Cake\Datasource\Exception\InvalidPrimaryKeyException When $primaryKey has an
     *      incorrect number of elements.
     */
    public function edit($id)
    {
        $example = $this->Examples->get($id, [
            'contain' => [
            ]
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $example = $this->Examples->patchEntity($example, $this->request->getData());
            if ($this->Examples->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The example could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('example'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $example = $this->Examples->get($id);

        if ($this->Examples->delete($example)) {
            $this->Flash->success(__('The example has been deleted.'));
        } else {
            $this->Flash->error(__('The example could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
