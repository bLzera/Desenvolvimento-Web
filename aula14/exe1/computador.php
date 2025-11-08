<?php

class computador {
    private int $status;

    public function __construct(){
        $this->ligar();
    }

    public function ligar(){
        $this->status = 1;
        return $this;
    }

    public function desligar(){
        $this->status = 0;
        return $this;
    }

    public function getStatus(){
        return $this->status;
    }
}

?>