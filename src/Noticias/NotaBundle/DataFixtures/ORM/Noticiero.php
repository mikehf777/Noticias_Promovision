<?php
namespace Noticias\NotaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Noticias\NotaBundle\Entity\Noticiero;
use Noticias\UsuarioBundle\Entity\Usuario;

use Noticias\PlazaBundle\Util\Util;

class Noticieros extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 80;
    }
    public function load (ObjectManager $manager)
    {
        $usuarios=$manager->getRepository('UsuarioBundle:Usuario')->findAll();
 
        for ($i=0; $i <200 ; $i++) 
                {
			$noticiero = new Noticiero();
                        $noticiero->setFecha(new \DateTime('now - '.rand(1, 150).' days'));
                        $noticiero->setEmision($this->getEmision());
                        $noticiero->setEstatal(false);
                        $noticiero->setPlaza($this->getPlaza($usuarios));
                     
			$manager->persist($noticiero);
		}
		$manager->flush();
        
        
        }
         private function getEmision()
	 {

	 	$titulos=array('Nocturno','Vespertino','Matutino');
                $titulo= $titulos[rand(0, count($titulos)-1)]; 
                
                return $titulo;
        }
        
        private function getPlaza($usuarios)
        {
           $plaza = $usuarios[rand(0, count($usuarios)-1)]->getPlaza()->getNombre();      
           return $plaza;
            
        }

}
