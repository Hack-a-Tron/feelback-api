<?php

/**
 * Class SurveyTest
 */
class SurveyTest extends TestCase
{
    public function testPostSurveys()
    {
        $emotions1 = [
            'INC268A99T', // 'Joy',
            'O83FCDHPTL', // 'Trust',
            'AGYNHQK8S6', // 'Fear',
            'CVPBNMJOHN', // 'Surprise'
        ];

        $emotions2 = [
            'NN029SZHF9', // 'Sadness',
            'CZ4F39VYOU', // 'Disgust',
            'DKKHLKSFBB', // 'Anger',
            'PT3PXPSUNG', // 'Anticipation',
        ];

        $entities = [
            'MVK7SM1339' => 'eMAG Brand',
            'ZIHEY98DJ1' => 'Searching in site',
            'WPBP874SFU' => 'Ordering and payment',
            'A0EPI43SOB' => 'Delivery',
            '1GSDFWSGEW' => 'Philips PerfectCare Pure GC7635/30',
        ];

        $surveyCode = 'PDNW4998Z1';

        for ($i = 1; $i <= 100; $i++) {
            $random = \Illuminate\Support\Str::random(10);

            \App\FeelBack\Persistence\ActiveRecord\Customer::create([
                'code'       => $random,
                'name'       => 'John '.$random,
                'created_at' => time(),
                'updated_at' => time(),
                'deleted_at' => null,
            ]);

            $survey = [
                'customer' => $random,
            ];

            foreach ($entities as $code => $title) {
                $survey['responses'][] = [
                    'entity'  => $code,
                    'emotion' => rand(1, 200) % 2 == 0 ? $emotions2[0] : $emotions1[0],
                ];
                $survey['responses'][] = [
                    'entity'  => $code,
                    'emotion' => rand(1, 200) % 2 == 0 ? $emotions2[1] : $emotions1[1],
                ];
                $survey['responses'][] = [
                    'entity'  => $code,
                    'emotion' => rand(1, 200) % 2 == 0 ? $emotions2[2] : $emotions1[2],
                ];
                $survey['responses'][] = [
                    'entity'  => $code,
                    'emotion' => rand(1, 200) % 2 == 0 ? $emotions2[3] : $emotions1[3],
                ];
            }

            $response = $this->call('POST', '/api/survey/'.$surveyCode, $survey);

        }

        $this->assertEquals(201, $response->status());
    }
}