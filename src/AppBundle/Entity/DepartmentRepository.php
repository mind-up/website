<?php

namespace AppBundle\Entity;

/**
 * DepartmentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DepartmentRepository extends \Doctrine\ORM\EntityRepository
{
	public function findAllOrdered()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT d 
                FROM AppBundle:Department d 
                WHERE d.order != 0
                ORDER BY d.order ASC'
            )
            ->getResult();
    }
}
