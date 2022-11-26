<?php

namespace App\Controller;

use App\Entity\Calendertable;
use App\Form\CalendertableType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/calendertable')]
class CalendertableController extends AbstractController
{
    #[Route('/', name: 'app_calendertable_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $calendertables = $entityManager
            ->getRepository(Calendertable::class)
            ->findAll();

        return $this->render('calendertable/index.html.twig', [
            'calendertables' => $calendertables,
        ]);
    }

    #[Route('/new', name: 'app_calendertable_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $calendertable = new Calendertable();
        $form = $this->createForm(CalendertableType::class, $calendertable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($calendertable);
            $entityManager->flush();

            return $this->redirectToRoute('app_calendertable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('calendertable/new.html.twig', [
            'calendertable' => $calendertable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_calendertable_show', methods: ['GET'])]
    public function show(Calendertable $calendertable): Response
    {
        return $this->render('calendertable/show.html.twig', [
            'calendertable' => $calendertable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_calendertable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Calendertable $calendertable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CalendertableType::class, $calendertable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_calendertable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('calendertable/edit.html.twig', [
            'calendertable' => $calendertable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_calendertable_delete', methods: ['POST'])]
    public function delete(Request $request, Calendertable $calendertable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendertable->getId(), $request->request->get('_token'))) {
            $entityManager->remove($calendertable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_calendertable_index', [], Response::HTTP_SEE_OTHER);
    }
}
