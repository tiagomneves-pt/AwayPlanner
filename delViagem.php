<?php require('includes/database.php'); ?>

<?php
$id_viagem = $_GET['id_v'];



//select passageiros pertencentes a essa viagem
/*
$sql = 'SELECT *
        FROM passageiro p
        JOIN pagamento pg ON p.id = pg.id_passageiro
        JOIN viagens v ON v.id_viagem = pg.id_viagem
        WHERE v.id_viagem = :id_viagem;'
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id_viagem', $id_viagem);
$stmt->execute();

$viagem = $stmt2->fetchObject();
*/

//Excluir registros da tabela de passageiros relacionados à viagem
$sql_passageiro = 'DELETE FROM passageiro
                WHERE id IN (SELECT id_passageiro FROM pagamento WHERE id_viagem = :id_viagem)';
$stmt2 = $dbh->prepare($sql_passageiro);
$stmt2->bindValue(':id_viagem', $id_viagem);
$stmt2->execute();
    
//Excluir registros da tabela de pagamentos relacionados à viagem
$sql_pagamento = 'DELETE FROM pagamento WHERE id_viagem = :id_viagem;';
$stmt = $dbh->prepare($sql_pagamento);
$stmt->bindValue(':id_viagem', $id_viagem);
$stmt->execute();
    
//Excluir a viagem em si da tabela de viagens
$sql_viagem = 'DELETE FROM viagens WHERE id_viagem = :id_viagem;';
$stmt3 = $dbh->prepare($sql_viagem);
$stmt3->bindValue(':id_viagem', $id_viagem);
$stmt3->execute();



// Posso color mensagem de sucesso etc etc 
echo ('<meta http-equiv="refresh" content="0; URL=viagens.php" />');
