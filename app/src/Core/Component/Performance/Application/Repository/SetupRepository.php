<?php

namespace App\Core\Component\Performance\Application\Repository;

use App\Core\Component\Performance\Domain\Entity\Setup;
use App\Core\Port\Persistence;


class SetupRepository implements SetupRepositoryInterface
{
    private $persistence;

    public function __construct(Persistence $persistence)
    {
        $this->persistence = $persistence;
        $this->persistence->getRepository(Setup::class);
    }

    public function findAll()
    {
        return $this->persistence->findAll();
    }

//    /**
//     * @throws ORMException
//     * @throws OptimisticLockException
//     */
/*    public function add(Setup $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }*/

//    /**
//     * @throws ORMException
//     * @throws OptimisticLockException
//     */
/*    public function remove(Setup $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }*/

    // /**
    //  * @return Setup[] Returns an array of Setup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Setup
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
