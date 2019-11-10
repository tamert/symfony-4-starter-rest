<?php



declare(strict_types=1);

namespace App\Repository;

use App\Entity\Book;
use App\Interfaces\RepositoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * {@inheritdoc}
 *
 * @method Book find($id, $lockMode = null, $lockVersion = null)
 * @method Book findOneBy(array $criteria, array $orderBy = null)
 * @method Book[] findAll()
 */
class BookRepository extends AbstractRepository implements RepositoryInterface
{
    /**
     * BookRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Book::class);
    }
}
