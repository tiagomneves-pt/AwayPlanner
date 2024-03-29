<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>AwayPlanner - Adicionar Viagem</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    
</head>

<body>
    <?php require('../includes/menu.html'); ?>

    <?php require('../includes/database.php'); ?>

    <div class="container mt-4">
        <div class="bg-gradient" style="background-color: #37392E;">
            <h3 class="ms-2 p-2" style="color:#f4f3f7;">Adicionar viagem</h3>
        </div>
    </div>

    <div class="container mt-4">
        <form action="addViagem-DBUpdate.php" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="destino" class="col-sm-2 col-form-label">Destino</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="destino" name="destino" required placeholder="Destino">
                        </div>
                    </div>            
                    <div class="mb-3 row">
                        <label for="partida" class="col-sm-2 col-form-label">Partida</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="partida" name="partida" value="Coimbra" required placeholder="Partida">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="data" class="col-sm-2 col-form-label">Data</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" required id="data" name="data">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="num_passageiros" class="col-sm-2 col-form-label">Passageiros</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" required id="num_passageiros" name="num_passageiros" placeholder="ex.: 54" min="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="custo_total" class="col-sm-2 col-form-label">Custo total</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" required id="custo_total" name="custo_total" placeholder="€" min="0" step="0.01">
                        </div>
                        <label for="custo_unit" class="col-sm-3 col-form-label">Custo por pessoa</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" required id="custo_unit" name="custo_unit"  placeholder="€" min="0" step="0.01">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="opcoesEstado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-3">
                            <div class="dropdown">
                                <select class="form-select" id="opcoesEstado" name="opcoesEstado">
                                    <option value="Agendada">Agendada</option>
                                    <option value="Confirmada">Confirmada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="observ" class="col-sm-2 col-form-label">Observações</label>
                        <div class="col-sm-20">
                                <textarea type="text" class="form-control" id="observ" name="observ" placeholder="Escreva aqui" rows="3"></textarea>
                        </div>
                    </div>  
                </div>


            </div>
            <div class="row">
                <div class="col-6 position-relative start-50">
                        <button class="btn btn-ap-primary" type="submit">Adicionar</button>
                        <a class="btn btn-secondary" href="javascript:history.back()">Cancelar</a>
                </div>
            </div>            
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        // Obtenha o elemento de input de data
        var dataInput = document.getElementById('data');

        // Defina a data mínima como hoje
        dataInput.min = new Date().toISOString().split('T')[0];
    </script>
</body>

</html>