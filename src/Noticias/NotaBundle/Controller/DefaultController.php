<?php

namespace Noticias\NotaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noticias\NotaBundle\Entity\Nota;

use Noticias\NotaBundle\Form\NotaType;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('NotaBundle:Default:index.html.twig', array('name' => $name));
    }
}
