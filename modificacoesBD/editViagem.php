<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Editar Viagem</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>

<body>
    <?php require('../includes/menu.html'); ?>

    <?php require('../includes/database.php'); ?>

    <?php

        $id_viagem = $_GET['id_v'];

        $sql = 'SELECT * FROM viagens v WHERE v.id_viagem = :id_viagem';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id_viagem', $id_viagem);
        $stmt->execute();

        $viagem = $stmt->fetchObject();


    ?>

    <div class="container mt-4">
        <div class="mt-2 p-3 text-white bg-dark">
            Adicionar Viagem
        </div>
    </div>

    <div class="container mt-4">
        <form action="editViagem-DBUpdate.php?id_v=<?= $_GET['id_v']; ?>" method="POST">
            <div class="mb-3 row">
                <label for="destino" class="col-sm-2 col-form-label">Destino</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="destino" name="destino" required value="<?php echo ($viagem->destino); ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="partida" class="col-sm-2 col-form-label">Partida</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="partida" name="partida" value ="" required value="<?php echo ($viagem->partida); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="data" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" required id="data" name="data" min="2023-01-01" value="<?php echo ($viagem->data_viagem); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="num_passageiros" class="col-sm-2 col-form-label">Máximo de Inscritos</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="num_passageiros" name="num_passageiros" value="<?php echo ($viagem->num_passageiros); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="num_inscritos" class="col-sm-2 col-form-label">Número de Inscritos</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="num_inscritos" name="num_inscritos"  value="<?php echo ($viagem->num_inscritos); ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_total" class="col-sm-2 col-form-label">Custo Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="custo_total" name="custo_total" value="<?php echo ($viagem->custo_total); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_unit" class="col-sm-2 col-form-label">Custo por pessoa</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="custo_unit" name="custo_unit"  value="<?php echo ($viagem->custo_unit); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="estado" name="estado" required value="<?php echo ($viagem->estado); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="observ" class="col-sm-2 col-form-label">Observações</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="observ" name="observ" value="<?php echo ($viagem->observacoes); ?>">
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-success" type="submit">Inserir</button>
            </div>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
    </script>
</body>

</html>