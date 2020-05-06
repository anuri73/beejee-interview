<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\IController;
use App\Core\IModel;
use App\Core\IView;
use App\Service\AuthManager;
use Klein\Request;
use Klein\Response;

class AuthController extends Controller implements IController
{
    public AuthManager $auth;

    public function __construct(IView $view, IModel $model, AuthManager $auth)
    {
        $this->auth = $auth;
        parent::__construct($view, $model);
    }

    function loginPage(Request $request, Response $response)
    {
        return $this->getView()->render('auth/login.html.twig', [
        ]);
    }

    function login(Request $request, Response $response)
    {
        $data = $request->param('auth');
        if ($this->auth->login(
            $data['username'],
            $data['password'],
        )) {
            $_SESSION["authorized"] = true;
            $response->redirect('/');
        } else {
            $response->redirect('/auth');
        }
    }

    function logout(Request $request, Response $response)
    {
        $_SESSION["authorized"] = false;
        return $response->redirect('/');
    }
}
