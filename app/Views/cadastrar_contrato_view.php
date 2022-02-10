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
            <br>
            <div class="container-fluid">
                <form action="<?= site_url("contratocontroller/salvar") ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= _v($dados, "id") ?>">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Cod. Contrato</label>
                            <input type="text" class="form-control" placeholder="Cod. do contrato" name="cod_contrato" value="<?= _v($dados, "cod_contrato") ?>">
                        </div>
                        <div class="col">
                            <label>Nome/Razão Social</label>
                            <input type="text" class="form-control" placeholder="Nome / Razão Social" name="nome" value="<?= _v($dados, "nome") ?>">
                        </div>
                        <div class="col">
                            <label>CNPJ</label>
                            <input type="text" class="form-control" placeholder="CNPJ" name="cnpj" value="<?= _v($dados, "cnpj") ?>">
                        </div>
                        <div class="col">
                            <label>Responsável</label>
                            <input type="text" class="form-control" placeholder="Responsável" name="responsavel" value="<?= _v($dados, "responsavel") ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Tipo de Serviço</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_servico">
                                <option selected>Escolher...</option>
                                <option value="Manutenção">Manutenção</option>
                                <option value="Serviço">Serviço</option>
                                <option value="Insumos">Insumos</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>Situação</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="situacao">
                                <option selected>Escolher...</option>
                                <option value="Em elaboração">Em elaboração</option>
                                <option value="Pendente de assinatura">Pendente de assinatura</option>
                                <option value="Assinado">Assinado</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>SLA</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="sla">
                                <option selected>Escolher...</option>
                                <option value="Crítico">Crítico</option>
                                <option value="Alto">Alto</option>
                                <option value="Médio">Médio</option>
                                <option value="Baixo">Baixo</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>Tipo de Contrato</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_contrato">
                                <option selected>Escolher...</option>
                                <option value="Receita">Receita</option>
                                <option value="Despesa">Despesa</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label>Data da Assinatura</label>
                            <input type="date" class="form-control" name="data_assinatura" value="<?= _v($dados, "data_assinatura") ?>">
                        </div>

                        <div class="col">
                            <label>Data de Cadastro</label>
                            <input type="date" class="form-control" name="data_cadastro" value="<?= _v($dados, "data_cadastro") ?>">
                        </div>

                        <div class="col">
                            <label>Data de Venc. da Fatura</label>
                            <input type="date" class="form-control" name="data_venc_fatura" value="<?= _v($dados, "data_venc_fatura") ?>">
                        </div>

                        <div class="col">
                            <label>Prazo Inicial</label>
                            <input type="date" class="form-control" name="prazo_inicial" value="<?= _v($dados, "prazo_inicial") ?>">
                        </div>

                        <div class="col">
                            <label>Prazo Final</label>
                            <input type="date" class="form-control" name="prazo_final" value="<?= _v($dados, "prazo_final") ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Prazo de Garantia</label>
                            <input type="text" class="form-control" placeholder="Prazo de Garantia" name="prazo_garantia" value="<?= _v($dados, "prazo_garantia") ?>">
                        </div>
                        <div class="col">
                            <label>Multa Por Atraso (%)</label>
                            <input type="text" class="form-control" placeholder="Multa Por Atraso (%)" name="multa" value="<?= _v($dados, "multa") ?>">
                        </div>

                        <div class="col">
                            <label>Valor da Fatura Mensal</label>
                            <input type="number" class="form-control" placeholder="Valor da Fatura Mensal" name="valor_fatura" value="<?= _v($dados, "valor_fatura") ?>">
                        </div>

                        <div class="col">
                            <label>Valor Total do Contrato</label>
                            <input type="number" class="form-control" placeholder="Valor Total do Contrato" name="valor_total" value="<?= _v($dados, "valor_total") ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Observações</label>
                            <textarea class="form-control" placeholder="Observações..." name="obs" value="<?= _v($dados, "obs") ?>"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Anexar Documentos</label>
                            <input type="file" class="form-control" placeholder="Valor Total do Contrato" name="anexo" value="<?= _v($dados, "anexo") ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Cadastar</button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>

</html>