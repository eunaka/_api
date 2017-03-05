<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Test extends Controller
{
	function __construct()
	{
		$this->load_model('test_model');
		$this->load_lib('test_lib');
	}

	public function test(){
		$model = $this->model['test_model'];
		$query = $model->query("INSERT INTO test (test_name) VALUES ('aloalo')");
		var_dump($query);
	}

	public function model(){
		$this->model['test_model']->select('test', "WHERE test_name LIKE 'test%'");
		var_dump($this->model['test_model']->get_result());
	}

	public function square(){
		$data = json_decode(file_get_contents("php://input"));

		$result = $this->lib['test_lib']->square($data->num);
		
		echo json_encode($result);
	}
}
?>