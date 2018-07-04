<?php
namespace Test\Notification\Fields;

use Notification\Fields\GetFields;
use Symfony\Component\Yaml\Yaml;
use Tests\TestCase;

class GetFieldsTest extends TestCase
{
    public function testConstruct()
    {
        /** @var Yaml */
        $yml = $this->getMockBuilder(Yaml::class)
            ->disableOriginalConstructor()
            ->getMock();

        $field = new GetFields($yml);

        $this->assertSame($yml, $field->getYaml());
    }

    /**
     * @expectedException \Notification\Exception\FileNotFound
     * @expectedExceptionMessage File not found
     * @expectedExceptionCode 404
     */
    public function testGetSourceFailure()
    {
        $yaml = new Yaml();

        $field = new GetFieldsMock($yaml);

        $this->assertTrue(is_array($field->getSource()));
    }

    public function testGetSource()
    {
        $field = $this->getMockBuilder(GetFieldsMock::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertTrue(is_array($field->getSource()));

    }

    public function testGetFields()
    {
        $field = $this->getMockBuilder(GetFieldsMock::class)
            ->disableOriginalConstructor()
            ->setMethods(['getSource'])
            ->getMock();

        $field->expects($this->any())
            ->method('getSource')
            ->willReturn(['key' => 'test_params']);

        $this->assertEquals($field->getFields(), ['key' => 'test_params']);
        $this->assertEquals($field->getTags(),   array_values(['key' => 'test_params']));
        $this->assertEquals($field->getKeys(),   array_keys(['key' => 'test_params']));
    }
}

class GetFieldsMock extends GetFields
{
    public function getSource(): array
    {
        return parent::getSource();
    }
}