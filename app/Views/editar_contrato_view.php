<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Gerência de Contratos</title>
    <script src="<?= base_url("js/jquery-3.6.0.min.js") ?>"></script>
    <script src="<?= base_url("js/main.js") ?>"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url("css/styles.css") ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light"><b>CONTRATOS</b></div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/cadastrar_contrato") ?>">Cadastrar Contrato</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/listar_contrato") ?>">Listar Contratos</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Relatórios</a>
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
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <br>
                <?php foreach ($cont as $inf) : ?>
                    <?php if ($_GET['cod'] == $inf['cod_contrato']) { ?>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Cod. Contrato</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['cod_contrato'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Nome/Razão Social</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['nome'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">CNPJ</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['cnpj'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Serviço</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['tipo_servico'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Situação</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['situacao'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">SLA</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['sla'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Contrato</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['tipo_contrato'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Data da Assinatura</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['data_assinatura'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Data de Cadastro</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['data_cadastro'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Serviço</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['tipo_servico'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Data de Venc. da Fatura</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['data_venc_fatura'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Inicial</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['prazo_inicial'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Final</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['prazo_final'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo de Garantia</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['prazo_garantia'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Multa Por Atraso (%)</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['multa'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Valor da Fatura Mensal</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['valor_fatura'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Valor Total do Contrato</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['valor_total'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Observações</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['obs'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Documentos Anexados</label>
                            <div class="col-sm-5">
                                <input type="email" value="<?= $inf['anexo'] ?>" class="form-control" id="colFormLabel">
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <br>
            <div class="btn-toolbar pull-center">
                <div class="col-sm-5">
                    <a class="btn mr-4 btn-primary" href="<?= site_url("#") ?>">Gravar</a>
                    <a class="btn mr-4 btn-primary" href="<?= site_url("contratocontroller/listar_contrato") ?>">Voltar</a>
                </div>
            </div>
            <br>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>

</html>