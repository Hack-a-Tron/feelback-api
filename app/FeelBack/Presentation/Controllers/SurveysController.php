<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Emotion;
use App\FeelBack\Persistence\ActiveRecord\Entity;
use App\FeelBack\Persistence\ActiveRecord\Result;
use App\FeelBack\Persistence\ActiveRecord\Survey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class SurveysController
 * @package App\FeelBack\Presentation\Controllers
 */
class SurveysController extends Controller
{
    /**
     * Display surveys in admin panel
     *
     * @return mixed
     */
    public function showSurveys() {
        return Survey::paginate(10);
    }

    /**
     * Create survey in database
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeSurvey(Request $request) {
        $survey = new Survey();

        $survey->code = (string) Str::uuid();
        $survey->title = $request->input('title');
        $survey->description = $request->input('description');

        $survey->save();

        foreach ($request->input('entities') as $entity) {
            $entity_details = Entity::where('code', '=', $entity['code'])->first();

            DB::table('entity_to_survey')->insert([
                [
                    'survey_id' => $survey->id,
                    'entity_id' => $entity_details->id,
                    'order' => $entity['order']
                ]
            ]);
        }

        $response = Survey::find($survey->id)->get()->toArray();
        $response['entities'] = $survey->entities()->get()->toArray();

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
        /** @var Survey $survey */
        $survey = Survey::where('code', $survey_code)->get();

        if (null == $survey) {
            return response()->json([], 404);
        }

        $survey->title = $request->input('title');
        $survey->description = $request->input('description');

        $survey->save();

        $survey->entities()->detach();

        foreach ($request->input('entities') as $entity) {
            $entity_details = Entity::where('code', '=', $entity['code'])->first();

            DB::table('entity_to_survey')->insert([
                [
                    'survey_id' => $survey->id,
                    'entity_id' => $entity_details->id,
                    'order' => $entity['order']
                ]
            ]);
        }

        $response = Survey::find($survey->id)->get()->toArray();
        $response['entities'] = $survey->entities()->get()->toArray();

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
        $entities = Survey::where('code', '=', $survey_code)->first()->entities()->orderBy('order')->get();

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
