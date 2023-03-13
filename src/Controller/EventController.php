<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
  #[Route('/events', name: 'events')]
  function index()
  {
    return $this->render('event/index.html.twig', [
      'controller_name' => 'EventController',
    ]);
  }
}
