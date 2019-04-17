<!DOCTYPE html>
<html lang="en" ng-app="cursosModulo">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 metatags acima * devem * vir em primeiro lugar na cabeça; qualquer outro conteúdo principal deve vir * depois * dessas tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/cesertLogo.jpg">
    <script src="js/angular.min.js"></script>

    <title>Cesert</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="controller/curso.js"></script>

    <!-- Estilos personalizados para este modelo -->
    <link href="css/starter-template.css" rel="stylesheet">

  </head>

  <body ng-controller="cursosController">

    <!-- MENU GERAL -->
    <div ng-include src="'menu.php'"></div>

    <br>

    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#cadastrarCurso" aria-controls="cadastrarCurso" role="tab" data-toggle="tab">Cadastrar Curso</a></li>
          <li role="presentation"><a href="#consultarCurso" aria-controls="consultarCurso" role="tab" data-toggle="tab">Consultar Curso</a></li>
        </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="cadastrarCurso">
          <br>
          <!-- DADOS estudanteIS -->
          <div class="container">
            <form class="center-from">
              <h5 class="featurette-heading"><span class="text-muted">Dados do Curso</span></h5>
              <div class="form-group col-sm-3">
                <label for="codigo">Código</label>
                <input name="codigo" type="numeric" readonly ng-model="codigo" class="form-control" id="codigo" placeholder="codigo">
              </div>
              <div class="form-group col-sm-3">
                <label for="nome">Sigla</label>
                <input name="sigla" type="text" required ng-model="sigla" class="form-control" id="nome" placeholder="SI">
              </div>
              <div class="form-group col-sm-6">
                <label for="nome">Nome</label>
                <input name="curso" type="text" required ng-model="nome" class="form-control" id="nome" placeholder="Nome">
              </div>
            </form>
          </div>
          <br>
          <div class="borda"></div>
          <br>
          <div class="center-button" align="center">
            <button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
            <button ng-disabled="!nome" type="submit" ng-click="salvarCurso();limparCampos()" class="btn btn-primary">Salvar</button>
          </div>
          <br>
        </div><!-- /.container -->

        <!-- ALTERAR CADASTRO ESTUDANTE -->
        <div role="tabpanel" class="tab-pane" id="consultarCurso">
        <br>
          <div class="container">
            <br>
            <form class="form-horizontal">
                <div class="form-group">
                <label for="pesquisa" class="col-sm-2 control-label">Pesquisar</label>
                <div class="col-sm-5">
                  <input type="text" ng-model="pesquisaCurso" class="form-control" id="pesquisaCur" placeholder="Digita o nome">
                </div>
                  <button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
                  <button type="button" class="btn btn-info">Listar</button>
                </div>
            </form>
          </div><!-- /.container -->
          <br>
          <div class="borda"></div>

          <!-- Tabela para listar os usuários -->
          <table class="table table-striped table-hover">
            <th>Código</th>
            <th>Sigla</th>
            <th>Nome</th>
            <th>Editar / Excuir</th>
            <tr ng-repeat="cursoTabela in curso | filter:pesquisaCurso">
              <td>{{cursoTabela.codigo}}</td>
              <td>{{cursoTabela.sigla}}</td>
              <td>{{cursoTabela.nome}}</td>
              <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-editar-curso" ng-click="selecionaCurso(cursoTabela)">Editar</button>
                  <button type="button" ng-click="selecionaCurso(cursoTabela);excluir()" class="btn btn-danger">Excluir</button></td>
            </tr>
          </table>

          <!--MODAL-->
          <div class="modal fade" id="modal-editar-curso" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Alterar cadastro</h4>
                </div>
                <div class="modal-body">
                <!-- DADOS PESSOAIS --> 
                  <div class="form-group"> 
                    <form class="center-from">
                      <h5 class="featurette-heading"><span class="text-muted">Dados do Curso</span></h5>
                      <div class="form-group col-sm-3">
                        <label for="codigo">Código</label>
                        <input type="text" readonly ng-model="curso.codigo" class="form-control" id="cpf" placeholder="xxx">
                      </div>
                      <div class="form-group col-sm-3">
                        <label for="nome">Sigla</label>
                        <input type="text" ng-model="curso.sigla" class="form-control" id="nome" placeholder="SI">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="nome">Nome</label>
                        <input type="text" ng-model="curso.nome" class="form-control" id="nome" placeholder="Nome">
                      </div>
                    </form>
                  </div>
                  <br>
                </div>
                <br><br><br><br><br><br><br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                  <button type="submit" ng-click="salvarCurso();limparCampos()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
        </div><!-- Nav tabs -->

      </div><!-- Nav tabs -->
    </div><!-- Nav tabs -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Colocado no final do documento para que as páginas sejam carregadas mais rapidamente -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>