<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Viagens</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/tabela.css">
</head>

<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg bf-body-terciary mb-4">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">    
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Items da esquerda-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="index.html">Página inicial</a>
                </li>
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="viagens.php">Viagens</a>
                </li>
            </ul>
            
            <!--Brand no meio da navbar-->
            <a class="navbar-brand mx-auto" href="index.html"><img src="imagens/AwayPlanner-logo-min.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">AwayPlanner</a>
            
            <!--Items da direita-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="#">Documentação</a>
                </li>
                <li class="navitem">
                    <a class="nav-link m-2" aria-current="page" href="#">Apoio técnico</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>

<?php
    $user = 'root';
    $pass = '';

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=away_planner;charset=utf8', $user, $pass);
    } catch (PDOException $e) {
        // attempt to retry the connection after some timeout for example
        echo $e;
    }
?>


<div class="container mt-4">
    <h2>Viagens planeadas</h2>  
    <?php
        // Query para obter os dados da tabela
        $sql = "SELECT id_viagem, destino, data_viagem, num_passageiros, num_inscritos, estado, observacoes FROM viagens
        ORDER BY data_viagem ASC, id_viagem";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Destino</th>
                    <th scope="col">Data</th>
                    <th scope="col">Inscritos</th>
                    <th scope="col">Observações</th>                        
                </tr>
            </thead>
            <?php
            while($viagem = $stmt->fetchObject()){
                $destino        = $viagem->destino;
                $data_viagem    = $viagem->data_viagem;
                $num_inscritos  = $viagem->num_inscritos;
                $num_passageiros= $viagem->num_passageiros;
                $obs            = $viagem->observacoes;
            ?>
            <tbody>
                <tr> <!--TODO: Mudar a cor da linha consoante o estado da viagem-->
                    <td><?= $destino ?></td>
                    <td><?= $data_viagem ?></td>
                    <td><?= $num_inscritos ?>/<?= $num_passageiros ?></td>
                    <td><?= $obs ?></td>
                    <td><a class="btn btn-secondary" href="passageiros.php?id=<?= $viagem->id_viagem?>" role="button" style="margin:2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/></svg></a><a class="btn btn-secondary" href="#" role="button" style="margin: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a></td>
                    
                </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary btn-lg position-relative start-50" href="#" role="button">+</a> 
</div>


<script src="js/bootstrap.bundle.min.js"></script>

<script> //TODO: Submeter os dados na BD
    document.getElementById('btn-adicionar').onclick = function adicionarViagem(){
        let destino = document.getElementById('viagem-destino').value;
        let dataViagem = document.getElementById('viagem-data').value;  
        let custoTotal = document.getElementById('viagem-custo').value;
        let numPassageiros = document.getElementById('viagem-qtd-passageiros').value;
        
        //console.log(destino, dataViagem, custoTotal, numPassageiros);
        //Criar uma nova viagem na grelha
        /*Este script pode ser reaproveitado na criação da grelha a partir da BD
        * Talvez faça sentido serpará-lo depois da ligação à BD estar feita (o clique no botão passa
        * a chamar dois scripts: o de adição à BD e o de criação de um novo elemento na grelha)
        */
        var novaBoxViagem = document.createElement('div');
        novaBoxViagem.className = ("div-viagem col-3");

        novaBoxViagem.innerHTML = destino;

        document.getElementById('grelha-viagens').appendChild(novaBoxViagem);
    }
    
    /////////////////////////////////////////////////////////
    /////////////código para a modal/////////////////////////
    /////////////////////////////////////////////////////////
    function preencherModalDetalhesViagem(tripData, participantes) {
        document.getElementById('detalhes-destino').textContent = tripData.destino;
        document.getElementById('detalhes-data-viagem').textContent = tripData.data;
        document.getElementById('detalhes-ponto-partida').textContent = tripData.pontoPartida;
        document.getElementById('detalhes-ponto-chegada').textContent = tripData.pontoChegada;

        //Obtem lista de participantes na viagem
        let participantesList = document.getElementById('detalhes-participantes-list');
        participantesList.innerHTML = "";

        participantes.forEach(participante => {
            let participanteInfo = document.createElement('div');
            participanteInfo.className = 'participante-info';

            //Exibição dos atributos em colunas
            participanteInfo.innerHTML = `
                <div>
                    <span class="attribute-label">Nome:</span>
                    <span class="attribute-value">${participante.nome}</span>
                </div>
                <div>
                    <span class="attribute-label">Género:</span>
                    <span class="attribute-value">${participante.genero}</span>
                </div>
                <div>
                    <span class="attribute-label">Telemóvel:</span>
                    <span class="attribute-value">${participante.telemovel}</span>
                </div>
                <div>
                    <span class="attribute-label">E-mail:</span>
                    <span class="attribute-value">${participante.email}</span>
                </div>
                <hr>
            `;
            participantesList.appendChild(participanteInfo);
        });

        $('#detalhesViagemModal').modal('show');
    }

    document.querySelectorAll('.btn-detalhes-1').forEach(button => {
        button.addEventListener('click', function () {
            let tripData = {
                id: this.getAttribute('data-viagem-id'),
                data: this.getAttribute('data-data-viagem'),
                destino: this.getAttribute('data-destino'),
                pontoPartida: this.getAttribute('data-ponto-partida'),
                pontoChegada: this.getAttribute('data-ponto-chegada')
            };

            // Quando tivermos base de dados iremos obter os participantes através dp ID: tripData.id
            // e, em seguida, adicionar os participantes à modal
            let participantes = [
                { nome: 'João', genero: 'Masculino', telemovel: '123456789', email: 'joao@email.com' },
                { nome: 'Maria', genero: 'Feminino', telemovel: '123456788', email: 'maria@email.com' },
                { nome: "Participante 1", genero: "Masculino", telemovel: "123456787", email: "participante1@email.com" },
                { nome: "Participante 2", genero: "Feminino", telemovel: "123456786", email: "participante2@email.com" },
                { nome: "Participante 3", genero: "Masculino", telemovel: "123456785", email: "participante3@email.com" },
                { nome: "Participante 4", genero: "Feminino", telemovel: "123456784", email: "participante4@email.com" },
                { nome: "Participante 5", genero: "Masculino", telemovel: "123456783", email: "participante5@email.com" },
                { nome: "Participante 6", genero: "Feminino", telemovel: "123456782", email: "participante6@email.com" },
                { nome: "Participante 7", genero: "Masculino", telemovel: "123456781", email: "participante7@email.com" },
                { nome: "Participante 8", genero: "Feminino", telemovel: "123456780", email: "participante8@email.com" },
                
                
            ];

            preencherModalDetalhesViagem(tripData, participantes);
        });
    });
    document.querySelectorAll('.btn-detalhes-2').forEach(button => {
        button.addEventListener('click', function () {
            let tripData = {
                id: this.getAttribute('data-viagem-id'),
                data: this.getAttribute('data-data-viagem'),
                destino: this.getAttribute('data-destino'),
                pontoPartida: this.getAttribute('data-ponto-partida'),
                pontoChegada: this.getAttribute('data-ponto-chegada')
            };

            // Quando tivermos base de dados iremos obter os participantes através dp ID: tripData.id
            // e, em seguida, adicionar os participantes à modal
            let participantes = [
                { nome: 'João', genero: 'Masculino', telemovel: '123456789', email: 'joao@email.com' },
                { nome: 'Maria', genero: 'Feminino', telemovel: '123456788', email: 'maria@email.com' },
                { nome: "Participante 1", genero: "Masculino", telemovel: "123456787", email: "participante1@email.com" },
                
            ];

            preencherModalDetalhesViagem(tripData, participantes);
        });
    });
    document.querySelectorAll('.btn-detalhes-3').forEach(button => {
        button.addEventListener('click', function () {
            let tripData = {
                id: this.getAttribute('data-viagem-id'),
                data: this.getAttribute('data-data-viagem'),
                destino: this.getAttribute('data-destino'),
                pontoPartida: this.getAttribute('data-ponto-partida'),
                pontoChegada: this.getAttribute('data-ponto-chegada')
            };

            // Quando tivermos base de dados iremos obter os participantes através dp ID: tripData.id
            // e, em seguida, adicionar os participantes à modal
            let participantes = [
                { nome: 'João', genero: 'Masculino', telemovel: '123456789', email: 'joao@email.com' },
                { nome: 'Maria', genero: 'Feminino', telemovel: '123456788', email: 'maria@email.com' },
                { nome: "Participante 1", genero: "Masculino", telemovel: "123456787", email: "participante1@email.com" },
                { nome: "Participante 2", genero: "Feminino", telemovel: "123456786", email: "participante2@email.com" },
                { nome: "Participante 3", genero: "Masculino", telemovel: "123456785", email: "participante3@email.com" },
                { nome: "Participante 4", genero: "Feminino", telemovel: "123456784", email: "participante4@email.com" },
                
            ];

            preencherModalDetalhesViagem(tripData, participantes);
        });
    });
</script>
<script>
    </script>
<script>
    /////////////////////////////////////////////////////////
    /////////////código para a modal/////////////////////////
    /////////////////////////////////////////////////////////
    function preencherModalDetalhesViagem(tripData, participantes) {
        document.getElementById('detalhes-destino').textContent = tripData.destino;
        document.getElementById('detalhes-data-viagem').textContent = tripData.data;
        document.getElementById('detalhes-ponto-partida').textContent = tripData.pontoPartida;
        document.getElementById('detalhes-ponto-chegada').textContent = tripData.pontoChegada;
        
        //Obtem lista de participantes na viagem
        let participantesList = document.getElementById('detalhes-participantes-list');
        participantesList.innerHTML = "";
        
        participantes.forEach(participante => {
            let participanteInfo = document.createElement('div');
            participanteInfo.className = 'participante-info';
            
            //Exibição dos atributos em colunas
            participanteInfo.innerHTML = `
            <div>
                <span class="attribute-label">Nome:</span>
                <span class="attribute-value">${participante.nome}</span>
            </div>
            <div>
                <span class="attribute-label">Género:</span>
                <span class="attribute-value">${participante.genero}</span>
            </div>
            <div>
                <span class="attribute-label">Telemóvel:</span>
                <span class="attribute-value">${participante.telemovel}</span>
            </div>
            <div>
                <span class="attribute-label">E-mail:</span>
                <span class="attribute-value">${participante.email}</span>
            </div>
            <hr>
            `;
            participantesList.appendChild(participanteInfo);
        });
        
        $('#detalhesViagemModal').modal('show');
    }
    
    document.querySelectorAll('.btn-detalhes-1').forEach(button => {
        button.addEventListener('click', function () {
            let tripData = {
                id: this.getAttribute('data-viagem-id'),
                data: this.getAttribute('data-data-viagem'),
                destino: this.getAttribute('data-destino'),
                pontoPartida: this.getAttribute('data-ponto-partida'),
                pontoChegada: this.getAttribute('data-ponto-chegada')
            };
            
            // Quando tivermos base de dados iremos obter os participantes através dp ID: tripData.id
            // e, em seguida, adicionar os participantes à modal
            let participantes = [
            { nome: 'João', genero: 'Masculino', telemovel: '123456789', email: 'joao@email.com' },
            { nome: 'Maria', genero: 'Feminino', telemovel: '123456788', email: 'maria@email.com' },
            { nome: "Participante 1", genero: "Masculino", telemovel: "123456787", email: "participante1@email.com" },
            { nome: "Participante 2", genero: "Feminino", telemovel: "123456786", email: "participante2@email.com" },
            { nome: "Participante 3", genero: "Masculino", telemovel: "123456785", email: "participante3@email.com" },
            { nome: "Participante 4", genero: "Feminino", telemovel: "123456784", email: "participante4@email.com" },
            { nome: "Participante 5", genero: "Masculino", telemovel: "123456783", email: "participante5@email.com" },
            { nome: "Participante 6", genero: "Feminino", telemovel: "123456782", email: "participante6@email.com" },
            { nome: "Participante 7", genero: "Masculino", telemovel: "123456781", email: "participante7@email.com" },
            { nome: "Participante 8", genero: "Feminino", telemovel: "123456780", email: "participante8@email.com" },
            
            
            ];
            
            preencherModalDetalhesViagem(tripData, participantes);
        });
    });
    document.querySelectorAll('.btn-detalhes-2').forEach(button => {
        button.addEventListener('click', function () {
            let tripData = {
                id: this.getAttribute('data-viagem-id'),
                data: this.getAttribute('data-data-viagem'),
                destino: this.getAttribute('data-destino'),
                pontoPartida: this.getAttribute('data-ponto-partida'),
                pontoChegada: this.getAttribute('data-ponto-chegada')
            };
            
            // Quando tivermos base de dados iremos obter os participantes através dp ID: tripData.id
            // e, em seguida, adicionar os participantes à modal
            let participantes = [
            { nome: 'João', genero: 'Masculino', telemovel: '123456789', email: 'joao@email.com' },
            { nome: 'Maria', genero: 'Feminino', telemovel: '123456788', email: 'maria@email.com' },
            { nome: "Participante 1", genero: "Masculino", telemovel: "123456787", email: "participante1@email.com" },
            
            ];
            
            preencherModalDetalhesViagem(tripData, participantes);
        });
    });
    document.querySelectorAll('.btn-detalhes-3').forEach(button => {
        button.addEventListener('click', function () {
            let tripData = {
                id: this.getAttribute('data-viagem-id'),
                data: this.getAttribute('data-data-viagem'),
                destino: this.getAttribute('data-destino'),
                pontoPartida: this.getAttribute('data-ponto-partida'),
                pontoChegada: this.getAttribute('data-ponto-chegada')
            };
            
            // Quando tivermos base de dados iremos obter os participantes através dp ID: tripData.id
            // e, em seguida, adicionar os participantes à modal
            let participantes = [
            { nome: 'João', genero: 'Masculino', telemovel: '123456789', email: 'joao@email.com' },
            { nome: 'Maria', genero: 'Feminino', telemovel: '123456788', email: 'maria@email.com' },
            { nome: "Participante 1", genero: "Masculino", telemovel: "123456787", email: "participante1@email.com" },
            { nome: "Participante 2", genero: "Feminino", telemovel: "123456786", email: "participante2@email.com" },
            { nome: "Participante 3", genero: "Masculino", telemovel: "123456785", email: "participante3@email.com" },
            { nome: "Participante 4", genero: "Feminino", telemovel: "123456784", email: "participante4@email.com" },
            
            ];
            
            preencherModalDetalhesViagem(tripData, participantes);
        });
    });
</script>
</body>
</html>