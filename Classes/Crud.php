<?php
require_once 'ConexaoDB.php';
 
abstract class Crud extends ConexaoDB {
    protected $tabela;
        
    abstract public function insert();
    abstract  public function update($id);
    
    public function find($id){
        $sql= "SELECT*FROM $this->tabela WHERE id = :id";
        $stmt= DB::prepare($sql);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT );
        $stmt->execute();
        return $stmt->fetch();
    }
    public function findAll(){
        $sql= "SELECT*FROM $this->tabela";    
        $stmt=DB::prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();    
}

    public function delete($id){
        $sql= "DELETE FROM $this->tabela WHERE id=:id";
        $stmt= DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $smtm->execute();
    
}
    
    
    
}
