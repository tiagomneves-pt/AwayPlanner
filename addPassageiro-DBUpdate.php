<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Lista de inscrições</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>

<body>
    <?php require('includes/menu.html'); ?>

    <?php require('includes/database.php'); ?>

    <?php
    $id_viagem = $_GET['id'];
    $nome_passageiro = $_POST['nome'];
    $contacto_passageiro = $_POST['contacto'];  
    $pago = isset($_POST['pago']) ? 1 : 0;

    // Código para INSERT na tabela 'passageiro'
    $sql_passageiro = "INSERT INTO passageiro (nome, contacto) VALUES (:nome, :contacto)";
    $stmt_passageiro = $dbh->prepare($sql_passageiro);
    $stmt_passageiro->bindParam(':nome', $nome_passageiro);
    $stmt_passageiro->bindParam(':contacto', $contacto_passageiro);
    $stmt_passageiro->execute();

    $id_passageiro = $dbh->lastInsertId();

    // Código para INSERT na tabela 'pagamento'
    $sql_pagamento = "INSERT INTO pagamento (id_passageiro, id_viagem, pago) VALUES (:id_passageiro, :id_viagem, :pago)";
    $stmt_pagamento = $dbh->prepare($sql_pagamento);
    $stmt_pagamento->bindParam(':id_passageiro', $id_passageiro);
    $stmt_pagamento->bindParam(':id_viagem', $id_viagem);
    $stmt_pagamento->bindParam(':pago', $pago);
    $stmt_pagamento->execute();

    ?>

    <div class="container mt-4">
        <form action="addUC-DBUpdate.php" method="POST">
            <div class="mb-3 row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" readonly value="<?php echo $_POST['nome']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="contacto" class="col-sm-2 col-form-label">Contacto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" required id="contacto" name="contacto" value="<?php echo $_POST['contacto']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pago" class="col-sm-2 col-form-label">Pago</label>
                <div class="col-sm-10">
                    <input class="form-check-input" type="checkbox" value="1" id="pago" <?php echo isset($_POST['pago']) && $_POST['pago'] == 1 ? 'checked' : ''; ?> <?php echo isset($_POST['pago']) && $_POST['pago'] == 0 ? 'disabled' : ''; ?>>
                </div>
            </div>

            <div class="col-12">
                <a href="passageiros.php?id=<?= $_GET['id'];?>&destino=<?=$_GET['destino'];?>" class="btn btn-primary">voltar</a>
            </div>
        </form>
    </div>
    <?php
