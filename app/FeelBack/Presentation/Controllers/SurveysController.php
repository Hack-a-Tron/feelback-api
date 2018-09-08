<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Survey;
use App\Http\Controllers\Controller;

class SurveysController extends Controller
{
    public function displaySurvey($survey_id) {
        $survey = Survey::find($survey_id);

        return response()->json([$survey]);
    }

    public function displaySurveyEntities($survey_id) {
        return response()->json([]);
    }

    public function saveSurveyEntry($survey_id) {
        //TODO: check if survey exists

        //TODO: insert data into database
    }
}