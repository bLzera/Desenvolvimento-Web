<?php
require_once 'include/database.php';

class model {
    private $db;
    protected $tablename;

    protected function __construct(){
        $this->db = database::getInstance();
    }    

    protected function beginTransaction(){
        pg_query($this->db, "BEGIN");
        return $this;
    }

    protected function commitTransaction(){
        pg_query($this->db, "COMMIT");
        return $this;
    }

    protected function rollbackTransaction(){
        pg_query($this->db, "ROLLBACK");
        return $this;
    }

    protected function getConnection(){
        return $this->db;
    }

    protected function runSelect($stmt, $params){
        try {
            $this->testConnection();
            $result = pg_query_params($this->getConnection(), $stmt, $params);
            return pg_fetch_all($result);
        } catch (Exception $e) {
            echo 'Exception encontrada: ', $e->getMessage(), "\n";
        }
    }

    protected function runInsert($stmt, $params){
        try {
            $this->testConnection();
            return pg_query_params($this->getConnection(), $stmt, $params);
        } catch (Exception $e) {
            echo 'Exception encontrada: ', $e->getMessage(), "\n";
        }
    }

    private function testConnection(){
        if($this->getConnection()){
            return true;
        }
        throw new Exception('Erro ao conectar à Database');
    }
}

?>