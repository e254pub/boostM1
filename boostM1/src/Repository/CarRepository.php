<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Car;

class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    /**
     * @param int $id
     * @return Car|null
     */
    public function findById(int $id): ?Car
    {
        return $this->find($id);
    }

    /**
     * @return Car[]
     */
    public function findAll(): array
    {
        return $this->findAll();
    }
}
