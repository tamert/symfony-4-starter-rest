<?php



declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractRepository extends ServiceEntityRepository
{
    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder(): QueryBuilder
    {
        $qb = $this->createQueryBuilder('this')->select('this');

        return $qb;
    }
}
