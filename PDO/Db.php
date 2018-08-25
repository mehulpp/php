<?
class Db {
	public $isConnected;
	protected $dbc;
	protected $mysql_load_data_exec;
	public static $display_queries;
	public $debugQueries = false;
	public function __construct($username, $password, $host, $dbname, $options=array()){
		$this->isConnected = true;
		try {
			$this->dbc = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
			$this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->dbc->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->mysql_load_data_exec = "mysql --local-infile --user='$username' --password='$password' --host={$host} {$dbname} -e";
		}
		catch(PDOException $e) {
			$this->isConnected = false;
			$this -> writeError($e->getMessage(),'ddl');
		}
	}

	public function __destruct(){
		$this->debug_queries();
	}
	public function Disconnect(){
		$this->dbc = null;
		$this->isConnected = false;
	}
	public function getRow($sql, $params=array()){
		try{
		    $this->writequery($sql);
			self::$display_queries[]=$this->append_file($sql,$params);
			foreach($params as $key=>$value){
				if($value == NULL){
					$params[$key] = "";
				}else{
					$params[$key] = addslashes($value);
				}
			}
			$stmt = $this->dbc->prepare($sql);
			$stmt->execute($params);
			return $stmt->fetch();
		}catch(PDOException $e){
			$qry = $this->get_query($sql,$params);
			$this -> writeError($e->getMessage(),'ddl',$qry);
		}
	}
	public function getRows($sql, $params=array()){
		try{
			self::$display_queries[]=$this->append_file($sql,$params);
			if(trim($sql) != ""){
				foreach($params as $key=>$value){
					if($value == NULL){
						$params[$key] = "";
					}else{
						$params[$key] = $value;
					}
				}
				$stmt = $this->dbc->prepare($sql);
				$stmt->execute($params);
				return $stmt->fetchAll();
			}
		}catch(PDOException $e){
			$qry = $this->get_query($sql,$params);
			$this -> writeError($e->getMessage(),'ddl',$qry);
		}
	}
	public function getRowsByKeyValue($sql, $params=array()){
		try{
			self::$display_queries[]=$this->append_file($sql,$params);
			if(trim($sql) != ""){
				foreach($params as $key=>$value){
					if($value == NULL){
						$params[$key] = "";
					}else{
						$params[$key] = addslashes($value);
					}
				}
				$stmt = $this->dbc->prepare($sql);
				$stmt->execute($params);
				return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
			}
		}catch(PDOException $e){
			$qry = $this->get_query($sql,$params);
			$this -> writeError($e->getMessage(),'ddl',$qry);
		}
	}
	public function getVar($sql, $params=array()){
		try{
			self::$display_queries[]=$this->append_file($sql,$params);
			if(trim($sql) != ""){
				foreach($params as $key=>$value){
					if($value == NULL){
						$params[$key] = "";
					}else{
						$params[$key] = addslashes($value);
					}
				}
				$stmt = $this->dbc->prepare($sql);
				$stmt->execute($params);
				return $stmt->fetchColumn();
			}
		}catch(PDOException $e){
			$qry = $this->get_query($sql,$params);
			$this -> writeError($e->getMessage(),'ddl',$qry);
		}
	}
	public function getColumn($sql, $params=array()){
		try{
			self::$display_queries[]=$this->append_file($sql,$params);
			if(trim($sql) != ""){
				foreach($params as $key=>$value){
					if($value == NULL){
						$params[$key] = "";
					}else{
						$params[$key] = addslashes($value);
					}
				}
				$stmt = $this->dbc->prepare($sql);
				$stmt->execute($params);
				$count = $stmt->rowCount();
				$column = array();
				for($c=0;$c<$count;$c++){
					$column[$c] = $stmt->fetchColumn();
				}
				return $column;
			}
		}catch(PDOException $e){
			$qry = $this->get_query($sql,$params);
			$this -> writeError($e->getMessage(),'ddl',$qry);
		}
	}


	public function query($sql, $params=array()){
		global  $otdbo;
		try{
			self::$display_queries[]=$this->append_file($sql,$params);
			foreach($params as $key=>$value){
				if($value == NULL){
					$params[$key] = "";
				}else{
					$value			=	preg_replace('|[\\\\]+|', '\\', $value);
					$params[$key] 	= 	htmlentities(str_replace("&amp;","&",$value), ENT_QUOTES | ENT_IGNORE, "UTF-8");
				}
			}


			$stmt = $this->dbc->prepare($sql);
			if((stristr($sql,'insert') || stristr($sql,'update') || stristr($sql,'delete')) && !stristr($sql,'_delete')){
				$time = date("m/d/Y h:i:s");
				$dml_log_path = DIR_FS_DOMAIN_ROOT.PROTECTED_FOLDER."/database_logs/";
				$year = date("Y");
				$month = date("m");
				$day = date("d");
				$hour = date("H");
				if(!file_exists($dml_log_path.$year)){
					mkdir($dml_log_path.$year,777);
				}

				if(!file_exists($dml_log_path.$year."/".$month)){
					mkdir($dml_log_path.$year."/".$month,777);
				}

				if(!file_exists($dml_log_path.$year."/".$month."/".$day)){
					mkdir($dml_log_path.$year."/".$month."/".$day,777);
				}

				if(!file_exists($dml_log_path.$year."/".$month."/".$day."/".$hour)){
					mkdir($dml_log_path.$year."/".$month."/".$day."/".$hour,777);
				}
				$fp = fopen($dml_log_path.$year."/".$month."/".$day."/".$hour."/dml_query_log.sql", "a+");
				$data = "[".$time."], [file name :-".$_SERVER['SCRIPT_FILENAME']."],".$otdbo->get_query($sql, $params).";\n";
				fwrite($fp,$data);
			}
			$stmt->execute($params);
			return $stmt->rowCount();
		}catch(PDOException $e){
			$qry = $this->get_query($sql,$params);
			$this -> writeError($e->getMessage(),'dml',$qry);
		}
	}

	public function getInsertId(){
		$lastInsertId= $this->dbc->lastInsertId();
		return $lastInsertId;
	}
	public function writeError($err,$type,$qry){
        
		if(strstr($_SERVER['SERVER_ADDR'],'192.168.0') || strstr($_SERVER['SERVER_ADDR'],'127.0.0')) {
			echo "\n<br>".$err . "\n";
			echo "<br>".$type . "\n";
			echo "<br>".$qry . "\n";
			Temp_Func::dump(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
			error_log(sprintf("%s:%s: %s", __FILE__, __LINE__, "\nQuery:\n{$qry}\n\n"));
			error_log(sprintf("%s:%s: QUERY FAIL ----\n%s\n", __FILE__, __LINE__, var_export(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS), true)));
			echo sprintf("%s:%s: %s", __FILE__, __LINE__, "\nQuery:\n{$qry}\n\n");
			echo "\n\nRequest Object:\n";
			var_export($_REQUEST);
			error_log(sprintf("%s:%s: QUERY FAIL ----\n%s\n", __FILE__, __LINE__, var_export($_REQUEST, true)));
		}
		if( $type== 'dml'){
			$fp = fopen(DIR_FS_DOMAIN_ROOT.PROTECTED_FOLDER."database_logs/dml.sql", "a+");
		}else{
			$fp = fopen(DIR_FS_DOMAIN_ROOT.PROTECTED_FOLDER."database_logs/ddl.sql", "a+");
		}
		if($qry){
			$msg= $err." from Db.php on ".date('d-m-Y h:i:s')."\n Query:".$qry."\n\n".$_SERVER['REQUEST_URI']."\n\n";
		}else {
			$msg= $err." from Db.php on ".date('d-m-Y h:i:s')."\n\n".$_SERVER['REQUEST_URI']."\n\n";
		}
		fwrite($fp, $msg);
		fclose($fp);
		if(!strstr($msg, "MySQL server has gone away") && !strstr($msg, "Too many connections") && !strstr($_SERVER['SERVER_ADDR'],'192.168.0') && !strstr($_SERVER['SERVER_ADDR'],'127.0.0')){
			common_emails('Query Failed please check ', "<br><br>Error---".$msg."---------------------".$_SERVER['REQUEST_URI']."---------".$_SERVER['HTTP_HOST'] . sprintf("\n\n %s:%s: QUERY FAIL ----\n%s\n", __FILE__, __LINE__, var_export(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS), true)), DEVELOPER_EMAIL_ID,0);
		}
	}
	function print_query($string,$data) {
		foreach($data as $k=>$v) {
			if(is_string($v)) $v="'$v'";
			$string=str_replace("$k",$v,$string);
		}
		echo $string;
		return;
	}
	function return_query($string,$data) {
		foreach($data as $k=>$v) {
			if(is_string($v)) $v="'$v'";
			$string=str_replace("$k",$v,$string);
		}
		return $string;
	}
	function get_query($string,$data) {
		foreach($data as $k=>$v) {
			if(is_string($v)) $v="'$v'";
			$string=str_replace("$k",$v,$string);
		}
		return $string;
	}


	public function quote($string = "") {
		return $this->dbc->quote($string);
	}

	public function insert_load_data($query = "") {
		$exec_complete = sprintf("%s \"%s\"", $this->mysql_load_data_exec, $query);

		exec($exec_complete, $results, $status);
	}

	private function debug_queries(){
			if(isset($_REQUEST['ez_queries'])){
				 echo '<div style="display:block;position:relative" class="alert alert-info"><pre>';
				 var_dump(self::$display_queries);
				 echo '</pre></div>';
			}
	}

	private function append_file($query,$array=array()){
		if(!empty($array)){
			foreach ($array as $key =>$val){
				$val="'". $val."'";
				$pos = strpos($query, $key);
				if ($pos !== false) {
					$query = substr_replace($query, $val, $pos,strlen($key));
				}
			}
		}

		if(isset($_REQUEST['ez_files'])){
			$debug=debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
			$more_details="<br><mark> File-></mark>".@$debug[2]['file']."<mark> Line-></mark>".@$debug[2]['line'];
			return $query.$more_details;
		}else{
			return $query;
		}

	}

}
