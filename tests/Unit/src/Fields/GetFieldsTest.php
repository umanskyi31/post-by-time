<?php
namespace Test\Notification\Fields;

use Notification\Fields\GetFields;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

class GetFieldsTest extends TestCase
{
    public function testConstruct()
    {
        $yml = $this->getMockBuilder(Yaml::class)
            ->disableOriginalConstructor()
            ->getMock();

        $field = new GetFields($yml);

        $this->assertSame($yml, $field->getYaml());
    }
}