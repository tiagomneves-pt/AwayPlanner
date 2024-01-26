<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Editar</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>

<body>
    <?php require('../includes/menu.html'); ?>

    <?php require('../includes/database.php'); ?>

    <?php
    $id_passageiro = $_GET['id_p'];
    $id_viagem = $_GET['id_v'];

    $sql = 'SELECT passageiro.nome, passageiro.contacto, pagamento.pago 
                FROM passageiro
                LEFT JOIN pagamento ON passageiro.id = pagamento.id_passageiro
                WHERE passageiro.id = :id_p AND pagamento.id_viagem = :id_v';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id_v', $id_viagem);
    $stmt->bindParam(':id_p', $id_passageiro);
    $stmt->execute();
    if ($stmt->rowCount() < 1) {
    ?>
        <div class="container mt-4">
            <h4 class="danger">Não existe esse passageiro ou viagem!</h4>
        </div>
        <?php
    } else {
        //update passageiro
        $sql_passageiro = "UPDATE passageiro SET nome = :nome, contacto = :contacto WHERE id = :id_p";
        $stmt_passageiro = $dbh->prepare($sql_passageiro);
        $stmt_passageiro->bindParam(':id_p', $id_passageiro);
        $stmt_passageiro->bindParam(':nome', $_POST['nome']);
        $stmt_passageiro->bindParam(':contacto', $_POST['contacto']);
        $stmt_passageiro->execute();

        $sql_pagamento = "UPDATE pagamento SET pago = :pago WHERE id_passageiro = :id_p AND id_viagem = :id_v";
        $stmt_pagamento = $dbh->prepare($sql_pagamento);
        $stmt_pagamento->bindParam(':id_v', $id_viagem);
        $stmt_pagamento->bindParam(':id_p', $id_passageiro);
        $stmt_pagamento->bindParam(':pago', $_POST['pago']);
        $stmt_pagamento->execute();


        if ($stmt_passageiro->rowCount() < 1 AND $stmt_pagamento->rowCount() < 1) {
        ?>
            <div class="container mt-4">
                <h4 class="danger">Não foram efetuadas alterações!</h4>
            </div>
        <?php
        }
        ?>
        <div class="container mt-4">
            <form action="editPassageiro-DBUpdate.php?id=<?= $_GET['id'];?>&id_v=<?=$_GET['id'];?>" method="POST">
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name="nome" required value="<?php  echo $_POST['nome']; ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="contacto" class="col-sm-2 col-form-label">Contacto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required id="contacto" name="contacto" value="<?php  echo $_POST['contacto']; ?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pago" class="col-sm-2 col-form-label">Pago</label>
                    <div class="col-sm-10">
                        <input class="form-check-input" type="checkbox" value="" id="pago" name="pago" <?php echo isset($_POST['pago']) && $_POST['pago'] == 1 ? 'checked' : ''; ?> <?php echo isset($_POST['pago']) && $_POST['pago'] == 0 ? 'disabled' : ''; ?>>
                        <label class="form-check-label" for="formCheckChecked">Pago</label>
                    </div>
                </div>

                <div class="col-12">
                    <a href="passageiros.php?id=<?= $_GET['id_v'];?>&destino=<?=$_GET['destino'];?>" class="btn btn-primary">voltar</a>
                </div>
            </form>
        </div>

    <?php
    }
    ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>