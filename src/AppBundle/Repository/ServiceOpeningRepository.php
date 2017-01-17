<?php

namespace AppBundle\Repository;

use AppBundle\Entity\City;
use AppBundle\Entity\Service;

/**
 * ServiceOpeningRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServiceOpeningRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @param City $city
     * @param $restaurant
     * @param Service $service
     * @return array
     */
    public function findSearch(City $city, $restaurant, Service $service)
    {

        $query = $this->createQueryBuilder('so')
            ->innerJoin('so.restaurant', 'r')
            ->innerJoin('so.service', 's')
            // this line is here just to assure the first test
            ->where('0 = 0');
        if (!is_null($restaurant) || $restaurant != '') {
            $query = $query->andWhere('r.name = :restaurant')
                ->setParameter('restaurant', $restaurant);
        } elseif (!is_null($city)) {
            $query = $query->andWhere(' (r.city = :city or r.postalCode = :postalCode) ')
                ->setParameter('city', $city->getName())
                //->andWhere('r.postalCode = :postalCode')
                ->setParameter('postalCode', $city->getPostalCode());
        }

        if (!is_null($service)) {
            $query = $query->andWhere('s.id = :serviceId')
                ->setParameter('serviceId', $service->getId());
        }
        return $query->getQuery()->getResult();
    }
}
