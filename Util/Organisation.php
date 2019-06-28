<?php

namespace App\Util;


class Organisation {

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $adresse;

    public function __construct(string $name, string $adresse) {
        $this->name = $name;
        $this->adresse = $adresse;
    }

    public function isValid() {
        if(!isset($this->name) || empty($this->name)){
            throw new \Exception('Please enter a firstname');
        }
        if(!isset($this->adresse) || empty($this->adresse)){
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
    public function getId(): string {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void {
        $this->id = $id;
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
    public function save(): void {
        $encoded = json_encode(
            array(
            "name" => $this->getName(),
            "description" => $this->getAdresse()
            )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost:3000/organisation");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        var_dump($output);
    }

    //créer une Session
    public function createSession(){
        $session = new Session(null, "Cours",  "Test Unitaire",  "ceci est un cours de test unitaire",  new DateTime("2019-06-28 11:00:00"));
        $session->save();
        return true;
    }

    //ajout d'un formateur à une session
    public function addFormateur($session_id,$formateur){
        $session = new Session($session_id);
        $session->init();
        $session->addFormateur($formateur);
    }

    //validation de l'inscription des Students à une session
    public function validateEtudiant($session_id,$etudiant){
        $session = new Session($session_id);
        $session->init();
        // $session-
    }

    //ajout d'une salle à une session
    public function addSalle(){

    }
}
