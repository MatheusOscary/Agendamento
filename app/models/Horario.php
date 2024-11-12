<?php
class Horario {
    private $domingo_comeco_1;
    private $domingo_fim_1;
    private $domingo_comeco_2;
    private $domingo_fim_2;
    private $segunda_comeco_1;
    private $segunda_fim_1;
    private $segunda_comeco_2;
    private $segunda_fim_2;
    private $terca_comeco_1;
    private $terca_fim_1;
    private $terca_comeco_2;
    private $terca_fim_2;
    private $quarta_comeco_1;
    private $quarta_fim_1;
    private $quarta_comeco_2;
    private $quarta_fim_2;
    private $quinta_comeco_1;
    private $quinta_fim_1;
    private $quinta_comeco_2;
    private $quinta_fim_2;
    private $sexta_comeco_1;
    private $sexta_fim_1;
    private $sexta_comeco_2;
    private $sexta_fim_2;
    private $sabado_comeco_1;
    private $sabado_fim_1;
    private $sabado_comeco_2;
    private $sabado_fim_2;

    // Getters e Setters para domingo
    public function getdomingoComeco1() {
        return $this->domingo_comeco_1;
    }

    public function setdomingoComeco1($domingo_comeco_1) {
        $this->domingo_comeco_1 = $domingo_comeco_1;
    }

    public function getdomingoFim1() {
        return $this->domingo_fim_1;
    }

    public function setdomingoFim1($domingo_fim_1) {
        $this->domingo_fim_1 = $domingo_fim_1;
    }

    public function getdomingoComeco2() {
        return $this->domingo_comeco_2;
    }

    public function setdomingoComeco2($domingo_comeco_2) {
        $this->domingo_comeco_2 = $domingo_comeco_2;
    }

    public function getdomingoFim2() {
        return $this->domingo_fim_2;
    }

    public function setdomingoFim2($domingo_fim_2) {
        $this->domingo_fim_2 = $domingo_fim_2;
    }

    // Getters e Setters para segunda-feira
    public function getsegundaComeco1() {
        return $this->segunda_comeco_1;
    }

    public function setsegundaComeco1($segunda_comeco_1) {
        $this->segunda_comeco_1 = $segunda_comeco_1;
    }

    public function getsegundaFim1() {
        return $this->segunda_fim_1;
    }

    public function setsegundaFim1($segunda_fim_1) {
        $this->segunda_fim_1 = $segunda_fim_1;
    }

    public function getsegundaComeco2() {
        return $this->segunda_comeco_2;
    }

    public function setsegundaComeco2($segunda_comeco_2) {
        $this->segunda_comeco_2 = $segunda_comeco_2;
    }

    public function getsegundaFim2() {
        return $this->segunda_fim_2;
    }

    public function setsegundaFim2($segunda_fim_2) {
        $this->segunda_fim_2 = $segunda_fim_2;
    }

    // Getters e Setters para terça-feira
    public function gettercaComeco1() {
        return $this->terca_comeco_1;
    }

    public function settercaComeco1($terca_comeco_1) {
        $this->terca_comeco_1 = $terca_comeco_1;
    }

    public function gettercaFim1() {
        return $this->terca_fim_1;
    }

    public function settercaFim1($terca_fim_1) {
        $this->terca_fim_1 = $terca_fim_1;
    }

    public function gettercaComeco2() {
        return $this->terca_comeco_2;
    }

    public function settercaComeco2($terca_comeco_2) {
        $this->terca_comeco_2 = $terca_comeco_2;
    }

    public function gettercaFim2() {
        return $this->terca_fim_2;
    }

    public function settercaFim2($terca_fim_2) {
        $this->terca_fim_2 = $terca_fim_2;
    }

    // Getters e Setters para quarta-feira
    public function getquartaComeco1() {
        return $this->quarta_comeco_1;
    }

    public function setquartaComeco1($quarta_comeco_1) {
        $this->quarta_comeco_1 = $quarta_comeco_1;
    }

    public function getquartaFim1() {
        return $this->quarta_fim_1;
    }

    public function setquartaFim1($quarta_fim_1) {
        $this->quarta_fim_1 = $quarta_fim_1;
    }

    public function getquartaComeco2() {
        return $this->quarta_comeco_2;
    }

    public function setquartaComeco2($quarta_comeco_2) {
        $this->quarta_comeco_2 = $quarta_comeco_2;
    }

    public function getquartaFim2() {
        return $this->quarta_fim_2;
    }

    public function setquartaFim2($quarta_fim_2) {
        $this->quarta_fim_2 = $quarta_fim_2;
    }

    // Getters e Setters para quinta-feira
    public function getquintaComeco1() {
        return $this->quinta_comeco_1;
    }

    public function setquintaComeco1($quinta_comeco_1) {
        $this->quinta_comeco_1 = $quinta_comeco_1;
    }

    public function getquintaFim1() {
        return $this->quinta_fim_1;
    }

    public function setquintaFim1($quinta_fim_1) {
        $this->quinta_fim_1 = $quinta_fim_1;
    }

    public function getquintaComeco2() {
        return $this->quinta_comeco_2;
    }

    public function setquintaComeco2($quinta_comeco_2) {
        $this->quinta_comeco_2 = $quinta_comeco_2;
    }

    public function getquintaFim2() {
        return $this->quinta_fim_2;
    }

    public function setquintaFim2($quinta_fim_2) {
        $this->quinta_fim_2 = $quinta_fim_2;
    }

    // Getters e Setters para sexta-feira
    public function getsextaComeco1() {
        return $this->sexta_comeco_1;
    }

    public function setsextaComeco1($sexta_comeco_1) {
        $this->sexta_comeco_1 = $sexta_comeco_1;
    }

    public function getsextaFim1() {
        return $this->sexta_fim_1;
    }

    public function setsextaFim1($sexta_fim_1) {
        $this->sexta_fim_1 = $sexta_fim_1;
    }

    public function getsextaComeco2() {
        return $this->sexta_comeco_2;
    }

    public function setsextaComeco2($sexta_comeco_2) {
        $this->sexta_comeco_2 = $sexta_comeco_2;
    }

    public function getsextaFim2() {
        return $this->sexta_fim_2;
    }

    public function setsextaFim2($sexta_fim_2) {
        $this->sexta_fim_2 = $sexta_fim_2;
    }

    // Getters e Setters para sábado
    public function getsabadoComeco1() {
        return $this->sabado_comeco_1;
    }

    public function setsabadoComeco1($sabado_comeco_1) {
        $this->sabado_comeco_1 = $sabado_comeco_1;
    }

    public function getsabadoFim1() {
        return $this->sabado_fim_1;
    }

    public function setsabadoFim1($sabado_fim_1) {
        $this->sabado_fim_1 = $sabado_fim_1;
    }

    public function getsabadoComeco2() {
        return $this->sabado_comeco_2;
    }

    public function setsabadoComeco2($sabado_comeco_2) {
        $this->sabado_comeco_2 = $sabado_comeco_2;
    }

    public function getsabadoFim2() {
        return $this->sabado_fim_2;
    }

    public function setsabadoFim2($sabado_fim_2) {
        $this->sabado_fim_2 = $sabado_fim_2;
    }
}
?>
