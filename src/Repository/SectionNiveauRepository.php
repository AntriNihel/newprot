<?php

namespace App\Repository;

use App\Entity\SectionNiveau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SectionNiveau>
 *
 * @method SectionNiveau|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionNiveau|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionNiveau[]    findAll()
 * @method SectionNiveau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionNiveauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionNiveau::class);
    }

    public function add(SectionNiveau $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SectionNiveau $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   
        public function findBySectionNiveau()
        {
            return $this->getEntityManager()
            ->createQuery(
                "SELECT concat(n.nomNiveau,' ',s.nomSection)
                FROM App\Entity\SectionNiveau sn  join sn.niveau n join sn.section s "
            )         
            ->getResult();
            
    }       



/*return $this->getEntityManager()
->createQuery(
    "SELECT m
    FROM App\Entity\Matieres m  join m.sectionNiveau n join n.niveau nn join n.section s
    
    WHERE concat(nn.nomNiveau,' ',s.nomSection) = :val and m.etatMatiere= true"
)
->setParameter('val', $value)

->getResult();
*/










//    /**
//     * @return SectionNiveau[] Returns an array of SectionNiveau objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SectionNiveau
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
