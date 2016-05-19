<?php
namespace Cupon\CiudadBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\CiudadBundle\Entity\Ciudad;

class Ciudades extends AbstractFixture implements OrderedFixtureInterface
{
    /*Orden para ejecutar el fixture*/
    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $ciudades = array(
            array('nombre' => 'Madrid'),
            array('nombre' => 'Barcelona'),
            array('nombre' => 'Valencia'),
            array('nombre' => 'Sevilla'),
            array('nombre' => 'Zaragoza'),
            array('nombre' => 'Málaga'),
            array('nombre' => 'Murcia'),
            array('nombre' => 'Palma de Mallorca'),
            array('nombre' => 'Las Palmas de Gran Canaria'),
            array('nombre' => 'Bilbao'),
            array('nombre' => 'Alicante'),
            array('nombre' => 'Córdoba'),
            array('nombre' => 'Valladolid'),
            array('nombre' => 'Vigo'),
        );

        foreach ($ciudades as $ciudad)
        {
            $entidad = new Ciudad();

            $entidad->setNombre($ciudad['nombre']);

            $manager->persist($entidad);
        }

        $manager->flush();
    }
}
