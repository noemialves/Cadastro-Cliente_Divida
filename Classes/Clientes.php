<?php
/**
 * Description of Clientes
 *
 * @author Noemi
 */
require_once 'Crud.php';

class Clientes extends Crud {
    protected $tabela ='cadastro';
    private $nome;
    private $nascimento;
    private $sexo;
    private $cpf;
    private $rg;
    private $email;
    private $telefone_cel;
    private $telefone_res;
    
    public function setNome($nome){
        $this->nome=$nome;
    }
    public function getNome(){
        return $this->nome;
    }
     public function setNascimento($nascimento){
        $this->nascimento=$nascimento;
    }
    public function getNascimento(){
        return $this->nascimento;
    }
     public function setSexo($sexo){
        $this->sexo=$sexo;
    }
    public function getSexo(){
        return $this->sexo;
    }
     public function setCpf($cpf){
        $this->cpf=$cpf;
    }
    public function geCpf(){
        return $this->cpf;
    }
     public function setRG($rg){
        $this->rg=$rg;
    }
    public function getRG(){
        return $this->rg;
    }
     public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setTelCelular($telefone_cel){
        $this->telefone_cel=$telefone_cel;
    }
    public function getTelCelular(){
        return $this->telefone_cel;
    }
    public function setTelResi($telefone_res){
        $this->telefone_res=$telefone_res;
    }
    public function getTelResi(){
        return $this->telefone_res;
    }
    
    
        
    public function insert() {
        $sql="INSERT INTO $this->tabela(nome, nascimento, sexo, cpf, rg, email, telefone_cel, telefone_res)
                VALUES (:nome, :nascimento, :sexo, :cpf, :rg, :email, :telefone_cel, :telefone_res)";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':rg', $this->rg);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone_cel', $this->telefone_cel);
        $stmt->bindParam(':telefone_res', $this->telefone_res);
        return $stmt->execute();
    }
    public function update($id) {
        $sql = "UPDATE $this->tabela SET nome=:nome, nascimento=:nascimento, sexo=:sexo, cpf=:cpf, rg=:rg, email=:email,
                telefone_cel=:telefone_cel, telefone_res=:telefone_res WHERE id=:id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':rg', $this->rg);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone_cel', $this->telefone_cel);
        $stmt->bindParam(':telefone_res', $this->telefone_res);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
        
    }
   
}
 //include 'includes/pag_cadastro.php';
