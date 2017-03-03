<?php 
defined('BASE_PATH') OR exit('No direct script access allowed');

class Test_lib extends Lib
{
	function __construct()
	{
		parent::__construct();
	}

	function square($a){
		return $a+$a;
	}
}