<?php

namespace spec\SWP\TemplatesSystem\Gimme\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WidgetInterfaceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SWP\TemplatesSystem\Gimme\Model\WidgetInterface');
    }
}
