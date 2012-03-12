<?php

namespace Noticias\NotaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noticias\NotaBundle\Entity\Nota;
use Noticias\NotaBundle\Entity\Fuente;

use Noticias\NotaBundle\Form\AvanceType;
use Noticias\NotaBundle\Form\EditarAvanceType;


class AvanceController extends Controller
{
    //Action para crrar la tabla de avances prara el reportero 
    public function avances_reporteroAction()
    {
        $usuario = $this->get('security.context')->getToken()->getUser();
        $em=$this->getDoctrine()->getEntityManager();
        $avances=$em->getRepository('NotaBundle:Nota')->findNotasdeldia_Usuario($usuario); //////Pasar id del usuario logeado
        return $this->render('NotaBundle:Default:tabla_avance.html.twig',array('avances'=>$avances));    
    }
    //Action para crear la tabla de avances para jefes 
    public function avances_jefesAction()
    {
     $usuario = $this->get('security.context')->getToken()->getUser();
     $em=$this->getDoctrine()->getEntityManager();
     $avances=$em->getRepository('NotaBundle:Nota')->findNotasdeldia_Plaza($usuario); //////Pasar id del usuario logeado
     return $this->render('NotaBundle:Default:tabla_avance.html.twig',array('avances'=>$avances));       
    }
    public function opcionesavancesAction($opcion)
    {
        
        $nota = new Nota();   
        $formulario = $this->createForm(new EditarAvanceType(), $nota);
        
        $em=$this->getDoctrine()->getEntityManager();
        $usercams = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
                                       'puesto' => 'Camarografo'));
        $fuentes = $em->getRepository('NotaBundle:Fuente')->findAll();
        $peticion=$this->getRequest();
        $nota_id=$peticion->request->get("id");
        $avance=$em->getRepository('NotaBundle:Nota')->findOneBy(array('id' => $nota_id ));
        return $this->render('NotaBundle:Default:'.$opcion.'_avance.html.twig',array('avance'=>$avance,
                                                                    'usercams'=>$usercams,
                                                                    'fuentes'=>$fuentes,
                                                                    'formulario' => $formulario->createView()));   

    }        
}
