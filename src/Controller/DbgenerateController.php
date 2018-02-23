<?php
namespace App\Controller;
use App\Controller\AppController;
use Process\Console as Migration;
use Cake\Datasource\ConnectionManager;
use TheIconic\Fixtures\FixtureManager\FixtureManager;

/**
 * Dbgenerate Controller
 *
 *
 * @method \App\Model\Entity\Dbgenerate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DbgenerateController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $dbgenerate = $this->paginate($this->Dbgenerate);

        $this->set(compact('dbgenerate'));
    }

    /**
     * Migrate method
     *
     * @return \Cake\Http\Response|void
     */
    public function Migrate($migrate_name = null)
    {
		$source = ConnectionManager::get('default');
		define('DATABASE_HOST', $source->config()['host']);
		define('DATABASE_NAME', $source->config()['database']);
		define('DATABASE_USER', $source->config()['username']);
		define('DATABASE_PASSWORD', $source->config()['password']);

		define('DIR_MIGRATION', dirname(WWW_ROOT).DIRECTORY_SEPARATOR.'db'.DIRECTORY_SEPARATOR.'migrations');

		require dirname(WWW_ROOT).DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'nasgrate'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'config.php';

		$migration = Migration::getInstance();
		ob_start();
        $migration->up($migrate_name);
		$content = ob_get_clean();
        $this->set(compact('content'));
    }
	
    /**
     * View method
     *
     * @param string|null $id Dbgenerate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dbgenerate = $this->Dbgenerate->get($id, [
            'contain' => []
        ]);

        $this->set('dbgenerate', $dbgenerate);
    }

    /**
     * Fixture method
     *
     * @param string|null $id Dbgenerate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function Fixture($id = null)
    {
		require dirname(WWW_ROOT).'\libs\fixtures\src\FixtureManager\FixtureManager.php';
		// Declare an array with the path to your fixtures
		$fixtures = [dirname(WWW_ROOT).'/db/fixtures/country.xml'];

		// Create a new Fixture Manager passing such array
		$fixtureManager = FixtureManager::create($fixtures);

		// Persist the fixtures into your test database as follow
		// Create a Default PDO Persister (currently MySQL is default)
		// Here you pass host, database name, username and password
		$fixtureManager->setDefaultPDOPersister('127.0.0.1', 'test_database', 'root', '123abc');

		// Finally, insert fixtures into database, each table will be cleaned before insertion
		$fixtureManager->persist();

		// You may clean your database if needed at any point doing
		$fixtureManager->cleanStorage();
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($migrate_name = null)
    {
		$source = ConnectionManager::get('default');
		define('DATABASE_HOST', $source->config()['host']);
		define('DATABASE_NAME', $source->config()['database']);
		define('DATABASE_USER', $source->config()['username']);
		define('DATABASE_PASSWORD', $source->config()['password']);

		define('DIR_MIGRATION', dirname(WWW_ROOT).DIRECTORY_SEPARATOR.'db'.DIRECTORY_SEPARATOR.'migrations');

		require dirname(WWW_ROOT).DIRECTORY_SEPARATOR.'nasgrate'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'config.php';

		$migration = Migration::getInstance();
		ob_start();
		$migration->generate($migrate_name, null);
		$content = ob_get_clean();
        $this->set('content', $content);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dbgenerate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dbgenerate = $this->Dbgenerate->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dbgenerate = $this->Dbgenerate->patchEntity($dbgenerate, $this->request->getData());
            if ($this->Dbgenerate->save($dbgenerate)) {
                $this->Flash->success(__('The dbgenerate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dbgenerate could not be saved. Please, try again.'));
        }
        $this->set(compact('dbgenerate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dbgenerate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dbgenerate = $this->Dbgenerate->get($id);
        if ($this->Dbgenerate->delete($dbgenerate)) {
            $this->Flash->success(__('The dbgenerate has been deleted.'));
        } else {
            $this->Flash->error(__('The dbgenerate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
