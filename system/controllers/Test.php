<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Test extends Controller
{
	function __construct()
	{
		$this->load_model('test_model');
		$this->load_lib('test_lib');
	}

	public function insert_in_test(){
		$num = rand(1, 100);
		$this->model['test_model']->insert('test', ['test_name' => $num]);
		echo "num $num inserted";
	}

	public function square(){
		$data = json_decode(file_get_contents("php://input"));

		$result = $this->lib['test_lib']->square($data->num);
		
		echo json_encode($result);
	}
}
?>