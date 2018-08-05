<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    public function login(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $user = $form->getData();
            $password = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($password);
            if (self::loginCheck($user)) {
                die("ok");
            }
            else {
                $this->session->getFlashBag()->add('info', 'Usuario incorrecto');
            }
        }

        return $this->render('app/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    private function loginCheck(User $user)
    {
        $client = $this->get('http.client');
        $response = $client->post('login_check',(array)$user);
var_dump($response);
        return true;
    }

    /**
     * @Route("/page1", name="page1")
     * @Security("is_granted('ROLE_PAGE_1')", statusCode=403, message="Have not permission")
     */
    public function page1()
    {
        return $this->render('app/page.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/page2", name="page2")
     * @Security("is_granted('ROLE_PAGE_2')", statusCode=403, message="Have not permission")
     */
    public function page2()
    {

        return $this->render('app/page.html.twig', [
            'username' => $this->session->getName(),
        ]);
    }

    /**
     * @Route("/page3", name="page3")
     * @Security("is_granted('ROLE_PAGE_3')", statusCode=403, message="Have not permission")
     */
    public function page3()
    {
        return $this->render('app/page.html.twig', [
            'username' => $this->session->getName(),
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     * @Security("is_granted('ROLE_ADMIN')", statusCode=403, message="Have not permission")
     */
    public function admin()
    {
        return $this->render('app/page.html.twig', [
            'username' => $this->session->getName(),
        ]);
    }
}
