<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Adicionar Passageiro</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    
</head>

<body>
    <?php require('../includes/menu.html'); ?>

    <?php require('../includes/database.php'); ?>

    <div class="container mt-4">
        <div class="mt-2 p-3 text-white bg-dark">
            Adicionar passageiro à viagem a <?=$_GET['destino'];?> 
        </div>
    </div>

    <div class="container mt-4">
        <form action="addPassageiro-DBUpdate.php?id_v=<?= $_GET['id_v'];?>&destino=<?=$_GET['destino'];?>" method="POST">
            <div class="mb-3 row">
                <label for="nome" class="col-sm-2 col-form-label">Nome completo</label>
                <div class="col-sm-6 me-5">
                    <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome">
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="checkbox" value="" id="pago" name="pago" checked="">
                    <label class="form-check-label" for="formCheckChecked">Pago</label>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="contacto" class="col-sm-2 col-form-label">Contacto telefónico</label>
                <div class="col-sm-2">
                    <input type="tel" class="form-control" required id="contacto" name="contacto" placeholder="Contacto">
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