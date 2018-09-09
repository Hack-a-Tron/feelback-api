<?php

/**
 * Class SurveyTest
 */
class SurveyTest extends TestCase
{
    public function testPostSurveys()
    {
        $surveyCode = 'survey';

        $survey = [
            'customer'  => 'userone',
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


        $response = $this->call('POST', '/api/survey/'.$surveyCode, $survey);
//        $response->seeJsonEquals([
//            'created' => true,
//        ]);
//        var_dump($response);

        $this->assertEquals(201, $response->status());
    }
}