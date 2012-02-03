<?php
namespace Noticias\PlazaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\PlazaBundle\Entity\Plaza;
use Noticias\PlazaBundle\Util\Util;

class Plazas extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 10;
    }
	
	public function load (ObjectManager $manager)
	{
		$plazas=array(
		'Cancun',
		'Playa del Carmen',
		'Tulum',
		'Cozumel',
		'Isla Mujeres',
		'Puerto Morelos',
		'Felipe Carrillo Puerto',
		'Jose Maria Morelos',
		'Bacalar',
		'Othon P Blanco',
		'Lazaro Cardenas',
		);
		$municipios=array(
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
            'Suspendisse leo tortor, tempus in lacinia sit amet, varius eu urna.',

		);
		$direcciones=array(
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
            'Suspendisse leo tortor, tempus in lacinia sit amet, varius eu urna.',
		);
		$estados=array(
		'Q Roo',
		'Q Roo',
		'Q Roo',
		'Q Roo',
		'Q Roo',
		'Merida',
		'Merida',
		'Merida',
		'Merida',
		'Medida',
		'Merida',
		);
	    $telefonos=array(
	    '111111',
		'222222',
		'333333',
		'444444',
		'555555',
		'666666',
		'777777',
		'888888',
		'999999',
		'000000',
		'123456',
		);
	
		
		 	for ($i=0; $i <count($plazas) ; $i++) {  
            $plaza = new Plaza();
            $plaza->setNombre($plazas[$i]);
            $plaza->setMunicipio($municipios[$i]);
			$plaza->setDireccion($direcciones[$i]);
			$plaza->setEstado($estados[$i]);
			$plaza->setTelefono($telefonos[$i]);
            $manager->persist($plaza);
			}
			$manager->flush();
		
	}
}
