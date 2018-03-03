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

namespace PhlexaTest\Request\RequestType\Cause;

use PHPUnit\Framework\TestCase;
use Phlexa\Request\RequestType\Cause\Cause;

/**
 * Class CauseTest
 *
 * @package PhlexaTest\Request\Session
 */
class CauseTest extends TestCase
{
    /**
     *
     */
    public function testInstantiation()
    {
        $cause = new Cause('requestId');

        $this->assertEquals('requestId', $cause->getRequestId());
    }
}
