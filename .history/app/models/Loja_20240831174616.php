<?php
class Loja {
    private int $codLoja;
    private string $nome;
    private string $cnpj;
    private string $imagem;

    public function __construct(int $codLoja, string $nome, string $cnpj, string $imagem) {
        $this->codLoja = $codLoja;
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->imagem = $imagem;
    }

    public function getCodLoja(): int {
        return $this->codLoja;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCnpj(): string {
        return $this->cnpj;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function setCodLoja(int $codLoja): void {
        $this->codLoja = $codLoja;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setCnpj(string $cnpj): void {
        $this->cnpj = $cnpj;
    }

    public function setImagem(string $imagem): void {
        $this->imagem = $imagem;
    }
}


?>