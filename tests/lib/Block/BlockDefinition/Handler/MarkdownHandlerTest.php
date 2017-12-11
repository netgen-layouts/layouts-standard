<?php

namespace Netgen\BlockManager\Standard\Tests\Block\BlockDefinition\Handler;

use Michelf\MarkdownInterface;
use Netgen\BlockManager\Block\DynamicParameters;
use Netgen\BlockManager\Core\Values\Block\Block;
use Netgen\BlockManager\Parameters\ParameterValue;
use Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler;
use PHPUnit\Framework\TestCase;

class MarkdownHandlerTest extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $markdownMock;

    /**
     * @var \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler
     */
    private $handler;

    public function setUp()
    {
        $this->markdownMock = $this->createMock(MarkdownInterface::class);

        $this->handler = new MarkdownHandler($this->markdownMock);
    }

    /**
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler::__construct
     * @covers \Netgen\BlockManager\Standard\Block\BlockDefinition\Handler\MarkdownHandler::getDynamicParameters
     */
    public function testGetDynamicParameters()
    {
        $this->markdownMock
            ->expects($this->once())
            ->method('transform')
            ->with($this->equalTo('# Title'))
            ->will($this->returnValue('<h1>Title</h1>'));

        $block = new Block(
            array(
                'availableLocales' => array('en'),
                'locale' => 'en',
                'parameters' => array(
                    'content' => new ParameterValue(
                        array(
                            'value' => '# Title',
                        )
                    ),
                ),
            )
        );

        $dynamicParameters = new DynamicParameters();

        $this->handler->getDynamicParameters($dynamicParameters, $block);

        $this->assertArrayHasKey('html', $dynamicParameters);
        $this->assertEquals('<h1>Title</h1>', $dynamicParameters['html']);
    }
}
