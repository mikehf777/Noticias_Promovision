<?php

namespace Noticias\NotaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noticias\NotaBundle\Entity\Nota;
use Noticias\NotaBundle\Entity\Fuente;


class NotaController extends Controller
{
    
    public function notaAction()
    {
        //obtenemos el objeto a insertar en el combox
        $em = $this->getDoctrine()->getEntityManager();
       
      
        //se instancia el formulario        
        $nota = new Nota();   
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
            
           
            $nota->setEditor($_POST["Editor"]);
         
            
            // Guardamos el objeto en base de datos
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($nota);
            $em->flush();
            //redirigimos al usuario a otro lugar
             return $this->redirect($this->generateUrl(''));
        }
      }
        return $this->render('NotaBundle:Default:terminarnota.html.twig');
       
    }
    
}
