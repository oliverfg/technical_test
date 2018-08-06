<?php

namespace App\Api\v1\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Flex\Response;


class ApiController extends FOSRestController
{
    private $_users = [
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
     * @Rest\Get("/user")
     */
    public function getAllUsersAction()
    {
        return new JsonResponse($this->_users);
    }

    /**
     * @Rest\Get("/user/{username}")
     */
    public function fetchUserAction(string $username)
    {
        if( isset($this->_users[$username]) ) {
            return new JsonResponse($this->_users[$username]);
        }

        return new JsonResponse(['error'=>'Not found'],404);
    }

    /**
     * @Rest\Put("/user/{username}")
     */
    public function updateUserAction($username, Request $request)
    {
        if (isset($this->_users[$username])) {
            $this->_users[$username]['password'] = $request->get('password');
            $this->_users[$username]['role'] = $request->get('role');

            return new JsonResponse();
        }

        return new JsonResponse(['error'=>'Not updated'],304);
    }

    /**
     * @Rest\Post("/user")
     */
    public function createUserAction(Request $request)
    {
        if (!isset($this->_users[$request->get('username')])) {
            $this->_users[$request->get('username')]['password'] = $request->get('password');
            $this->_users[$request->get('username')]['role'] = $request->get('role');

            return new JsonResponse();
        }

        return new JsonResponse(['error'=>'Duplicated'],409);
    }

    /**
     * @Rest\Delete("/user/{username}")
     */
    public function deleteUserAction($username)
    {
        if (isset($this->_users[$username])) {
            unset($this->_users[$username]);

            return new JsonResponse();
        }

        return new JsonResponse([],404);
    }
}