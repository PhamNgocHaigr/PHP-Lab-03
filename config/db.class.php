<?php IDEA:
class Db{
    protected static $connection;
    public function connect(){
        if (!isset (self::$connection)) 
        {
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["root"], $config[""],$config["ecommerce"]);
        }
        if(self::$connection= false){
        return false;
        }
        return self::$connection;
    }  
    public function query_execute($queryString){
        $connection = $this->connect();  
        $result     = $connection->query($queryString);
        return $result;
    }    
    // funcion select_to_array
    public function select_to_array($queryString){
        $rows = array();
        $result= $this->query_execute($queryString);
        if ($result = false) return false ;
        while($item = $result-> fetch_assoc()){
            $rows[] = $item;
        } 
        return $rows;
    }
}    
?>