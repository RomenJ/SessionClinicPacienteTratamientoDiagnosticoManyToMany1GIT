<?php

namespace App\Controller;

use App\Entity\Diagnostico;
use App\Form\DiagnosticoType;
use App\Repository\DiagnosticoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/diagnostico')]
class DiagnosticoController extends AbstractController
{
    #[Route('/', name: 'app_diagnostico_index', methods: ['GET'])]
    public function index(DiagnosticoRepository $diagnosticoRepository): Response
    {
        return $this->render('diagnostico/index.html.twig', [
            'diagnosticos' => $diagnosticoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_diagnostico_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DiagnosticoRepository $diagnosticoRepository): Response
    {
        $diagnostico = new Diagnostico();
        $form = $this->createForm(DiagnosticoType::class, $diagnostico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $diagnosticoRepository->save($diagnostico, true);

            return $this->redirectToRoute('app_diagnostico_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('diagnostico/new.html.twig', [
            'diagnostico' => $diagnostico,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_diagnostico_show', methods: ['GET'])]
    public function show(Diagnostico $diagnostico): Response
    {
        return $this->render('diagnostico/show.html.twig', [
            'diagnostico' => $diagnostico,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_diagnostico_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Diagnostico $diagnostico, DiagnosticoRepository $diagnosticoRepository): Response
    {
        $form = $this->createForm(DiagnosticoType::class, $diagnostico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $diagnosticoRepository->save($diagnostico, true);

            return $this->redirectToRoute('app_diagnostico_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('diagnostico/edit.html.twig', [
            'diagnostico' => $diagnostico,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_diagnostico_delete', methods: ['POST'])]
    public function delete(Request $request, Diagnostico $diagnostico, DiagnosticoRepository $diagnosticoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diagnostico->getId(), $request->request->get('_token'))) {
            $diagnosticoRepository->remove($diagnostico, true);
        }

        return $this->redirectToRoute('app_diagnostico_index', [], Response::HTTP_SEE_OTHER);
    }
}
