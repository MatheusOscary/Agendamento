<?php
class Agendamento {
    private int $codAgendamento;
    private int $codUsuario;
    private int $codCliente;
    private int $codLoja;
    private string $codServico;
    private ?string $Usuario;
    private ?string $Cliente;
    private ?string $Servico;
    private string $inicia;
    private string $termina;
    private ?string $estado;
    private string $dataCadastrou;
    private string $sessaoCadastrou;
    private ?string $dataAtualizou;
    private ?string $sessaoAtualizou;

    public function __construct(
        int $codAgendamento = 0,
        int $codUsuario = 0,
        int $codCliente = 0,
        int $codLoja = 0,
        int $codServico = 0,
        string $Usuario = '',
        string $Cliente = '',
        string $Servico = '',
        string $inicia = '',
        string $termina = '',
        string $estado = '',
        string $dataCadastrou = '',
        string $sessaoCadastrou = '',
        ?string $dataAtualizou = null,
        ?string $sessaoAtualizou = null
    ) {
        $this->codAgendamento = $codAgendamento;
        $this->codUsuario = $codUsuario;
        $this->codCliente = $codCliente;
        $this->codLoja = $codLoja;
        $this->codServico = $codServico;
        $this->Usuario = $Usuario;
        $this->Cliente = $Cliente;
        $this->Servico = $Servico;
        $this->inicia = $inicia;
        $this->termina = $termina;
        $this->estado = $estado;
        $this->dataCadastrou = $dataCadastrou;
        $this->sessaoCadastrou = $sessaoCadastrou;
        $this->dataAtualizou = $dataAtualizou;
        $this->sessaoAtualizou = $sessaoAtualizou;
    }


    public function getEstado(): ?string {
        return $this->estado;
    }

    public function setEstado(?string $Estado): void {
        $this->estado = $Estado;
    }


    public function getUsuario(): ?string {
        return $this->Usuario;
    }

    public function setUsuario(?string $Usuario): void {
        $this->Usuario = $Usuario;
    }

    public function getCliente(): ?string {
        return $this->Cliente;
    }

    public function setCliente(?string $Cliente): void {
        $this->Cliente = $Cliente;
    }

    public function getServico(): ?string {
        return $this->Servico;
    }

    public function setServico(?string $Servico): void {
        $this->Servico = $Servico;
    }


    public function getCodAgendamento(): int {
        return $this->codAgendamento;
    }

    public function setCodAgendamento(int $codAgendamento): void {
        $this->codAgendamento = $codAgendamento;
    }

    public function getCodUsuario(): int {
        return $this->codUsuario;
    }

    public function setCodUsuario(int $codUsuario): void {
        $this->codUsuario = $codUsuario;
    }

    public function getCodCliente(): int {
        return $this->codCliente;
    }

    public function setCodCliente(int $codCliente): void {
        $this->codCliente = $codCliente;
    }

    public function getCodLoja(): int {
        return $this->codLoja;
    }

    public function setCodLoja(int $codLoja): void {
        $this->codLoja = $codLoja;
    }

    public function getCodServico(): string {
        return $this->codServico;
    }

    public function setCodServico(string $codServico): void {
        $this->codServico = $codServico;
    }

    public function getInicia(): string {
        return $this->inicia;
    }

    public function setInicia(string $inicia): void {
        $this->inicia = $inicia;
    }

    public function getTermina(): string {
        return $this->termina;
    }

    public function setTermina(string $termina): void {
        $this->termina = $termina;
    }

    public function getDataCadastrou(): string {
        return $this->dataCadastrou;
    }

    public function setDataCadastrou(string $dataCadastrou): void {
        $this->dataCadastrou = $dataCadastrou;
    }

    public function getSessaoCadastrou(): string {
        return $this->sessaoCadastrou;
    }

    public function setSessaoCadastrou(string $sessaoCadastrou): void {
        $this->sessaoCadastrou = $sessaoCadastrou;
    }

    public function getDataAtualizou(): ?string {
        return $this->dataAtualizou;
    }

    public function setDataAtualizou(?string $dataAtualizou): void {
        $this->dataAtualizou = $dataAtualizou;
    }

    public function getSessaoAtualizou(): ?string {
        return $this->sessaoAtualizou;
    }

    public function setSessaoAtualizou(?string $sessaoAtualizou): void {
        $this->sessaoAtualizou = $sessaoAtualizou;
    }
}
?>
