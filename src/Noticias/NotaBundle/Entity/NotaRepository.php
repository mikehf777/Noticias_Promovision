<?php
namespace Noticias\NotaBundle\Entity;
use Doctrine\ORM\EntityRepository;

class NotaRepository extends EntityRepository
{
    public function findAvancesDelDia_Reporteros($usuario)
    {
        $hoy = \date('Y-m-d');
        $em = $this->getEntityManager();
        $dql='SELECT n, u
               FROM NotaBundle:Nota n
               JOIN n.usuario u
               WHERE n.fecha_crea >= :fecha 
                 AND n.usuario = :usuario
              ORDER BY n.fecha_crea ASC';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('fecha', $hoy.'00:00:00');
        $consulta->setParameter('usuario',$usuario);
        
        return $consulta->getResult();
    }
}
?>
