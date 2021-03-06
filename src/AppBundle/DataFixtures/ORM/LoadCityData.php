<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 06/01/17
 * Time: 11:07
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\City;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCityData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $cities = array(
            array(
                "name" => "lyon 1er",
                "zipCode" => "69001"
            ),
            array(
                "name" => "lyon 2eme",
                "zipCode" => "69002"
            ),
            array(
                "name" => "lyon 3eme",
                "zipCode" => "69003"
            ),
            array(
                "name" => "lyon 4eme",
                "zipCode" => "69004"
            ),
            array(
                "name" => "lyon 5eme",
                "zipCode" => "69005"
            ),
            array(
                "name" => "lyon 6eme",
                "zipCode" => "69006"
            ),
            array(
                "name" => "lyon 7eme",
                "zipCode" => "69007"
            ),
            array(
                "name" => "lyon 8eme",
                "zipCode" => "69008"
            ),
            array(
                "name" => "lyon 9eme",
                "zipCode" => "69009"
            )
        );
        
        foreach($cities as $city){
            $cityObj = new City();
            $cityObj->setName($city["name"]);
            $cityObj->setZipCode($city["zipCode"]);
            $manager->persist($cityObj);
        }

        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 12;
    }
}