<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CategoriesController
 * @package App\FeelBack\Presentation\Controllers
 */
class CategoriesController extends Controller
{
    /**
     * Display categories in admin panel
     *
     * @return mixed
     */
    public function showCategories() {
        return Category::paginate(10);
    }

    /**
     * Create category in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCategory(Request $request) {
        $category = new Category();

        $category->code = $request->input('code');
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        $response = $category->save();

        return response()->json([$response]);
    }


}
