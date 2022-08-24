<?php

class Question
{
    private $id;
    private $Titre;
    private $reponse;
    private $quizz;

    /**
     * @param $id
     * @param $Titre
     * @param $reponse
     * @param $quizz
     */
    public function __construct($id, $Titre, $reponse, $quizz)
    {
        $this->id = $id;
        $this->Titre = $Titre;
        $this->reponse = $reponse;
        $this->quizz = $quizz;
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
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * @param mixed $reponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }

    /**
     * @return mixed
     */
    public function getQuizz()
    {
        return $this->quizz;
    }

    /**
     * @param mixed $quizz
     */
    public function setQuizz($quizz)
    {
        $this->quizz = $quizz;
    }

}