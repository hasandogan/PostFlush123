<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class messageController extends AbstractController
{
    #[Route('/saveMessage', name: 'save_message')]
    public function saveMessageAction(ManagerRegistry $doctrine){
        $entityManager = $doctrine->getManager();

        $message = new Message();
        $message->setUsername("UnknownSyntax");
        $message->setMessage("kim elledi götüme?");
        $message->setIp($_SERVER['REMOTE_ADDR']);

        $entityManager->persist($message);
        $entityManager->flush();

        return new response("kayıt basarli.");
    }

    #[Route('/index', name: 'index')]
    public function index(ManagerRegistry $doctrine){
        $em = $doctrine->getManagers();

        $messageRepository = $em->getRepo
        return $this->render('index.html.twig');
    }

}
