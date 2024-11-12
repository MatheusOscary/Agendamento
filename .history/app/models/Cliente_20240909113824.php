<?php
class Cliente {
    private int $codCliente;
    private string $nome;
    private string $telefone;
    private string $genero;
    private string $uf;
    private string $cidade;
    private string $cep;
    private string $bairro;
    private string $rua;
    private string $numero;
    private string $dataAniversario;
    private string $dataCadastrou;
    private int $sessaoCadastrou;
    private ?string $dataAtualizou;
    private ?int $sessaoAtualizou;
    private int $codLoja;

    public function __construct(
        int $codCliente, string $nome, string $telefone, string $genero, string $uf, 
        string $cidade, string $cep, string $bairro, string $rua, string $numero, 
        string $dataAniversario
    ) {
        $this->codCliente = $codCliente;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->genero = $genero;
        $this->uf = $uf;
        $this->cidade = $cidade;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->dataAniversario = $dataAniversario;
    }

    public function getCodCliente(): int {
        return $this->codCliente;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getGenero(): string {
        return $this->genero;
    }

    public function getUf(): string {
        return $this->uf;
    }

    public function getCidade(): string {
        return $this->cidade;
    }

    public function getCep(): string {
        return $this->cep;
    }

    public function getBairro(): string {
        return $this->bairro;
    }

    public function getRua(): string {
        return $this->rua;
    }

    public function getNumero(): string {
        return $this->numero;
    }

    public function getDataAniversario(): string {
        return $this->dataAniversario;
    }

    public function setCodCliente(int $codCliente): void {
        $this->codCliente = $codCliente;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setGenero(string $genero): void {
        $this->genero = $genero;
    }

    public function setUf(string $uf): void {
        $this->uf = $uf;
    }

    public function setCidade(string $cidade): void {
        $this->cidade = $cidade;
    }

    public function setCep(string $cep): void {
        $this->cep = $cep;
    }

    public function setBairro(string $bairro): void {
        $this->bairro = $bairro;
    }

    public function setRua(string $rua): void {
        $this->rua = $rua;
    }

    public function setNumero(string $numero): void {
        $this->numero = $numero;
    }

    public function setDataAniversario(string $dataAniversario): void {
        $this->dataAniversario = $dataAniversario;
    }

}
?>
