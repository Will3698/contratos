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
    <script>
        window.location.href = '#ancora';
    </script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light"><b>CONTRATOS</b></div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/cadastrar_contrato") ?>">Cadastrar</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url("contratocontroller/buscar_contrato") ?>">Buscar</a>
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
                <?php foreach ($cont as $inf) : ?>
                    <?php if ($_GET['id'] == $inf['id']) { ?>
                        <input type="hidden" name="id" value="<?= $inf['id'] ?>">
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Cod. Contrato</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['cod_contrato'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Nome/Razão Social</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['nome'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">CNPJ</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['cnpj'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Responsável</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['responsavel'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Serviço</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['tipo_servico'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Situação</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['situacao'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">SLA</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['sla'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tipo de Contrato</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['tipo_contrato'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Data da Assinatura</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= date("d-m-Y", strtotime($inf['data_assinatura'])) ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Data de Cadastro</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= date("d-m-Y", strtotime($inf['data_cadastro'])) ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Dia de Venc. da Fatura</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['data_venc_fatura'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Inicial</label>
                            <div class="col-sm-5">
                                <input type="text" id="dataInicil" value="<?= date("d-m-Y", strtotime($inf['prazo_inicial'])) ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo Final</label>
                            <div class="col-sm-5">
                                <input type="text" id="dataFinal" value="<?= date("d-m-Y", strtotime($inf['prazo_final'])) ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Prazo de Garantia</label>
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <input type="text" value="<?= $inf['prazo_garantia'] ?>" class="form-control" id="colFormLabel" disabled="">
                                    <span class="input-group-text">Meses</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Multa Por Atraso (%)</label>
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <input type="text" value="<?= $inf['multa'] ?>" class="form-control" id="colFormLabel" disabled="">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Valor da Fatura Mensal</label>
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" id="fatMensal" value="<?= $inf['valor_fatura'] ?>" class="form-control" id="colFormLabel" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Valor Total do Contrato</label>
                            <div class="col-sm-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" value="<?= $inf['valor_total'] ?>" class="form-control" id="colFormLabel" disabled="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['status'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Observações</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['obs'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Documentos Anexados</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $inf['anexo'] ?>" class="form-control" id="colFormLabel" disabled="">
                            </div>
                        </div>



                        <br>
                        <div class="btn-toolbar pull-center">
                            <div class="col-sm-5">                                
                                <a class="btn mr-4 btn-primary" href="<?= site_url("contratocontroller/buscar_contrato") ?>">Voltar</a>
                                <a class="btn mr-4 btn-primary" target="_blank" href="<?= site_url("contratocontroller/pdf_contrato/{$inf['id']}") ?>">Imprimir</a>

                                <?php if ($inf['op_pag'] == null) { ?>
                                    <a class="btn mr-4 btn-primary" href="<?= site_url("contratocontroller/editar_contrato/?id={$inf["id"]}") ?>">Editar</a>
                                    <a class="btn mr-4 btn-primary" href="<?= site_url("contratocontroller/apagar_contrato/{$inf['id']}") ?>">Apagar</a><br>
                                    <br>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Pagamento
                                    </button>
                                <?php } else { ?>
                                    <br>
                                    <br>
                                    <div class="alert alert-success" role="alert">
                                        Contrato com pagamento efetuado!
                                    </div>
                                <?php } ?>

                                <form action="<?= site_url("pagamentocontroller/pagamento_contrato") ?>" method="POST" enctype="multipart/form-data">
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Realizar Pagamento</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php foreach ($cont as $inf) : ?>
                                                        <?php if ($_GET['id'] == $inf['id']) { ?>
                                                            <input type="hidden" name="id" value="<?= _v($dados, "id") ?>">

                                                            <input type="hidden" name="id_contrato_pag" value="<?= $inf['id'] ?>">

                                                            <div class="form-group row">
                                                                <label for="colFormLabel" class="col-sm-3 col-form-label">Valor Contrato</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" value="<?= $inf['valor_total'] ?>" class="form-control" id="colFormLabel" disabled="">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="colFormLabel" class="col-sm-3 col-form-label">Multa</label>
                                                                <div class="col-sm-5">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" value="<?= $inf['multa'] ?>" class="form-control" id="colFormLabel" disabled="">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="colFormLabel" class="col-sm-3 col-form-label">Valor Total</label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" value="<?= $inf['valor_pagar'] ?>" class="form-control" id="colFormLabel" disabled="">
                                                                </div>
                                                            </div>

                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-primary">Pagar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <br>
        </div>
    </div>
    <a href="#" id="ancora">
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>

</html>