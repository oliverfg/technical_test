<?php

namespace App\Api\v1\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest;


class ApiController extends FOSRestController
{
    const USERS = [
        'user1' => [
            'password' => '$2y$12$2RCXG.yGSiifNIHtjj9v/OZxtoyvlF3SKeINabWwx3eZvHWX1hpvu',
            'role' => 'ROLE_PAGE_1'
        ],
        'user2' => [
            'password' => '$2y$12$dAq3tIHFRVK1j1TKuaznUuzkCBIQhMo979HkFueerl3FW9pWd0d9K',
            'role' => 'ROLE_PAGE_2'
        ],
        'user3' => [
            'password' => '$2y$12$yp4IwIWmJK/Oav0NE8FWueW8VZmGff6jAxaOyBr6r5xewCnfnTgCq',
            'role' => 'ROLE_PAGE_3'
        ],
        'admin' => [
            'password' => '$2y$12$g3rQSjACYdxKVIAUypytZemolt6JtMtjfG.YOSK1ZxGyvnhYJ3fqW',
            'role' => 'ROLE_ADMIN'
        ],
    ];



    /**
     * @Rest\Post("/login_check")
     */
    public function loginCheckAction(Request $request)
    {
        return new JsonResponse("SIIIII");
    }

    /**
     * @Rest\Get("/user")
     */
    public function getAllUsersAction()
    {

    }

    /**
     * @Rest\Get("/user/{username}")
     */
    public function fetchUserAction(string $username)
    {
        if( isset(self::USERS[$username]) ) {
            return new JsonResponse(self::USERS[$username]);
        }

        return new JsonResponse([],404);
    }

    /**
     * @Rest\Put("/user/{username}")
     */
    public function updateUserAction()
    {

    }

    /**
     * @Rest\Post("/user")
     */
    public function createUserAction()
    {

    }

    /**
     * @Rest\Delete("/user/{username}")
     */
    public function deleteUserAction()
    {

    }
}