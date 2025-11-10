<?php
require_once 'include/database.php';

class model {
    private $db;
    protected $tablename;

    protected function __construct($tablename){
        $this->db = database::getInstance();
        if($tablename){
            $this->tablename = $tablename;
        }
    }

    private function testConnection(){
        if($this->getConnection()){
            return true;
        }
        throw new Exception('Erro ao conectar à Database');
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
}

?>