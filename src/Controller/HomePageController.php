<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/home', name: 'app_home')]
class HomePageController extends AbstractController 
{
    #[Route('/', name: 'app_home')]
    public function home(EventRepository $eventsRepository): Response
    {
        return $this->render('/home/home.html.twig', [
            'title' => 'HomePage',
            'events' => $eventsRepository->findAll(),
        ]);
    }
}

