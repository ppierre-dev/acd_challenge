<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
  #[Route('/users', name: 'users')]
  function index()
  {
    return $this->render('user/index.html.twig', [
      'controller_name' => 'UserController',
    ]);
  }

  #[Route('/users/id', name: 'users_show')]
  function show()
  {
    return $this->render('user/show.html.twig', [
      'controller_name' => 'UserController',
    ]);
  }
}
