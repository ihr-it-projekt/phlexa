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

namespace Phlexa\Intent;

use Phlexa\Response\AlexaResponse;
use Phlexa\Response\Card\Standard;
use Phlexa\Response\OutputSpeech\SSML;

/**
 * Class HelpIntent
 *
 * @package Phlexa\Intent
 */
class HelpIntent extends AbstractIntent
{
    const NAME = 'AMAZON.HelpIntent';

    /**
     * @return AlexaResponse
     */
    public function handle(): AlexaResponse
    {
        $smallImageUrl = $this->getSkillConfiguration()->getSmallImageUrl();
        $largeImageUrl = $this->getSkillConfiguration()->getLargeImageUrl();

        $title   = $this->getTextHelper()->getHelpTitle();
        $message = $this->getTextHelper()->getHelpMessage();

        $this->getAlexaResponse()->setOutputSpeech(
            new SSML($message)
        );

        $this->getAlexaResponse()->setCard(
            new Standard($title, $message, $smallImageUrl, $largeImageUrl)
        );

        $this->getAlexaResponse()->setReprompt(
            new SSML($this->getTextHelper()->getRepromptMessage())
        );

        return $this->getAlexaResponse();
    }
}
