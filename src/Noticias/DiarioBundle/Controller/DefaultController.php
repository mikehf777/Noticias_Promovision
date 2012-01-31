<?php

namespace Noticias\DiarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('DiarioBundle:Default:index.html.twig', array('name' => $name));
    }
}
