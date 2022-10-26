<?php

namespace App\Repository;

use App\Entity\DisconnectedPresentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DisconnectedPresentation>
 *
 * @method DisconnectedPresentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DisconnectedPresentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DisconnectedPresentation[]    findAll()
 * @method DisconnectedPresentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisconnectedPresentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DisconnectedPresentation::class);
    }

    public function add(DisconnectedPresentation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DisconnectedPresentation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DisconnectedPresentation[] Returns an array of DisconnectedPresentation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DisconnectedPresentation
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
