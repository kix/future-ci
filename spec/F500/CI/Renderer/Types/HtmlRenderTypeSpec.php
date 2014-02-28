<?php

/**
 * This file is part of the Future CI package.
 * Future CI is licensed under MIT (https://github.com/f500/future-ci/blob/master/LICENSE).
 */

namespace spec\F500\CI\Renderer\Types;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class HtmlRenderTypeSpec
 *
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 * @copyright 2014 Future500 B.V.
 * @license   https://github.com/f500/future-ci/blob/master/LICENSE MIT
 * @package   spec\F500\CI\Renderer\Types
 */
class HtmlRenderTypeSpec extends ObjectBehavior
{

    protected $text = <<<'EOT'
<!DOCTYPE html>
<html>
    <body>
        <h1>Hello World!</h1>
    </body>
</html>

EOT;

    function let()
    {
        $viewDir = __DIR__ . '/../../../../data/views';

        /** @noinspection PhpParamsInspection */
        $this->beConstructedWith($viewDir);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('F500\CI\Renderer\Types\HtmlRenderType');
    }

    function it_renders_html()
    {
        $this->render('html_render_type')->shouldReturn($this->text);
    }
}
