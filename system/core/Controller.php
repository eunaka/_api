<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

require_once CORE_PATH.'Model.php';
require_once CORE_PATH.'Lib.php';

class Controller
{
	/**
	 * Each index is the name of an model object.
	 * each
	 */
	protected $model = array();
	protected $lib = array();
	private $post;

	function __construct()
	{
		$this->post = json_decode(file_get_contents("php://input"));
	}

	/**
	 * Chech if the post received from the front end
	 * has the property and then return it.
	 *
	 * @param string $index The atribute name to search in Model::post.
	 * @return int|array|null Depends of what is received from the front end.
	 */
	public function get_post($index){
		if(property_exists($this->post, $index)){
			return $this->post->$index;
		}
	}

	public function load_model($file){
		if(file_exists(MODELS_PATH.$file.'.php')){
			require_once MODELS_PATH.$file.'.php';
			$this->model[$file] = new $file;
		}
		return $this->model[$file];
	}

	public function load_lib($file){
		if(file_exists(LIB_PATH.$file.'.php')){
			require_once LIB_PATH.$file.'.php';
			$this->lib[$file] = new $file;
		}
		return $this->lib[$file];
	}
}
