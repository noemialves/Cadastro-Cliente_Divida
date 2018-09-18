<?php
   // function __autoload($class_name){
     //   require_once '../' . $class_name . '.php';}

     require_once '../Clientes.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro Cliente</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../../css/bootstrap-responsive.css">
        <meta name="description" content="Cadastro Cliente" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
</head>
<body>
<div class="container">
    
<?php
    
    $cliente = new Clientes();
        if(isset($_POST['cadastro'])):
            $nome = $_PPOST['nome'];
            $nascimento = $_POST['nascimento'];
            $sexo = $_POST['sexo'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $email = $_POST['email'];
            $telefone_cel = $_POST['telefone_cel'];
            $telefone_res = $_POST´['telefone_res'];

        $cliente->setNome($nome);
        $cliente->setNascimento($nascimento);
        $cliente->setSexo($sexo);
        $cliente->setCpf($cpf);
        $cliente->setRG($rg);
        $cliente->setTelCelular($telefone_cel);
        $cliente->setTelResi($telefone_res);
    #Insert
    if($cliente->insert()){
        echo "Inserido com sucesso!";
}
endif;
?>
<header class="masthead">
    <h1 class="muted">Cadastro Cliente</h1>
        <nav class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li class="active"><a href="../../index.php">Página inicial</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</header>

<?php 
    if(isset($_POST['atualizar'])):
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $sexo = $_POST['sexo'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $email = $_POST['email'];
        $telefone_cel = $_POST['telefone_cel'];
        $telefone_res=$_POST['telefone_res'];
        
        
        $cliente->setNome($nome);
        $cliente->setNascimento($nascimento);
        $cliente->setSexo($sexo);
        $cliente->setCpf($cpf);
        $cliente->setRG($rg);
        $cliente->setEmail($email);
        $cliente->setTelCelular($telefone_cel);
        $cliente->setTelResi($telefone_res);
        
    if($cliente->update($id)){
        echo "Atualizado com sucesso!";
}
    endif;
?>

<?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
            $id = (int)$_GET['id'];
        if($cliente->delete($id)){
            echo "Deletado com sucesso!";
}
        endif;
?>

<?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            $id = (int)$_GET['id'];
            $resultado = $cliente->find($id);
?>

<form method="post" action="atualizar">
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="nome" value="<? php echo $resultado->nome; ?>" placeholder="Nome:" />
    </div>
    <br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="nascimento" value="<? php echo $resultado->nascimento; ?>" placeholder="Data de Nascimento:" />
    </div>
    <br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="cpf" value="<? php echo $resultado->cpf; ?>" placeholder="CPF:" />
    </div>
    <br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="rg" value="<? php echo $resultado->rg; ?>" placeholder="RG:" />
    </div>
    <div class="input-prepend">
        <span class="add-on"><i class="icon-envelope"></i></span>
            <input type="text" name="email" value="<? php echo $resultado->email; ?>" placeholder="E-mail:" />
    </div>
    <br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="telefone_cel" value="<? php echo $resultado->telefone_cel; ?>" placeholder="Telefone Celular:" />
    </div>
    <br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="telefone_res" value="<? php echo $resultado->telefone_res; ?>" placeholder="Telefone Residencial:" />
    </div>
    <br />
    <input type="hidden" name="id" value="<? php echo $resultado->id; ?>">
<br />
    <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">					
</form>

<? php }else{ ?>
<form method="post" action="cadastro">
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="nome" placeholder="Nome:" />
    </div>
<br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="nascimento" placeholder="Nascimento:" />
    </div>
<br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
        <p>Sexo:</p>
        <input type="radio" name="feminino" value="Feminino" disabled="disabled" />
        <input type="radio" name="masculino" value="Masculino" disabled="disabled" />
    </div>
<br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="cpf" placeholder="CPF:" />
    </div>
<br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="rg" placeholder="RG:" />
    </div>
<br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-envelope"></i></span>
            <input type="text" name="email" placeholder="E-mail:" />
    </div>
<br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="telefone_cel" placeholder="Telefone Celular:" />
    </div>
<br />
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="telefone_res" placeholder="Telefone Residencial:" />
    </div>
<br />
 
<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">					
</form>

<?php } ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome:</th>
            <th>Nascimento:</th>
            <th>Sexo:</th>
            <th>CPF:</th>
            <th>RG:</th>
            <th>E-mail:</th>
            <th>Telefone Celular:</th>
            <th>Telefone Residencial:</th>
            <th>Ações:</th>
        </tr>
    </thead>

    <?php foreach($cliente->findAll() as $key => $value): ?>
    <tbody>
        <tr>
            <td><?php echo $value->id; ?></td>
            <td><?php echo $value->nome; ?></td>
            <td><?php echo $value->nascimento; ?></td>
            <td><?php echo $value->cpf; ?></td>
            <td><?php echo $value->rg; ?></td>
            <td><?php echo $value->email; ?></td>
            <td><?php echo $value->telefone_cel; ?></td>
            <td><?php echo $value->telefone_res; ?></td>
            <td>
                <?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                <?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
            </td>
        </tr>
    </tbody>

    <?php endforeach; ?>
</table>

</div>
    <script src="../../js/jQuery.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
