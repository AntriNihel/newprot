<?php

namespace App\Repository;

use App\Entity\TarifPackNiveau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TarifPackNiveau>
 *
 * @method TarifPackNiveau|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifPackNiveau|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifPackNiveau[]    findAll()
 * @method TarifPackNiveau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifPackNiveauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifPackNiveau::class);
    }

    public function add(TarifPackNiveau $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TarifPackNiveau $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TarifPackNiveau[] Returns an array of TarifPackNiveau objects
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

//    public function findOneBySomeField($value): ?TarifPackNiveau
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
