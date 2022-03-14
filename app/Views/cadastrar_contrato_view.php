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
            <br>
            <div class="container-fluid">
                <form action="<?= site_url("contratocontroller/salvar") ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= _v($dados, "id") ?>">

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Cod. Contrato</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" placeholder="Cod. do contrato" name="cod_contrato" value="<?= _v($dados, "cod_contrato") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Nome/Razão Social</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" placeholder="Nome / Razão Social" name="nome" value="<?= _v($dados, "nome") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">CNPJ</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" value="<?= _v($dados, "cnpj") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Responsável</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" placeholder="Responsável" name="responsavel" value="<?= _v($dados, "responsavel") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Serviço</label>
                        <div class="col-sm-5">
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_servico" required>
                                <option selected>Escolher...</option>
                                <option value="Manutencao">Manutenção</option>
                                <option value="Servico">Serviço</option>
                                <option value="Insumos">Insumos</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Situação</label>
                        <div class="col-sm-5">
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="situacao" required>
                                <option selected>Escolher...</option>
                                <option value="Em elaboracao">Em elaboração</option>
                                <option value="Pendente de assinatura">Pendente de assinatura</option>
                                <option value="Assinado">Assinado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">SLA</label>
                        <div class="col-sm-5">
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="sla" required>
                                <option selected>Escolher...</option>
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
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipo_contrato" required>
                                <option selected>Escolher...</option>
                                <option value="Receita">Receita</option>
                                <option value="Despesa">Despesa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Data da Assinatura</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="data_assinatura" value="<?= _v($dados, "data_assinatura") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Data de Cadastro</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="data_cadastro" value="<?= _v($dados, "data_cadastro") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Dia Venc. da Fatura</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="data_venc_fatura" value="<?= _v($dados, "data_venc_fatura") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Inicial</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="prazo_inicial" value="<?= _v($dados, "prazo_inicial") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Final</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="prazo_final" value="<?= _v($dados, "prazo_final") ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo de Garantia</label>
                        <div class="col-sm-5">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Prazo de Garantia" name="prazo_garantia" value="<?= _v($dados, "prazo_garantia") ?>" required>
                                <span class="input-group-text">Meses</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Multa Por Atraso</label>
                        <div class="col-sm-5">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Multa Por Atraso (%)" name="multa" value="<?= _v($dados, "multa") ?>" required>
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Valor da Fatura Mensal</label>
                        <div class="col-sm-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text">R$</span>                                
                                <input type="number" class="form-control" id="moeda" placeholder="Valor da Fatura Mensal" name="valor_fatura" value="<?= _v($dados, "valor_fatura") ?>" required>
                            </div>
                        </div>
                    </div>                   

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Observações</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" placeholder="Observações..." name="obs" value="<?= _v($dados, "obs") ?>"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Anexar Documentos</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="anexo" value="<?= _v($dados, "anexo") ?>">
                        </div>
                    </div>

                    <input type="hidden" name="status" value="Vigente">

                    

                    <div class="form-group row">
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