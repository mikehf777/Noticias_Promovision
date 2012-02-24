<?php

namespace Noticias\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Noticias\UsuarioBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;




class LoginController extends Controller
{
    
    public function loginAction()
    {
         if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }
       return $this->render('UsuarioBundle:Login:login.html.twig',array('last_username' =>  $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),'error' => $error));

    }
}
