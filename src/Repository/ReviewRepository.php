<?php



declare(strict_types=1);

namespace App\Repository;

use App\Entity\Review;
use App\Interfaces\RepositoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * {@inheritdoc}
 *
 * @method Review find($id, $lockMode = null, $lockVersion = null)
 * @method Review findOneBy(array $criteria, array $orderBy = null)
 * @method Review[] findAll()
 */
class ReviewRepository extends AbstractRepository implements RepositoryInterface
{
    /**
     * ReviewRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Review::class);
    }
}
