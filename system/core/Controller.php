<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

# Imports the parents of the objects that will be loaded
require_once CORE_PATH.'Model.php';
require_once CORE_PATH.'Lib.php';


/**
 * Establishes the inheritance basis for all controllers instantiated
 * in the execution of the system.
 *
 * @author 	Poli Júnior Engenharia - eComp <http://www.polijuniorengenharia.com.br>
 */
class Controller
{
	/**
	 * Each key is the name of an Model object,
	 * each value is an instance of it.
	 * Ex.: $this->model['myModel'] = new myModel();
	 * 
	 * @var array
	 */
	protected $model = array();

	/**
	 * Each key is the name of an Lib object, each
	 * value is an instance of it.
	 * Ex.: $this->lib['myLib'] = new myLib();
	 *
	 * @var array
	 */
	protected $lib = array();

	/**
	 * Instace of an object received by JSON from
	 * the frontend AngularJS.
	 *
	 * @var object
	 */
	private $post;

	function __construct()
	{
		$this->post = json_decode(file_get_contents("php://input"));
	}

	/**
	 * Chech if the post received from the front
	 * end has the property and then return it.
	 *
	 * @param 	string 	$index The property name to be searched in Model::post.
	 *
	 * @return 	mixed 	Property received by JSON from the frontend.
	 */
	public function get_post($index){
		if(property_exists($this->post, $index)){
			return $this->post->$index;
		}
	}

	/**
	 * Set an key in Controller::model that points
	 * to an instance of a Model child in models
	 * folder.
	 *
	 * @param 	string 	$file 	Name of the file to be searched in models folder.
	 *
	 * @return object Return an instance of the model loaded.
	 */
	public function load_model($file){
		if(file_exists(MODELS_PATH.$file.'.php')){
			require_once MODELS_PATH.$file.'.php';
			$this->model[$file] = new $file;
		}
		return $this->model[$file];
	}

	/**
	 * Set an key in Controller::lib that points
	 * to an instance of a Lib child in libraries
	 * folder.
	 *
	 * @param 	string 	$file 	Name of the file to be searched in libraries folder.
	 *
	 * @return object Return an instance of the lib loaded.
	 */
	public function load_lib($file){
		if(file_exists(LIB_PATH.$file.'.php')){
			require_once LIB_PATH.$file.'.php';
			$this->lib[$file] = new $file;
		}
		return $this->lib[$file];
	}
}
