<?php

namespace TA\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TA\CoreBundle\Form\LoginForm;

/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 24/10/17
 * Time: 16:56
 */

class SecurityController extends Controller
{

    public function loginAction(){

        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, ['_username' => $lastUsername,]);

        return $this->render(
            'TACoreBundle:security:login.html.twig',
            array(
                'form' => $form->createView(),
                'error' => $error,
            )
        );

    }

    public function panelAction(){

        return $this->render('TACoreBundle:core:index.html.twig',
            []);

    }

    public function logoutAction(){

        throw new \Exception('this should not be reached!');

    }

}