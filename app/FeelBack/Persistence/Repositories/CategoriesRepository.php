<?php

namespace App\FeelBack\Persistence\Repositories;

use App\FeelBack\Domain\Repositories\CategoriesRepositoryInterface;
use App\FeelBack\Persistence\ActiveRecord\Category;
use App\Feelback\Domain\Models\Category as CategoryModel;

/**
 * Class CategoriesRepository
 * @package App\FeelBack\Persistence\Repositories
 */
class CategoriesRepository implements CategoriesRepositoryInterface
{
    /**
     * @param int $pageSize
     *
     * @return mixed
     */
    public function list($pageSize)
    {
        $categories = Category::paginate($pageSize);
        // @todo: map categories to a CategoryCollection
        return $categories;
    }


    /**
     * @param CategoryModel $categoryModel
     *
     * @return bool
     */
    public function save(CategoryModel $categoryModel):bool
    {
        $category = new Category();

        $category->code = $categoryModel->getCode();
        $category->name = $categoryModel->getName();
        $category->description = $categoryModel->getDescription();

        return $category->save();
    }

}