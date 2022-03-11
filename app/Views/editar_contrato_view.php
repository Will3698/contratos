<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Gerência de Contratos</title>
    <script src="<?= base_url("js/jquery-3.6.0.min.js") ?>"></script>
    <script src="<?= base_url("js/jquery.mask.min.js") ?>"></script>
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/buscar_contrato") ?>">Buscar Contratos</a>
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
                            <li class="nav-item active"><a class="nav-link" href="<?= site_url("home/index") ?>">Home</a></li>
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
                <form action="<?= site_url("contratocontroller/atualizar_contrato") ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach ($cont as $inf) : ?>
                        <?php if ($_GET['id'] == $inf['id']) { ?>
                            <input type="hidden" name="id" value="<?= $inf['id'] ?>">
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Cod. Contrato</label>
                                <div class="col-sm-5">
                                    <input type="text" name="cod_contrato" value="<?= $inf['cod_contrato'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Nome/Razão Social</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nome" value="<?= $inf['nome'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">CNPJ</label>
                                <div class="col-sm-5">
                                    <input type="text" name="cnpj" id="cnpj" value="<?= $inf['cnpj'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Responsável</label>
                                <div class="col-sm-5">
                                    <input type="text" name="responsavel" value="<?= $inf['responsavel'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Serviço</label>
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_servico">
                                        <option selected><?= $inf['tipo_servico'] ?></option>
                                        <option value="Manutencao">Manutenção</option>
                                        <option value="Servico">Serviço</option>
                                        <option value="Insumos">Insumos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Situação</label>
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="situacao">
                                        <option selected><?= $inf['situacao'] ?></option>
                                        <option value="Em elaboracao">Em elaboração</option>
                                        <option value="Pendente de assinatura">Pendente de assinatura</option>
                                        <option value="Assinado">Assinado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">SLA</label>
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="sla">
                                        <option selected><?= $inf['sla'] ?></option>
                                        <option value="Critico">Crítico</option>
                                        <option value="Alto">Alto</option>
                                        <option value="Medio">Médio</option>
                                        <option value="Baixo">Baixo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Contrato</label>
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_contrato">
                                        <option selected><?= $inf['tipo_contrato'] ?></option>
                                        <option value="Receita">Receita</option>
                                        <option value="Despesa">Despesa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Data da Assinatura</label>
                                <div class="col-sm-5">
                                    <input type="text" name="data_assinatura" value="<?= date("d-m-Y", strtotime($inf['data_assinatura'])) ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Data de Cadastro</label>
                                <div class="col-sm-5">
                                    <input type="text" name="data_cadastro" value="<?= date("d-m-Y", strtotime($inf['data_cadastro'])) ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Dia de Venc. da Fatura</label>
                                <div class="col-sm-5">
                                    <input type="number" name="data_venc_fatura" value="<?= $inf['data_venc_fatura'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Inicial</label>
                                <div class="col-sm-5">
                                    <input type="text" name="prazo_inicial" value="<?= date("d-m-Y", strtotime($inf['prazo_inicial'])) ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Final</label>
                                <div class="col-sm-5">
                                    <input type="text" name="prazo_final" value="<?= date("d-m-Y", strtotime($inf['prazo_final'])) ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo de Garantia</label>
                                <div class="col-sm-5">
                                    <input type="text" name="prazo_garantia" value="<?= $inf['prazo_garantia'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Multa Por Atraso (%)</label>
                                <div class="col-sm-5">
                                    <input type="text" name="multa" value="<?= $inf['multa'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Valor da Fatura Mensal</label>
                                <div class="col-sm-5">
                                    <input type="text" name="valor_fatura" value="<?= $inf['valor_fatura'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="status">
                                        <option selected><?= $inf['status'] ?></option>
                                        <option value="Cancelado">Cancelado</option>
                                        <option value="Finalizado">Finalizado</option>
                                        <option value="Vigente">Vigente</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Observações</label>
                                <div class="col-sm-5">
                                    <input type="text" name="obs" value="<?= $inf['obs'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Documentos Anexados</label>
                                <div class="col-sm-5">
                                    <input type="file" name="anexo" value="<?= $inf['anexo'] ?>" class="form-control" id="colFormLabel">
                                </div>
                            </div>
                            <input type="hidden" name="op_pag" value="<?= $inf['op_pag'] ?>">
                        <?php } ?>
                    <?php endforeach; ?>
                    <br>
                    <div class="btn-toolbar pull-center">
                        <div class="col-sm-5">
                            <button type="submit" class="btn mr-4 btn-primary">Gravar</button>
                            <a class="btn mr-4 btn-primary" href="<?= site_url("contratocontroller/buscar_contrato") ?>">Voltar</a>
                        </div>
                    </div>
                </form>
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