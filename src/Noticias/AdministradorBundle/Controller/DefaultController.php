<?php

namespace Noticias\AdministradorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AdministradorBundle:Default:index.html.twig', array('name' => $name));
    }
        public function adminAction($name)
    {
        return $this->render('AdministradorBundle:Default:admin.html.twig');
    }
}

    


