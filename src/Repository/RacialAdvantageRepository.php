<?php

namespace App\Repository;

use App\Entity\RacialAdvantage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RacialAdvantage>
 *
 * @method RacialAdvantage|null find($id, $lockMode = null, $lockVersion = null)
 * @method RacialAdvantage|null findOneBy(array $criteria, array $orderBy = null)
 * @method RacialAdvantage[]    findAll()
 * @method RacialAdvantage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RacialAdvantageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RacialAdvantage::class);
    }

    public function add(RacialAdvantage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RacialAdvantage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RacialAdvantage[] Returns an array of RacialAdvantage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RacialAdvantage
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
