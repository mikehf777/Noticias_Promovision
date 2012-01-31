<?php

namespace Noticias\PlazaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('PlazaBundle:Default:index.html.twig', array('name' => $name));
    }
}
