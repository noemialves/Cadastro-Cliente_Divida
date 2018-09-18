<?php
/**
 * Description of Clientes
 *
 * @author Noemi
 */
require_once 'Crud.php';

class Divida extends Crud {
    protected $tabela ='divida';
    private $descricao;
    private $total_divida;
    private $pag_minimo;

    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    public function getDescricao(){
        return $this->descricao;
    }
     public function setTotalDivida($total_divida){
        $this->total_divida=$total_divida;
    }
    public function getTotalDivida(){
        return $this->total_divida;
    }
    public function setPagMinimo($pag_minimo) {
        $this->pag_minimo=$pag_minimo;
    }
    public function  getPagMinimo(){
        return $this->pag_minimo;
    }

        public function insert() {
        $sql="INSERT INTO $this->tabela(descricao, total_divida, pag_minimo)
                VALUES (:descricao, :total_divida, :pag_minimo)";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':total_divida', $this->total_divida);
        $stmt->bindParam(':pag_minimo', $this->pag_minimo);
        return $stmt->execute();
    }
    public function update($id) {
        $sql = "UPDATE $this->tabela SET descricao=:descricao, total_divida=:total_divida, pag_minimo=:pag_minimo WHERE id=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':total_divida', $this->total_divida);
        $stmt->bindParam(':pag_minimo', $this->pag_minimo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
        
    }
   
}
// include 'includes/pag_divida.php';
