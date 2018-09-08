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
    public function showEntities() {
        return Entity::paginate(10);
    }

    /**
     * Create entity in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeEntity(Request $request) {
        $entity = new Entity();

        $entity->code = (string) Str::uuid();
        $entity->name = $request->input('name');
        $entity->description = $request->input('description');
        //TODO: upload file
        $entity->image = '';
        $entity->category_id = $request->input('category');

        $response = $entity->save();

        return response()->json([$response]);
    }

    /**
     * Display entity in admin panel
     *
     * @param string $entity_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showEntity($entity_code) {
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
     * @param string $entity_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEntity(Request $request, $entity_code) {
        $emotion = Emotion::where('code', $entity_code)->get();

        if (null == $emotion) {
            return response()->json([], 404);
        }

        $emotion->name = $request->input('name');
        $emotion->description = $request->input('description');
        //TODO: upload file
        $emotion->image = '';

        $response = $emotion->save();

        return response()->json([$response]);
    }

    /**
     * Delete entity
     *
     * @param string $entity_code
     */
    public function deleteEntity($entity_code) {
        Entity::where('code', '=', $entity_code)->first()->delete();
    }
}
