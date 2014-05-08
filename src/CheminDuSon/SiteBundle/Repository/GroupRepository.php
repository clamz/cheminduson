<?php

namespace CheminDuSon\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GroupRepository extends EntityRepository
{
    public function search($term)
    {
        $qb = $this->createQueryBuilder('g');
        $qb->where( $qb->expr()->like('g.name', ':term'))
            ->setParameter('term', '%'.$term.'%');

        return $qb->getQuery()->getResult();
    }
}