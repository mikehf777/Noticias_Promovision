<?php
namespace Noticias\NotaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\NotaBundle\Entity\Fuente;
use Noticias\PlazaBundle\Util\Util;

class Fuentes extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 20;
    }

public function load (ObjectManager $manager)
	{
    $fuentes=array(
		'polciaco',
		'ayuntamiento',
		'medico',
		'mago',
		'escandinava',
		'estatal',
		'mundo',
		'deportes',
		'ups',
		'columnistas',
		);
		$descripcion=array(
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Mauris ultricies nunc nec sapien tincidunt facilisis.',
            'Nulla scelerisque blandit ligula eget hendrerit.',
            'Sed malesuada, enim sit amet ultricies semper, elit leo lacinia massa, in tempus nisl ipsum quis libero.',
            'Aliquam molestie neque non augue molestie bibendum.',
            'Pellentesque ultricies erat ac lorem pharetra vulputate.',
            'Donec dapibus blandit odio, in auctor turpis commodo ut.',
            'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
            'Nam rhoncus lorem sed libero hendrerit accumsan.',
            'Maecenas non erat eu justo rutrum condimentum.',
		);
    
                for ($i=0; $i <count($fuentes) ; $i++) 
            {  
             $fuente = new Fuente();
             $fuente->setNombre($fuentes[$i]);
             $fuente->setDescripcion($descripcion[$i]);
             $manager->persist($fuente);
	    }
	     $manager->flush();
                
		
	}
}	