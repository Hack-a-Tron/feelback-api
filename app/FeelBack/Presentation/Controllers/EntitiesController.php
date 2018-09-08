<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Entity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class EntitiesController
 * @package App\FeelBack\Presentation\Controllers
 */
class EntitiesController extends Controller
{
    /**
     * Display entities in admin panel
     *
     * @return mixed
     */
    public function showEntities()
    {
        return Entity::paginate(10);
    }

    /**
     * Create entity in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeEntity(Request $request)
    {
        $entity = new Entity();

        $entity->code = (string)Str::uuid();
        $entity->name = $request->input('name');
        $entity->description = $request->input('description');
        //TODO: upload file
        $entity->image = '';
        $entity->category_id = $request->input('category');
        $entity->save();
        $entity = Entity::find($entity->id)->toArray();

        return response()->json([$entity]);
    }

    /**
     * Display entity in admin panel
     *
     * @param string $entity_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showEntity($entity_code)
    {
        $entity = Entity::where('code', $entity_code)->get();

        if (null == $entity) {
            return response()->json([], 404);
        }

        return response()->json([$entity->toArray()]);
    }

    /**
     * Update entity in database
     *
     * @param Request $request
     * @param string  $entity_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEntity(Request $request, $entity_code)
    {
        $entity = Entity::where('code', $entity_code)->get();

        if (null == $entity) {
            return response()->json([], 404);
        }

        $entity->name = $request->input('name');
        $entity->description = $request->input('description');
        //TODO: upload file
        $entity->image = '';
        $entity->save();
        $entity = Entity::find($entity->id)->toArray();

        return response()->json([$entity]);
    }

    /**
     * Delete entity
     *
     * @param string $entity_code
     */
    public function deleteEntity($entity_code)
    {
        Entity::where('code', '=', $entity_code)->first()->delete();
    }
}
