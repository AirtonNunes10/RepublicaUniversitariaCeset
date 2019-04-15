<?php 

	class FuncionarioService {

		private $conexao;
		private $funcionario;
		
		public function __construct(Conexao $conexao, Funcionario $funcionario) {
			$this->conexao = $conexao->conectar();
			$this->funcionario = $funcionario;
		}

		public function salvarCadastro(){
			$query = 'insert into tb_funcionario(cpf, nome, rg, data_nascimento, sexo, estado_civil, tipo_usuario, email, senha, departamento, profissao, data_cadastro)
				values(:cpf, :nome, :rg, :dataNascimento, :sexo, :estadoCivil, :tipoUsuario, :email, :senha, :departamento, :profissao, :dataCadastro)';

			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':cpf', $this->funcionario->__get('cpf'));
			$stmt->bindValue(':nome', $this->funcionario->__get('nome'));
			$stmt->bindValue(':rg', $this->funcionario->__get('rg'));
			$stmt->bindValue(':dataNascimento', $this->funcionario->__get('dataNascimento'));
			$stmt->bindValue(':sexo', $this->funcionario->__get('sexo'));
			$stmt->bindValue(':estadoCivil', $this->funcionario->__get('estadoCivil'));
			$stmt->bindValue(':tipoUsuario', $this->funcionario->__get('tipoUsuario'));
			$stmt->bindValue(':email', $this->funcionario->__get('email'));
			$stmt->bindValue(':senha', $this->funcionario->__get('senha'));
			$stmt->bindValue(':departamento', $this->funcionario->__get('departamento'));
			$stmt->bindValue(':profissao', $this->funcionario->__get('profissao'));
			$stmt->bindValue(':dataCadastro', $this->funcionario->__get('dataCadastro'));
			
			$stmt->execute(array(
				':cpf' => $this->funcionario->__get('cpf'),
				':nome' => $this->funcionario->__get('nome'),
				':rg' => $this->funcionario->__get('rg'),
				':dataNascimento' => $this->funcionario->__get('dataNascimento'),
				':sexo' => $this->funcionario->__get('sexo'),
				':estadoCivil' => $this->funcionario->__get('estadoCivil'),
				':tipoUsuario' => $this->funcionario->__get('tipoUsuario'),
				':email' => $this->funcionario->__get('email'),
				':senha' => $this->funcionario->__get('senha'),
				':departamento' => $this->funcionario->__get('departamento'),
				':profissao' => $this->funcionario->__get('profissao'),
				':dataCadastro' => $this->funcionario->__get('dataCadastro')
				
			));

			$id_funcionario = 'select id_funcionario from tb_funcionario where cpf = '. $this->funcionario->__get('cpf');

			$resultado = $this->conexao->query($id_funcionario);
			$idFuncionario = $resultado->fetch(PDO::FETCH_OBJ);

			$query = 'insert into tb_endereco(cep, endereco, numero, bairro, cidade, uf, complemento, id_funcionario)
				values(:cep, :endereco, :numero, :bairro, :cidade, :uf, :complemento, '. $idFuncionario->id_funcionario.')';

			$query = $this->conexao->prepare($query);

			$query->bindValue(':cep', $this->funcionario->__get('cep'));
			$query->bindValue(':endereco', $this->funcionario->__get('endereco'));
			$query->bindValue(':numero', $this->funcionario->__get('numero'));
			$query->bindValue(':bairro', $this->funcionario->__get('bairro'));
			$query->bindValue(':cidade', $this->funcionario->__get('cidade'));
			$query->bindValue(':uf', $this->funcionario->__get('uf'));
			$query->bindValue(':complemento', $this->funcionario->__get('complemento'));

			$query->execute(array(
				':cep' => $this->funcionario->__get('cep'),
				':endereco' => $this->funcionario->__get('endereco'),
				':numero' => $this->funcionario->__get('numero'),
				':bairro' => $this->funcionario->__get('bairro'),
				':cidade' => $this->funcionario->__get('cidade'),
				':uf' => $this->funcionario->__get('uf'),
				':complemento' => $this->funcionario->__get('complemento')
			));

			$query = 'insert into tb_telefone(ddd_celular1, telefone_celular1, ddd_celular2, telefone_celular2, ddd_residencial, telefone_residencial, id_funcionario)
				values(:dddCelular1, :telefoneCelular1, :dddCelular2, :telefoneCelular2, :dddResidencial, :telefoneResidencial, '. $idFuncionario->id_funcionario.')';

			$query = $this->conexao->prepare($query);

			$query->bindValue(':dddCelular1', $this->funcionario->__get('dddCelular1'));
			$query->bindValue(':telefoneCelular1', $this->funcionario->__get('telefoneCelular1'));
			$query->bindValue(':dddCelular2', $this->funcionario->__get('dddCelular2'));
			$query->bindValue(':telefoneCelular2', $this->funcionario->__get('telefoneCelular2'));
			$query->bindValue(':dddResidencial', $this->funcionario->__get('dddResidencial'));
			$query->bindValue(':telefoneResidencial', $this->funcionario->__get('telefoneResidencial'));

			$query->execute(array(
				':dddCelular1' => $this->funcionario->__get('dddCelular1'),
				':telefoneCelular1' => $this->funcionario->__get('telefoneCelular1'),
				':dddCelular2' => $this->funcionario->__get('dddCelular2'),
				':telefoneCelular2' => $this->funcionario->__get('telefoneCelular2'),
				':dddResidencial' => $this->funcionario->__get('dddResidencial'),
				':telefoneResidencial' => $this->funcionario->__get('telefoneResidencial')
			));

		}

		public function consultarCadastro(){

		}

		public function editarCadastro(){
		
		}

		public function excluirCadastro(){
			
		}
	}

?>