<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Test extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load_model('test_model');
		$this->load_lib('test_lib');
	}

	public function test(){
		$url = explode('/', $_SERVER['REQUEST_URI']);
		$i;
		for($i = 0;$i < count($url);$i++){
			if($url[0] == 'system'){
				array_shift($url);
				break;
			}
			array_shift($url);
		}
		print_r($url);

		// $url = explode('/', $_SERVER['REQUEST_URI']);
		// print_r($url);
		// echo "<br>";
		// array_shift($url);
		// print_r($url);
		// echo "<br>";
		// array_shift($url);
		// print_r($url);
		// echo "<br>";
		// if($_SERVER['HTTP_HOST']=='localhost') array_shift($url);
		// if(empty($url[count($url)-1])){
		// 	unset($url[count($url)-1]);
		// }
		// print_r($url);
		// echo "<br>";
	}

	public function model(){
		$this->model['test_model']->delete('test', "WHERE test_name = 'alo'");
		var_dump($this->model['test_model']->get_result());
	}

	public function square(){
		$data = json_decode(file_get_contents("php://input"));

		$result = $this->lib['test_lib']->square($data->num);

		echo json_encode($result);
	}
}
?>
