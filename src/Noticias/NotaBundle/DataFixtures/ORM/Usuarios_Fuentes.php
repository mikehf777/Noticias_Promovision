<?php
namespace Noticias\NotaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Noticias\NotaBundle\Entity\Fuente;
use Noticias\UsuarioBundle\Entity\Usuario;
use Noticias\PlazaBundle\Util\Util;

class Usuarios_Fuentes extends AbstractFixture implements OrderedFixtureInterface
{
	
    public function getOrder()
    {
        return 110;
    }
    public function load (ObjectManager $manager)
    {
        $usuarios=$manager->getRepository('UsuarioBundle:Usuario')->findAll();
        $fuentes=$manager->getRepository('NotaBundle:Fuente')->findAll();
        for($i=0;$i<count($usuarios);$i++)
        {
            $usuario = new Usuario();
            $fuente = new Fuente();
            $fuente =$fuentes[rand(0, count($fuentes)-1)]; 
            $usuario=$usuarios[$i];
            $usuario->getFuentes()->add($fuentes[rand(0, count($fuentes)-1)]);
            $fuente->getUsuarios()->add($usuario);
            $manager->persist($fuente);
            $manager->persist($usuario);
        }
        $manager->flush();
    }
}
