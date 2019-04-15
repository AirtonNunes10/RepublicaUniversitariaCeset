<!DOCTYPE html>
<html lang="en" ng-app="pessoasModulo">
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

    <script src="controller/pessoa.js"></script>

    <!-- Estilos personalizados para este modelo -->
    <link href="css/starter-template.css" rel="stylesheet">

  </head>

  <body ng-controller="pessoasController">

    <!-- MENU GERAL -->
    <div ng-include src="'menu.php'"></div>

    <br>

    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#cadastrarEstudante" aria-controls="cadastrarEstudante" role="tab" data-toggle="tab">Cadastrar Estudantes</a></li>
          <li role="presentation"><a href="#consultarEstudante" aria-controls="consultarEstudante" role="tab" data-toggle="tab">Consultar Estudantes</a></li>
        </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="cadastrarEstudante">
          <br>
          <!-- DADOS estudanteIS -->
          <div class="container">
            <form class="center-from" method="post" action="estudante_controller.php">
              <h5 class="featurette-heading"><span class="text-muted">Dados estudantes</span></h5>
              <div class="form-group col-sm-4">
                <label for="cpf">CPF</label>
                <input name="cpf" type="text" required ng-model="cpf" class="form-control" id="cpf" placeholder="xxx.xxx.xxx-xx">
              </div>
              <div class="form-group col-sm-4">
                <label for="nome">Nome completo</label>
                <input name="nome" type="text" required ng-model="nome" class="form-control" id="nome" placeholder="Nome completo">
              </div>
              <div class="form-group col-sm-4">
                <label for="rg">RG</label>
                <input name="rg" type="text" required ng-model="rg" class="form-control" id="rg" placeholder="0000000">
              </div>
              <div class="form-group col-sm-4">
                <label for="dataNascimento">Data de nascimento</label>
                <input name="dataNascimento" type="date" required ng-model="dataNascimento" class="form-control" id="dataNascimento" placeholder="dd/mm/aaaa">
              </div>
              <div class="form-group col-sm-4">
                <label for="sexo">Sexo</label>
                  <select name="sexo" class="form-control">
                    <option></option>
                    <option>Femino</option>
                    <option>Marculino</option>
                  </select>
              </div>
              <div class="form-group col-sm-4">
                <label for="estadoCivil">Estado civil</label>
                  <select name="estadoCivil"  class="form-control">
                    <option></option>
                    <option>Solteiro</option>
                    <option>Casado</option>
                    <option>Separado</option>
                    <option>Divorciado</option>
                    <option>Viúvo</option>
                  </select>
              </div>
              <div class="form-group col-sm-4">
                <label for="tipoUsuario">Tipo de usuário</label>
                <select name="tipoUsuario" class="form-control">
                  <option></option>
                  <option>Administrador</option>
                  <option>Estudante</option>
                  <option>Funcionário</option>
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label for="email">Email</label>
                <input name="email" type="text" required ng-model="email" class="form-control" id="email" placeholder="example@gmail.com">
              </div>
              <div class="form-group col-sm-4">
                <label for="senha">Senha</label>
                <input name="senha" type="password" required ng-model="senha" class="form-control" id="senha" placeholder="*********">
              </div>
            </form>
          </div>
          <br>
          <div class="borda"></div>
          <!-- ENDERECO -->
          <div class="container">
            <form class="center-from">
              <h5 class="featurette-heading"><span class="text-muted">Endereço</span></h5>
              <div class="form-group col-sm-4">
                <label for="cep">CEP</label>
                <input name="cep" type="text" ng-model="cep" class="form-control" id="cep" placeholder="00000-000">
              </div>
              <div class="form-group col-sm-4">
                <label for="endereco">Endereço</label>
                <input name="endereco" type="text" ng-model="endereco" class="form-control" id="endereco" placeholder="Endereço">
              </div>
              <div class="form-group col-sm-4">
                <label for="numero">Número</label>
                <input name="numero" type="numeric" ng-model="numero" class="form-control" id="numero" placeholder="0">
              </div>
              <div class="form-group col-sm-4">
                <label for="bairro">Bairro</label>
                <input name="bairro" type="text" ng-model="bairro" class="form-control" id="bairro" placeholder="Bairro">
              </div>
              <div class="form-group col-sm-4">
                <label for="cidade">Cidade</label>
                <input name="cidade" type="text" ng-model="cidade" class="form-control" id="cidade" placeholder="Cidade">
              </div>
              <div class="form-group col-sm-4">
                <label for="uf">UF</label>
                  <select name="uf" class="form-control">
                    <option></option>
                    <option>AC</option>
                    <option>AL</option>
                    <option>AP</option>
                    <option>AM</option>
                    <option>BA</option>
                    <option>CE</option>
                    <option>DF</option>
                    <option>ES</option>
                    <option>GO</option>
                    <option>MA</option>
                    <option>MT</option>
                    <option>MS</option>
                    <option>MG</option>
                    <option>PA</option>
                    <option>PB</option>
                    <option>PR</option>
                    <option>PE</option>
                    <option>PI</option>
                    <option>RJ</option>
                    <option>RN</option>
                    <option>RS</option>
                    <option>RO</option>
                    <option>RR</option>
                    <option>SC</option>
                    <option>SP</option>
                    <option>SE</option>
                    <option>TO</option>
                  </select>
              </div>
              <div class="form-group col-sm-4">
                <label for="complemento">Complemento</label>
                <input name="complemento" type="text" ng-model="complemento" class="form-control" id="complemento" placeholder="Complemento">
              </div>
            </form>
          </div>
          <br>
          <div class="borda"></div>
          <!-- TELEFONE PARA CONTATO -->
          <div class="container">
            <form class="center-from">
              <h5 class="featurette-heading"><span class="text-muted">Telefones para contato</span></h5>
              <div class="form-group col-sm-4">
                <label for="dddCelular1">DDD 1</label>
                <input name="dddCelular1" type="numeric" ng-model="dddCelular1" class="form-control" id="dddCelular1" placeholder="00">
              </div>
              <div class="form-group col-sm-4">
                <label for="telefoneCelular1">Celular 1</label>
                <input name="telefoneCelular1" type="numeric"  ng-model="telefoneCelular1" class="form-control" id="telefoneCelular1" placeholder="00000-0000">
              </div>
              <div class="form-group col-sm-4">
                <label for="dddCelular2">DDD 2</label>
                <input name="dddCelular2" type="numeric" ng-model="dddCelular2" class="form-control" id="dddCelular2" placeholder="00">
              </div>
              <div class="form-group col-sm-4">
                <label for="telefoneCelular2">Celular 2</label>
                <input name="telefoneCelular2" type="numeric" ng-model="telefoneCelular2" class="form-control" id="telefoneCelular2" placeholder="00000-0000">
              </div>
              <div class="form-group col-sm-4">
                <label for="dddResidencial">DDD Fixo</label>
                <input name="dddResidencial" type="numeric" ng-model="dddResidencial" class="form-control" id="dddResidencial" placeholder="00">
              </div>
              <div class="form-group col-sm-4">
                <label for="telefoneFixo">Telefone fixo</label>
                <input name="telefoneResidencial" type="numeric" ng-model="telefoneResidencial" class="form-control" id="telefoneResidencial" placeholder="0000-0000">
              </div>
            </form>
          </div>
          <br>
          <div class="borda"></div>
          <!-- ESCOLARIDADE -->
          <div class="container">
            <form class="center-from" method="post" action="estudante_controller.php">
              <h5 class="featurette-heading"><span class="text-muted">Escolaridade</span></h5>
             <div class="form-group col-sm-4">
                <label for="instituicao">Instituição</label>
                <input name="instituicao" type="text" required ng-model="instituicao" class="form-control" id="instituicao" placeholder="Instituição">
              </div>
              <div class="form-group col-sm-4">
                <label for="matricula">Matricula</label>
                <input name="matricula" type="text" required ng-model="matricula" class="form-control" id="matricula" placeholder="Matricula">
              </div>
              <div class="form-group col-sm-4">
                <label for="curso">Curso</label>
                <input name="curso" type="text" required ng-model="curso" class="form-control" id="curso" placeholder="Curso">
              </div>
              <div class="form-group col-sm-4">
                <label for="dataInicioCurso">Data de início do curso</label>
                <input name="dataInicioCurso" type="date" required ng-model="dataInicioCurso" class="form-control" id="dataInicioCurso" placeholder="dd/mm/aaaa">
              </div>
              <div class="form-group col-sm-4">
                <label for="dataFinalCurso">Data final do curso</label>
                <input name="dataFinalCurso" type="date" required ng-model="dataFinalCurso" class="form-control" id="dataFinalCurso" placeholder="dd/mm/aaaa">
              </div>
              <div class="form-group col-sm-4">
                <label for="periodo">Periódo atual</label>
                <input name="periodo" type="numeric" required ng-model="periodo" class="form-control" id="periodo" placeholder="Periódo atual">
              </div>
              <div class="form-group col-sm-4">
                <label for="escolaridade">Nível escolaridade</label>
                <select name="escolaridade" class="form-control">
                  <option></option>
                  <option>Fundamental</option>
                  <option>Médio</option>
                  <option>Técnico</option>
                  <option>Superior</option>
                </select>
              </div>
            </form>
          </div>
          <div class="borda"></div>
          <br>
          <div class="center-button" align="center">
            <button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
            <button ng-disabled="!cpf" type="submit" class="btn btn-primary" >Salvar</button>
          </div>
          <br>
        </div><!-- /.container -->

        <!-- ALTERAR CADASTRO ESTUDANTE -->
        <div role="tabpanel" class="tab-pane" id="consultarEstudante">
        <br>
          <div class="container">
            <br>
            <form class="form-horizontal">
                <div class="form-group">
                <label for="pesquisa" class="col-sm-2 control-label">Pesquisar</label>
                <div class="col-sm-5">
                  <input type="text" ng-model="pesquisaPessoa" class="form-control" id="pesquisaPes" placeholder="Digita o nome">
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
            <th>CPF</th>
            <th>Nome completo</th>
            <th>Instituição</th>
            <th>Curso</th>
            <th>Matrícula</th>
            <th>Período atual</th>
            <th>Data final do curso</th>
            <th>Editar / Excuir</th>
            <tr ng-repeat="pessoaTabela in pessoa | filter:pesquisaPessoa">
              <td>{{pessoaTabela.codigo}}</td>
              <td>{{pessoaTabela.cpf}}</td>
              <td>{{pessoaTabela.nome}}</td>
              <td>{{pessoaTabela.instituicao}}</td>
              <td>{{pessoaTabela.curso}}</td>
              <td>{{pessoaTabela.matricula}}</td>
              <td>{{pessoaTabela.periodo}}</td>
              <td>{{pessoaTabela.dataFinalCurso}}</td>
              <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-editar-usuario" ng-click="selecionaPessoa(pessoaTabela)">Editar</button>
                  <button type="button" ng-click="selecionaPessoa(pessoaTabela);excluir()" class="btn btn-danger">Excluir</button></td>
            </tr>
          </table>

          <!--MODAL-->
          <div class="modal fade" id="modal-editar-usuario" tabindex="-1" role="dialog">
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
                      <h5 class="featurette-heading"><span class="text-muted">Dados pessoais</span></h5>
                      <div class="form-group col-sm-4">
                        <label for="cpf">CPF</label>
                        <input type="text" ng-model="pessoa.cpf" class="form-control" id="cpf" placeholder="xxx.xxx.xxx-xx">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="nome">Nome completo</label>
                        <input type="text" ng-model="pessoa.nome" class="form-control" id="nome" placeholder="Nome completo">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="rg">RG</label>
                        <input type="numeric" ng-model="pessoa.rg" class="form-control" id="rg" placeholder="0000000">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="dataNasc">Data de nascimento</label>
                        <input type="text" ng-model="pessoa.dataNasc" class="form-control" id="dataNasc" placeholder="dd/mm/aaaa">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="sexo">Sexo</label>
                          <select class="form-control">
                            <option></option>
                            <option>Femino</option>
                            <option>Marculino</option>
                          </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="estadoCivil">Estado civil</label>
                        <select class="form-control">
                          <option></option>
                          <option>Solteiro</option>
                          <option>Casado</option>
                          <option>Separado</option>
                          <option>Divorciado</option>
                          <option>Viúvo</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="email">Email</label>
                        <input type="email" ng-model="pessoa.email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="tipoUsuario">Tipo de usuário</label>
                        <select class="form-control">
                          <option></option>
                          <option>Administrador</option>
                          <option>Estudante</option>
                          <option>Funcionario</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="senha">Senha</label>
                        <input type="password" ng-model="pessoa.senha" class="form-control" id="senha" placeholder="*********">
                      </div>
                    </form>
                  </div>
                  <br>
                  <!-- ENDERECO -->
                  <div class="form-group">
                    <form class="center-from">
                      <h5 class="featurette-heading"><span class="text-muted">Endereço</span></h5>
                      <div class="form-group col-sm-4">
                        <label for="cep">CEP</label>
                        <input type="numeric" ng-model="pessoa.cep" class="form-control" id="cep" placeholder="CEP">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="endereco">Endereço</label>
                        <input type="text" ng-model="pessoa.endereco" class="form-control" id="endereco" placeholder="Endereço">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="numeroEnd">Número</label>
                        <input type="numeric" ng-model="pessoa.numeroEnd" class="form-control" id="numeroEnd" placeholder="Número">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" ng-model="pessoa.bairro" class="form-control" id="bairro" placeholder="Bairro">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" ng-model="pessoa.cidade" class="form-control" id="cidade" placeholder="Cidade">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="uf">UF</label>
                        <select class="form-control">
                          <option></option>
                          <option>AC</option>
                          <option>AL</option>
                          <option>AP</option>
                          <option>AM</option>
                          <option>BA</option>
                          <option>CE</option>
                          <option>DF</option>
                          <option>ES</option>
                          <option>GO</option>
                          <option>MA</option>
                          <option>MT</option>
                          <option>MS</option>
                          <option>MG</option>
                          <option>PA</option>
                          <option>PB</option>
                          <option>PR</option>
                          <option>PE</option>
                          <option>PI</option>
                          <option>RJ</option>
                          <option>RN</option>
                          <option>RS</option>
                          <option>RO</option>
                          <option>RR</option>
                          <option>SC</option>
                          <option>SP</option>
                          <option>SE</option>
                          <option>TO</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-12">
                        <label for="complemento">Complemento</label>
                        <input type="text" ng-model="pessoa.complemento" class="form-control" id="complemento" placeholder="Complemento">
                      </div>
                    </form>
                  </div>
                  <br>
                  <!-- TELEFONE PARA CONTATO -->
                  <div class="form-group">
                    <form class="center-from">
                      <h5 class="featurette-heading"><span class="text-muted">Telefones para contato</span></h5>
                      <div class="form-group col-sm-4">
                        <label for="ddd1">DDD 1</label>
                        <input type="text" ng-model="pessoa.ddd1" class="form-control" id="ddd1" placeholder="00">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="celular1">Celular 1</label>
                        <input type="text" ng-model="pessoa.celular1" class="form-control" id="celular1" placeholder="00000-0000">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="ddd2">DDD 2</label>
                        <input type="text" ng-model="pessoa.ddd2" class="form-control" id="ddd2" placeholder="00">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="celular2">Celular 2</label>
                        <input type="text" ng-model="pessoa.celular2" class="form-control" id="celular2" placeholder="00000-0000">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="dddFixo">DDD Fixo</label>
                        <input type="text" ng-model="pessoa.dddFixo" class="form-control" id="dddFixo" placeholder="00">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="telefoneFixo">Telefone fixo</label>
                        <input type="text" ng-model="pessoa.telefoneFixo" class="form-control" id="telefoneFixo" placeholder="0000-0000">
                      </div>
                    </form>
                  </div>
                  <br>
                  <!-- ESCOLARIDADE -->
                  <div class="form-group">
                    <form class="center-from">
                      <h5 class="featurette-heading"><span class="text-muted">Escolaridade</span></h5>
                     <div class="form-group col-sm-4">
                        <label for="instituicao">Instituição</label>
                        <input type="text" ng-model="pessoa.instituicao" class="form-control" id="instituicao" placeholder="Instituição">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="matricula">Matricula</label>
                        <input type="text" ng-model="pessoa.matricula" class="form-control" id="matricula" placeholder="Matricula">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="curso">Curso</label>
                        <select class="form-control" ng-model="pessoa.cursoModel"
                         ng-options="curso.nome for curso in curso track by curso.codigo">
                    </select>
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="dataFinalCurso">Data final do curso</label>
                        <input type="text" ng-model="pessoa.dataFinalCurso" class="form-control" id="dataFinalCurso" placeholder="dd/mm/aaaa">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="periodoAtual">Periódo atual</label>
                        <input type="numeric" ng-model="pessoa.periodo" class="form-control" id="periodoAtual" placeholder="Periódo atual">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="escolaridade">Nível escolaridade</label>
                        <select class="form-control">
                          <option></option>
                          <option>Fundamental</option>
                          <option>Médio</option>
                          <option>Técnico</option>
                          <option>Superior</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
                <br><br><br><br><br><br><br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                  <button type="submit" ng-click="salvarPessoa()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
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