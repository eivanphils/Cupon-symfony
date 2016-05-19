<?php

namespace Cupon\OfertaBundle\Entity;

use Cupon\CiudadBundle\Entity\Ciudad;
use Cupon\TiendaBundle\Entity\Tienda;
use Doctrine\ORM\Mapping as ORM;
use Cupon\OfertaBundle\Util\Util;

/**
 * Oferta
 *
 * @ORM\Entity(repositoryClass="Cupon\OfertaBundle\Repository\OfertaRepository")
 */
class Oferta
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(name="descripcion", type="text", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(name="condiciones", type="text", length=255)
     */
    private $condiciones;

    /**
     * @ORM\Column(name="foto", type="string", length=255)
     */
    private $foto;

    /**
     * @ORM\Column(name="precio", type="decimal")
     */
    private $precio;

    /**
     * @ORM\Column(name="descuento", type="decimal")
     */
    private $descuento;

    /**
     * @ORM\Column(name="fecha_publicacion", type="datetime")
     */
    private $fechaPublicacion;

    /**
     * @ORM\Column(name="fecha_expiracion", type="datetime")
     */
    private $fechaExpiracion;

    /**
     * @ORM\Column(name="compras", type="integer")
     */
    private $compras;

    /**
     * @ORM\Column(name="umbral", type="integer")
     */
    private $umbral;

    /**
     * @ORM\Column(name="revisada", type="boolean")
     */
    private $revisada;

    /**
     * @ORM\ManyToOne(targetEntity="Cupon\CiudadBundle\Entity\Ciudad")
     */
    private $ciudad;

    /**
     * @ORM\ManyToOne(targetEntity="Cupon\TiendaBundle\Entity\Tienda")
     */
    private $tienda;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param $nombre
     *
     * @return Oferta
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        $this->slug = Util::getSlug($nombre);
    }

    /**
     * Get nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set slug
     *
     * @param $slug
     *
     * @return Oferta
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set descripcion
     *
     * @param $descripcion
     *
     * @return Oferta
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set condiciones
     *
     * @param $condiciones
     *
     * @return Oferta
     */
    public function setCondiciones($condiciones)
    {
        $this->condiciones = $condiciones;

        return $this;
    }

    /**
     * Get condiciones
     */
    public function getCondiciones()
    {
        return $this->condiciones;
    }

    /**
     * Set foto
     *
     * @param $foto
     *
     * @return Oferta
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set precio
     *
     * @param $precio
     *
     * @return Oferta
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descuento
     *
     * @param $descuento
     *
     * @return Oferta
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set fechaPublicacion
     *
     * @param $fechaPublicacion
     *
     * @return Oferta
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    /**
     * Get fechaPublicacion
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * Set fechaExpiracion
     *
     * @param \DateTime $fechaExpiracion
     *
     * @return Oferta
     */
    public function setFechaExpiracion($fechaExpiracion)
    {
        $this->fechaExpiracion = $fechaExpiracion;

        return $this;
    }

    /**
     * Get fechaExpiracion
     *
     * @return \DateTime
     */
    public function getFechaExpiracion()
    {
        return $this->fechaExpiracion;
    }

    /**
     * Set compras
     *
     * @param $compras
     *
     * @return Oferta
     */
    public function setCompras($compras)
    {
        $this->compras = $compras;

        return $this;
    }

    /**
     * Get compras
     */
    public function getCompras()
    {
        return $this->compras;
    }

    /**
     * Set umbral
     *
     * @param $umbral
     *
     * @return Oferta
     */
    public function setUmbral($umbral)
    {
        $this->umbral = $umbral;

        return $this;
    }

    /**
     * Get umbral
     */
    public function getUmbral()
    {
        return $this->umbral;
    }

    /**
     * Set revisada
     *
     * @param $revisada
     *
     * @return Oferta
     */
    public function setRevisada($revisada)
    {
        $this->revisada = $revisada;

        return $this;
    }

    /**
     * Get revisada
     */
    public function getRevisada()
    {
        return $this->revisada;
    }

    /**
     * Set ciudad
     *
     * @param $ciudad
     *
     * @return Oferta
     */
    public function setCiudad(Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set tienda
     *
     * @param $tienda
     *
     * @return Oferta
     */
    public function setTienda(Tienda $tienda)
    {
        $this->tienda = $tienda;

        return $this;
    }

    /**
     * Get tienda
     */
    public function getTienda()
    {
        return $this->tienda;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getNombre();
    }
}

