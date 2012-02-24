<?php
namespace Noticias\UsuarioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\UsuarioBundle\Entity\Comision;
use Noticias\PlazaBundle\Util\Util;

class Comisiones extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 50;
    }
	 public function load (ObjectManager $manager)
	 {
	 	$usuarios=$manager->getRepository('UsuarioBundle:Usuario')->findAll();
		for ($i=0; $i <1000 ; $i++) {
			$comision= new Comision();
			$comision->setTitulo($this->getTitulos());
			$comision->setDescripcion($this->getDescripciones());
			$comision->setFecha(new \DateTime('now - '.rand(1, 150).' days'));
			$comision->setUsuario($usuarios[rand(0, count($usuarios)-1)]);
			$comision->setUrgente(false);
			$comision->setRealizada(false);
			$manager->persist($comision);
			
		}
		$manager->flush();
	 }
	 private function getTitulos ()
	 {
	 	$titulo='';
	 	$numerodetitulos=rand(1, 8);
	 	$titulos=array('Ve','Noticia','Televisa','Tv Azteca','estado de los estados','A corazon Abierto','Novelisimo','10 en baile','si tuviera un millon de dolares','remolachas con patatas','el respeto al derecho ajeno es la paz beno juearez','tengo sueño y estoy creando las fixturss para promovision');
		  
        for ($i=0; $i<$numerodetitulos; $i++) {
            $titulo .= strtolower($titulos[rand(0, count($titulos)-1)]);
        }
        return $titulo;
	 }
	  private function getDescripciones ()
	 {
	 	$nombre='';
	 	$numerodedescripciones=rand(1, 8);
	 	$descripciones=array('Hola esto es  una comision ','Me encanta Michael Jakson','El gordito es el dueño de promolandia','Los aztecas se establecieron en marte ','estado de los estados tiene una audiencia mayor a la del superbowl','El FBI nos kiere detener con su bendita ley sopa','S pelean por pura Mamada','Los reptilianos conquistaran el mundo en el ','si tuviera un millon de dolares','remolachas con patatas','el respeto al derecho ajeno es la paz beno juarez','tengo sueño y estoy creando las fixturss para promovision','ya kiero irme a echar una chela he tenido una semana super mega pesada');
		  
        for ($i=0; $i<$numerodedescripciones; $i++) {
            $nombre .= strtolower($descripciones[rand(0, count($descripciones)-1)]) .'';
        }
        return $nombre;
	 }
}