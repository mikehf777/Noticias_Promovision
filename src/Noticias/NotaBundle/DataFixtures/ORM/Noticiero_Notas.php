<?php
namespace Noticias\NotaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\NotaBundle\Entity\Noticiero;
use Noticias\NotaBundle\Entity\Nota;
use Noticias\PlazaBundle\Util\Util;

class Noticiero_Notas extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 130;
    }
    public function load (ObjectManager $manager)
    {
        $noticieros=$manager->getRepository('NotaBundle:Noticiero')->findAll();
        $notas=$manager->getRepository('NotaBundle:Nota')->findAll();
        for($i=0;$i<count($noticieros);$i++)
        {
            $noticiero = new Noticiero();
            $nota = new Nota();
            $nota =$notas[rand(0, count($notas)-1)]; 
            $noticiero=$noticieros[$i];
            $noticiero->getNotas()->add($notas[rand(0, count($notas)-1)]);
            $nota->getNoticieros()->add($noticiero);
            $manager->persist($nota);
            $manager->persist($noticiero);
        }
        $manager->flush();
    }
}
