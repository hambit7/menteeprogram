<?php

namespace DoctrineUsage\Repositories;

use Doctrine\ORM\EntityRepository;
use DoctrineUsage\Models\User;
use Doctrine\ORM\EntityManager;

class UserRepository
{
    private $entityManager;
    private $user;
    private EntityRepository $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(User::class);

    }

    public function create(string $name, string $mail, User $user)
    {
        $this->user = $user;
        $this->user->setName($name);
        $this->user->setEmail($mail);

        $this->entityManager->persist($this->user);
        return $this->entityManager->flush($this->user);

    }

    public function update(array $fields, int $id)
    {
        $this->user = $this->entityManager->find(User::class, $id);
        $this->user->setName($fields['name']);
        $this->user->setEmail($fields['email']);

        $this->entityManager->persist($this->user);
        return $this->entityManager->flush($this->user);

    }

    public function delete(int $id)
    {
        $this->user = $this->entityManager->find(User::class, $id);
        $this->entityManager->remove($this->user);

        return $this->entityManager->flush();

    }

    public function getAll()
    {
        return $this->repository->findBy(['name' => 'roma_3'],['email' => 'DESC']);
    }
}

