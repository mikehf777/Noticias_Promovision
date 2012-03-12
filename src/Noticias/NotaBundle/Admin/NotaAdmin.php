<?php

namespace Noticias\NotaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Noticias\NotaBundle\Entity\Fuente;
class NotaAdmin extends Admin{
    protected function configureListFields(ListMapper $mapper)
    {
    $mapper
        ->add('id')
        ->add("anual")
        ->add("estatal")
        ->addIdentifier('avance', null, array('label' => 'Avance'))
        ->add('fuente')
        ->add('fecha_crea')
        ->add('usuario')
        ;
    }
    protected function configureDatagridFilters(DatagridMapper $mapper)
   {
               
    }

}
