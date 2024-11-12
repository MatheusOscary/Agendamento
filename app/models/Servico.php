<?php
class Servico {
    private int $codServico;
    private string $nome;
    private float $preco;
    private string $tempo;
    private ?string $imagem;
    private string $dataCadastrou;
    private string $sessaoCadastrou;
    private ?string $dataAtualizou;
    private ?string $sessaoAtualizou;

    // Getters
    public function getCodServico(): int {
        return $this->codServico;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function getTempo(): string {
        return $this->tempo;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function getDataCadastrou(): string {
        return $this->dataCadastrou;
    }

    public function getSessaoCadastrou(): string {
        return $this->sessaoCadastrou;
    }

    public function getDataAtualizou(): string {
        return $this->dataAtualizou;
    }

    public function getSessaoAtualizou(): string {
        return $this->sessaoAtualizou;
    }

    // Setters
    public function setCodServico(int $codServico): void {
        $this->codServico = $codServico;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setPreco(float $preco): void {
        $this->preco = $preco;
    }

    public function setTempo(string $tempo): void {
        $this->tempo = $tempo;
    }

    public function setImagem(?string $imagem): void {
        $this->imagem = $imagem;
    }

    public function setDataCadastrou(string $dataCadastrou): void {
        $this->dataCadastrou = $dataCadastrou;
    }

    public function setSessaoCadastrou(string $sessaoCadastrou): void {
        $this->sessaoCadastrou = $sessaoCadastrou;
    }

    public function setDataAtualizou(?string $dataAtualizou): void {
        $this->dataAtualizou = $dataAtualizou;
    }

    public function setSessaoAtualizou(?string $sessaoAtualizou): void {
        $this->sessaoAtualizou = $sessaoAtualizou;
    }
}
?>
