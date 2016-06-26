<?php
namespace Cupon\TiendaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TiendaRepository extends EntityRepository
{
    public function findUltimasOfertasPublicadas($tienda_id, $limit = 10)
    {
        $em = $this->getEntityManager();

        $dql = 'SELECT o, t 
                FROM OfertaBundle:Oferta o 
                JOIN o.tienda t 
                WHERE o.revisada = TRUE 
                AND o.tienda = :id
                ORDER BY o.fechaExpiracion DESC';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('id', $tienda_id);
        $consulta->setMaxResults($limit);

        return $consulta->getResult();
    }

    public function findCercanas($tienda_slug, $ciudad_slug, $limit = 10)
    {
        $em = $this->getEntityManager();

        $dql = 'SELECT t, c
                FROM TiendaBundle:Tienda t
                JOIN t.ciudad c   
                WHERE c.slug = :ciudad
                AND t.slug != :tienda';

        $consulta = $em->createQuery($dql);
        $consulta->setParameter('ciudad', $ciudad_slug);
        $consulta->setParameter('tienda', $tienda_slug);
        $consulta->setMaxResults($limit);

        return $consulta->getResult();
    }
}