<?php

namespace App\Api\v1;


use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * @Route("/api")
 */
class ApiController extends FOSRestController
{
    /*
     * @Rest\Post("/login_check", name="user_login_check")
     */
    public function loginCheck(Request $request)
    {
        return new Response("SIIIII");
    }

    public function user()
    {

    }
}