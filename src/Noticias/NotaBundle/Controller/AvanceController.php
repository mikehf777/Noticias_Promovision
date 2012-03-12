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
    public function update_avanceAction()
    {
        $request = $this->getRequest();
        $id=$request->request->get("id");
        $em=$this->getDoctrine()->getEntityManager();
        $avance=$em->getRepository('NotaBundle:Nota')->findByID($id);
        $formulario = $this->createForm(new EditarAvanceType(), $avance);
        if ($request->getMethod() == 'POST')
      {
        $formulario->bindRequest($request);
        //si el formulario es valido se dispone a insertar datos ala BD
        if ($formulario->isValid()) 
        {
            //rellenamos el formulario y los campos que faltan aqui
            $avance = $formulario->getData();
            $avance->setCamarografo($request->request->get("Camarografo"));
            $avance->setFuente($request->request->get("Fuente"));
            $avance->setAvance($request->request->get("Avance"));
            $avance->setTitulo($request->request->get("Titulo"));
            $em->merge($avance);
            $em->flush();
            
    }
}
    }
    
    public function opcionesavancesAction($opcion)
    {
              $peticion=$this->getRequest();
              $nota_id=$peticion->request->get("id");
              $avance=$em->getRepository('NotaBundle:Nota')->findOneBy(array('id' => $nota_id ));
        switch ($opcion)
        {
            case "ver":
            return $this->render('NotaBundle:Default:'.$opcion.'_avance.html.twig',array('avance'=>$avance));
            break ;
            case "editar":
        $nota= new $nota();
        $formulario = $this->createForm(new EditarAvanceType(), $nota);
        $em=$this->getDoctrine()->getEntityManager();
        $usercams = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
                                       'puesto' => 'Camarografo'));
          $fuentes = $em->getRepository('NotaBundle:Fuente')->findAll();
             return $this->render('NotaBundle:Default:'.$opcion.'_avance.html.twig',
                                                                    array('avance'=>$avance,
                                                                    'usercams'=>$usercams,
                                                                    'fuentes'=>$fuentes,
                                                                    'formulario' => $formulario->createView()));
           break;
            case "imprimir":
                return $this->render('NotaBundle:Default:'.$opcion.'_avance.html.twig',array('avance'=>$avance));
                break;
            case "e-mail":
                
                break;
        }
    }        
    public function update_avanceAction()
    {

        
        
       
        
    }
}
