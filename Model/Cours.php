<?php

class Cours
{
    private $id;
    private $Titre;
    private $Matiere;
    private $Enseignat;
    private $Contenu;
    private $Date_Upload;

    /**
     * @param $id
     * @param $Titre
     * @param $Matiere
     * @param $Enseignat
     * @param $Contenu
     * @param $Date_Upload
     */
    public function __construct($id, $Titre, $Matiere, $Enseignat, $Contenu, $Date_Upload)
    {
        $this->id = $id;
        $this->Titre = $Titre;
        $this->Matiere = $Matiere;
        $this->Enseignat = $Enseignat;
        $this->Contenu = $Contenu;
        $this->Date_Upload = $Date_Upload;
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

    /**
     * @return mixed
     */
    public function getMatiere()
    {
        return $this->Matiere;
    }

    /**
     * @param mixed $Matiere
     */
    public function setMatiere($Matiere)
    {
        $this->Matiere = $Matiere;
    }

    /**
     * @return mixed
     */
    public function getEnseignat()
    {
        return $this->Enseignat;
    }

    /**
     * @param mixed $Enseignat
     */
    public function setEnseignat($Enseignat)
    {
        $this->Enseignat = $Enseignat;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->Contenu;
    }

    /**
     * @param mixed $Contenu
     */
    public function setContenu($Contenu)
    {
        $this->Contenu = $Contenu;
    }

    /**
     * @return mixed
     */
    public function getDateUpload()
    {
        return $this->Date_Upload;
    }

    /**
     * @param mixed $Date_Upload
     */
    public function setDateUpload($Date_Upload)
    {
        $this->Date_Upload = $Date_Upload;
    }


}