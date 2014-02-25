<?php

namespace spec\F500\CI\Build;

use F500\CI\Run\Toolkit;
use F500\CI\Suite\Suite;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Filesystem\Filesystem;

class StandardBuildSpec extends ObjectBehavior
{

    function let(Suite $suite, Filesystem $filesystem)
    {
        /** @noinspection PhpParamsInspection */
        $this->beConstructedWith('some_suite.2014.02.20.09.00.00', $suite, $filesystem);

        $suite->setActiveBuild($this->getWrappedObject())->shouldBeCalled();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('F500\CI\Build\StandardBuild');
        $this->shouldImplement('F500\CI\Build\Build');
    }

    function it_has_a_cn()
    {
        $this->getCn()->shouldReturn('some_suite.2014.02.20.09.00.00');
    }

    function it_has_a_suite(Suite $suite)
    {
        $this->getSuite()->shouldReturn($suite);
    }

    function it_runs_itself(
        Suite $suite,
        Toolkit $toolkit,
        EventDispatcherInterface $dispatcher,
        LoggerInterface $logger
    ) {
        $toolkit->getDispatcher()->willReturn($dispatcher);
        $toolkit->getLogger()->willReturn($logger);

        $suite->run($toolkit)->willReturn(true);

        $this->run($toolkit)->shouldReturn(true);
    }
}
