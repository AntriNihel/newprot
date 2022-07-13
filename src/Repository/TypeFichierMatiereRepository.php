<?php

namespace App\Repository;

use App\Entity\TypeFichierMatiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeFichierMatiere>
 *
 * @method TypeFichierMatiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeFichierMatiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeFichierMatiere[]    findAll()
 * @method TypeFichierMatiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeFichierMatiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeFichierMatiere::class);
    }

    public function add(TypeFichierMatiere $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TypeFichierMatiere $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TypeFichierMatiere[] Returns an array of TypeFichierMatiere objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeFichierMatiere
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
