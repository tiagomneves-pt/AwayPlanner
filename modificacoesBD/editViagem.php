<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwayPlanner - Editar Viagem</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    
</head>

<body>
    <?php require('../includes/menu.html'); ?>

    <?php require('../includes/database.php'); ?>

    <?php

        $id_viagem = $_GET['id_v'];

        $sql = 'SELECT * FROM viagens v WHERE v.id_viagem = :id_viagem';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id_viagem', $id_viagem);
        $stmt->execute();

        $viagem = $stmt->fetchObject();


    ?>

    <div class="container mt-4">
        <div class="text-white bg-dark bg-gradient bg-opacity-75">
            <h3 class="ms-2 p-2">Editar viagem</h3>
        </div>
    </div>

    <div class="container mt-4">
        <form action="editViagem-DBUpdate.php?id_v=<?= $_GET['id_v']; ?>" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="destino" class="col-sm-2 col-form-label">Destino</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="destino" name="destino" required value="<?php echo ($viagem->destino); ?>">
                        </div>
                    </div>            
                    <div class="mb-3 row">
                        <label for="partida" class="col-sm-2 col-form-label">Partida</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="partida" name="partida" value="Coimbra" required value="<?php echo ($viagem->partida); ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="data" class="col-sm-2 col-form-label">Data</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" required id="data" name="data" required value = "<?php echo ($viagem->data_viagem); ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="num_passageiros" class="col-sm-2 col-form-label">Passageiros</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" required id="num_passageiros" name="num_passageiros" placeholder="54" min="0" required value="<?php echo ($viagem->num_passageiros); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="custo_total" class="col-sm-2 col-form-label">Custo total</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" required id="custo_total" name="custo_total" placeholder="€" min="0.00" step="0.01" required value="<?php echo ($viagem->custo_total); ?>">
                        </div>
                        <label for="custo_unit" class="col-sm-3 col-form-label">Custo por pessoa</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" required id="custo_unit" name="custo_unit"  placeholder="€" min="0.00" step="0.01" required value="<?php echo ($viagem->custo_unit); ?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="opcoesEstado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-3">
                            <div class="dropdown">
                                <select class="form-select" id="opcoesEstado" name="estado" data-estado="<?= ($viagem->estado); ?>"> <!--TODO: Select index-->
                                    <option value="agendada">Agendada</option>
                                    <option value="confirmada">Confirmada</option>
                                    <option value="cancelada">Cancelada</option>
                                    <option style="display: none;" value="realizada">Realizada</option>
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
                    <button class="btn btn-success" type="submit">Guardar alterações</button>
                    <a class="btn btn-secondary" href="javascript:history.back()">Cancelar</a>
                </div>
            </div> 
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        var dropdownEstados = document.getElementById("opcoesEstado");
        var estado = dropdownEstados.getAttribute("data-estado");
        //console.log(estado);

        switch(estado){
            case "Agendada":
                dropdownEstados.selectedIndex = 0;
                break;

            case "Confirmada":
                dropdownEstados.selectedIndex = 1;
                break;

            case "Cancelada":
                dropdownEstados.selectedIndex = 2;
                break;

            case "Realizada":
                dropdownEstados.selectedIndex = 3;
                dropdownEstados.disabled = true;
                break;

            default:
                dropdownEstados.selectedIndex = 0;
                break;
        }
    </script>
</body>

</html>