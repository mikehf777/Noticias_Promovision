<?php
namespace Noticias\UsuarioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\UsuarioBundle\Entity\Efermeride;
use Noticias\PlazaBundle\Util\Util;

class Efermerides extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 50;
    }

public function load (ObjectManager $manager)
	{
		$usuarios=$manager->getRepository('UsuarioBundle:Usuario')->findAll();
		for ($i=0; $i <500 ; $i++) {
			$efermeride = new Efermeride();
			$efermeride->setFecha(new \DateTime('now - '.rand(7000, 20000).' days'));
			$efermeride->setTitulo($this->getTitulos());
			$efermeride->setDescripcion($this->getDescripcion());
			$efermeride->setUsuario($usuarios[rand(0, count($usuarios)-1)]);
		    $manager->persist($efermeride);
			
		}
			$manager->flush();
		
	}
	
	 private function getTitulos ()
         {
         	$nombre='';
          	$numerodetitulos=rand(1, 4);
                $titulos = array('La ley sopa caera en el 2013','Dios es inalambrico','Por k la gallina cruzo la calle ','La tele a colores funciona gracias a los looney toons','miguel hidalgo era vieja','La luna no es de queso','las piramides de egipto fueron hechas por tutancamon','Justino Castor es un cantante de salsa ','la tristeza es un estado de animo en el cual no estas feliz');

        for ($i=0; $i<$numerodetitulos; $i++) {
            $nombre .= strtolower($titulos[rand(0, count($titulos)-1)]);
        }
        return $nombre;
         }
		  private function getDescripcion ()
         {
         	$nombre='';
          	$numerodedescripciones=rand(1, 8);
                $descripciones = array('La ley sopa caera en el 2013','Dios es inalambrico','Por k la gallina cruzo la calle ','La tele a colores funciona gracias a los looney toons','miguel hidalgo era vieja','La luna no es de queso','las piramides de egipto fueron hechas por tutancamon','Justino Castor es un cantante de salsa ','la tristeza es un estado de animo en el cual no estas feliz');

        for ($i=0; $i<$numerodedescripciones; $i++) {
            $nombre .= strtolower($descripciones[rand(0, count($descripciones)-1)]);
        }
        return $nombre;
         }
	
}