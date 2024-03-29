<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Viagens</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<body>

<?php require('includes/menu.html'); ?>

<?php require('includes/database.php'); ?>



<div class="container mt-4">
    <a href="index.php" style="color:#0f0a0a; text-decoration:none; font-weight:300;"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/></svg><span style="display:inline-block; vertical-align: middle; font-size:larger;">Voltar</span></a>
    <h1 class="mb-3">Viagens planeadas</h1>  
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Destino</th>
                    <th scope="col">Data</th>
                    <th scope="col">Inscritos</th>
                    <th scope="col">Observações</th>                        
                    <th style="width: 20%" scope="col">Opções</th>                        
                </tr>
            </thead>
            <tbody>
                <?php
                    // Query para obter os dados da tabela
                    $sql = "SELECT id_viagem, destino, data_viagem, num_passageiros, num_inscritos, estado, observacoes, visibilidade FROM viagens WHERE visibilidade = 1
                    ORDER BY data_viagem ASC, id_viagem";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();

                    while($viagem = $stmt->fetchObject()){
                        switch($viagem->estado){
                            case "Realizada":
                                $cor_linha = "table-secondary";
                                break;
                            case "Cancelada":
                                $cor_linha = "table-danger";
                                break;
                            case "Agendada":
                                $cor_linha = "table-info";
                                break;
                            case "Confirmada":
                                $cor_linha = "table-success";
                                break;
                            default:
                                $cor_linha = "table-default";
                                break;
                        }

                        print_r("<tr class='$cor_linha'>");
                        print_r("<td>" . $viagem->destino . "</td>");
                        print_r("<td>" . $viagem->data_viagem . "</td>");
                        print_r("<td>" . $viagem->num_inscritos . "/" .  $viagem->num_passageiros . "</td>");
                        print_r("<td>" . $viagem->observacoes . "</td>");
                ?>
                        <td>
                            <a class="btn btn-outline-secondary" href="passageiros.php?id_v=<?=$viagem->id_viagem;?>&destino=<?= $viagem->destino?>" role="button"  style="margin:2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/></svg></a>
                            <a class="btn btn-outline-secondary" href="modificacoesBD/editViagem.php?id_v=<?=$viagem->id_viagem;?>" role="button" style="margin: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a>
                            <a class="btn btn-outline-secondary delete-confirm" href="modificacoesBD/delViagem.php?id_v=<?=$viagem->id_viagem;?>" data-bs-toggle="modal" data-bs-target="#DangerModalalert"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></a>
                        </td>
                    <?php
                        print_r("</tr>");
                    }
                    ?>
                </tbody>
        </table>
        <a href="modificacoesBD/addViagem.php" class="btn btn-ap-primary mb-3 btn-lg position-relative start-50" style="border-radius:100%" role="button">+</a> 


</div>

    <!-- Modal -->
    <div class="modal fade" id="DangerModalalert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Apagar viagem</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Tem a certeza que deseja apagar este registo?</div>
                <div class="modal-footer danger-md">
                    <a class="btn btn-dark" data-bs-dismiss="modal">Não</a>
                    <a class="btn btn-danger delete-yes" href="#">Sim</a>
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

                var deleteYesLink = document.querySelector(".modal-footer .delete-yes");
                if (deleteYesLink) {
                    deleteYesLink.href = this.href;
                }

                return false;
            });
        });
    });
</script>
</body>
</html>