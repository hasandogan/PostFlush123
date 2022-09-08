<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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


    }

}
