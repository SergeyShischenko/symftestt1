<?php

namespace App\Controller;

use App\Entity\Notes;
use App\Form\NoteType;
use Doctrine\DBAL\Types\TextType;
use Psr\Log\LoggerInterface;
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

    /**
     * @Route("/artec/{page}", name="app_artec")
     */
    public function artec($page, LoggerInterface $logger){


        return $this->render('main/artec.html.twig');


    }
}
