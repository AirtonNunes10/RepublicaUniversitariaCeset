<?php 
	header('Content-Type: text/html; charset=utf-8');
	class EstudanteService {

		private $conexao;
		private $estudante;
		
		public function __construct(Conexao $conexao, Estudante $estudante) {
			$this->conexao = $conexao->conectar();
			$this->estudante = $estudante;
		}

		public function salvarCadastro(){
			$query = 'insert into tb_estudante(cpf, nome, rg, data_nascimento, sexo, estado_civil, tipo_usuario, email, senha, instituicao, matricula, curso, data_inicio_curso, data_final_curso, periodo, escolaridade)
				values(:cpf, :nome, :rg, :dataNascimento, :sexo, :estadoCivil, :tipoUsuario, :email, :senha, :instituicao, :matricula, :curso, :dataInicioCurso, :dataFinalCurso, :periodo, :escolaridade)';

			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':cpf', preg_replace('~\D~', '', $this->estudante->__get('cpf')));
			$stmt->bindValue(':nome', $this->estudante->__get('nome'));
			$stmt->bindValue(':rg', preg_replace('~\D~', '', $this->estudante->__get('rg')));
			$stmt->bindValue(':dataNascimento', $this->estudante->__get('dataNascimento'));
			$stmt->bindValue(':sexo', $this->estudante->__get('sexo'));
			$stmt->bindValue(':estadoCivil', $this->estudante->__get('estadoCivil'));
			$stmt->bindValue(':tipoUsuario', $this->estudante->__get('tipoUsuario'));
			$stmt->bindValue(':email', $this->estudante->__get('email'));
			$stmt->bindValue(':senha', $this->estudante->__get('senha'));
			$stmt->bindValue(':instituicao', $this->estudante->__get('instituicao'));
			$stmt->bindValue(':matricula', $this->estudante->__get('matricula'));
			$stmt->bindValue(':curso', $this->estudante->__get('curso'));
			$stmt->bindValue(':dataInicioCurso', $this->estudante->__get('dataInicioCurso'));
			$stmt->bindValue(':dataFinalCurso', $this->estudante->__get('dataFinalCurso'));
			$stmt->bindValue(':periodo', $this->estudante->__get('periodo'));
			$stmt->bindValue(':escolaridade', $this->estudante->__get('escolaridade'));
			
			$stmt->execute(array(
				':cpf' => $this->estudante->__get('cpf'),
				':nome' => $this->estudante->__get('nome'),
				':rg' => $this->estudante->__get('rg'),
				':dataNascimento' => $this->estudante->__get('dataNascimento'),
				':sexo' => $this->estudante->__get('sexo'),
				':estadoCivil' => $this->estudante->__get('estadoCivil'),
				':tipoUsuario' => $this->estudante->__get('tipoUsuario'),
				':email' => $this->estudante->__get('email'),
				':senha' => $this->estudante->__get('senha'),
				':instituicao' => $this->estudante->__get('instituicao'),
				':matricula' => $this->estudante->__get('matricula'),
				':curso' => $this->estudante->__get('curso'),
				':dataInicioCurso' => $this->estudante->__get('dataInicioCurso'),
				':dataFinalCurso' => $this->estudante->__get('dataFinalCurso'),
				':periodo' => $this->estudante->__get('periodo'),
				':escolaridade' => $this->estudante->__get('escolaridade')
				
			));

			$id_estudante = 'select id_estudante from tb_estudante where cpf = "'. $this->estudante->__get('cpf') . '"';

			$resultado = $this->conexao->query($id_estudante);
			$idEstudante = $resultado->fetch(PDO::FETCH_OBJ);
			/*
			echo '<pre>';
				print_r($idEstudante);
			echo '</pre>';

			echo $idEstudante->id_estudante;
			*/
			$query = 'insert into tb_endereco(cep, endereco, numero, bairro, cidade, uf, complemento, id_estudante)
				values(:cep, :endereco, :numero, :bairro, :cidade, :uf, :complemento, '. $idEstudante->id_estudante.')';

			$query = $this->conexao->prepare($query);

			$query->bindValue(':cep', preg_replace('~\D~', '', $this->estudante->__get('cep')));
			$query->bindValue(':endereco', $this->estudante->__get('endereco'));
			$query->bindValue(':numero', $this->estudante->__get('numero'));
			$query->bindValue(':bairro', $this->estudante->__get('bairro'));
			$query->bindValue(':cidade', $this->estudante->__get('cidade'));
			$query->bindValue(':uf', $this->estudante->__get('uf'));
			$query->bindValue(':complemento', $this->estudante->__get('complemento'));

			$query->execute(array(
				':cep' => $this->estudante->__get('cep'),
				':endereco' => $this->estudante->__get('endereco'),
				':numero' => $this->estudante->__get('numero'),
				':bairro' => $this->estudante->__get('bairro'),
				':cidade' => $this->estudante->__get('cidade'),
				':uf' => $this->estudante->__get('uf'),
				':complemento' => $this->estudante->__get('complemento')
			));

			$query = 'insert into tb_telefone(ddd_celular1, telefone_celular1, ddd_celular2, telefone_celular2, ddd_residencial, telefone_residencial, id_estudante)
				values(:dddCelular1, :telefoneCelular1, :dddCelular2, :telefoneCelular2, :dddResidencial, :telefoneResidencial, '. $idEstudante->id_estudante.')';

			$query = $this->conexao->prepare($query);

			$query->bindValue(':dddCelular1', preg_replace('~\D~', '', $this->estudante->__get('dddCelular1')));
			$query->bindValue(':telefoneCelular1', preg_replace('~\D~', '', $this->estudante->__get('telefoneCelular1')));
			$query->bindValue(':dddCelular2', preg_replace('~\D~', '', $this->estudante->__get('dddCelular2')));
			$query->bindValue(':telefoneCelular2', preg_replace('~\D~', '', $this->estudante->__get('telefoneCelular2')));
			$query->bindValue(':dddResidencial', preg_replace('~\D~', '', $this->estudante->__get('dddResidencial')));
			$query->bindValue(':telefoneResidencial', preg_replace('~\D~', '', $this->estudante->__get('telefoneResidencial')));

			$query->execute(array(
				':dddCelular1' => $this->estudante->__get('dddCelular1'),
				':telefoneCelular1' => $this->estudante->__get('telefoneCelular1'),
				':dddCelular2' => $this->estudante->__get('dddCelular2'),
				':telefoneCelular2' => $this->estudante->__get('telefoneCelular2'),
				':dddResidencial' => $this->estudante->__get('dddResidencial'),
				':telefoneResidencial' => $this->estudante->__get('telefoneResidencial')
			));

		}

		public function consultarCadastro(){
			$query = "SELECT * FROM tb_estudante";
			$query = $this->conexao->query($query);
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			if($result){
				$tempArray = [];
				$data = array();
				for($i = 0; $i<count($result); $i++){
					$tempArray[$i][] = $result[$i]->cpf;
					$tempArray[$i][] = $result[$i]->nome;
					$tempArray[$i][] = $result[$i]->email;
					$tempArray[$i][] = $result[$i]->instituicao;
					$tempArray[$i][] = $result[$i]->curso;
					$tempArray[$i][] = $result[$i]->periodo;
					$tempArray[$i][] = $result[$i]->data_inicio_curso;
					$tempArray[$i][] = $result[$i]->data_final_curso;
					array_push($data, $tempArray[$i]);
				}
				$retorno['data'] = $data;
				echo json_encode($retorno);
				return;
			}
		}

		public function editarCadastro(){
		
		}

		public function excluirCadastro(){
			
		}
	}

?>