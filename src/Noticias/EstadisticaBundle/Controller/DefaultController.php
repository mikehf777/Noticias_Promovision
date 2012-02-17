<?php

namespace Noticias\EstadisticaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('EstadisticaBundle:Default:index.html.twig', array('name' => $name));
    }
}
