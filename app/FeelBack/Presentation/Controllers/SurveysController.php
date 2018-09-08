<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Survey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    public function displaySurvey($survey_code) {
        $survey = Survey::where('code', '=', $survey_code)->get();

        //TODO: maybe map to domain model

        return response()->json($survey);
    }

    public function displaySurveyEntities($survey_code) {
        $entities = Survey::where('code', '=', $survey_code)->first()->roles()->get();

        return response()->json($entities);
    }

    public function saveSurveyEntry(Request $request, $survey_code) {
        if (!Survey::where('code', '=', $survey_code)->exists()) {
            return response()->json([]);
        }

        //TODO: insert data into database
    }
}