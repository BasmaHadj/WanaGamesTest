<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PlayerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlayerRepository extends EntityRepository
{
    public function findJouerByName($name ) {
        {
            $qb = $this->createQueryBuilder('a')
                ->addSelect('player');

            if ($name != null) {
                $qb->andWhere($qb->expr()->like('a.name', ':test'));
                $qb->setParameter('test', '%' . $name . '%');
            }
        }
    }
}
