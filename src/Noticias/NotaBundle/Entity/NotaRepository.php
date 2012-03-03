<?php
namespace Noticias\NotaBundle\Entity;
use Doctrine\ORM\EntityRepository;

class NotaRepository extends EntityRepository
{
    public function findAvancesDelDia_Reporteros($usuario)
    {
        $hoy = new \DateTime('today', 'YYYY/DD/MM hh:mm:ss');
        $hoy->format('Y/m/d');
        $em = $this->getEntityManager();
        $dql='SELECT n
               FROM NotaBundle:Nota n
               JOIN n.usuario u
<<<<<<< HEAD
               WHERE n.fecha_crea >= :fecha
                 AND n.usuario = :usuario
              ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('fecha', '01XX-XX-XX 00:00:00');
=======
               WHERE n.fecha_crea >= :fecha 
                 AND n.usuario = :usuario
              ORDER BY n.fecha_crea ASC';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('fecha', $hoy->format('d/m/Y').'00:00:00');
>>>>>>> f34b26abee5f14772ed54a52bbd8e71832d7102f
        $consulta->setParameter('usuario',$usuario);
        
        
        return $consulta->getResult();    
    }
}
?>
