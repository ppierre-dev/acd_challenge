<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
  #[Route('/users', name: 'Users')]
  function index()
  {
    return $this->render('user/index.html.twig', [
      'controller_name' => 'UserController',
    ]);
  }
}
