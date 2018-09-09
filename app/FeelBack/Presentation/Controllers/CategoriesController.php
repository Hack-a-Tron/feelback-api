<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Domain\Factories\CategoryFactory;
use App\FeelBack\Domain\Services\CategoriesService;
use App\FeelBack\Persistence\ActiveRecord\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class CategoriesController
 * @package App\FeelBack\Presentation\Controllers
 */
class CategoriesController extends Controller
{
    protected $categoriesService;
    protected $categoryFactory;

    public function __construct(
        CategoriesService $categoriesService,
        CategoryFactory $categoryFactory
    ) {
        $this->categoriesService = $categoriesService;
        $this->categoryFactory = $categoryFactory;
    }

    /**
     * Display categories in admin panel
     *
     * @return mixed
     */
    public function list()
    {
        return $this->categoriesService->list(10);
    }

    /**
     * Create category in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        $categoryModel = $this->categoryFactory->build(
            (string)Str::uuid(),
            $request->input('name'),
            $request->input('description')
        );

        $status = $this->categoriesService->save($categoryModel);

        return response()->json([$status]);
    }

    /**
     * Display category in admin panel
     *
     * @param string $category_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showCategory($category_code)
    {
        $category = Category::where('code', $category_code)->get();

        if (null == $category) {
            return response()->json([], 404);
        }

        return response()->json([$category->toArray()]);
    }

    /**
     * Update category in database
     *
     * @param Request $request
     * @param string  $category_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCategory(Request $request, $category_code)
    {
        $category = Category::where('code', $category_code)->get();

        if (null == $category) {
            return response()->json([], 404);
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        $category = Category::find($category->id)->toArray();

        return response()->json([$category]);
    }

    /**
     * Delete category
     *
     * @param string $category_code
     */
    public function deleteCategory($category_code)
    {
        Category::where('code', '=', $category_code)->first()->delete();
    }
}
