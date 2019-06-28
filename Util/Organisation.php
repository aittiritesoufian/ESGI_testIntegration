<?php

namespace App\Util;


class Organisation {

    /**
     * @var string
     */
    private $nom;
    /**
     * @var string
     */
    private $adresse;
    
    public function __construct(string $nom, string $adresse) {
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    public function isValid() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            throw new \Exception('Wrong email format');
        }
        if(!isset($this->firstname) || empty($this->firstname)){
            throw new \Exception('Please enter a firstname');
        }
        if(!isset($this->lastname) || empty($this->lastname)){
            throw new \Exception('Please enter a lastname');
        }
        return true;
    }

    /**
     * @return string
     */
    public function getAdresse(): string {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }
    
    //persister l'Organisation
    public function save(){
        $encoded = json_encode(array("name" => $this.getName(), "description" => $this.getAdresse()));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost:3000");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    //créer une Session
    public function createSession(){

    }

    //ajout d'un formateur à une session
    public function addFormateur(){

    }

    //validation de l'inscription des Students à une session
    public function validateStudent(){

    }

    //ajout d'une salle à une session
    public function addSalle(){

    }
}
