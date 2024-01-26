<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Adicionar Passageiro</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>

<body>
    <?php require('../includes/menu.html'); ?>

    <?php require('../includes/database.php'); ?>

    <div class="container mt-4">
        <div class="mt-2 p-3 text-white bg-dark">
            Adicionar Passageiro à viagem a <?=$_GET['destino'];?> 
        </div>
    </div>

    <div class="container mt-4">
        <form action="addPassageiro-DBUpdate.php?id_v=<?= $_GET['id_v'];?>&destino=<?=$_GET['destino'];?>" method="POST">
            <div class="mb-3 row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="contacto" class="col-sm-2 col-form-label">Contacto</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" required id="contacto" name="contacto" placeholder="Contacto">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pago" class="col-sm-2 col-form-label">Pago</label>
                <div class="col-sm-10">
                    <input class="form-check-input" type="checkbox" value="" id="pago" name="pago" checked="">
                    <label class="form-check-label" for="formCheckChecked">Pago</label>
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