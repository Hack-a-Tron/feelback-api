<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Emotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class EmotionsController
 * @package App\FeelBack\Presentation\Controllers
 */
class EmotionsController extends Controller
{
    /**
     * Display emotions in admin panel
     *
     * @return mixed
     */
    public function showEmotions() {
        return Emotion::paginate(10);
    }

    /**
     * Create emotion in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeEmotion(Request $request) {
        $emotion = new Emotion();

        $emotion->code = (string) Str::uuid();
        $emotion->name = $request->input('name');
        $emotion->description = $request->input('description');
        //TODO: upload file
        $emotion->image = '';
        $emotion->save();
        $emotion = Emotion::find($emotion->id)->toArray();

        return response()->json([$emotion]);
    }

    /**
     * Display emotion in admin panel
     *
     * @param string $emotion_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showEmotion($emotion_code) {
        $emotion = Emotion::where('code', $emotion_code)->get();

        if (null == $emotion) {
            return response()->json([], 404);
        }

        return response()->json([$emotion->toArray()]);
    }

    /**
     * Update emotion in database
     *
     * @param Request $request
     * @param string $emotion_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatEmotion(Request $request, $emotion_code) {
        $emotion = Emotion::where('code', $emotion_code)->get();

        if (null == $emotion) {
            return response()->json([], 404);
        }

        $emotion->name = $request->input('name');
        $emotion->description = $request->input('description');
        //TODO: upload file
        $emotion->image = '';
        $emotion->save();
        $emotion = Emotion::find($emotion->id)->toArray();

        return response()->json([$emotion]);
    }

    /**
     * Delete emotion
     *
     * @param string $emotion_code
     */
    public function deleteEmotion($emotion_code) {
        Emotion::where('code', '=', $emotion_code)->first()->delete();
    }
}
