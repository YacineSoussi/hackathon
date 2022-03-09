<?php

namespace App\Repository;

use App\Entity\RapportMesure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RapportMesure|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportMesure|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportMesure[]    findAll()
 * @method RapportMesure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportMesureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportMesure::class);
    }

    // /**
    //  * @return RapportMesure[] Returns an array of RapportMesure objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RapportMesure
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
