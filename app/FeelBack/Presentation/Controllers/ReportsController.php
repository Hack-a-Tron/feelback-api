<?php

namespace App\FeelBack\Presentation\Controllers;

use App\FeelBack\Persistence\ActiveRecord\Category;
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
        $surveyCode = $request->get('surveyCode');

        $survey = Survey::where('code', '=', $surveyCode)->first();
        if (null == $survey) {
            return response()->json([], 404);
        }

        $results = Result::where('survey_id', '=', $survey['id'])->get();

        $resultsc = DB::table('result')
            ->select('customer_id', DB::raw('count(*) a+s total'))
            ->groupBy( 'emotion_id', 'customer_id')
            ->get();
var_dump($resultsc); die;
        $return = [];

//        $return = [
//            [
//                'entity' => 'MVK7SM1339',
//                'stats'  => [
//                    [
//                        'emotion' => 'INC268A99T',
//                        'votes'   => 5,
//                        'percent' => '',
//                    ],
//                    [
//                        'emotion' => 'INC268A99T',
//                        'votes'   => 5,
//                        'percent' => '',
//                    ],
//                    [
//                        'emotion' => 'INC268A99T',
//                        'votes'   => 5,
//                        'percent' => '',
//                    ],
//                ],
//            ],
//        ];

        foreach ($results as $result) {
            if (!empty($return[$result['entity_id']][$result['emotion_id']])) {
                $return[$result['entity_id']][$result['emotion_id']]++;
                // customer ++ ???
            } else {
                $return[$result['entity_id']][$result['emotion_id']] = 1;
            }
//
//            var_dump($result);
//            die;

            /**
             * ["id"]=>
             * int(1)
             * ["survey_id"]=>
             * int(1)
             * ["entity_id"]=>
             * int(1)
             * ["emotion_id"]=>
             * int(1)
             * ["customer_id"]=>
             * int(2)
             */
        }


        foreach ($return as $entity_id => $value)


        var_dump($return);

//        var_dump(count($reports));
        die;



//        var_dump($type, $surveyCode); die;
    }
}
