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



}
