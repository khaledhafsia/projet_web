<?php

class Passage
{
    private $id;
    private $user;
    private $Quizz;
    private $Time;
    Private $note;

    /**
     * @param $id
     * @param $user
     * @param $Quizz
     * @param $Time
     * @param $note
     */
    public function __construct($id, $user, $Quizz, $Time, $note)
    {
        $this->id = $id;
        $this->user = $user;
        $this->Quizz = $Quizz;
        $this->Time = $Time;
        $this->note = $note;
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getQuizz()
    {
        return $this->Quizz;
    }

    /**
     * @param mixed $Quizz
     */
    public function setQuizz($Quizz)
    {
        $this->Quizz = $Quizz;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->Time;
    }

    /**
     * @param mixed $Time
     */
    public function setTime($Time)
    {
        $this->Time = $Time;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

}