<?php
namespace Noticias\DiarioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\NotaBundle\Entity\Nota;
use Noticias\PlazaBundle\Util\Util;
use Noticias\DiarioBundle\Entity\Diario;

class Diarios extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 70;
    }
    	public function load (ObjectManager $manager)
	{
            $notas = $manager->getRepository('NotaBundle:Nota')->findAll();
            $usuarios = $manager->getRepository('UsuarioBundle:Usuario')->findAll();
            for($i=0;$i<200;$i++)
            {
                 $Diario = new Diario();
                $Diario->setTitulo($this->getTitulos());
                $Diario->setFechaPubli(new \DateTime('now - '.rand(1, 150).' days'));
                $Diario->setPublicado(False);
                $Diario->setCapturista($this->getUsuarios($usuarios));
                $Diario->setNota($this->getNotas($notas));
                $manager->persist($Diario);
            }
            $manager->flush();
        }
        private function getTitulos ()
	 {
	 	$titulo='';
	 	$numerodetitulos=rand(4, 13);
	 	$titulos=array('Muerto','Se cae','Detiernen a narcos','Promovision','Robando en la esquina','La novena nocturna','Al diablo se lo llevara la verga','Dios peleara con fuerza este 2012 en la batalla final','las mejores cosas de la vida son gratis','remolachas con patatas','el respeto al derecho ajeno es la paz beno juearez','tengo sueño y estoy creando las fixtures  para el sistema de captura promovision');
		  
          for ($i=0; $i<$numerodetitulos; $i++) {
            $titulo .= strtolower($titulos[rand(0, count($titulos)-1)]);
          }
          return $titulo;
        }
        private function getUsuarios($usuarios)
        {
            $usuario='';
            $usuario=strtolower($usuarios[rand(0,count($usuarios)-1)]->getNombre());
            return $usuario;
            
            
        }
        private function getNotas($notas)
        {
            $nota=$notas[rand(0, count($notas)-1)];
            return $nota;
        }

}
