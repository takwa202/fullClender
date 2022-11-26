<?php

namespace App\Controller;

use App\Entity\Calendertable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApicalController extends AbstractController
{
    #[Route('/apical', name: 'app_apical')]
    public function index(): Response
    {
        return $this->render('apical/index.html.twig', [
            'controller_name' => 'ApicalController',
        ]);
    }
    /**
     * @Route("/apical/{id}/edit", name="api_event_edit", methods={"PUT"})
     */

 
    public function majEvent(?Calendertable $calondar ,Request $req):Response
    {
        
        $data = json_decode($req-> getContent());
        if(
           
        
            isset($data->title)&& !empty($data->title)&&
            isset($data->start)&& !empty($data->start)&&
            isset($data->end)&& !empty($data->end)&&
            isset($data->description)&& !empty($data->description)&&
            isset($data->backgroundColor)&& !empty($data->backgroundColor)&&
            isset($data->borderColor)&& !empty($data->borderColor)&&
            isset($data->textColor)&& !empty($data->textColor)

        ){
         $code=200;
         if (!$calondar){
            $calondar=new Calendertable;
        $code=201;
         }
         

         $calondar->setTitle($data->title);
         $calondar->setStart($data->start);
         $calondar->setEnd($data->end);
         $calondar->setDescription($data->description);
         $calondar->setBacgroundcouleur($data->backgroundColor);
         $calondar->setBordercouleur($data->borderColor);
         $calondar->setTextcouleur($data->textColor);
       $em=$this->getDoctrine()->getManager();
       $em->persist($calondar);
       $em->flush();
       return new Response('sucsess',404);

        }else{
            return new Request('donnees incompletes',404);
        }


     return $this->render('apical/index.html.twig', [
            'controller_name' => 'ApicalController',
        ]);
    }
}
