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
    <?php require('includes/menu.html'); ?>

    <?php require('includes/database.php'); ?>

    <?php
        $id_viagem = $_GET['id_v'];
        $destino = $_POST['destino'];
        $partida = $_POST['partida'];
        $data_viagem = $_POST['data'];  
        $num_passageiros = $_POST['num_passageiros'];
        $num_inscritos = $_POST['num_inscritos'];
        $custo_total = $_POST['custo_total'];
        $custo_unitario = $_POST['custo_unit'];
        $estado = $_POST['estado'];
        $observ = $_POST['observ'];

        //update viagem
        $sql = "UPDATE viagens 
                SET destino = :destino, 
                    partida = :partida, 
                    data_viagem = :data_viagem,  
                    num_passageiros = :num_passageiros, 
                    custo_total = :custo_total, 
                    custo_unit = :custo_unit, 
                    estado = :estado, 
                    observacoes = :observ
                WHERE id_viagem = :id_viagem";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id_viagem', $id_viagem);
        $stmt->bindParam(':destino', $destino);
        $stmt->bindParam(':partida', $partida);
        $stmt->bindParam(':data_viagem', $data_viagem);
        $stmt->bindParam(':num_passageiros', $num_passageiros);
        $stmt->bindParam(':custo_total', $custo_total);
        $stmt->bindParam(':custo_unit', $custo_unitario);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':observ', $observ);
        $stmt->execute();


        if ($stmt->rowCount() < 1) {
        ?>
            <div class="container mt-4">
                <h4 class="danger">Não foram efetuadas alterações!</h4>
            </div>
        <?php
        }
    ?>

    <div class="container mt-4">
        <div class="mt-2 p-3 text-white bg-dark">
            Adicionar Viagem
        </div>
    </div>

    <div class="container mt-4">
        <form action="editViagem-DBUpdate.php" method="POST">
            <div class="mb-3 row">
                <label for="destino" class="col-sm-2 col-form-label">Destino</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="destino" name="destino" required value="<?php  echo $_POST['destino']; ?>" readonly>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="partida" class="col-sm-2 col-form-label">Partida</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="partida" name="partida" required value="<?php  echo $_POST['partida']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="data" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" required id="data" name="data" min="2023-01-01" value="<?php  echo $_POST['data']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="num_passageiros" class="col-sm-2 col-form-label">Máximo de Inscritos</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="num_passageiros" name="num_passageiros" value="<?php  echo $_POST['num_passageiros']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="num_inscritos" class="col-sm-2 col-form-label">Número de Inscritos</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="num_inscritos" name="num_inscritos"  value="0" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_total" class="col-sm-2 col-form-label">Custo Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="custo_total" name="custo_total" value="<?php  echo $_POST['custo_total']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_unit" class="col-sm-2 col-form-label">Custo por pessoa</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="custo_unit" name="custo_unit"  value="<?php  echo $_POST['custo_unit']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="estado" name="estado" required value="<?php  echo $_POST['estado']; ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="observ" class="col-sm-2 col-form-label">Observações</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="observ" name="observ" required value="<?php  echo $_POST['observ']; ?>" readonly>
                </div>
            </div>

            <div class="col-12">
                    <a href="viagens.php" class="btn btn-primary">voltar</a>
                </div>
        </form>
    </div>

    <script src=" js/bootstrap.bundle.min.js"></script>
    <script>
    </script>
</body>

</html>