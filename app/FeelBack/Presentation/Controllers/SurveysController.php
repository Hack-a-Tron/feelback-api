<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Emotion;
use App\FeelBack\Persistence\ActiveRecord\Entity;
use App\FeelBack\Persistence\ActiveRecord\Result;
use App\FeelBack\Persistence\ActiveRecord\Survey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class SurveysController
 * @package App\FeelBack\Presentation\Controllers
 */
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
     * Display survey in backend
     *
     * @param string $survey_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showSurvey($survey_code) {
        $survey = Survey::where('code', $survey_code)->get();

        if (null == $survey) {
            return response()->json([], 404);
        }

        return response()->json([$survey->toArray()]);
    }

    /**
     * Update survey
     *
     * @param Request $request
     * @param string $survey_code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSurvey(Request $request, $survey_code) {
        $survey = Survey::where('code', $survey_code)->get();

        if (null == $survey) {
            return response()->json([], 404);
        }

        $survey->code = $request->input('code');
        $survey->title = $request->input('title');
        $survey->description = $request->input('description');

        $response = $survey->save();

        return response()->json([$response]);
    }

    /**
     * Delete survey
     *
     * @param string $survey_code
     */
    public function deleteSurvey($survey_code) {
        Survey::where('code', '=', $survey_code)->first()->delete();
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
