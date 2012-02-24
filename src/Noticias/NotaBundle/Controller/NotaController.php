<?php

namespace Noticias\NotaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noticias\NotaBundle\Entity\Nota;

use Noticias\NotaBundle\Form\NotaType;


class NotaController extends Controller
{
    
    public function notaAction()
    {
        //obtenemos el objeto a insertar en el combox
        $em = $this->getDoctrine()->getEntityManager();
        $fuentes = $em->getRepository('NotaBundle:Fuente')->findAll();

        //se instancia el formulario        
        $nota = new Nota();   
        $formulario = $this->createForm(new NotaType(), $nota);
        $request = $this->getRequest();
        
        //se comprueba que le formulario tenga un metodo post

      if ($request->getMethod() == 'POST')
      {
        $formulario->bindRequest($request);
        //si el formulario es valido se dispone a insertar datos ala BD
        if ($formulario->isValid()) 
        {
            //rellenamos el formulario y los campos que faltan aqui
            $nota = $formulario->getData(); 
            $nota->setAvance($_POST["Avance"]);
            $nota->setFuente($_POST["Fuente"]);
            
            // Guardamos el objeto en base de datos
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($nota);
            $em->flush();
            //redirigimos al usuario a a otro lugar
             return $this->redirect($this->generateUrl('registrado'));
        }
      }
        return $this->render('NotaBundle:Default:creanota.html.twig', array(
                                   'formulario' => $formulario->createView(),
                         
                                   'fuentes' => $fuentes
));
    }
    
}
