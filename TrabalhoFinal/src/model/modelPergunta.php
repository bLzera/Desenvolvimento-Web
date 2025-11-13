<?php
require_once 'model.php';

class modelPergunta extends model {
    private $perid;
    private $pertexto;
    private $perstatus;

    public function __construct(){
        parent::__construct();
    }

    public function listarPorSetor($setor){
        $stmt = "
            select a.*
            from tbpergunta a
            join tbperguntasetor b
                on a.perid = b.perid
            where b.setid = $1 and a.perstatus = 1 and b.prsstatus = 1
            order by b.prsordem
        ";
        return $this->runSelect($stmt, [$setor]);
    }

    public function buscaTodasPerguntas(){
        $stmt = "
            select a.*
            from tbpergunta a
            join tbperguntasetor b
                on a.perid = b.perid
            where a.perstatus = 1 and b.prsstatus = 1
            order by b.prsordem
        ";
        return $this->runSelect($stmt, []);
    }

    public function criarPergunta(){

    }

    public function getPerid(){
        return $this->perid;
    }

    public function getPertexto(){
        return $this->pertexto;
    }
    
    public function getPerstatus(){
        return $this->perstatus;
    }
    
    public function setPerid($perid){
        $this->perid = $perid;
        return $this;
    }
    
    public function setPertexto($pertexto){
        $this->pertexto = $pertexto;
        return $this;
    }
    
    public function setPerstatus($perstatus){
        $this->perstatus = $perstatus;
        return $this;
    }    
}

?>