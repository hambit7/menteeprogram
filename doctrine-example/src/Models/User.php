<?php

namespace DoctrineUsage\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks
 **/
class User
{
    /**
     * @var integer $uid
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    protected $name;

    /**
     * @var string $email
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    protected $email;

    /**
     * @var datetime $created_at
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @var datetime $updated_at
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updated_at;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created_at = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated_at = new \DateTime();
    }

}