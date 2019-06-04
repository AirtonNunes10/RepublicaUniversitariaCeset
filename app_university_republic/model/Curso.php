<?php

class Curso
{

	private $id;
	private $sigla;
	private $curso;

	function __construct($sigla, $curso)
	{
		$this->sigla = $sigla;
		$this->curso = $curso;
	}

	public function getSigla()
	{
		return $this->sigla;
	}

	public function getCurso()
	{
		return $this->curso;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setSigla($sigla)
	{
		$this->sigla = $sigla;
	}

	public function setCurso($curso)
	{
		$this->curso = $curso;
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
