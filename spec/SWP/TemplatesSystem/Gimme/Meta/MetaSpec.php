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

namespace spec\SWP\TemplatesSystem\Gimme\Meta;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MetaSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(__DIR__ . '/Resources/meta/article.yml', '{
            "title": "New article",
            "keywords": "lorem, ipsum, dolor, sit, ame",
            "dont_expose_it": "this should be not exposed"
        }');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SWP\TemplatesSystem\Gimme\Meta\Meta');
    }

    function it_should_show_title_when_printed()
    {
        $this->__toString()->shouldReturn('New article');
    }
}
