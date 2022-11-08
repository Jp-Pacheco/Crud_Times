<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Time</title>
</head>

<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Time
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>

                    <div class="card-body">
                <?php
                       if(isset($_GET['idTime'])) {
                           $idTime = mysqli_real_escape_string($con, $_GET['idTime']);
                           $query = "SELECT * FROM tbtime WHERE idTime='$idTime' ";
                           $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0) {
                               $time = mysqli_fetch_array($query_run);
                               ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="idTime" value="<?= $time['idTime']; ?>">
                            <div class="mb-3">
                                <label>Time</label>
                                <input type="text" name="time" value="<?=$time['time'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>País</label>
                                <input type="text" name="pais" value="<?=$time['pais'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>num Titulos</label>
                                <input type="number" name="numTitulo" value="<?=$time['numTitulo'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Treinador</label>
                                <input type="text" name="treinador" value="<?=$time['treinador'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Cor Uniforme</label>
                                <input type="text" name="corUniforme" value="<?=$time['corUniforme'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_time" class="btn btn-primary">
                                    Atualizar Time
                                </button>
                            </div>
                        </form>
                        <?php
                           }
                           else
                           {
                               echo "<h4>Nenhum ID encontrado</h4>";
                           }
                       }
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>