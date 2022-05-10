<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Model;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 *
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function add(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findGenerals()
    {
        $queryBuilder = $this->createQueryBuilder('g')
            ->where('g.general != :identifier')
            ->setParameter('identifier', 1);
//            ->leftJoin('g.model', 'model')
//            ->addSelect('model')
//            ->leftJoin('g.car', 'car')
//            ->addSelect('car');

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public function findTechnicals()
    {
        $queryBuilder = $this->createQueryBuilder('t')
            ->where('t.technical != :identifier')
            ->setParameter('identifier', 1);

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public function findTunings()
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->where('a.tuning != :identifier')
            ->setParameter('identifier', 1);

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Category[] Returns an array of Category objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Category
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
