<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class TaskRepository extends EntityRepository
{
    function findNextTasks($page = 1, $limit = 3, $sortBy = 'id')
    {
        $paginator = new Paginator($this->createQueryBuilder('task')
            ->orderBy("task.{$sortBy}", 'ASC')
            ->getQuery());
        return $paginator
            ->getQuery()
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit)
            ->getResult();
    }
}
