<?php


namespace Noticias\NotaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class EditarAvanceType extends AbstractType
 {
     public function buildForm(FormBuilder $builder,array $options)
     {
         $builder->add('fecha_succ','birthday', array('label'=> 'Actualizar fecha del suceso'));
                   
     }
     public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Noticias\NotaBundle\Entity\Nota',);
    }
     public function getName()
     {
          return 'editaravance';
     }


 }