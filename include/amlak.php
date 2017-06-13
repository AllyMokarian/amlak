<?php
session_start();



//random string
function pass(){
    $length = 3;
    $string = "123456789abcdefghijklmnopqrstuvz";
    $max = strlen($string)-1;
    $random = "";
    for ($i = 0;$i<$length;$i++){
        $number = mt_rand(0,$max);
        $random .= substr($string,$number,1);
    }

    return $random;
}

//random for name
function name(){
    $length = 5;
    $string = "abcdefghijklmnopqrstuvz";
    $max = strlen($string)-1;
    $random = "";
    for ($i = 0;$i<$length;$i++){
        $number = mt_rand(0,$max);
        $random .= substr($string,$number,1);
    }

    return $random;
}

    //setcookie
    $cookie_name = name();
    $cookie_pass = pass();
    setcookie($cookie_name, $cookie_pass, time() + (60 * 20), "/");
?>
<?php 
	
Class amlak{
	
	private $username = "root";
	private $password = "";
	private $dsn = "mysql:host=localhost;dbname=db_amlak";

	private $method = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8");	
	
	
	public function __construct(){
		$this->connect = new PDO($this->dsn,$this->username,$this->password,$this->method);
	}//connection()
	
	public function select($query,$data,$method=PDO::FETCH_ASSOC){
		$pre=$this->connect->prepare($query);	
		foreach($data as $index=>$val){
			$pre->bindValue($index+1,$val);
		}
		$pre->execute();
		$res=$pre->fetchAll(PDO::FETCH_ASSOC);	
		return $res;
	}//select()
	
	public function Idu($query,$data){
		$pre=$this->connect->prepare($query);	
		foreach($data as $index=>$val){
			$pre->bindValue($index+1,$val);
		}
		return($pre->execute());
	}//insert()
	
	
	
	public function Rowcount($query,$data){
		$pre=$this->connect->prepare($query);	
		foreach($data as $index=>$val){
			$pre->bindValue($index+1,$val);
		}
		$pre->execute();
		$rowcount=$pre->rowCount();
		return $rowcount;	
	}

	
}//Digikala Class

function check($test){
$test=stripslashes($test);	
$test=htmlspecialchars($test);
$test=addslashes($test);
$test=htmlspecialchars($test); 
$test=strip_tags($test);
$test=str_replace("'","''",$test);
$test = str_replace(array("\n", "'", "‘", "’", "'", "“", "”", "„", "?", '"'), array("", "\’", "\’", "\’", "\’", "\"", "\"", "\"", "\"", "\""), $test);
return $test;
}//check injection function

function get_distinct_column_values($column_query,$table_name){
	$sql_get_distinct = "SELECT  DISTINCT ".$column_query." FROM ".$table_name;	
	$res_get_distinct = $oop->select($sql_get_distinct,array());
	return $res_get_distinct;
}
?>