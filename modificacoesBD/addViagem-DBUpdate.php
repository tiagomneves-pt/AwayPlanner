<?php require('../includes/database.php'); ?>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $destino = $_POST['destino'];
    $partida = $_POST['partida'];
    $data_viagem = $_POST['data'];  
    $num_passageiros = $_POST['num_passageiros'];
    $custo_total = $_POST['custo_total'];
    $custo_unitario = $_POST['custo_unit'];
    $estado = $_POST['opcoesEstado'];
    $observ = $_POST['observ'];


    $sql = "INSERT INTO viagens (destino, partida, data_viagem, num_passageiros, num_inscritos, custo_total, custo_unit, estado, observacoes, visibilidade) 
        VALUES (:destino, :partida, :data_viagem, :num_passageiros, '0', :custo_total, :custo_unitario, :estado, :observ, '1')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':destino', $destino);
    $stmt->bindParam(':partida', $partida);
    $stmt->bindParam(':data_viagem', $data_viagem);
    $stmt->bindParam(':num_passageiros', $num_passageiros);
    $stmt->bindParam(':custo_total', $custo_total);
    $stmt->bindParam(':custo_unitario', $custo_unitario);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':observ', $observ);
    $stmt->execute();
    
    header("location:../viagens.php");
?>
