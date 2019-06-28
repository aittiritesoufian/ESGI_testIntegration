<?php

namespace App\Util;


class Session {

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



    public function __construct(string $type, string $intitule, string $description,\DateTime  $date) {

        $this->type = $type;
        $this->intitule = $intitule;
        $this->description = $description;
        $this->date = $date;
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
    
    //persister l'Organisation
    public function save(): void {
        $encoded = json_encode(
            array(
            "type" => $this->type,
            "intitule" => $this->intitule,
            "description" => $this->description,
            "date" => $this->date,
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
}
