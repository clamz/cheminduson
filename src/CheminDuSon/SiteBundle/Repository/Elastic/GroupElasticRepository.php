<?php

namespace CheminDuSon\SiteBundle\Repository\Elastic;

use Elastica\Query;
use FOS\ElasticaBundle\Repository;

class GroupElasticRepository extends Repository
{
    public function findByName($term)
    {
        $query = new Query\Bool();

        $splQuery = new Query\QueryString( sprintf('%s*', $term));

        $query->addMust(
            $splQuery
        );

        return $this->find($query);
    }
}