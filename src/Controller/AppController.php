<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @Route("/", name="login")
     */
    public function login()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/", name="login_check")
     */
    public function loginCheck()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/page1", name="page1")
     */
    public function page1()
    {
        return $this->render('app/page.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/page2", name="page2")
     */
    public function page2()
    {
        return $this->render('app/page.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/page3", name="page3")
     */
    public function page3()
    {
        return $this->render('app/page.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
