<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-sm-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar</h4>
            </div>
            <div class="modal-body col-sm-12">


                <form class="center-from" method="post" id="EditformCadastro">
                    <h5 class="featurette-heading"><span class="text-muted">Dados pessoais</span></h5>
                    <div class="row ">

                        <input hidden id="Editaction" name="action" value="none">
                        <input hidden id="idEstudante" name="idEstudante" value="-123">
                        <input hidden id="idUsuario" name="idUsuario" value="-123">
                        <input hidden id="idFuncionario" name="idFuncionario" value="-123">

                        <div class="form-group col-sm-4">
                            <label for="cpf">CPF</label>
                            <input name="cpf" type="text" readonly ng-model="cpf" class="form-control" id="Editcpf" placeholder="000.000.000-00">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="nome">Nome</label>
                            <input name="nome" type="text" required ng-model="nome" class="form-control" id="Editnome" placeholder="Nome completo">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="rg">RG</label>
                            <input name="rg" type="text" required ng-model="rg" class="form-control" id="Editrg" placeholder="0000000">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-4">
                            <label for="dataNascimento">Data nasc.</label>
                            <input name="dataNascimento" type="date" required ng-model="dataNascimento" class="form-control" id="EditdataNascimento" placeholder="dd/mm/aaaa">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="Editsexo" required ng-model="sexo" class="form-control">
                                <option value="">Selecione</option>
                                <option value="F">Femino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="estadoCivil">Estado civil</label>
                            <select name="estadoCivil" id="EditestadoCivil" required ng-model="estadoCivil" class="form-control">
                                <option value="">Selecione</option>
                                <option>Solteiro</option>
                                <option>Casado</option>
                                <option>Divorciado</option>
                                <option>Viúvo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-4">
                            <label for="tipoUsuario">Tipo</label>
                            <select  readonly name="tipoUsuario" id="EdittipoUsuario" required ng-model="tipoUsuario" class="form-control" onchange="changeType()">
                                <option value="">Selecione</option>
                                <option value="1">Administrador</option>
                                <option value="2">Estudante</option>
                                <option value="3">Funcionario</option>
                                <option value="4">Tesoureiro</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="email">E-mail</label>
                            <input name="email" type="text" required ng-model="email" class="form-control" id="Editemail" placeholder="example@gmail.com">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="senha">Senha</label>
                            <input name="senha" type="password" required ng-model="senha" class="form-control" id="Editsenha" placeholder="*********">
                        </div>
                    </div>

                    <!-- ENDEREÇO -->

                    <div class="row ">
                        <div class="borda"></div>
                        <h5 class="featurette-heading"><span class="text-muted">Endereço</span></h5>
                        <div class="form-group col-sm-4">
                            <label for="cep">CEP</label>
                            <input name="cep" type="text" required ng-model="cep" class="form-control" id="Editcep" placeholder="00000-000">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="endereco">Endereço</label>
                            <input name="endereco" type="text" required ng-model="endereco" class="form-control" id="Editendereco" placeholder="Endereço">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="numero">Número</label>
                            <input name="numero" type="numeric" required ng-model="numero" class="form-control" id="Editnumero" placeholder="00">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="bairro">Bairro</label>
                            <input name="bairro" type="text" required ng-model="bairro" class="form-control" id="Editbairro" placeholder="Bairro">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="cidade">Cidade</label>
                            <input name="cidade" type="text" required ng-model="cidade" class="form-control" id="Editcidade" placeholder="Cidade">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="uf">UF</label>
                            <select name="uf" id="Edituf" required ng-model="uf" class="form-control">
                                <option value="">Selecione</option>
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
                                <option>PE</option>
                                <option>PI</option>
                                <option>PR</option>
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
                            <input name="complemento" type="text" ng-model="complemento" class="form-control" id="Editcomplemento" placeholder="Complemento">
                        </div>
                    </div>

                    <!-- TELEFONES --> 

                    <div class="row ">
                        <div class="borda"></div>
                        <h5 class="featurette-heading"><span class="text-muted">Telefones para contato</span></h5>
                        <div class="form-group col-sm-4">
                            <label for="celular1">Celular 1</label>
                            <input name="celular" type="numeric" required ng-model="celular1" class="form-control" id="Editcelular1" placeholder="(00)00000-0000">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="celular2">Celular 2</label>
                            <input name="celular2" type="numeric" ng-model="celular2" class="form-control" id="Editcelular2" placeholder="(00)00000-0000">
                        </div>
                    </div>

                    <!-- DEPARTAMENTO E PROFISSAO -->

                    <div id="EditareaFuncionario">
                        <div class="row ">
                            <div class="borda"></div>
                            <h5 class="featurette-heading"><span class="text-muted">Departamento e Profissão</span></h5>
                            <div class="form-group col-sm-4">
                                <label for="departamento">Departamento</label>
                                <input name="departamento" type="text" ng-model="departamento" class="form-control" id="Editdepartamento" placeholder="Área de trabalho">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="profissao">Profissão</label>
                                <input name="profissao" type="text" ng-model="profissao" class="form-control" id="Editprofissao" placeholder="Profissao">
                            </div>
                        </div>
                    </div>

                    <!-- ESTUDANTE -->

                    <div id="EditareaEstudante">
                        <div class="row ">
                            <div class="borda"></div>
                            <h5 class="featurette-heading"><span class="text-muted">Escolaridade</span></h5>
                            <div class="form-group col-sm-4">
                                <label for="instituicao">Instituição</label>
                                <input name="instituicao" type="text" ng-model="instituicao" class="form-control" id="Editinstituicao" placeholder="Instituição">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="matricula">Matricula</label>
                                <input name="matricula" type="text" ng-model="matricula" class="form-control" id="Editmatricula" placeholder="Matricula">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="escolaridade">Nível escolaridade</label>
                                <select name="escolaridade" id="Editescolaridade" class="form-control">
                                    <option value="">Selecione</option>
                                    <option>Fundamental</option>
                                    <option>Médio</option>
                                    <option>Superior</option>
                                    <option>Técnico</option>
                                </select>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group col-sm-4">
                                <label for="dataInicioCurso">Data início curso</label>
                                <input name="dataInicioCurso" type="date" ng-model="dataInicioCurso" class="form-control" id="EditdataInicioCurso" placeholder="dd/mm/aaaa">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="dataFinalCurso">Data final curso</label>
                                <input name="dataFinalCurso" type="date" ng-model="dataFinalCurso" class="form-control" id="EditdataFinalCurso" placeholder="dd/mm/aaaa">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="periodo">Periódo atual</label>
                                <input name="periodo" type="numeric" ng-model="periodo" class="form-control" id="Editperiodo" placeholder="Periódo atual">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group col-sm-4">
                                <label for="Editcurso">Curso</label>
                                <select data-placeholder="Selecione" required class="standardSelect form-control" tabindex="1" multiple name="curso[]" id="Editcurso" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer col-sm-12">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="salvarEdicaoUsuario()">Salvar</button>
            </div>
        </div>

    </div>
</div>