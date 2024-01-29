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
    $id_viagem = $_GET['id_v'];
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
                                <a href="modificacoesBD/editPassageiro.php?id_p=<?= $passageiro->id; ?>&id_v=<?=$_GET['id'];?>&destino=<?= $_GET['destino']; ?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/></svg></a>
                                <a class="btn btn-danger delete-confirm" href="modificacoesBD/deletePassageiro.php?id_p=<?= $passageiro->id; ?>&id_v=<?= $_GET['id_v']; ?>" data-bs-toggle="modal" data-bs-target="#DangerModalalert"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg></a>
                            </div>
                        </td>       
                    </tr>
            <?php
            }
            ?>
                </tbody>
            </table>
            <a class="btn btn-outline-primary btn-lg position-relative start-50" href="modificacoesBD/addPassageiro.php?id_v=<?= $_GET['id_v'];?>&destino=<?=$_GET['destino'];?>" role="button">+</a> 
    </div>

    <!-- Modal -->
    <div class="modal fade" id="DangerModalalert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Tem a certeza que deseja apagar o registo?
                </div>
                <div class="modal-footer danger-md">
                    <a class="btn btn-dark" data-bs-dismiss="modal">Não</a>
                    <a class="btn btn-danger delete-yes" href="#">Sim</a>
                </div>
            </div>
        </div>
    </div>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
//TODO: Utilizar o ajax para alterar o estado do atributo "pago" na BD

    function alterarPagamento(checkboxPago){
        console.log(checkboxPago.id);
        console.log(checkboxPago.checked);

        var xhttp = new XMLHttpRequest();

        
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var deleteLinks = document.querySelectorAll(".delete-confirm");

        deleteLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();

                var deleteUrl = this.href;
                alert(deleteUrl);

                var deleteYesLink = document.querySelector(".modal-footer .delete-yes");
                if (deleteYesLink) {
                    deleteYesLink.href = deleteUrl;
                }

                return false;
            });
        });
    });
</script>
</body>
</html>