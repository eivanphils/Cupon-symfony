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

        $dql = 'SELECT o, c, t 
                  FROM OfertaBundle:Oferta o 
                  JOIN o.ciudad c JOIN o.tienda t 
                  WHERE o.revisada = TRUE 
                  AND o.slug = :slug
                  AND c.slug = :ciudad';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('slug', $slug);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);

        return $consulta->getSingleResult();
    }

    public function findRelacionadas($ciudad)
    {
        $em = $this->getEntityManager();

        $dql = 'SELECT o,c 
                  FROM OfertaBundle:Oferta o 
                  JOIN o.ciudad c 
                  WHERE o.revisada = TRUE 
                  AND c.slug != :ciudad 
                  ORDER BY o.nombre';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(5);


        return $consulta->getResult();
    }

    public function findRecientes($ciudad_id)
    {
        $em = $this->getEntityManager();

        $dql = 'SELECT o, t 
                FROM OfertaBundle:Oferta o
                JOIN o.tienda t 
                WHERE o.revisada = true 
                AND o.ciudad = :id 
                ORDER BY o.nombre DESC';

        $consulta = $em->createQuery($dql);
        $consulta->setMaxResults(5);
        $consulta->setParameter('id', $ciudad_id);

        return $consulta->getResult();
    }
}