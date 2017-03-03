<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

require_once CORE_PATH.'Model.php';
require_once CORE_PATH.'Lib.php';

class Controller
{
	protected $model = array();
	protected $lib = array();

	function __construct()
	{
		
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
