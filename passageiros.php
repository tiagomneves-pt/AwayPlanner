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
    $sql_pagamento = 'SELECT * FROM pagamento p INNER JOIN passageiro g ON g.id = p.id_passageiro WHERE p.id_viagem = :id';
    $stmt = $dbh->prepare($sql_pagamento);
    $stmt->bindValue(':id', $id_viagem);
    $stmt->execute();
?>

<div class="container mt-4">
    <h2>Inscrições</h2>
    <h5 style="color: #56445D"><?= $_GET['destino']?></h3>  


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th style="width: 15%" scope="col">Contacto</th>
                    <th style="width: 10%" scope="col">Pago</th>
                    <th style="width: 10%" scope="col">Opções</th>
                </tr>
            </thead>
            <?php
            while($passageiro = $stmt->fetchObject()){
                $nome        = $passageiro->nome;
                $contacto    = $passageiro->contacto;
                $pago        = $passageiro->pago;
            ?>
            <tbody>
                <tr>
                    <td><?= $nome ?></td>
                    <td><?= $contacto ?></td>
                    <td><input <?php if($pago == 1) echo 'checked';?>  class="form-check-input" type="checkbox" onclick="alterarPagamento(this)" id="<?= $passageiro->id?>"></td>
                    <td>
                        <div class="btn-group">
                            <a href="editPassageiro.php?id_p=<?= $passageiro->id; ?>&id_v=<?=$_GET['id'];?>&destino=<?= $_GET['destino']; ?>" class="btn btn-primary">Edit</a>
                            <!-- <a href="deleteUC.php?uc=<?= $passageiro->id; ?>" class="btn btn-danger "></a> -->
                            <a class="btn btn-danger delete-confirm" href="deletePassageiro.php?id=<?= $passageiro->id; ?>" data-bs-toggle="modal" data-bs-target="#DangerModalalert">
                                Delete
                            </a>
                        </div>
                    </td>       
                </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary btn-lg position-relative start-50" href="addPassageiro.php?id=<?= $_GET['id'];?>&destino=<?=$_GET['destino'];?>" role="button">+</a> 
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
    function alterarPagamento(checkbox){
        //TODO: UPDATE pagamento SET pago = 0 WHERE id_passageiro = checkbox.id & id_viagem = $id_viagem
    }
</script>
</body>
</html>