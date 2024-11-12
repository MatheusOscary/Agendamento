<?php
class Usuario {
    private int $codUsuario;
    private string $nome;
    private string $telefone;
    private string $loja;
    private string $grupo;
    private string $imagem;

    public function __construct(int $codUsuario, string $nome, string $telefone, string $loja, string $grupo, string $imagem) {
        $this->codUsuario = $codUsuario;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->loja = $loja;
        $this->grupo = $grupo;
        $this->imagem = $imagem;
    }

    public function getCodUsuario(): int {
        return $this->codUsuario;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getLoja(): string {
        return $this->telefone;
    }

    public function getGrupo(): string {
        return $this->telefone;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function setCodUsuario(int $codUsuario): void {
        $this->codUsuario = $codUsuario;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setLoja(string $loja): void {
        $this->loja = $loja;
    }

    public function setGrupo(string $grupo): void {
        $this->grupo = $grupo;
    }

    public function setImagem(string $imagem): void {
        $this->imagem = $imagem;
    }
}


?>