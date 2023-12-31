<?php require('includes/database.php'); ?>

<?php


$id_p = $_GET['id_p'];

$id_v = $_GET['id_v'];

$stmt = $dbh->prepare("DELETE FROM passageiro WHERE id=:id_p");
$stmt->bindParam(":id_p", $id_p);
$stmt->execute();

$stmt2 = $dbh->prepare("DELETE FROM pagamento WHERE id_passageiro = :id_p AND id_viagem = :id_v");
$stmt2->bindParam(":id_p", $id_p);
$stmt2->bindParam(":id_v", $id_v);
$stmt2->execute();

// Posso color mensagem de sucesso etc etc 
echo ('<meta http-equiv="refresh" content="0; URL=viagens.php" />');
