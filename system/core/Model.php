<?php 
defined('BASE_PATH') OR exit('No direct script access allowed');

class Model
{
	/**
	 * @var Object
	 */
	public $conn;

	/**
	 * @var int/array
	 */
	private $result;

	function __construct(){
		$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->conn->connect_error){
			echo "<h1>CONNECTION ERROR #".$this->conn->connect_errno."</h1>".$this->conn->connect_error;
		}
	}

	/*
	 * 
	 */
	public function get_result(){
		return $this->result;
	}

	/*
	 * Set all non numeric values to 'value'.
	 */
	protected function parse_values($data){
		$return = array();
		foreach ($data as $value) {
			$return[] = (is_numeric($value))?$value:"'$value'";
		}
		return $return;
	}

	/*
	 *
	 */
	protected function query($sql){
		$return = $this->conn->query($sql);
		if($this->conn->error){
			echo "<h1>SQL ERROR #".$this->conn->errno."</h1>".$this->conn->error;
			die();
		}
		return $return;
	}

	/*
	 *
	 */
	public function select($table, $where, $columns='*'){
		if(is_array($columns)){
			$columns = implode(',', $columns);
		}
		$sql = "SELECT $columns FROM $table WHERE $where";
		$this->query($sql);
	}

	/*
	 *
	 */
	public function insert($table, $data){
		$columns = array_keys($data);
		$columns = implode(',', $columns);
		$values = $this->parse_values($data);
		$values = implode(',', $values);

		$sql = "INSERT INTO $table ($columns) VALUES ($values)";
		$this->query($sql);
		$this->result = $this->conn->affected_rows;
	}

	/*
	 *
	 */
	public function update(){
		
	}

	/*
	 *
	 */
	public function delete(){
		
	}
}