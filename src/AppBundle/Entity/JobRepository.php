<?php

namespace AppBundle\Entity;

/**
 * JobRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JobRepository extends \Doctrine\ORM\EntityRepository
{
	public function findAllOrdered()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT j
                FROM AppBundle:Job j
                WHERE j.order != 0
                ORDER BY j.order ASC'
            )
            ->getResult();
    }
}

