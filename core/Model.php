<?php

require_once CORE.'/Connection.php';

class Model
{
    protected static $table='';
    protected static $pk='';
    protected $conn;

    public function __construct()
    {
        $this->conn = Connection::connect();
    }

    public function all() {
        $stmt = $this->conn->query("SELECT * FROM ". static::$table); 
        return $stmt->fetchAll();
    }

    public function save($params) {    
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)', static::$table, 
            implode(',', array_keys($params)),':'.
            implode(', :', array_keys($params))
        );    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }

    public function getByPK($param)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . static::$table . " WHERE " . static::$pk . "=" . $param);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function destroy($id){
        $stmt = $this->conn->prepare("DELETE FROM ". static::$table . " WHERE " . static::$pk."= ? LIMIT 1");
        $stmt->execute([$id]);
    }

    public function update($id, $params){
        $keys = [];
        foreach ($params as $key => $value) {
            array_push($keys, $key."='".$value."'");

        }

        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = %s', static::$table, implode(",", $keys), static::$pk, $id
        );
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();  

    }

    public  function getWithSql($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function lastId() 
    {
        $query = "SELECT id FROM " . static::$table . " ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

}