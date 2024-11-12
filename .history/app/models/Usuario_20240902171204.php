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
        $this->imagem = $imagem;
    }

    public function getCodUsuario(): int {
        return $this->codUsuario;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function gettelefone(): string {
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

    public function settelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setImagem(string $imagem): void {
        $this->imagem = $imagem;
    }
}


?>