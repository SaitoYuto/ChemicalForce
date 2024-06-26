<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    /**
     * @param string $salesRepId
     */
    public function findBySalesRepId($salesRepId);

    /**
     * @param string $productId
     * @return int updated number
     */
    public function updateById($productId);

    /**
     * @param string $productId
     * @return int deleted number
     */
    public function deleteById($productId);
}
