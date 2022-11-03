<?php

require __DIR__."/config/bootstrap.php";


use DoctrineUsage\Repositories\UserRepository;
use DoctrineUsage\Models\User;

$user = new User();
//
$repository = new UserRepository($entityManager);

//$repository->create('roma_2', 'hambit77777@gmail.com', $user);
$repository->update(['name'=> '123', 'email' => 'roman_tulaidan777@epam.com'], 1);
//$repository->delete( 1);
//foreach ($users = $repository->getAll() as $user)
//{
//    echo '<br>';
//    echo $user->getName() .  ' ' .$user->getEmail() ;
//}

?>
