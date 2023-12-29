<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Lista de inscrições</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!--Navbar-->
<?php require('includes/navbar.php')?>

<?php
$id_viagem = $_GET['id'];
require('includes/database.php');
$sql = 'SELECT id_passageiro, id_viagem FROM pagamento WHERE id_viagem = :id';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id_viagem);
$stmt->execute();

$viagem = $stmt->fetchObject();
print($viagem);
?>

<div class="container mt-4">
    <h2>Inscrições</h2>
    <h3>Viagem a XXXX</h3>  
    <?php
        // Query para obter os dados da tabela
        $sql = "SELECT id, nome, contacto FROM passageiro
        ORDER BY nome ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Contacto</th>
                <th scope="col">Pago</th>
            </tr>
        </thead>
        <?php
        while($passageiro = $stmt->fetchObject()){
            $nome        = $passageiro->nome;
            $contacto    = $passageiro->contacto;
        ?>
        <tbody>
            <tr>
                <td><?= $nome ?></td>
                <td><?= $contacto ?></td>
                <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>                    
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