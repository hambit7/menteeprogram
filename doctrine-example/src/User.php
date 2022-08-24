<?php

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity @ORM\Table(name="users") **/
class User
{
    /** @ORM\Column(type="integer") @ORM\GeneratedValue **/
    protected $id;
    /** @ORM\Column(type="string") @ORM\GeneratedValue **/
    protected $name;
    /** @ORM\Column(type="string") @ORM\GeneratedValue **/
    protected $email;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}