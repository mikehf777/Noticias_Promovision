<?php
namespace Noticias\NotaBundle\Entity;
use Doctrine\ORM\EntityRepository;

class NotaRepository extends EntityRepository
{
    public function findNotasdelDia_Usuario($usuario)
    {
        $hoy = \date('Y-m-d');
<<<<<<< HEAD
        $usuario_id=$usuario->getID();
=======
>>>>>>> e02c7214632e947e12891d9a07d3d595260c6e49
        $em = $this->getEntityManager();
        $dql='SELECT n, u
               FROM NotaBundle:Nota n
               JOIN n.usuario u
               WHERE n.fecha_crea >= :fecha 
                 AND n.usuario = :usuario
              ORDER BY n.fecha_crea DESC';
        $consulta = $em->createQuery($dql);
<<<<<<< HEAD
        $consulta->setParameter('fecha',$hoy);
        $consulta->setParameter('usuario',$usuario_id);
        
        
        return $consulta->getResult();    
    }
    public function findNotasdeldia_Plaza($usuario)
    {
        $hoy = \date('Y-m-d');
        $em = $this->getEntityManager();
        $usuario_id_plaza=$usuario->getPlaza();
        $dql='SELECT n, u
               FROM NotaBundle:Nota n
               JOIN n.usuario u
               WHERE u.plaza =:plaza 
               AND n.fecha_crea >=:fecha
              ORDER BY u.apellidos DESC';
        
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('fecha',$hoy);
        $consulta->setParameter('plaza',$usuario_id_plaza);
=======
        $consulta->setParameter('fecha', $hoy.'00:00:00');
        $consulta->setParameter('usuario',$usuario);
>>>>>>> e02c7214632e947e12891d9a07d3d595260c6e49
        
        return $consulta->getResult();
    }
}
?>
