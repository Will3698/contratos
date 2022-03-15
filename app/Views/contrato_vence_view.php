<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Gerência de Contratos</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url("css/styles.css") ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="<?= base_url("js/jquery-3.6.0.min.js") ?>"></script>
    <script src="<?= base_url("js/jquery.mask.min.js") ?>"></script>
    <script src="<?= base_url("js/main.js") ?>"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light"><b>CONTRATOS</b></div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/cadastrar_contrato") ?>">Cadastrar</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/buscar_contrato") ?>">Buscars</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/vence_contrato") ?>">Próximo do Vencimento</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Ocultar Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="<?= site_url("home/home") ?>">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url("home/logout") ?>">Sair</a></li>                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <br>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">Buscar Contrato Próximo a Vencer:</label>
                    <div class="col-sm-5">
                        <form action="<?= site_url("contratocontroller/buscar_vence_contrato") ?>" method="POST" enctype="multipart/form-data">
                            <select class="custom-select my-1 mr-sm-2" id="mySelect" name="dias">
                                <option selected>Escolher...</option>
                                <option value="15">Em 15 dias</option>
                                <option value="30">Em 1 mês</option>
                                <option value="90">Em 3 meses</option>
                            </select>
                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <br>
                    <table class="table table-light table-hover" style="text-align: center;">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">Código Contrato</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Nome/Razão Social</th>
                                <th scope="col">Detalhes do Contrato</th>
                            </tr>
                        </thead>
                        <?php foreach ($list as $inf) : ?>
                            <?php if ($inf["op_pag"] == null) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php print $inf["cod_contrato"] ?></td>
                                        <td><?php print $inf["cnpj"] ?></td>
                                        <td><?php print $inf["nome"] ?></td>
                                        <td><a class="btn btn-outline-primary" href="<?= site_url("contratocontroller/detalhe_contrato/?id={$inf["id"]}") ?>">Visualizar</a></td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>

</html>