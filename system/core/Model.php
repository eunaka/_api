<?php 
defined('BASE_PATH') OR exit('No direct script access allowed');

class Model
{
	/**
	 * An instance of mysqli class.
	 *
	 * @var object
	 */
	public $conn;

	/**
	 * The result from the execution of a Model method.
	 *
	 * @var int|array|null
	 */
	private $result;

	/**
	 * Init the Model::conn and echo an error in
	 * connection if it exists.
	 */ 
	function __construct(){
		$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->conn->connect_error){
			die("<h1>CONNECTION ERROR #".$this->conn->connect_errno."</h1>".$this->conn->connect_error);
		}
	}

	/**
	 * Return the Model::result with the option to get only the specified id.
	 *
	 * @return int|array|null
	 */
	public function get_result($id = NULL){
		if(is_null($id)){
			return $this->result;
		}
		elseif(is_array($this->result)) {
			foreach ($this->result as $value) {
				#Index 0 of this array is suposed to be the id column.
				$id_index = array_keys($value);
				if($value[$id_index[0]] == $id){
					return $value[$id_index[0]];
				}
			}
			/* If the above return was not reached, the
			 * array does not contain the specified id.
			 */
			return NULL;
		}
	}

	/**
	 * Set all non numeric values to 'value'.
	 *
	 * @param 	array 	$data 	Array that will have its values parsed.
	 */
	protected function parse_values($data){
		$return = array();
		foreach ($data as $value) {
			$return[] = (is_numeric($value))?$value:"'$value'";
		}
		return $return;
	}

	/**
	 * Execute the query and echos on screen any error.
	 * Set the Model::result to the number of affected rows.
	 * 
	 * @param	string 	$sql 	The query to be executed.
	 * @param 	int 	$resultmode 	Default param of mysqli::query() method.
	 * @return 	object|null 	Returns the result of the last query.
	 */
	public function query($sql, $resultmode = MYSQLI_STORE_RESULT){
		$query = $this->conn->query($sql, $resultmode);
		$this->result = $this->conn->affected_rows;

		if($this->conn->error){
			echo "<h1>SQL ERROR #".$this->conn->errno."</h1>".$this->conn->error;
		}
		return $query;
	}

	/**
	 *
	 */
	public function select($table, $where='', $columns='*'){
		if(is_array($columns)){
			$columns = implode(',', $columns);
		}
		$sql = "SELECT $columns FROM $table $where";
		$query = $this->query($sql);

		if($this->conn->affected_rows > 1){
			$this->result = array();
			while($temp = $query->fetch_assoc()) {
				$this->result[] = $temp;
			}
		}
		else{
			$this->result = $query->fetch_assoc();
		}
		return ($this->result)?TRUE:FALSE;
	}

	/**
	 *
	 * @return 	bool 	Return a boolean acording to the success of the query.
	 */
	public function insert($table, $data){
		$columns = array_keys($data);
		$columns = implode(',', $columns);

		$values = $this->parse_values($data);
		$values = implode(',', $values);

		$sql = "INSERT INTO $table ($columns) VALUES ($values)";

		# mysqli::query() return bool on INSERT statement
		$query_success = $this->query($sql);

		# Change the Model::result from affected rows to the new id
		$this->result = $this->conn->insert_id;

		return $query_success;
	}

	/**
	 *
	 * @return 	bool 	Return a boolean acording with the rolls affecteds by the query.
	 */
	public function update($table, $data, $where){
		$columns_change = array();
		foreach ($data as $key => $value) {
			#Change to 'value' all non numerics
			$value = (is_numeric($value))?$value:"'$value'";
			$columns_change[]= $key."=".$value;
		}
		$columns_change=implode(',', $columns_change);

		$sql = "UPDATE $table SET $columns_change $where";

		$this->query($sql);
		#Model::query() automatically set Model::result to the number of affected rows. 
		return ($this->result)?TRUE:FALSE;
	}

	/**
	 * @param 	string 	$table 	The name of the table to use.
	 * @param 	string $where 
	 * @return 	bool 	Return a boolean acording with the rolls affecteds by the query.
	 */
	public function delete($table, $where){
		$sql = "DELETE FROM $table $where";
		$this->query($sql);
		#Model::query() automatically set Model::result to the number of affected rows. 
		return ($this->result)?TRUE:FALSE;
	}
}