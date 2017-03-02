<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Test extends Controller
{

	function __construct()
	{
		$this->load_model('test_model');
	}

	public function home(){
		$model = $this->model['test_model'];

		$result = $model->conn->query('SELECT * FROM `test`');
		var_dump($result);

		echo '<br><br>';
		var_dump(get_class_methods('mysqli_result'));
	}
}
?>