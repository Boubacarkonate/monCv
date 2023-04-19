<?php

namespace App\Repository;

use App\Entity\CandidatCv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CandidatCv>
 *
 * @method CandidatCv|null find($id, $lockMode = null, $lockVersion = null)
 * @method CandidatCv|null findOneBy(array $criteria, array $orderBy = null)
 * @method CandidatCv[]    findAll()
 * @method CandidatCv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatCvRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CandidatCv::class);
    }

    public function save(CandidatCv $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CandidatCv $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CandidatCv[] Returns an array of CandidatCv objects
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

//    public function findOneBySomeField($value): ?CandidatCv
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
