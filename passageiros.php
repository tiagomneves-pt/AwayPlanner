<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Lista de inscrições</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg bf-body-terciary mb-4">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">    
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Items da esquerda-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="index.html">Página inicial</a>
                </li>
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="viagens.php">Viagens</a>
                </li>
            </ul>
            
            <!--Brand no meio da navbar-->
            <a class="navbar-brand mx-auto" href="index.html"><img src="imagens/AwayPlanner-logo-min.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">AwayPlanner</a>
            
            <!--Items da direita-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="#">Documentação</a>
                </li>
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="#">Apoio técnico</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>

<?php
$id_viagem = $_GET['id'];
require('includes/database.php');
$sql = 'SELECT id_passageiro, id_viagem FROM pagamento WHERE id_viagem = :id';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', id_viagem);
$stmt->execute();

$viagem = $stmt->fetchObject();
print($viagem);
?>

<div class="container mt-4">
    <h2>Inscrições</h2>
    <h3>Viagem a XXXX</h3>  
    <?php
        // Query para obter os dados da tabela
        $sql = "SELECT id, nome, contacto FROM passageiro
        ORDER BY nome ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Pago</th>
                </tr>
            </thead>
            <?php
            while($passageiro = $stmt->fetchObject()){
                $nome        = $passageiro->nome;
                $contacto    = $passageiro->contacto;
            ?>
            <tbody>
                <tr>
                    <td><?= $nome ?></td>
                    <td><?= $contacto ?></td>
                    <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>                    
                </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary btn-lg position-relative start-50" href="#" role="button">+</a> 
</div>
