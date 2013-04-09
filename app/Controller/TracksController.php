<?php
App::uses('AppController', 'Controller');
/**
 * Tracks Controller
 *
 * @property Track $Track
 */
class TracksController extends AppController {

	public function beforeFilter()
	{
		parent::beforeFilter();

		$this->Auth->allow('*');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
        $labels = $this->Track->Label->find('list', array('order' => array('Label.name')));
		$artists = $this->Track->Artist->find('list', array('order' => array('Artist.name')));
		$genres = $this->Track->Genre->find('list', array('order' => array('Genre.name')));
        
		// get posts        
        //$this->Post->contain($contain); // required if you are using Containable
        //$this->paginate['reset']=false; // required if you are using Containable
        $tracks = $this->paginate();
        
        $Favorite = ClassRegistry::init('Favorites.favorite');
        $userFavorites = $Favorite->getAllFavorites( $this->Auth->user('id') );
        
        $this->set(compact('tracks', 'labels', 'artists', 'genres', 'userFavorites'));
	}
    
    public function favorites() {
        $labels = $this->Track->Label->find('list', array('order' => array('Label.name')));
		$artists = $this->Track->Artist->find('list', array('order' => array('Artist.name')));
		$genres = $this->Track->Genre->find('list', array('order' => array('Genre.name')));
        
        $Favorite = ClassRegistry::init('Favorites.favorite');
        $userFavorites = $Favorite->getAllFavorites( $this->Auth->user('id') );
        
        $conditions = array('Track.id' => array_values($userFavorites['favorite']));
        $tracks = $this->paginate($conditions);
        
        $this->set(compact('tracks', 'labels', 'artists', 'genres', 'userFavorites'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Track->exists($id)) {
			throw new NotFoundException(__('Invalid track'));
		}
		$options = array('conditions' => array('Track.' . $this->Track->primaryKey => $id));
		$this->set('track', $this->Track->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Track->create();
			if ($this->Track->save($this->request->data)) {
				$this->Session->setFlash(__('The track has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			}
		}
		$labels = $this->Track->Label->find('list');
		$artists = $this->Track->Artist->find('list');
		$genres = $this->Track->Genre->find('list');
		$this->set(compact('labels', 'artists', 'genres'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Track->exists($id)) {
			throw new NotFoundException(__('Invalid track'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Track->save($this->request->data)) {
				$this->Session->setFlash(__('The track has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Track.' . $this->Track->primaryKey => $id));
			$this->request->data = $this->Track->find('first', $options);
		}
		$labels = $this->Track->Label->find('list');
		$artists = $this->Track->Artist->find('list');
		$genres = $this->Track->Genre->find('list');
		$this->set(compact('labels', 'artists', 'genres'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Track->id = $id;
		if (!$this->Track->exists()) {
			throw new NotFoundException(__('Invalid track'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Track->delete()) {
			$this->Session->setFlash(__('Track deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Track was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function search(){
        $url = array('action' => 'index');
        
        // build a URL will all the search elements in it
        // the resulting URL will be 
        // example.com/cake/posts/index/Search.keywords:mykeyword/Search.genre_id:3
        foreach ($this->data as $k => $v){ 
            foreach ($v as $kk => $vv){
                $url[$k.'.'.$kk] = $vv; 
            }
        }
        
        $this->redirect($url);
    }
}
