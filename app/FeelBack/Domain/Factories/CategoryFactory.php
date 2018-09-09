<?php

namespace App\FeelBack\Domain\Factories;

use App\Feelback\Domain\Models\Category;

/**
 * Class CategoryFactory
 * @package App\FeelBack\Domain\Factories\
 */
class CategoryFactory
{
    /**
     * @param string      $code
     * @param string      $name
     * @param null|string $description
     *
     * @return Category
     */
    public function build(string $code, string $name, ?string $description): Category
    {
        $category = $this->buildEmptyCategory();
        $category->setCode($code);
        $category->setName($name);
        $category->setDescription($description);
        return $category;
    }

    /**
     * @return Category
     */
    protected function buildEmptyCategory(): Category
    {
        return new Category();
    }
}