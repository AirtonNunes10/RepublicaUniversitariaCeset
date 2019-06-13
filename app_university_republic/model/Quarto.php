<?php

class Quarto
{

	private $id;
	private $nome;

	function __construct($id, $nome)
	{
		$this->sigla = $id;
		$this->nome = $nome;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getOwnProperties()
	{
		$selfVars = get_object_vars($this);
		$return = [];
		foreach ($selfVars as $currentKey => $currentVal) {
			$return[$currentKey] = $currentVal;
		}
		return $return;
	}
}
