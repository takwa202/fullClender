<?php

namespace App\Controller;

use App\Repository\CalendertableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CalendertableRepository $calendar): Response
    {
        $events=  $calendar->findAll();
        foreach($events as $ev){
           $inter[]=[
            'id'=>$ev->getId(),
            'start'=>$ev->getStart()->format('Y-m-d H:i:s'),
            'end'=>$ev->getEnd()->format('Y-m-d H:i:s'),
            'title'=>$ev->getTitle(),
            'description'=>$ev->getDescription(),
            'backgroundColor'=>$ev->getBacgroundcouleur(),
            'borderColor'=>$ev->getBordercouleur(),
            'textColor'=>$ev->getTextcouleur(),


           ]; 
        }
        //  dd($events);
        $data = json_encode($inter);
        return $this->render('main/index.html.twig', compact('data'));
    }
}
