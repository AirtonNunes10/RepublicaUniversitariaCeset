<html>

<head lang="en" ng-app>
  <meta charset="utf-8" />
  <link rel="icon" href="img/cesertLogo.jpg">
  <title>Cesert</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-login {
      padding: 30px 0 0 0;
      width: 350px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="img/cesertLogo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
      Casa de Estudante de Sertânia
    </a>
  </nav>

  <div class="container">
    <br><br><br>
    <div class="row">
      <div class="card-login">
        <div class="card">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <form class="center-from" method="post" action="login_controller.php">

              <input hidden id="action" name="action" value="loginUsuario">

              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group">
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
              </div>

              <?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>

                <div class="text-danger">
                  Usuário ou senha inválido(s).
                </div>

              <?php } ?>

              <?php if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>

                <div class="text-danger">
                  Faça login antes de acessar as páginas protegidas.
                </div>

              <?php } ?>

              <?php if (isset($_GET['login']) && $_GET['login'] == 'erro3') { ?>

                <div class="text-danger">
                  Acesso restrito aos estudantes.
                </div>

              <?php } ?>

              <div align="center">
                <a href="index.php"><button type="button" class="btn btn-warning">Voltar</button></a>
                <button ng-disabled="!email" type="submit" class="btn btn-primary">Logar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
    <footer align="center">
      <p>&copy; 2019 Casa do estudante de Sertânia - Cesert &middot; <a href="#">Termo</a></p>
    </footer>
</body>

</html>