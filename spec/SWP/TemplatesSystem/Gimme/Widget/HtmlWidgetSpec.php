<?php

namespace spec\SWP\TemplatesSystem\Gimme\Widget;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SWP\TemplatesSystem\Gimme\Model\WidgetInterface;

class HtmlWidgetSpec extends ObjectBehavior
{
    public function let(WidgetInterface $widgetModel)
    {
        $widgetModel->getParameters()->willReturn(['html_body' => 'sample html']);
        $this->beConstructedWith($widgetModel);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('SWP\TemplatesSystem\Gimme\Widget\HtmlWidget');
    }

    public function it_should_render()
    {
        $this->render()->shouldReturn('sample html');
    }

    public function it_should_renturn_null_when_no_parameter($widgetModel)
    {
        $widgetModel->getParameters()->willReturn([]);

        $this->render()->shouldReturn(null);
    }

    public function it_should_check_if_it_is_visible($widgetModel)
    {
        $widgetModel->getVisible()->willReturn(true);
        $this->isVisible()->shouldReturn(true);

        $widgetModel->getVisible()->willReturn(false);
        $this->isVisible()->shouldReturn(false);
    }
}
