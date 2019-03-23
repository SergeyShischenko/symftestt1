<?php

namespace App\Controller;

use App\Entity\Artec;
use App\Entity\Notes; // Подключаем сущьность ОБЯЗАТЕЛЬНО!!! Руками!!!!!!!!!
use App\Form\ArtecType;
use App\Form\NoteType; // Подключаем ФОРМУ ОБЯЗАТЕЛЬНО!!! Руками!!!!!!!!!
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request) // 3.Подключаем класс Request (это внедренная зависимость в наш контроллер) для использования запросов, мы сможем хендлить запрос в нашем контроллере
    {

        $em=$this->getDoctrine()->getManager();//7.Объявляет переменную 'em' и обращаемся к методам нашего абстрактного класса. Это для загрузки введенного текста в БД

        $note = new Notes();//1.нужно передавать объект в форму. СОЗДАЕМ объект!!!
        $form = $this->createForm(NoteType::class, $note);//2.Нужно создать форму и внутрь передаем NoteType и $note
        $form->handleRequest($request);
        //dump($request);die; // это вардамр ПРОВЕРКА


        //6.Далее нужно принять нашу форму и проверить "собмитит она"(отправле на ли она) и "валидна ли она":
        if($form->isSubmitted()&& $form->isValid()){
            $data = $form->getData();
           //7.Загружаем в БД:
            $em->persist($note);//8.метод "персист" готовит нашу таблицу к тому что сейчас появится новая запись(общение с БД происходит через объекты)Нам нужно в контексте записи подготовить этот объект.
            $em->flush();//9.метод "флюш" вносит изменения, (которые подготовил Персист)
        }
        $notes = $em->getRepository(Notes::class)->findAll();// 10. в переменную notes получим таблицу из наши сущьности Notes. Делаем это через метод getRepository и вставляет Notes + используем метод findAll.

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'form'=>$form->createView(), //4. Выводим форму
            'notes'=>$notes//11. Возвращаем notes
        ]);

    }

    /**
     * @Route("/artec/{page}", name="app_artec")
     */
    public function artec($page, LoggerInterface $logger, Request $request){

         $em = $this->getDoctrine()->getManager();


        $artec = new Artec();
        $formartec = $this->createForm(ArtecType::class, $artec);
        $formartec->handleRequest($request);
        if($formartec->isSubmitted() && $formartec->isValid()){
            $em->persist($artec);
            $em->flush();
        }

        $artecs = $em->getRepository(Artec::class)->findAll();


        return $this->render('main/artec.html.twig',[
            'formartec'=>$formartec->createView(),
            'artecs'=>$artecs,
        ]);


    }
}
