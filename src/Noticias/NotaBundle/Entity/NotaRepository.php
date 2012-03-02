<?php
namespace Noticias\NotaBundle\Entity;
use Doctrine\ORM\EntityRepository;
class NotaRepository extends EntityRepository
{
    public function findAvancesDelDia($usuario)
    {
        $hoy = new \DateTime('today');
        $em = $this->getDoctrine()->getEntityManager();
        $consulta = $em->createQuery('SELECT o FROM NotaBundle:Nota o WHERE o.fecha_crea = :fecha AND o.usuario = :usuario');
        $consulta->setParameter('fecha',$hoy);
        $consulta->setParameter('usuario',$usuario);
        $avences = $consulta->getResult();
        return $avences;    
    }
}
?>
