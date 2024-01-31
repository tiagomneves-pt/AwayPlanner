<?php require('../includes/database.php'); ?>

<?php
$id_viagem = $_GET['id_v'];

//Excluir registos da tabela de pagamentos relacionados à viagem
$sql_pagamento = 'UPDATE pagamento SET visibilidade = "0" WHERE id_viagem = :id_viagem;';
$stmt = $dbh->prepare($sql_pagamento);
$stmt->bindValue(':id_viagem', $id_viagem);
$stmt->execute();
    
//Excluir a viagem em si da tabela de viagens
$sql_viagem = 'UPDATE viagens SET visibilidade = "0" WHERE id_viagem = :id_viagem;';
$stmt3 = $dbh->prepare($sql_viagem);
$stmt3->bindValue(':id_viagem', $id_viagem);
$stmt3->execute();



// Posso color mensagem de sucesso etc etc 
echo ('<meta http-equiv="refresh" content="0; URL=../viagens.php" />');
