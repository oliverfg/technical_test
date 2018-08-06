<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AppController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    /**
     * @Route("/", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('app/index.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }


    /**
     * @Route("/page1", name="page1")
     * @Security("is_granted('ROLE_PAGE_1')", statusCode=403, message="Have not permission")
     */
    public function page1()
    {
        return $this->render('app/page.html.twig', [
            'username' => $this->container->get('security.token_storage')->getToken()->getUser()->getUsername(),
        ]);
    }

    /**
     * @Route("/page2", name="page2")
     * @Security("is_granted('ROLE_PAGE_2')", statusCode=403, message="Have not permission")
     */
    public function page2()
    {
        return $this->render('app/page.html.twig', [
            'username' => $this->container->get('security.token_storage')->getToken()->getUser()->getUsername(),
        ]);
    }

    /**
     * @Route("/page3", name="page3")
     * @Security("is_granted('ROLE_PAGE_3')", statusCode=403, message="Have not permission")
     */
    public function page3()
    {
        return $this->render('app/page.html.twig', [
            'username' => $this->container->get('security.token_storage')->getToken()->getUser()->getUsername(),
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     * @Security("is_granted('ROLE_ADMIN')", statusCode=403, message="Have not permission")
     */
    public function admin()
    {
        return $this->render('app/page.html.twig', [
            'username' => $this->container->get('security.token_storage')->getToken()->getUser()->getUsername(),
        ]);
    }
}
