<?php
//connection class will be used to conenct to the datbase
class Connection{
	//////////////////////////////////
	//properties
	///////////////////////////////////
	private $host;
	private $user;
	private $pwd;
	private $db;
	
	public $conxn;
	public $sql;
	public $affRows;
	public $numRows;
	public $data = array();
	public $error;
	public $res;
	////////////////////////////////////
	//constructor:
	public function __construct($db = 'orchid',
								$user ='root',
								$pwd = '',
								$host = 'localhost'){
	//set the data members
	$this->host =$host;
	$this->user = $user;
	$this->pwd = $pwd;
	$this->db = $db;
	
	//connect to the database
	$this->conxn = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) or 
	trigger_error($this->error = mysqli_error($this->conxn));
	
	//echo "<br /> The connection is made " . $this->conxn->thread_id;	
	}//method ends
	

//destructor: is a special function that executes when there is no further use of the object:needs no argument

public function __destruct(){
	//echo "<br /> The connection " . $this->conxn->thread_id;	mysqli_close($this->conxn);
}
}//

?>