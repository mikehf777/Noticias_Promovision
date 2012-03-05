<?php
namespace Noticias\UsuarioBundle\Entity;
use Doctrine\ORM\EntityRepository;
class UsuarioRepository extends EntityRepository
{
    public function findAvancesDelDia($reportero)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $consulta = $em->createQuery('SELECT o FROM UsuarioBundle:Usuario o WHERE o');
    }
}
?>
