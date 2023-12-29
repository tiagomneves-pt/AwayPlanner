<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Viagens</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/tabela.css">
</head>

<body>

<!--Navbar-->
<?php require('includes/navbar.php')?>

<?php
    $user = 'root';
    $pass = '';

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=projeto;charset=utf8', $user, $pass);
    } catch (PDOException $e) {
        // attempt to retry the connection after some timeout for example
        echo $e;
    }
?>


<div class="container mt-4">
    <h2>Viagens planeadas</h2>  
    <?php
        // Query para obter os dados da tabela
        $sql = "SELECT id_viagem, destino, data_viagem, num_passageiros, num_inscritos, estado, observacoes FROM viagens
        ORDER BY data_viagem ASC, id_viagem";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Destino</th>
                <th scope="col">Data</th>
                <th scope="col">Inscritos</th>
                <th scope="col">Observações</th>                        
            </tr>
        </thead>
        <?php
        while($viagem = $stmt->fetchObject()){
            $destino        = $viagem->destino;
            $data_viagem    = $viagem->data_viagem;
            $num_inscritos  = $viagem->num_inscritos;
            $num_passageiros= $viagem->num_passageiros;
            $obs            = $viagem->observacoes;
        ?>
        <tbody>
            <tr> <!--TODO: Mudar a cor da linha consoante o estado da viagem-->
                <td><?= $destino ?></td>
                <td><?= $data_viagem ?></td>
                <td><?= $num_inscritos ?>/<?= $num_passageiros ?></td>
                <td><?= $obs ?></td>
                <td><a class="btn btn-secondary" href="passageiros.php?id=<?= $viagem->id_viagem?>" role="button" style="margin:2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/></svg></a><a class="btn btn-secondary" href="#" role="button" style="margin: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a></td>
                
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a class="btn btn-outline-primary btn-lg position-relative start-50" href="#" role="button">+</a> 
</div>


<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>