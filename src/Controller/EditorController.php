<?php

namespace App\Controller;

use App\Entity\Editor;
use App\Repository\EditorRepository;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/editor')]
final class EditorController extends AbstractController
{
    #[Route(path:'', name:'app_editor_index', methods: ['GET'])]
    public function index(Request $request, EditorRepository $repository): Response
    {
            $editors = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new QueryAdapter($repository->createQueryBuilder('e')),
            $request->query->get('page', 1),
            8
        );
        return $this->render('editor/index.html.twig', [
            'editors' => $editors,
        ]);
    }

    #[Route('/{id}', name: 'app_editor_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(?Editor $editor): Response
    {
        return $this->render('editor/show.html.twig', [
            'editor' => $editor,
        ]);
    }
}
