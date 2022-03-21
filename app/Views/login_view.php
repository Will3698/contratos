<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Login</title>
    </script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="icon" href="<?= base_url("images/vt.png") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/tela_login.css") ?>" />

</head>

<body>

    <div class="card" id="telaLogin">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <div style="text-align-last: center;">
                <h4>GERÊNCIA DE CONTRATOS</h4>
            </div>
            <form method="post" action="<?= site_url("home/pagina_inicial") ?>">
                <div class="mb-3">
                    <label>Login</label>
                    <input type="email" name="email" class="form-control" id="" aria-describedby="Informe seu email">
                </div>
                <div class="mb-3">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" id="" aria-describedby="Informe sua senha">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
        </div>
    </div>
</body>

</html>