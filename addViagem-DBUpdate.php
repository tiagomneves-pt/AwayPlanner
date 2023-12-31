<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Adicionar Passageiro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>

<body>
    <?php require('includes/menu.html'); ?>

    <?php require('includes/database.php'); ?>

    <?php
    $destino = $_POST['destino'];
    $partida = $_POST['partida'];
    $data_viagem = $_POST['data'];  
    $num_passageiros = $_POST['num_passageiros'];
    $num_inscritos = $_POST['num_inscritos'];
    $custo_total = $_POST['custo_total'];
    $custo_unitario = $_POST['custo_unit'];
    $estado = $_POST['estado'];
    $observ = $_POST['observ'];

    $sql = "INSERT INTO viagens (destino, partida, data_viagem, num_passageiros, num_inscritos, custo_total, custo_unit, estado, observacoes) VALUES (:destino, :partida, :data_viagem, :num_passageiros, :num_inscritos, :custo_total, :custo_unitario, :estado, :observ)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':destino', $destino);
    $stmt->bindParam(':partida', $partida);
    $stmt->bindParam(':data_viagem', $data_viagem);
    $stmt->bindParam(':num_passageiros', $num_passageiros);
    $stmt->bindParam(':num_inscritos', $num_inscritos);
    $stmt->bindParam(':custo_total', $custo_total);
    $stmt->bindParam(':custo_unitario', $custo_unitario);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':observ', $observ);
    $stmt->execute();
    ?>

    <div class="container mt-4">
        <form action="addUC-DBUpdate.php" method="POST">
        <div class="mb-3 row">
                <label for="destino" class="col-sm-2 col-form-label">Destino</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="destino" name="destino" required value="<?php echo $_POST['destino']; ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="partida" class="col-sm-2 col-form-label">Partida</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="partida" name="partida" required value="<?php echo $_POST['partida']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="data" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" required id="data" name="data" min="2023-01-01" value="<?php echo $_POST['data_viagem']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="max_inscritos" class="col-sm-2 col-form-label">Máximo de Inscritos</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" required id="max_inscritos" name="max_inscritos"  value="<?php echo $_POST['max_inscritos']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="num_inscritos" class="col-sm-2 col-form-label">Número de Inscritos</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" required id="num_inscritos" name="num_inscritos"  value="<?php echo $_POST['num_inscritos']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_total" class="col-sm-2 col-form-label">Custo Total</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" required id="custo_total" name="custo_total" value="<?php echo $_POST['custo_total']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_unit" class="col-sm-2 col-form-label">Custo por pessoa</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" required id="custo_unit" name="custo_unit"  value="<?php echo $_POST['custo_unit']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="estado" name="estado" required value="<?php echo $_POST['estado']; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="observ" class="col-sm-2 col-form-label">Observações</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="observ" name="observ" required value="<?php echo $_POST['observ']; ?>">
                </div>
            </div>

            <div class="col-12">
                <a href="viagens.php" class="btn btn-primary">voltar</a>
            </div>
        </form>
    </div>
    <?php
