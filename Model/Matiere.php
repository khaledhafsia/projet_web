<?php

class Matiere
{
    private $id;
    private $Titre;

    /**
     * @param $id
     * @param $Titre
     */
    public function __construct($id, $Titre)
    {
        $this->id = $id;
        $this->Titre = $Titre;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @param mixed $Titre
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
    }

    public function __toString()
    {
        return $this->getTitre();
    }


}