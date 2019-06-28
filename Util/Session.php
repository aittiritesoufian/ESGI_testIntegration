<?php

namespace App\Util;


class Session {

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $type;
    /**
     * @var date
     */
    private $date;
    /**
     * @var string
     */
    private $intitule;
    /**
     * @var string
     */
    private $description;
    /**
     * @var array
     */
    private $etudiants;
    /**
     * @var array
     */
    private $formateurs;



    public function __construct(int $id = null, string $type = "", string $intitule = "", string $description = "",\DateTime  $date=null) {

        $this->type = $type;
        $this->intitule = $intitule;
        $this->description = $description;
        $this->date = $date;
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $type
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param string $intitule
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return date
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }

    /**
     * @param date $date
     */
    public function addEtudiant($etudiant)
    {
        array_push($this->etudiants,$etudiant);
    }

    /**
     * @return date
     */
    public function getFormateurs()
    {
        return $this->formateurs;
    }

    /**
     * @param date $date
     */
    public function addFormateur($formateur)
    {
        array_push($this->formateurs,$formateur);
    }

    /**
     * @return array $etudiants
     */
    public function setEtudiants($etudiants)
    {
        $this->etudiants = $etudiants;
    }

    /**
     * @param array $formateurs
     */
    public function setFormateur($formateurs)
    {
        $this->formateurs = $formateurs;
    }

    public function init() {
        if($this->getId() != null){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "localhost:3000/session/"+$this->getId());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            $output = curl_exec($ch);
            curl_close($ch);

            $this->setType = json_decode($output)['type'];
            $this->setIntitule = json_decode($output)['intitule'];
            $this->setDescription = json_decode($output)['description'];
            $this->setDate = json_decode($output)['date'];
            $this->setEtudiants = json_decode(json_decode($output)['etudiants']);
            $this->setFormateurs = json_decode(json_decode($output)['formateurs']);

            var_dump($output);
        }
    }
    
    //persister l'Organisation
    public function save(): void {
        $encoded = json_encode(
            array(
                "type" => $this->getType(),
                "intitule" => $this->getIntitule(),
                "description" => $this->getDescription(),
                "date" => $this->getDate(),
                "formateurs" => $this->getFormateurs(),
                "etudiants" => $this->getEtudiants()
            )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost:3000/session");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        var_dump($output);
    }

    public function update() {
        $encoded = json_encode(
            array(
                "type" => $this->getType(),
                "intitule" => $this->getIntitule(),
                "description" => $this->getDescription(),
                "date" => $this->getDate(),
                "formateurs" => $this->getFormateurs(),
                "etudiants" => $this->getEtudiants()
            )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost:3000/session/"+$this->getId());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        var_dump($output);
    }
}
