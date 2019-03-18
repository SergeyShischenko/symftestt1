<?php

namespace App\Controller;

use App\Entity\Notes;
use App\Form\NoteType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $note = new Notes();
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'form'=>$form->createView(),
        ]);
    }
}
