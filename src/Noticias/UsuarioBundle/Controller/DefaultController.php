<?php

namespace Noticias\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Noticias\UsuarioBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use Noticias\UsuarioBundle\Form\UsuarioType;

class DefaultController extends Controller
{
    
    public function inicioAction()
    {
         $usuario = $this->get('security.context')->getToken()->getUser();
        return $this->render('UsuarioBundle:Default:inicio.html.twig', array('usuario' => $usuario));
    }
        public function editorAction()
    {
         $usuario = $this->get('security.context')->getToken()->getUser();
        return $this->render('UsuarioBundle:Default:editor.html.twig', array('usuario' => $usuario));
    }
    
    public function registroAction()
    {
    
      
      $usuario = new Usuario();
         
      $formulario = $this->createForm(new UsuarioType(), $usuario);
       $request = $this->getRequest();

      if ($request->getMethod() == 'POST')
      {
        $formulario->bindRequest($request);
        if ($formulario->isValid()) 
        {


                // Obtenemos el usuario
                $nulo="nulo";
                $usuario = $formulario->getData(); 
                $usuario->setSalt(md5(time()));  
                //check contiene el array de los boxes usados
                $usuario->setRol($_POST['check']);
                $usuario->setPuesto($_POST['Puesto']);
                
                $usuario->setTelCasa($nulo);
                $usuario->setTelOfi($nulo);
                $usuario->setNextel($nulo);
                $usuario->setCelular($nulo);
               
                
                //encriptacion de la contraseña
 
                $factory = $this->get('security.encoder_factory');
                $codificador = $factory->getEncoder($usuario);
                $password = $codificador->encodePassword($usuario->getPassword(), $usuario->getSalt());
                $usuario->setPassword($password);


               // Guardamos el objeto en base de datos
               $em = $this->getDoctrine()->getEntityManager();
               $em->persist($usuario);
               $em->flush();

           
               return $this->redirect($this->generateUrl('registrado'));


        }
   
      }


        return $this->render('UsuarioBundle:Default:registro.html.twig', array('formulario' => $formulario->createView()));
    }
}
