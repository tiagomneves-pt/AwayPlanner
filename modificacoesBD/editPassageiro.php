<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Editar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

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

        $pagamento = $stmt2->fetchObject();

    ?>

    <div class="container mt-4">
        <div class="bg-gradient" style="background-color: #37392E;">
            <h4 class="ms-2 p-2" style="color:#f4f3f7;">A editar passageiro: <span style="color: #D0BAA9; font-weight:600;"><?php echo ($passageiro->nome); ?></span></h4>
        </div>
    </div>

    <div class="container mt-4">
        <form action="editPassageiro-DBUpdate.php?id_p=<?= $_GET['id_p']; ?>&id_v=<?= $_GET['id_v']; ?>&destino=<?= $_GET['destino']; ?>" method="POST">
            <div class="mb-3 row">
                <label for="nome" class="col-sm-2 col-form-label">Nome completo</label>
                <div class="col-sm-6 me-5">
                    <input type="text" class="form-control" id="nome" name="nome" required value = "<?=$passageiro->nome?>">
                </div>

                <div class="col-sm-2">
                    <input <?php if($pagamento->pago == '1') echo 'checked';?> class="form-check-input" type="checkbox" onclick="definirValor(this)" value="" id="pagoCheckbox" name="pago">
                    <label class="form-check-label" for="pagoCheckbox">Pago</label>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="contacto" class="col-sm-2 col-form-label">Contacto telefónico</label>
                <div class="col-sm-2">
                    <input type="tel" class="form-control" required id="contacto" name="contacto" required value = "<?=$passageiro->contacto?>">
                </div>
            </div>

            <div class="col-6 position-relative start-50">
                    <button class="btn btn-ap-primary" type="submit">Guardar alterações</button>
                    <a class="btn btn-secondary" href="javascript:history.back()">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function definirValor(checkbox){
        //console.log(checkbox.checked);
        checkbox.setAttribute("value", (checkbox.checked ? 1 : 0));
        console.log(checkbox.value);
        
    }

    
</script>
</html>