<?php
namespace Cupon\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class OfertaRepository extends EntityRepository
{
    public function findOfertaDelDia($ciudad)
    {
        $em = $this->getEntityManager();

        $dql = 'SELECT o, c, t
                FROM OfertaBundle:Oferta o
                JOIN o.ciudad c JOIN o.tienda t
                WHERE o.revisada = TRUE 
                AND c.slug = :ciudad';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);

        return $consulta->getSingleResult();
    }
    public function findOferta($ciudad, $slug)
    {
        $em = $this->getEntityManager();

        $query = 'SELECT o, c, t 
                  from OfertaBundle:Oferta o 
                  JOIN o.ciudad c JOIN o.tienda t 
                  WHERE o.revisada = TRUE 
                  AND o.slug = :slug
                  AND c.slug = :ciudad';

        $consulta = $em->createQuery($query);
        $consulta->setParameter('slug', $slug);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);

        return $consulta->getSingleResult();

    }
}