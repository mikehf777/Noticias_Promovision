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
        
        
             
            
       
      
    }
    
   public function opcionesavancesAction($opcion)
    {        
        $peticion=$this->getRequest();
        $nota_id=$peticion->request->get("id");
        $em=$this->getDoctrine()->getEntityManager(); 
        $avance=$em->getRepository('NotaBundle:Nota')->findOneBy(array('id' => $nota_id ));
   
        
        switch ($opcion)
        {
            case "ver": return $this->render('NotaBundle:Default:'.$opcion.'_avance.html.twig',array('avance'=>$avance));
                        break ;
            case "editar": 
                               $nota= new Nota();
                               $formulario = $this->createForm(new EditarAvanceType(), $nota);
                               $request = $this->getRequest();
                               $id=$request->request->get("id");
                               $em=$this->getDoctrine()->getEntityManager();
                               $avance2=$em->getRepository('NotaBundle:Nota')->findOneBy(array('id' => $id));
                               
                           
                               
                                //se comprueba que le formulario tenga un metodo post

      if ($request->getMethod() == 'POST')
      {
        $formulario->bindRequest($request);
        //si el formulario es valido se dispone a insertar datos ala BD
       // if ($formulario->isValid()) 
        //{
            //rellenamos el formulario y los campos que faltan aqui
           
            $avance2 = $formulario->getData(); 
            //$avance2->setUrgente($avance2->getUrgente()); 
            //$avance2->setFechaCrea($avance2->getFechaCrea());
            //$avance2->setEstatal($avance2->getEstatal());
            //$avance2->setAnual($avance2->getAnual());
            
            $avance2->setCamarografo($request->request->get("camarografo"));
            $avance2->setFuente($request->request->get("fuente"));
           
            $avance2->setAvance($request->request->get("Avance"));
            $avance2->setTitulo($request->request->get("titulo"));
            $em->merge($avance2);
            $em->flush();
            return $this->redirect($this->generateUrl('tabla_avance'));
       // }
      }
                          
                           $usercams = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
                                                                                   'puesto' => 'Camarografo'));
                           $fuentes = $em->getRepository('NotaBundle:Fuente')->findAll();
                           return $this->render('NotaBundle:Default:'.$opcion.'_avance.html.twig',
                                                                             array('avance'=>$avance,
                                                                             'usercams'=>$usercams,
                                                                             'fuentes'=>$fuentes,
                                                                             'formulario' => $formulario->createView()));
                           break;
            case "imprimir": return $this->render('NotaBundle:Default:'.$opcion.'_avance.html.twig',array('avance'=>$avance));
                             break;
            case "e-mail":
                
                break;
        }
    }     
    
 
    
 }
