<?php

namespace TheIconic\Fixtures\Fixture;

class FixtureTest extends \PHPUnit_Framework_TestCase
{
    private $testParsedData = [
        'country' => [
            ['id' => 1, 'name' => 'Australia'],
            ['id' => 2, 'name' => 'Venezuela']
        ]
    ];

    /**
     * @var Fixture
     */
    private $testFixture;

    public function setUp()
    {
        $this->testFixture = Fixture::create($this->testParsedData);
    }

    public function testIteration()
    {
        foreach ($this->testFixture as $countryId => $countryData) {
            if ($countryId === 0) {
                $this->assertEquals('Australia', $countryData['name']);
            }

            if ($countryId === 1) {
                $this->assertEquals('Venezuela', $countryData['name']);
            }
        }


    }

    public function testCount()
    {
        $this->assertCount(2, $this->testFixture);
    }

    public function testGetName()
    {
        $this->assertEquals('country', $this->testFixture->getName());
    }
}
