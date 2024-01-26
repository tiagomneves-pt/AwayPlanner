<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Editar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>

<body>
    <?php require('../includes/menu.html'); ?>

    <?php require('../includes/database.php'); ?>

    <?php
        $id_passageiro = $_GET['id_p'];
        $id_viagem = $_GET['id_v'];

        $sql_passageiro = 'SELECT * FROM passageiro p WHERE p.id = :id';
        $stmt = $dbh->prepare($sql_passageiro);
        $stmt->bindValue(':id', $id_passageiro);
        $stmt->execute();

        $passageiro = $stmt->fetchObject();
        
        $sql_passageiro = 'SELECT pago FROM pagamento WHERE id_passageiro = :id_p AND id_viagem = :id_v';
        $stmt2 = $dbh->prepare($sql_passageiro);
        $stmt2->bindValue(':id_p', $id_passageiro);
        $stmt2->bindValue(':id_v', $id_viagem);
        $stmt2->execute();

        $pagou = $stmt2->fetchObject();

    ?>

    <div class="container mt-4">
        <div class="mt-2 p-3 text-white bg-dark">
            Editar passageiro <?php echo ($passageiro->nome); ?>
        </div>
    </div>

    <div class="container mt-4">
        <form action="editPassageiro-DBUpdate.php?id_p=<?= $_GET['id_p']; ?>&id_v=<?= $_GET['id_v']; ?>&destino=<?= $_GET['destino']; ?>" method="POST">
            <div class="mb-3 row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo ($passageiro->nome); ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="contacto" class="col-sm-2 col-form-label">Contacto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" required id="contacto" name="contacto" value="<?php echo ($passageiro->contacto); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pago" class="col-sm-2 col-form-label">Pago</label>
                <div class="col-sm-10">
                    <input class="form-check-input" type="checkbox" value="<?php echo $pagou->pago; ?>" id="pago" name="pago" <?php echo $pagou->pago == 1 ? 'checked' : ''; ?> <?php echo $pagou->pago == 0 ? 'disabled' : ''; ?>>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-success" type="submit">Inserir</button>
            </div>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>