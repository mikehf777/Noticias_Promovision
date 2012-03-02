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
        
        $usuario = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getEntityManager();//Se instancia el entity manager
        $fuentes = $em->getRepository('NotaBundle:Fuente')->findAll();
        $usercams = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
                                       'puesto' => 'Camarografo'));
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
            
                     
            $nota->setCamarografo($_POST["Camarografo"]);
            $nota->setFuente($_POST["Fuente"]);
            $nota->setAvance($_POST["Avance"]);
            $hoy = new \DateTime('now');
            $nota->setFechaCrea($hoy);
            $nota->setUrgente(FALSE);
            $nota->setUsuario($usuario);

           
            
            // Guardamos el objeto en base de datos
            $em->persist($nota);
            $em->flush();
            //redirigimos al usuario a otro lugar
             return $this->redirect($this->generateUrl('terminarnota',array('nota' => $nota,'userconds' => $userconds)));
        }
      }
        return $this->render('NotaBundle:Default:creaavance.html.twig', array(
                                   'formulario' => $formulario->createView(),
                                   'fuentes' => $fuentes,
                                   'usercams' => $usercams,
                                   'usuario' => $usuario
                                   
                               
));
    }
    public function tabla_avanceAction()
    {
        $usuario = $this->get('security.context')->getToken()->getUser();
        $usuario_id = $usuario->getId();
        $em=$this->getDoctrine()->getEntityManager();
        $avances=$em->getRepository('NotaBundle:NotaBundle')->findAvancesDelDia($usuario_id); //////Pasar id del usuario logeado 
        return $this->render('NotaBundle:Default:tabla_avance.html.twig',array('avances' =>$avances ));
        
        
    }
    
}
