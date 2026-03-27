<?php

namespace App\Repository;

use App\Entity\QuoteRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuoteRequest>
 */
class QuoteRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuoteRequest::class);
    }

    public function findRecentQuotes(int $limit = 10): array
    {
        return $this->createQueryBuilder('qr')
            ->orderBy('qr.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}