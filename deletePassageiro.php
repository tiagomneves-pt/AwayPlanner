<?php require('includes/database.php'); ?>

<?php


$id_p = $_GET['id_p'];

$id_v = $_GET['id_v'];

//Apagar da tabela Passageiro
$stmt = $dbh->prepare("DELETE FROM passageiro WHERE id=:id_p");
$stmt->bindParam(":id_p", $id_p);
$stmt->execute();

//Apagar da tabela pagamento
$stmt2 = $dbh->prepare("DELETE FROM pagamento WHERE id_passageiro = :id_p AND id_viagem = :id_v");
$stmt2->bindParam(":id_p", $id_p);
$stmt2->bindParam(":id_v", $id_v);
$stmt2->execute();

//diminuir passageiros inscritos
$sql_updateInscritos = 'UPDATE viagens SET num_inscritos = num_inscritos - 1 WHERE id_viagem = :id_viagem';
$stmt_update = $dbh->prepare($sql_updateInscritos);
$stmt_update->bindParam(':id_viagem', $id_v);
$stmt_update->execute();


// Posso color mensagem de sucesso etc etc 
echo ('<meta http-equiv="refresh" content="0; URL=viagens.php" />');
