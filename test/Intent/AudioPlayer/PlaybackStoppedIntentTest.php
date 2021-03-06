<?php
/**
 * Build voice applications for Amazon Alexa with phlexa and PHP
 *
 * @author     Ralf Eggert <ralf@travello.audio>
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link       https://github.com/phoice/phlexa
 * @link       https://www.phoice.tech/
 * @link       https://www.travello.audio/
 */

declare(strict_types=1);

namespace PhlexaTest\Intent\AudioPlayer;

use PHPUnit\Framework\TestCase;
use Phlexa\Configuration\SkillConfiguration;
use Phlexa\Intent\AbstractIntent;
use Phlexa\Intent\AudioPlayer\PlaybackStoppedIntent;
use Phlexa\Intent\IntentInterface;
use Phlexa\Request\RequestType\RequestTypeFactory;
use Phlexa\Response\AlexaResponse;
use Phlexa\TextHelper\TextHelper;

/**
 * Class PlaybackStoppedIntentTest
 *
 * @package PhlexaTest\Intent\AudioPlayer
 */
class PlaybackStoppedIntentTest extends TestCase
{
    /**
     * Test the instantiation of the class
     */
    public function testInstantiation()
    {
        $data = [
            'version' => '1.0',
            'session' => [
                'new'         => true,
                'sessionId'   => 'sessionId',
                'application' => [
                    'applicationId' => 'amzn1.ask.skill.applicationId',
                ],
                'user'        => [
                    'userId' => 'userId',
                ],
            ],
            'request' => [
                'type'                 => 'AudioPlayer.PlaybackStopped',
                'requestId'            => 'requestId',
                'timestamp'            => '2017-01-27T20:29:59Z',
                'locale'               => 'en-US',
                'token'                => '12345',
                'offsetInMilliseconds' => 1000,
            ],
            'context' => [
                'AudioPlayer' => [
                    'playerActivity' => 'IDLE',
                ]
            ],
        ];

        $alexaRequest       = RequestTypeFactory::createFromData(json_encode($data));
        $alexaResponse      = new AlexaResponse();
        $textHelper         = new TextHelper();
        $skillConfiguration = new SkillConfiguration();

        $intent = new PlaybackStoppedIntent($alexaRequest, $alexaResponse, $textHelper, $skillConfiguration);

        $this->assertTrue($intent instanceof AbstractIntent);
        $this->assertTrue($intent instanceof IntentInterface);
    }

    /**
     * Test the handling of the intent
     */
    public function testHandle()
    {
        $data = [
            'version' => '1.0',
            'session' => [
                'new'         => true,
                'sessionId'   => 'sessionId',
                'application' => [
                    'applicationId' => 'amzn1.ask.skill.applicationId',
                ],
                'user'        => [
                    'userId' => 'userId',
                ],
            ],
            'request' => [
                'type'                 => 'AudioPlayer.PlaybackStopped',
                'requestId'            => 'requestId',
                'timestamp'            => '2017-01-27T20:29:59Z',
                'locale'               => 'en-US',
                'token'                => '12345',
                'offsetInMilliseconds' => 1000,
            ],
            'context' => [
                'AudioPlayer' => [
                    'playerActivity' => 'IDLE',
                ]
            ],
        ];

        $alexaRequest       = RequestTypeFactory::createFromData(json_encode($data));
        $textHelper         = new TextHelper();
        $alexaResponse      = new AlexaResponse();
        $skillConfiguration = new SkillConfiguration();

        $intent = new PlaybackStoppedIntent($alexaRequest, $alexaResponse, $textHelper, $skillConfiguration);
        $intent->handle();

        $expected = [
            'version'           => '1.0',
            'sessionAttributes' => [],
            'response'          => [
                'shouldEndSession' => true,
            ],
        ];

        $this->assertEquals($expected, $alexaResponse->toArray());
    }
}
