<?php

/**
 * Class SurveyTest
 */
class SurveyTest extends TestCase
{
    public function testPostSurveys()
    {
        $emotions = [
            'INC268A99T' => 'Joy',
            'O83FCDHPLM' => 'Trust',
            'AGYNHQK8S6' => 'Fear',
            'CVPBNMJOHN' => 'Surprise',
            'NN029SZHF9' => 'Sadness',
            'CZ4F39VYOU' => 'Disgust',
            'DKKHLKSFBB' => 'Anger',
            'PT3PXPSUNG' => 'Anticipation',
        ];

        $entities = [
          'MVK7SM1339' => 'eMAG Brand',
          'ZIHEY98DJ1' => 'Searching in site',
          'WPBP874SFU' => 'Ordering and payment',
          'A0EPI43SOB' => 'Delivery',
          '1GSDFWSGEW' => 'Philips PerfectCare Pure GC7635/30'
        ];

        $surveyCode = 'PDNW4998Z1';


        for($i = 1; $i<=100; $i++){

            $random =  \Illuminate\Support\Str::random(10);

            $customer =  \App\FeelBack\Persistence\ActiveRecord\Customer::create([
                'code'       => $random,
                'name'       => 'John '.$random,
                'created_at' => time(),
                'updated_at' => time(),
                'deleted_at' => null,
            ]);

            $survey = [
                'customer'  => $random,
                'responses' => [
                    [
                        'entity'  => 'expe',
                        'emotion' => 'INC268A99T',
//                'intensity'
                    ],
                    [
                        'entity'  => 'expe',
                        'emotion' => 'O83FCDHPLM',
//                'intensity'
                    ],
                    [
                        'entity'  => 'expe',
                        'emotion' => 'AGYNHQK8S6',
//                'intensity'
                    ],
                    [
                        'entity'  => 'serc',
                        'emotion' => 'AGYNHQK8S6',
//                'intensity'
                    ],
                ],
            ];

            foreach ($entities as $code => $title){
                $survey['responses'][] = [
                    'entity' => $code,
                    'emotion'
                ];
            }



            $response = $this->call('POST', '/api/survey/'.$surveyCode, $survey);

        }





//        $response->seeJsonEquals([
//            'created' => true,
//        ]);
//        var_dump($response);

        $this->assertEquals(201, $response->status());
    }
}