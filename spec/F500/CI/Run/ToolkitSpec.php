<?php

namespace spec\F500\CI\Run;

use F500\CI\Command\CommandFactory;
use F500\CI\Process\ProcessFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Filesystem\Filesystem;

class ToolkitSpec extends ObjectBehavior
{

    function let(
        CommandFactory $commandFactory,
        ProcessFactory $processFactory,
        EventDispatcherInterface $dispatcher,
        Filesystem $filesystem,
        LoggerInterface $logger
    ) {
        $buildsDir = __DIR__ . '/../../../data/builds';

        $this->beConstructedWith($buildsDir, $commandFactory, $processFactory, $dispatcher, $filesystem, $logger);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('F500\CI\Run\Toolkit');
    }

    function it_has_a_command_factory()
    {
        $this->getCommandFactory()->shouldHaveType('F500\CI\Command\CommandFactory');
    }

    function it_has_a_process_factory()
    {
        $this->getProcessFactory()->shouldHaveType('F500\CI\Process\ProcessFactory');
    }

    function it_has_an_event_dispatcher()
    {
        $this->getDispatcher()->shouldImplement('Symfony\Component\EventDispatcher\EventDispatcherInterface');
    }

    function it_has_a_filesystem()
    {
        $this->getFilesystem()->shouldHaveType('Symfony\Component\Filesystem\Filesystem');
    }

    function it_has_a_logger()
    {
        $this->getLogger()->shouldImplement('Psr\Log\LoggerInterface');
    }
}
