<?php
namespace Cupon\CiudadBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CiudadRepository extends EntityRepository
{
    public function findOneBySlug($ciudad)
    {
        $em = $this->getEntityManager();

        $dql = 'SELECT c FROM CiudadBundle:Ciudad c 
                WHERE c.slug = :slug';
        
        $consulta = $em->createQuery($dql);
        $consulta->setMaxResults(1);
        $consulta->setParameter('slug', $ciudad);

        return $consulta->getSingleResult();
    }

    public function findCercanas($ciudad_id)
    {
        $em = $this->getEntityManager();

        $dql = 'SELECT c FROM CiudadBundle:Ciudad c
                WHERE c.id != :id
                ORDER BY c.nombre ASC';

        $consulta = $em->createQuery($dql);
        $consulta->setMaxResults(5);
        $consulta->setParameter('id', $ciudad_id);

        return $consulta->getResult();
    }
}
