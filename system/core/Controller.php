<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

require_once CORE_PATH.'Model.php';

abstract class Controller
{
	protected $model = array();

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
}
