<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class CustomersController
 * @package App\FeelBack\Presentation\Controllers
 */
class CustomersController extends Controller
{
    /**
     * Display entities in admin panel
     *
     * @return mixed
     */
    public function list()
    {
        return Customer::paginate(10);
    }

    /**
     * Create entity in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $entity = new Customer();

        $entity->code = (string)Str::uuid();
        $entity->name = $request->input('name');
        $entity->save();
        $entity = Customer::find($entity->id)->toArray();

        return response()->json([$entity]);
    }

    /**
     * Display entity in admin panel
     *
     * @param string $entity_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($entity_code)
    {
        $entity = Customer::where('code', $entity_code)->get();

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
    public function update(Request $request, $entity_code)
    {
        $entity = Customer::where('code', $entity_code)->get();

        if (null == $entity) {
            return response()->json([], 404);
        }

        $entity->name = $request->input('name');
        $entity->save();
        $entity = Customer::find($entity->id)->toArray();

        return response()->json([$entity]);
    }

    /**
     * Delete entity
     *
     * @param string $entity_code
     */
    public function delete($entity_code)
    {
        Customer::where('code', '=', $entity_code)->first()->delete();
    }
}
