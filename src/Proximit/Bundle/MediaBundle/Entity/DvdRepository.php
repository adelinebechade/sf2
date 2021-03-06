<?php

namespace Proximit\Bundle\MediaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DvdRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DvdRepository extends EntityRepository
{
    public function getDvdByRea($id_realisateur)
    {
        $qb = $this->createQueryBuilder('d');
        $qb
                ->where('d.realisateur = :realisateur_id')
                ->setParameter('realisateur_id', $id_realisateur);
        
        $q = $qb->getQuery();

        return $q->getResult();  
    }
}
