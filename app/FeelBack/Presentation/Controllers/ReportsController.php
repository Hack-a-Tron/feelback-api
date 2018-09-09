<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Category;
use App\FeelBack\Persistence\ActiveRecord\Emotion;
use App\FeelBack\Persistence\ActiveRecord\Entity;
use App\FeelBack\Persistence\ActiveRecord\Result;
use App\FeelBack\Persistence\ActiveRecord\Survey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class ReportsController
 * @package App\FeelBack\Presentation\Controllers
 */
class ReportsController extends Controller
{
    public function showReport(Request $request, $type)
    {
        $results = [];
        $entities = [];
        $emotions = [];

        $surveyCode = $request->get('surveyCode');

        $survey = Survey::where('code', '=', $surveyCode)->first();
        if (null == $survey) {
            return response()->json([], 404);
        }

        $surveyEntries = Result::where('survey_id', '=', $survey['id'])->get();

        foreach ($surveyEntries as $entry) {
            if (!isset($entities[$entry['entity_id']])) {
                $entities[$entry['entity_id']] = Entity::where('id', $entry['entity_id'])->first();
            }

            $entity = $entities[$entry['entity_id']];

            if (!isset($results[$entity['code']])) {
                $results[$entity['code']]['code'] = $entity['code'];
                $results[$entity['code']]['name'] = $entity['name'];
                $results[$entity['code']]['description'] = $entity['description'];
                $results[$entity['code']]['image'] = $entity['image'];

                $results[$entity['code']]['total_submits'] = 0;
                $results[$entity['code']]['emotions'] = [];
            }

            $results[$entity['code']]['total_submits']++;

            if (!empty($entry['emotion_id'])) {
                if (empty($emotions[$entry['emotion_id']])) {
                    $emotions[$entry['emotion_id']] = Emotion::where('id', $entry['emotion_id'])->first();
                }

                $emotion = $emotions[$entry['emotion_id']];

                if (!isset($results[$entity['code']]['emotions'][$emotion['code']])) {
                    $results[$entity['code']]['emotions'][$emotion['code']]['code'] = $emotion['code'];
                    $results[$entity['code']]['emotions'][$emotion['code']]['name'] = $emotion['name'];
                    $results[$entity['code']]['emotions'][$emotion['code']]['description'] = $emotion['description'];
                    $results[$entity['code']]['emotions'][$emotion['code']]['image'] = $emotion['image'];
                    $results[$entity['code']]['emotions'][$emotion['code']]['count'] = 0;
                }

                $results[$entity['code']]['emotions'][$emotion['code']]['count']++;
            }
        }

        return response()->json($results);
    }
}
