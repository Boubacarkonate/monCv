<?php

namespace App\Repository;

use App\Entity\FormuleRecruteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormuleRecruteur>
 *
 * @method FormuleRecruteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormuleRecruteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormuleRecruteur[]    findAll()
 * @method FormuleRecruteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormuleRecruteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormuleRecruteur::class);
    }

    public function save(FormuleRecruteur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FormuleRecruteur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FormuleRecruteur[] Returns an array of FormuleRecruteur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FormuleRecruteur
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
