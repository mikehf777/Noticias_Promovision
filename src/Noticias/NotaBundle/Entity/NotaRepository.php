<?php
namespace Noticias\NotaBundle\Entity;
use Doctrine\ORM\EntityRepository;
class NotaRepository extends EntityRepository
{
    public function findAvancesDelDia($usuario)
    {
        $hoy = new \DateTime('today');
        $em = $this->getDoctrine()->getEntityManager();
        $dql='SELECT o 
               FROM NotaBundle:Nota o 
               WHERE o.fecha_crea = :fecha 
                 AND o.usuario = :usuario
              ORDER BY o.fecha_crea ASC ';
        
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('fecha',$hoy);
        $consulta->setParameter('usuario',$usuario);
        
        
        return $consulta->getResult();    
    }
}
?>
