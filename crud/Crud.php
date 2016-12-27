<?php 
class Crud 
{	
	public $connect;
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "php_crud";


	public function database_connect(){
		$this->connect =mysqli_connect($this->host,$this->username,$this->password,$this->database);
	}

	function __construct()
	{
		# code...
		$this->database_connect();
	}
	public function execute_query($query){
		return mysqli_query($this->connect, $query);
	}
	
	public function get_data_in_table($query){
		$ouput ='';
		$result = $this->execute_query($query);
		$ouput .= '
				<table>
	<tr>
		<th width="10%">Image</th>
		<th width="35%">First Name</th>
		<th width="35%">Last Name</th>
		<th width="10%">Update</th>
		<th width="10%">Delete</th>

	</tr>

				';
		
		while ($row = mysqli_fetch_object($result)){
			$ouput .= '
					<td><img src="upload/"'.$row->image.' class ="img-thumbnail" width="50" height="35" ></td>
	<td>'.$row->first_name.'</td>
	<td>'.$row->last_name.'</td>
	<td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button></td>
	<td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-success btn-xs delete">Delete</button></td>
					';
			
		}
		$ouput .="</table>";
		return $ouput;
	}
}

?>