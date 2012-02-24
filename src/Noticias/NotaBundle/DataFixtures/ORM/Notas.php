<?php
namespace Noticias\NotaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\NotaBundle\Entity\Nota;
use Noticias\PlazaBundle\Util\Util;

class Notas extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 60;
    }
    public function load (ObjectManager $manager)
	{
        $usuarios=$manager->getRepository('UsuarioBundle:Usuario')->findAll();
        $fuentes=$manager->getRepository('NotaBundle:Fuente')->findAll();
        for ($i=0; $i <2000 ; $i++) {
			$nota = new Nota();
			$nota->setTitulo($this->getTitulos());
			$nota->setAvance($this->getAvances());
                        $nota->setNota($this->getNotas());
                        $nota->setInserto($this->getInsertos());
                        $nota->setCamarografo($this->getCamarografos());
                        $nota->setEditor($this->getCamarografos());
                        $nota->setConductor($this->getCamarografos());
                        $nota->setUrgente(false);
                        $nota->setFechaCrea(new \DateTime('now - '.rand(1, 150).' days'));
			$nota->setFuente($this->getFuentes($fuentes));
			$nota->setUsuario($usuarios[rand(0, count($usuarios)-1)]);
                        $nota->setEstatal(false);
                        $nota->setAnual(false);
                        $nota->setFechaSucc(new \DateTime('now - '.rand(1, 150).' days'));
			$manager->persist($nota);
		}
		$manager->flush();
        
        
        }
        private function getAvances ()
	 {
	 	$titulo='';
	 	$numerodetitulos=rand(4, 10);
	 	$titulos=array('Hola Buenas Tardes Bienvenida','Avances de Promovison','Detiernen a narcos','Promovision','Robando en la esquina','Error 404 se muere la pagina hora a llorar','Al diablo se lo llevara la verga','Dios peleara con fuerza este 2012 en la batalla final','las mejores cosas de la vida son gratis','remolachas con patatas','el respeto al derecho ajeno es la paz beno juearez','tengo sueño y estoy creando las fixtures  para el sistema de captura promovision');
		  
          for ($i=0; $i<$numerodetitulos; $i++) {
            $titulo .= strtolower($titulos[rand(0, count($titulos)-1)]);
          }
          return $titulo;
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
        
        private function getNotas ()
	 {
	 	$titulo='';
	 	$numerodetitulos=rand(6, 25);
	 	$titulos=array('Muerto','Se cae','Detiernen a narcos','Promovision','Robando en la esquina','La novena nocturna','Al diablo se lo llevara la verga','Dios peleara con fuerza este 2012 en la batalla final','las mejores cosas de la vida son gratis','remolachas con patatas','el respeto al derecho ajeno es la paz beno juearez','tengo sueño y estoy creando las fixtures  para el sistema de captura promovision');
		  
          for ($i=0; $i<$numerodetitulos; $i++) {
            $titulo .= strtolower($titulos[rand(0, count($titulos)-1)]);
          }
          return $titulo;
        }
        private function getInsertos ()
	 {
	 	$titulo='';
	 	$numerodetitulos=rand(1, 10);
	 	$titulos=array('Muerto','Se cae','Detiernen a narcos','Promovision','Robando en la esquina','La novena nocturna','Al diablo se lo llevara la verga','Dios peleara con fuerza este 2012 en la batalla final','las mejores cosas de la vida son gratis','remolachas con patatas','el respeto al derecho ajeno es la paz beno juearez','tengo sueño y estoy creando las fixtures  para el sistema de captura promovision');
		  
          for ($i=0; $i<$numerodetitulos; $i++) {
            $titulo .= strtolower($titulos[rand(0, count($titulos)-1)]);
          }
          return $titulo;
        }
        
        private function getCamarografos ()
	 {
	 	$titulo='';
	 	$numerodetitulos=rand(1, 10);
	 	$titulos=array('Javier Estrada','Pepito Rodrigez','Pancho Villa','Promovision','Robando en la esquina','La novena nocturna','Al diablo se lo llevara la verga','Dios peleara con fuerza este 2012 en la batalla final','las mejores cosas de la vida son gratis','remolachas con patatas','el respeto al derecho ajeno es la paz beno juearez','tengo sueño y estoy creando las fixtures  para el sistema de captura promovision');
		  
          for ($i=0; $i<$numerodetitulos; $i++) {
            $titulo .= strtolower($titulos[rand(0, count($titulos)-1)]);
          }
          return $titulo;
        }
        private function getFuentes($fuentes)
        {
            
            $fuente='';
            $fuente=strtolower($fuentes[rand(0,count($fuentes)-1)]->getNombre());
            return $fuente;
            
        }
}
