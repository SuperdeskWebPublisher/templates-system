<?php

namespace spec\SWP\TemplatesSystem\Gimme\Context;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SWP\TemplatesSystem\Gimme\Meta\Meta;

class ContextSpec extends ObjectBehavior
{
    function let(Meta $meta)
    {}

    function it_is_initializable()
    {
        $this->shouldHaveType('SWP\TemplatesSystem\Gimme\Context\Context');
    }

    function it_shuld_register_new_meta($meta)
    {
        $this->registerMeta('item', $meta)->shouldReturn(true);
    }

    function it_should_set_new_meta($meta)
    {
        $this->registerMeta('item', $meta)->shouldReturn(true);
        $this->item = $meta;
    }

    function it_should_read_meata($meta)
    {
        $this->registerMeta('item', $meta)->shouldReturn(true);
        $this->item = $meta;
        $this->item->shouldReturn($meta);
    }
}
