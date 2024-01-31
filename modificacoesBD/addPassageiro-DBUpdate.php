<?php require('../includes/database.php'); ?>

<?php
    $id_viagem = $_GET['id_v'];
    $destino   = $_GET['destino'];

    $nome_passageiro = $_POST['nome'];
    $contacto_passageiro = $_POST['contacto'];  
    $pago = isset($_POST['pago']) ? 1 : 0;

    // Código para INSERT na tabela 'passageiro'
    $sql_passageiro = "INSERT INTO passageiro (nome, contacto) VALUES (:nome, :contacto)";
    $stmt_passageiro = $dbh->prepare($sql_passageiro);
    $stmt_passageiro->bindParam(':nome', $nome_passageiro);
    $stmt_passageiro->bindParam(':contacto', $contacto_passageiro);
    $stmt_passageiro->execute();

    $id_passageiro = $dbh->lastInsertId();

    // Código para INSERT na tabela 'pagamento'
    $sql_pagamento = "INSERT INTO pagamento (id_passageiro, id_viagem, pago) VALUES (:id_passageiro, :id_viagem, :pago)";
    $stmt_pagamento = $dbh->prepare($sql_pagamento);
    $stmt_pagamento->bindParam(':id_passageiro', $id_passageiro);
    $stmt_pagamento->bindParam(':id_viagem', $id_viagem);
    $stmt_pagamento->bindParam(':pago', $pago);
    $stmt_pagamento->execute();

    $sql_updateInscritos = 'UPDATE viagens SET num_inscritos = num_inscritos + 1 WHERE id_viagem = :id_viagem';
    $stmt_update = $dbh->prepare($sql_updateInscritos);
    $stmt_update->bindParam(':id_viagem', $id_viagem);
    $stmt_update->execute();

    $sql_passageiro = 'SELECT pago FROM pagamento WHERE id_passageiro = :id_p AND id_viagem = :id_v';
    $stmt2 = $dbh->prepare($sql_passageiro);
    $stmt2->bindValue(':id_p', $id_passageiro);
    $stmt2->bindValue(':id_v', $id_viagem);
    $stmt2->execute();

    $pagou = $stmt2->fetchObject();

    header("location:../passageiros.php?id_v=$id_viagem&destino=$destino");
?>
