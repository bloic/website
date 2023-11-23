<?php

namespace App\Repository;

use App\Entity\Carreer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Carreer>
 *
 * @method Carreer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carreer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carreer[]    findAll()
 * @method Carreer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarreerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carreer::class);
    }

//    /**
//     * @return Carreer[] Returns an array of Carreer objects
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

//    public function findOneBySomeField($value): ?Carreer
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
