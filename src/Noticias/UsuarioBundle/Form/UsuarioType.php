<?php

namespace Noticias\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class UsuarioType extends AbstractType
 {
     public function buildForm(FormBuilder $builder,array $options)
     {
         $builder->add('nombre')
                 ->add('apellidos')          
                 ->add('email', 'email')
                 ->add('alias')
                 ->add('password', 'repeated', array('type' => 'password',
                       'invalid_message' => 'Las dos contraseñas deben coincidir',
                       'options' => array('label' => 'Contraseña'
                       )))                   
                 ->add('fecha_nac','birthday', array('label'=> 'Fecha de nacim'))
                 ->add('activo') 
                 ->add('session');
                 
     }
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Noticias\UsuarioBundle\Entity\Usuario',);
    }
     public function getName()
     {
          return 'usuario';
     }


 }