<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Adicionar Viagem</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/cooper-hewitt" type="text/css"/>
    
</head>

<body>
    <?php require('includes/menu.html'); ?>

    <?php require('includes/database.php'); ?>

    <div class="container mt-4">
        <div class="mt-2 p-3 text-white bg-dark">
            Adicionar Viagem
        </div>
    </div>

    <div class="container mt-4">
        <form action="addViagem-DBUpdate.php" method="POST">
            <div class="mb-3 row">
                <label for="destino" class="col-sm-2 col-form-label">Destino</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="destino" name="destino" required placeholder="Destino">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="partida" class="col-sm-2 col-form-label">Partida</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="partida" name="partida" value="Coimbra" required placeholder="Partida">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="data" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" required id="data" name="data">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="num_passageiros" class="col-sm-2 col-form-label">Máximo de Inscritos</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="num_passageiros" name="num_passageiros" placeholder="54">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="num_inscritos" class="col-sm-2 col-form-label">Número de Inscritos</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="num_inscritos" name="num_inscritos"  value="0" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_total" class="col-sm-2 col-form-label">Custo Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="custo_total" name="custo_total" placeholder="0">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="custo_unit" class="col-sm-2 col-form-label">Custo por pessoa</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" required id="custo_unit" name="custo_unit"  placeholder="0">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="estado" name="estado" value="Agendado" required placeholder="Agendado">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="observ" class="col-sm-2 col-form-label">Observações</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="observ" name="observ" placeholder="Observações">
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-success" type="submit">Inserir</button>
            </div>
        </form>
    </div>

    <script src=" js/bootstrap.bundle.min.js"></script>
    <script>
        // Obtenha o elemento de input de data
        var dataInput = document.getElementById('data');

        // Defina a data mínima como hoje
        dataInput.min = new Date().toISOString().split('T')[0];
    </script>
</body>

</html>