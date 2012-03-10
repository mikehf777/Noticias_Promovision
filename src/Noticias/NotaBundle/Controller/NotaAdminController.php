<?php
namespace Noticias\NotaBundle\Controller;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
class NotaAdminController extends Controller 
{
 public function FuentesAction()
 {
     $em=$this->getDoctrine()->getEntityManager();
     $fuentes=$em->getRepository("NotaBundle:Fuente")->findAll();
     return $fuentes;
    
 } 
}
