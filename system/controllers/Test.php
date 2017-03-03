<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Test extends Controller
{

	function __construct()
	{
		$this->load_model('test_model');
	}

	public function home(){

		echo json_encode(dobro(2));
	}
}
?>