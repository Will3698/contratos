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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/cadastrar_contrato") ?>">Cadastrar Contrato</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/buscar_contrato") ?>">Buscar Contratos</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/vence_contrato") ?>">Contratos Próximo a Vencer</a>
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
                            <li class="nav-item active"><a class="nav-link" href="<?= site_url("#") ?>">Home</a></li>
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
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">Buscar de Contrato Por:</label>
                    <div class="col-sm-5">
                        <select class="custom-select my-1 mr-sm-2" id="mySelect">
                            <option selected>Escolher...</option>
                            <option>Cod. Contrato</option>
                            <option>Nome/Razão Social</option>
                            <option>CNPJ</option>
                            <option>Responsável</option>
                            <option>Tipo de Serviço</option>
                            <option>Situação</option>
                            <option>SLA</option>
                            <option>Tipo de Contrato</option>
                            <option>Data de Assinatura</option>
                            <option>Data de Cadastro</option>
                            <option>Data de Venc da Fatura</option>
                            <option>Prazo Inicial</option>
                            <option>Prazo Final</option>
                            <option>Multa Por Atraso</option>
                            <option>Valor da Fatura Mensal</option>
                            <option>Valor Total do Contrato</option>
                        </select>
                        <form action="<?= site_url("contratocontroller/buscar") ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row" id="inputCod">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="cod_contrato" value="<?= _v($dados, "cod_contrato") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputNome">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nome" value="<?= _v($dados, "nome") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputCnpj">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?= _v($dados, "cnpj") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputResp">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="responsavel" value="<?= _v($dados, "responsavel") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputServico">
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_servico">
                                        <option selected><?= _v($dados, "tipo_servico") ?></option>
                                        <option value="Manutencao">Manutenção</option>
                                        <option value="Servico">Serviço</option>
                                        <option value="Insumos">Insumos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="inputSituacao">
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="situacao">
                                        <option selected><?= _v($dados, "situacao") ?></option>
                                        <option value="Em elaboracao">Em elaboração</option>
                                        <option value="Pendente de assinatura">Pendente de assinatura</option>
                                        <option value="Assinado">Assinado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="inputSla">
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="sla">
                                        <option selected><?= _v($dados, "sla") ?></option>
                                        <option value="Critico">Crítico</option>
                                        <option value="Alto">Alto</option>
                                        <option value="Medio">Médio</option>
                                        <option value="Baixo">Baixo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="inputTipoContrato">
                                <div class="col-sm-5">
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_contrato">
                                        <option selected><?= _v($dados, "tipo_contrato") ?></option>
                                        <option value="Receita">Receita</option>
                                        <option value="Despesa">Despesa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="inputAssinatura">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="data_assinatura" value="<?= _v($dados, "data_assinatura") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputDatCadastro">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="data_contrato" value="<?= _v($dados, "data_contrato") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputVencFatura">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="data_venc_fatura" value="<?= _v($dados, "data_venc_fatura") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputPrazoIni">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="prazo_inicial" value="<?= _v($dados, "prazo_inicial") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputPrazoFin">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="prazo_final" value="<?= _v($dados, "prazo_final") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputMulta">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="multa" value="<?= _v($dados, "multa") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputFaturaMensal">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="valor_fatura" value="<?= _v($dados, "valor_fatura") ?>">
                                </div>
                            </div>
                            <div class="form-group row" id="inputTotalContrato">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="valor_total" value="<?= _v($dados, "valor_total") ?>">
                                </div>
                            </div>
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
                                <th scope="col">Status de Pagamento</th>
                                <th scope="col">Detalhes do Contrato</th>
                            </tr>
                        </thead>
                        <?php foreach ($list as $inf) : ?>
                            <tbody>
                                <tr>
                                    <input type="hidden" name="id" value="<?= $inf['id'] ?>">
                                    <td><?php print $inf["cod_contrato"] ?></td>
                                    <td><?php print $inf["cnpj"] ?></td>
                                    <td><?php print $inf["nome"] ?></td>
                                    <?php if ($inf["op_pag"] != null) { ?>
                                        <td><?php print "<b><span style='color:green;'>Pago</span></b>" ?></td>
                                    <?php } else { ?>
                                        <td><?php print "<b><span style='color:red;'>Pendente</span></b>"; ?></td>
                                    <?php } ?>                                    
                                    <td><a class="btn btn-outline-primary" href="<?= site_url("contratocontroller/detalhe_contrato/?id={$inf["id"]}") ?>">Visualizar</a></td>
                                </tr>
                            </tbody>
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