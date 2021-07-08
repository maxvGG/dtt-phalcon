<?php

use Phalcon\Mvc\Controller;


class SignupController extends Controller
{
    public function indexAction()
    {
    }

    public function registerAction()
    {
        $user = new Users();

        // assign value from the form to $user
        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email'
            ]
        );

        // Store and check for erros 
        $succes = $user->save();

        // passing the result to the view 
        $this->view->success = $succes;

        if ($succes) {
            $message = "Thanks for registering!";
        } else {
            $message = "Sorry, the following problems were generated:<br>"
                . implode('<br>', $user->getMessages());
        }

        // passing a message to the view
        $this->view->message = $message;
    }
}
