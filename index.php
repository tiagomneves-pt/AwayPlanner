<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Página Principal</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>
<body>
    <?php require('includes/database.php'); ?>
    <?php 
    $sql_prox_viagem   = 'SELECT id_viagem, destino, data_viagem FROM viagens WHERE data_viagem >= CURRENT_DATE ORDER BY data_viagem LIMIT 1';
    $stmt_prox_viagem  = $dbh->prepare($sql_prox_viagem);
    $stmt_prox_viagem->execute();

    $prox_viagem = $stmt_prox_viagem->fetchObject();

    ?>
    <div class="row g-0">
        <div class="col-12 col-md-6">
            <button type="button" class="btn-ap-primary opcoes-index" onclick="redirecionarPagina('passageiros.php?id=<?= $prox_viagem->id_viagem?>&destino=<?= $prox_viagem->destino?>')">Próxima viagem: <h1 style="color: #56445D"><?= $prox_viagem->destino?></h1> </button>
        </div>
        <div class="col-12 col-md-6">
            <button type="button" class="btn-ap-primary opcoes-index" onclick="redirecionarPagina('viagens.php')">Viagens</button>
        </div>
        <div class="col-12 col-md-6">
            <button type="button" class="btn-ap-primary opcoes-index" onclick="redirecionarPagina()">Análises</button>
        </div>
        <div class="col-12 col-md-6">
            <button type="button" class="btn-ap-primary opcoes-index" onclick="redirecionarPagina()">Apoio técnico</button>
        </div>
    </div>
    
    <div class="position-absolute top-50 start-50 translate-middle">
        <img src="imagens/rosa-dos-ventos.png" alt="Logótipo da página" class="img-fluid">
    </div>


<script> 
//Trocar os botões por âncoras desconfigura a página, mesmo quando especifico "role = button"
//TODO: Resolver incompatibilidades das âncoras com os estilos
    function redirecionarPagina(pagina){
        window.location.href = pagina;
    }
</script>
</body>
</html>