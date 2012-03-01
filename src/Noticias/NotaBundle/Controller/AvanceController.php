<?php

namespace Noticias\NotaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noticias\NotaBundle\Entity\Nota;
use Noticias\NotaBundle\Entity\Fuente;

use Noticias\NotaBundle\Form\AvanceType;


class AvanceController extends Controller
{
    
    public function avanceAction()
    {
        //obtenemos el objeto a insertar en el combox
        $em = $this->getDoctrine()->getEntityManager();
        $fuentes = $em->getRepository('NotaBundle:Fuente')->findAll();
        $usercams = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
                                       'puesto' => 'Camarografo'));
        $useredits = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
                                       'puesto' => 'Editor'));
        $userconds = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
                                       'puesto' => 'Conductor'));

        //se instancia el formulario        
        $nota = new Nota();   
        $formulario = $this->createForm(new AvanceType(), $nota);
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
            $nota->setCamarografo($_POST["Camarografo"]);
            $nota->setFuente($_POST["Fuente"]);
            $nota->setAvance($_POST["Avance"]);
            $nota->setInserto($_POST["Inserto"]);
            
            // Guardamos el objeto en base de datos
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($nota);
            $em->flush();
            //redirigimos al usuario a otro lugar
             return $this->redirect($this->generateUrl('terminarnota'));
        }
      }
        return $this->render('NotaBundle:Default:creaavance.html.twig', array(
                                   'formulario' => $formulario->createView(),
                         
                                   'fuentes' => $fuentes,
                                   'usercams' => $usercams,
                                   'useredits' => $useredits
                               
));
    }
    
}
