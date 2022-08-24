<?php

class Quizz
{
    private $id;
    private $titre;
    private $time;
    private $cours;
    private $questions=[];

    /**
     * @param $id
     * @param $titre
     * @param $time
     * @param $cours
     * @param array $questions
     */
    public function __construct($id, $titre, $time, $cours, array $questions)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->time = $time;
        $this->cours = $cours;
        $this->questions = $questions;
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
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param mixed $cours
     */
    public function setCours($cours)
    {
        $this->cours = $cours;
    }

    /**
     * @return array
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param array $questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

}