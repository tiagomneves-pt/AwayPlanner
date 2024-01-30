<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Página Principal</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    <style>

        .opcoes-index{
            position: relative;
            z-index: 1;
        }   
        .opcoes-index::before {
            position: absolute;
            content: '';
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(
                45deg,
                hsla(26, 29%, 74%, 1) 0%,
                hsla(26, 16%, 62%, 1) 60%,
                hsla(25, 8%, 51%, 1) 80%,
                hsla(24, 5%, 39%, 1) 90%,
                hsla(0, 0%, 27%, 1) 100%);
            );
            z-index: -1;
            transition: opacity 1.5s linear;
            opacity: 0;
        }

        .opcoes-index:hover::before{
            opacity: 1;
        }
        #prox-viagem:hover{
            background: linear-gradient(135deg, hsla(26, 29%, 74%, 1) 0%, hsla(26, 16%, 62%, 1) 60%, hsla(25, 8%, 51%, 1) 80%, hsla(24, 5%, 39%, 1) 90%, hsla(0, 0%, 27%, 1) 100%);
        }
        #viagens:hover{
            background: linear-gradient(225deg, hsla(26, 29%, 74%, 1) 0%, hsla(26, 16%, 62%, 1) 60%, hsla(25, 8%, 51%, 1) 80%, hsla(24, 5%, 39%, 1) 90%, hsla(0, 0%, 27%, 1) 100%);
        }
        #analises:hover{
            background: linear-gradient(225deg, hsla(26, 29%, 74%, 1) 0%, hsla(26, 16%, 62%, 1) 60%, hsla(25, 8%, 51%, 1) 80%, hsla(24, 5%, 39%, 1) 90%, hsla(0, 0%, 27%, 1) 100%);
        }
        #contactos:hover{
            background: linear-gradient(315deg, hsla(26, 29%, 74%, 1) 0%, hsla(26, 16%, 62%, 1) 60%, hsla(25, 8%, 51%, 1) 80%, hsla(24, 5%, 39%, 1) 90%, hsla(0, 0%, 27%, 1) 100%);
        }

    </style>
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
            <button type="button" class="opcoes-index" id="prox-viagem" onclick="redirecionarPagina('passageiros.php?id_v=<?= $prox_viagem->id_viagem?>&destino=<?= $prox_viagem->destino?>')">Próxima viagem: <h1 style="color: #37392E"><?= $prox_viagem->destino?></h1> </button>
        </div>
        <div class="col-12 col-md-6">
            <button type="button" class="opcoes-index" id="viagens" onclick="redirecionarPagina('viagens.php')">Viagens</button>
        </div>
        <div class="col-12 col-md-6">
            <button type="button" class="opcoes-index" id="analises" onclick="redirecionarPagina('analises.php')">Análises</button>
        </div>
        <div class="col-12 col-md-6">
            <button type="button" class="opcoes-index" id="contactos" onclick="redirecionarPagina('contactos.php')">Apoio técnico</button>
        </div>
    </div>
    
    <div class="position-absolute top-50 start-50 translate-middle">
        <img src="imagens/rosa-dos-ventos.png" alt="Logótipo da página" id="logotipo" class="img-fluid" style="position: absolute; z-index:2;">
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