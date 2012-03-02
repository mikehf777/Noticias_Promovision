<?php


namespace Noticias\NotaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class AvanceType extends AbstractType
 {
     public function buildForm(FormBuilder $builder,array $options)
     {
         $builder->add('titulo')                              
                 ->add('fecha_succ','birthday', array('label'=> 'Fecha del suceso'))
                 ->add('estatal','checkbox', array('required' => false))
                 ->add('anual','checkbox', array('required' => false));
                 
     }
     public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Noticias\NotaBundle\Entity\Nota',);
    }
     public function getName()
     {
          return 'avance';
     }


 }