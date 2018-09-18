<?php
  //  function __autoload($class_name){
     //   require_once '../' . $class_name . '.php';}
     require_once '../Divida.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro Divida</title>
        <meta name="description" content="Cadastro Divida" />
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../../css/bootstrap-responsive.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
<?php
    
 $divida = new Divida();
    if(isset($_POST['cadastro_div'])):
        $descricao  = $_POST['descricao'];
        $total_divida=$_POST['total_divida'];
        $pag_minimo = $_POST['pag_minimo'];

        $divida->setDescricao($descricao);
        $divida->setTotalDivida($total_divida);
        $divida->setPagMinimo($pag_minimo);
# Insert
    if($divida->insert()){
        echo "Inserido com sucesso!";
    }
    endif;
?>
    <header class="masthead">
    <h1 class="muted">Cadastro Divida</h1>
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
    if(isset($_POST['atualizar_div'])):
        $id = $_POST['id'];
        $descricao = $_POST['descricao'];
        $total_divida = $_POST['total_divida'];
        $pag_minimo=$_POST['pag_minimo'];
        
        $divida->setDescricao($descricao);
        $divida->setTotalDivida($total_divida);
        $divida->setPagMinimo($pag_minimo);
    if($usuario->update($id)){
        echo "Atualizado com sucesso!";
}
    endif;
?>

<?php
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
        $id = (int)$_GET['id'];
    
    if($divida->delete($id)){
        echo "Deletado com sucesso!";
    }
    endif;
?>

<?php
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        $id = (int)$_GET['id'];
        $resultado = $divida->find($id);
?>

<form method="post" action="">
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
        <input type="text" name="descricao" value="<?php echo $resultado->descricao; ?>" placeholder="Descrição da Divida:" />
    </div>
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
        <input type="text" name="valor_total" value="<?php echo $resultado->total_divida; ?>" placeholder="Valor total:" />
    </div>
    <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
        <input type="text" name="pag_minimo" value="<?php echo $resultado->pag_minimo; ?>" placeholder="Pagamento Minimo:" />
    </div>
        <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"/>
<br />
        <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">					
</form>

<? php }else{ ?>
    <form method="post" action="">
        <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="descricao" placeholder="Descrição:" />
        </div>
<br />
        <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="valor_total" placeholder="Valor total:" />
        </div>
<br />
        <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" name="pag_minimo" placeholder="Pagamento Minimo:" />
        </div>
<br />
            <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar">					
    </form>

<?php } ?>

<table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Valor total da divida:</th>
                <th>Valor para pagamento minimo:</th>
            </tr>
        </thead>
    <?php foreach($divida->findAll() as $key => $value): ?>
<tbody>
    <tr>
        <td><? php echo $value->id; ?></td>
        <td><? php echo $value->descricao; ?></td>
        <td><? php echo $value->total_divida; ?></td>
        <td><? php echo $value->pag_minimo; ?></td>
        <td>
        <?php echo "<a href='pag_divida.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
        <?php echo "<a href='pag_divida.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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


