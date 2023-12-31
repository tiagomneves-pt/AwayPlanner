<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Viagens</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
</head>

<body>

<?php require('includes/menu.html'); ?>

<?php require('includes/database.php'); ?>



<div class="container mt-4">
    <h2>Viagens planeadas</h2>  
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Destino</th>
                    <th scope="col">Data</th>
                    <th scope="col">Inscritos</th>
                    <th scope="col">Observações</th>                        
                </tr>
            </thead>
            <tbody>
                <?php
                    // Query para obter os dados da tabela
                    $sql = "SELECT id_viagem, destino, data_viagem, num_passageiros, num_inscritos, estado, observacoes FROM viagens
                    ORDER BY data_viagem ASC, id_viagem";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();

                    while($viagem = $stmt->fetchObject()){
                        print_r("<tr>");
                        print_r("<td>" . $viagem->destino . "</td>");
                        print_r("<td>" . $viagem->data_viagem . "</td>");
                        print_r("<td>" . $viagem->num_inscritos . "/" .  $viagem->num_passageiros . "</td>");
                        print_r("<td>" . $viagem->observacoes . "</td>");
                ?>
                        <td>
                            <a class="btn btn-secondary" href="passageiros.php?id_v=<?=$viagem->id_viagem;?>&destino=<?= $viagem->destino?>" role="button" style="margin:2px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/></svg></a>

                            <a class="btn btn-secondary" href="editViagem.php?id_v=<?=$viagem->id_viagem;?>" role="button" style="margin: 2px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a>

                            <a class="btn btn-secondary delete-confirm" href="delViagem.php?id_v=<?=$viagem->id_viagem;?>" data-bs-toggle="modal" data-bs-target="#DangerModalalert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg>
                            </a>

                        </td>
                    <?php
                        print_r("</tr>");
                    }
                    ?>
                </tbody>
        </table>
        <a class="btn btn-outline-primary btn-lg position-relative start-50" href="addViagem.php" role="button">+</a> 
</div>

    <!-- Modal -->
    <div class="modal fade" id="DangerModalalert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Tem a certeza que deseja apagar o registo?
                </div>
                <div class="modal-footer danger-md">
                    <a class="btn btn-dark" data-bs-dismiss="modal">No</a>
                    <a class="btn btn-danger delete-yes" href="#">Yes</a>
                </div>
            </div>
        </div>
    </div>

<script src="js/bootstrap.bundle.min.js"></script>
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