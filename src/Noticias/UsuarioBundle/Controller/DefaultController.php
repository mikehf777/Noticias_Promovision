<?php

namespace Noticias\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Noticias\UsuarioBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use Noticias\UsuarioBundle\Form\UsuarioType;

class DefaultController extends Controller
{
    
    public function inicioAction()
    {
         $usuario = $this->get('security.context')->getToken()->getUser();
        return $this->render('UsuarioBundle:Default:inicio.html.twig', array('usuario' => $usuario));
    }
        public function editorAction()
    {
         $usuario = $this->get('security.context')->getToken()->getUser();
        return $this->render('UsuarioBundle:Default:editor.html.twig', array('usuario' => $usuario));
    }
    
}
