<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(Request $request): Response
    {
        session_start();
        $time = date('H:i');
        return $this->render('index/index.html.twig', [
            'autoChatOpen' => $time >= '09:00' && $time < '21:00',
            'local' => 'chat-client' === $request->server->get('SERVER_NAME'),
            'session' => session_id(),
        ]);
    }
}
