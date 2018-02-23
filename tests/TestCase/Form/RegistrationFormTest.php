<?php
namespace App\Test\TestCase\Form;

use App\Form\RegistrationForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\RegistrationForm Test Case
 */
class RegistrationFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\RegistrationForm
     */
    public $Registration;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Registration = new RegistrationForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Registration);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
