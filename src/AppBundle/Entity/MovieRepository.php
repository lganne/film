<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MovieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MovieRepository extends EntityRepository
{
    
    public function countAll()
    {
        $count=0;
        $count=$this->createQueryBuilder('m')
                 ->select('COUNT(m.id)')
                ->getQuery()
                 ->getSingleScalarResult();
        return $count;
    }
    
    public function FiltreDate()
    {
        $qb = $this->createQueryBuilder('m')
                        ->select('MIN(m.annee)')
                        ->getQuery()
                        ->getSingleScalarResult();
        

        return $qb;
    }
    
    public function resultatFitre($max,$min,$offset)
    {
         $qb = $this->createQueryBuilder('m')
                        ->select()
                        ->where('m.annee BETWEEN :min AND :max')
                       ->setParameter('min', $min)
                      ->setParameter('max', $max)
                      ->setMaxResults(54,$offset)
                      ->getQuery()
                       ->getResult();
                       
        return $qb;
    }  
    
    public function countFiltre($max,$min)
    {
         $qb = $this->createQueryBuilder('m')
                        ->select('COUNT(m.id)')
                        ->where('m.annee BETWEEN :min AND :max')
                       ->setParameter('min', $min)
                      ->setParameter('max', $max)
                      ->getQuery()
                       ->getSingleScalarResult();
                       
        return $qb;
    }
       
}
