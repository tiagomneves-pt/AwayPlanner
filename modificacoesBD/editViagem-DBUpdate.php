<?php require('../includes/database.php'); ?>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $id_viagem = $_GET['id_v'];

    $destino = $_POST['destino'];
    $partida = $_POST['partida'];
    $data_viagem = $_POST['data'];  
    $num_passageiros = $_POST['num_passageiros'];
    $custo_total = $_POST['custo_total'];
    $custo_unitario = $_POST['custo_unit'];
    $estado = $_POST['estado'];
    $observ = $_POST['observ'];

    //update viagem
    $sql = "UPDATE viagens 
            SET destino = :destino, 
                partida = :partida, 
                data_viagem = :data_viagem,  
                num_passageiros = :num_passageiros, 
                custo_total = :custo_total, 
                custo_unit = :custo_unit, 
                estado = :estado, 
                observacoes = :observ
            WHERE id_viagem = :id_viagem";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id_viagem', $id_viagem);
    $stmt->bindParam(':destino', $destino);
    $stmt->bindParam(':partida', $partida);
    $stmt->bindParam(':data_viagem', $data_viagem);
    $stmt->bindParam(':num_passageiros', $num_passageiros);
    $stmt->bindParam(':custo_total', $custo_total);
    $stmt->bindParam(':custo_unit', $custo_unitario);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':observ', $observ);
    $stmt->execute();
    
    header("location:../viagens.php");

    if ($stmt->rowCount() < 1) {
    ?>
        <div class="container mt-4">
            <h4 class="danger">Não foram efetuadas alterações!</h4>
        </div>
    <?php
    }
?>