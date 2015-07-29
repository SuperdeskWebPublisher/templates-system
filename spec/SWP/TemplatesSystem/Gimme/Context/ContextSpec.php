<?php
/**
 * This file is part of the Superdesk Web Publisher Templates System
 *
 * Copyright 2015 Sourcefabric z.u. and contributors.
 *
 * For the full copyright and license information, please see the
 * AUTHORS and LICENSE files distributed with this source code.
 *
 * @copyright 2015 Sourcefabric z.ú.
 * @license http://www.superdesk.org/license
 */

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
