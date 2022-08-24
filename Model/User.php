<?php

class User
{
    private $id;
    private $Username;
    private $Password;
    private $email;
    private $role;
    private $cours=[];

    /**
     * @param $id
     * @param $Username
     * @param $Password
     * @param $email
     * @param $role
     * @param array $cours
     */
    public function __construct($id, $Username, $Password, $email, $role, array $cours)
    {
        $this->id = $id;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->email = $email;
        $this->role = $role;
        $this->cours = $cours;
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
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param mixed $Username
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return array
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param array $cours
     */
    public function setCours($cours)
    {
        $this->cours = $cours;
    }


}