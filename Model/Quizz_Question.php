<?php

class Quizz_Question
{
    private $Question;
    private $Answer;
    private $Number;

    /**
     * @param $Question
     * @param $Answer
     * @param $Number
     */
    public function __construct($Question, $Answer, $Number)
    {
        $this->Question = $Question;
        $this->Answer = $Answer;
        $this->Number = $Number;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->Number;
    }

    /**
     * @param mixed $Number
     */
    public function setNumber($Number)
    {
        $this->Number = $Number;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->Question;
    }

    /**
     * @param mixed $Question
     */
    public function setQuestion($Question)
    {
        $this->Question = $Question;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->Answer;
    }

    /**
     * @param mixed $Answer
     */
    public function setAnswer($Answer)
    {
        $this->Answer = $Answer;
    }
}