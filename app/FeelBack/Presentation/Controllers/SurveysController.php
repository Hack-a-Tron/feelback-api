<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Emotion;
use App\FeelBack\Persistence\ActiveRecord\Entity;
use App\FeelBack\Persistence\ActiveRecord\Result;
use App\FeelBack\Persistence\ActiveRecord\Survey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    /**
     * Create survey in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeSurvey(Request $request) {
        $survey = new Survey();

        $survey->code = $request->input('code');
        $survey->title = $request->input('title');
        $survey->description = $request->input('description');

        $response = $survey->save();

        return response()->json([$response]);
    }

    /**
     * Display survey to frontend
     *
     * @param string $survey_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function displaySurvey($survey_code) {
        $survey = Survey::where('code', '=', $survey_code)->get();

        //TODO: maybe map to domain model

        return response()->json([$survey->toArray()]);
    }

    /**
     * @param string $survey_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function displaySurveyEntities($survey_code) {
        $entities = Survey::where('code', '=', $survey_code)->first()->roles()->get();

        return response()->json($entities->toArray());
    }

    /**
     * @param Request $request
     * @param string $survey_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveSurveyEntry(Request $request, $survey_code) {
        $survey = Survey::where('code', '=', $survey_code)->first();
        $entity = Entity::where('code', '=', $request->input('entity'));
        $emotion = Emotion::where('code', '=', $request->input('emotion'));

        if (null == $survey || null == $entity || null == $emotion) {
            return response()->json([], 404);
        }

        $result = new Result();
        $result->survey_id = $survey['id'];
        $result->entity_id = $entity['id'];
        $result->emotion_id = $emotion['id'];
        $result->intensity = $request->input('intensity');

        $response = $result->save();

        return response()->json([$response]);
    }
}