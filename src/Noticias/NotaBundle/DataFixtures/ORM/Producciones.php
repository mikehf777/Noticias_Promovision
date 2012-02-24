<?php
namespace Noticias\NotaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\NotaBundle\Entity\Nota;
use Noticias\NotaBundle\Entity\Produccion;

class Producciones extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 100;
    }
    	public function load (ObjectManager $manager)
	{
            $notas = $manager->getRepository('NotaBundle:Nota')->findAll();
            for($i=0;$i<2000;$i++)
            {
                $Produccion = new Produccion();
                $Produccion->setDuracion(new \DateTime('now'));
                $Produccion->setAlAire($this->getAlAire());
                $Produccion->setTAspectos(new \DateTime('now'));
                $Produccion->setTAudio(new \DateTime('now'));
                $Produccion->setTPlayer(new \DateTime('now'));
                $nota=$notas[$i];
                $Produccion->setNota($nota);
                $manager->persist($Produccion);    
            }
            $manager->flush();
        }
        private function getAlAire()
        {
            $bolean=rand(0, 30);
            if($bolean % 2 == 0)
            {
                return false;
            }
            return true;
            
        }
        

}
