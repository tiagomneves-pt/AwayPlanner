<?php require('../includes/database.php'); ?>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $id_passageiro = $_GET['id_p'];
    $id_viagem = $_GET['id_v'];
    $destino = $_GET['destino'];

    $sql = 'SELECT passageiro.nome, passageiro.contacto, pagamento.pago 
                FROM passageiro
                LEFT JOIN pagamento ON passageiro.id = pagamento.id_passageiro
                WHERE passageiro.id = :id_p AND pagamento.id_viagem = :id_v';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id_v', $id_viagem);
    $stmt->bindParam(':id_p', $id_passageiro);
    $stmt->execute();
    
    //update passageiro
    $sql_passageiro = "UPDATE passageiro SET nome = :nome, contacto = :contacto WHERE id = :id_p";
    $stmt_passageiro = $dbh->prepare($sql_passageiro);
    $stmt_passageiro->bindParam(':id_p', $id_passageiro);
    $stmt_passageiro->bindParam(':nome', $_POST['nome']);
    $stmt_passageiro->bindParam(':contacto', $_POST['contacto']);
    $stmt_passageiro->execute();

    $sql_pagamento = "UPDATE pagamento SET pago = :pago WHERE id_passageiro = :id_p AND id_viagem = :id_v";
    $stmt_pagamento = $dbh->prepare($sql_pagamento);
    $stmt_pagamento->bindParam(':id_v', $id_viagem);
    $stmt_pagamento->bindParam(':id_p', $id_passageiro);
    if (isset($_POST['pago'])) {
        $stmt_pagamento->bindParam(':pago', $_POST['pago']);
    } else {
        // A checkbox quando não está 'checked' dá POST a um valor NULL
        $stmt_pagamento->bindValue(':pago', 0);
    }

    $stmt_pagamento->execute();

    header("location:../passageiros.php?id_v=$id_viagem&destino=$destino");
?>
