<?php
App::uses('AppController', 'Controller');
/**
 * Tracks Controller
 *
 * @property Track $Track
 */
class RobotsController extends AppController {
	
	public $components = array('DebugKit.Toolbar', 'Session', 'Auth', 'Session', 'Error');
	
	public function beforeFilter()
	{
		parent::beforeFilter();

		$this->Auth->allow('*');
	}

	public function saveGenres() {
		$perPage = 2;
		$api_path = Configure::read('Beatport.API.URL.ALL_GENRES'); 
		$data = json_decode( file_get_contents($api_path) );

		$genres = array();
		foreach( $data->results as $genre ) {
			$genres[] = array('id' => $genre->id, 'name' => $genre->name);
		}

		$this->loadModel('Genre');
		$genreData = array('Genre' => $genres);
		
		debug($genreData);
		// $this->Genre->saveAll( $genreData['Genre'] );
		
		$this->render(false);
	}

	public function saveMostPopularTracks($genre_id = null) {
		if($genre_id == null) {
			throw new Exception("Genre not defined", 1);
		}
		
		$perPage = 100;
		$api_path = Configure::read('Beatport.API.URL.MOST_POPULAR') . 'id=' . $genre_id . '&perPage=' . $perPage; 
		$data = json_decode( file_get_contents($api_path) );

		$this->loadModel('Track');
		$this->loadModel('Genre');
		$this->loadModel('Artist');
		$this->loadModel('Label');

		$inserts = 0;
		if( count($data->results) ) {
			foreach ($data->results as $trackObj) {
				// debug($trackObj); die;
				
				if( !$this->Track->exists($trackObj->id) ) {
					$trackData = array('Track' => array(
						'title' => $trackObj->title,
						'id' => $trackObj->id,
						'release_date' => $trackObj->releaseDate,
						'isrc' => $trackObj->isrc,
						'preview' => $trackObj->sampleUrl
					) );

					/* Genres */					
					$genres = array();
					foreach($trackObj->genres as $genreObj) {
						$genres['Genre'][] = $genreObj->id;
					}
					$trackData['Genre'] = $genres;

					/* Artists */					
					$artists = array();
					foreach($trackObj->artists as $artistObj) {
						// insert new artist
						if( !$this->Artist->exists($artistObj->id) ) {
							$artistData = array(
								'id' => $artistObj->id, 
								'name' => $artistObj->name
							);
							$this->Artist->save($artistData);
						}
						$artists['Artist'][] = $artistObj->id;
					}
					$trackData['Artist'] = $artists;

					// insert new label
					if( !$this->Label->exists($trackObj->label->id) ) {
						$labelData = array(
							'id' => $trackObj->label->id, 
							'name' => $trackObj->label->name
						);
						$this->Label->save($labelData);
					}
					$trackData['label_id'] = $trackObj->label->id;

					$this->Track->save($trackData);
					$inserts++;
				}
			}
		}
		
		echo $inserts . ' tracks saved';
		$this->render(false);
	}
}
