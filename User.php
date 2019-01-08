<?php

class User {
    public $nom;
    public $mail;
    private $mdp;
    private $confmdp;

    function __construct($nom, $mail, $mdp, $confmdp) {
        $this->nom =$nom;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->confmdp = $confmdp;
    }

    function getNom() {
        return $this->nom;
    }

    function getMail() {
        return $this->mail;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getConfmdp() {
        return $this->confmdp;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setConfmdp($confmdp) {
        $this->confmdp = $confmdp;
    }

}
?>