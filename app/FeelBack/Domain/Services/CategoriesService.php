<?php

namespace App\FeelBack\Domain\Services;

use App\Feelback\Domain\Models\Category;
use App\FeelBack\Persistence\Repositories\CategoriesRepository;

/**
 * Class CategoriesService
 * @package App\Feelback\Domain\Services
 */
class CategoriesService
{
    protected $categoriesRepository;

    /**
     * CategoriesService constructor.
     *
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function list($pageSize)
    {
        return $this->categoriesRepository->list($pageSize);
    }

    /**
     * @param Category $category
     *
     * @return bool
     */
    public function save(Category $category){
        return $this->categoriesRepository->save($category);
    }
}