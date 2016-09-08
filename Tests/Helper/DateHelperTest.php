<?php

namespace Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Tests\Helper;

use Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\Helper\DateHelper;

class DateHelperTest extends \PHPUnit_Framework_TestCase
{
    protected $helper;
    protected $testDate;

    public function setUp()
    {
        if (method_exists($this, "createMock")) {
            $translator = $this->createMock('Symfony\Component\Translation\Translator', array(), array(), '', false);
        } else {
            $translator = $this->getMock('Symfony\Component\Translation\Translator', array(), array(), '', false);
        }

        $translator->expects($this->any())
            ->method('transChoice')
            ->will($this->returnArgument(0));

        $this->helper = new DateHelper($translator);
        $this->testDate = new \Datetime("now");
    }

    public function testGetDaysNumber()
    {
        $this->assertEquals(2, $this->helper->getDaysNumber(new \Datetime("2016-08-09")));
    }

    public function testGetDaysNameByDateAndLocale()
    {
        $this->assertEquals("day.2", $this->helper->getDaysNameByDateAndLocale(new \Datetime("2016-08-09"), "en"));
        $this->assertEquals("day.2", $this->helper->getDaysNameByDateAndLocale(new \Datetime("2016-08-09"), "hu"));
        $this->assertEquals("day.". $this->testDate->format("N"), 
            $this->helper->getDaysNameByDateAndLocale($this->testDate, "not-exists"));
    }

    public function testGetDaysNameByDate()
    {
        $this->assertEquals("day.2", $this->helper->getDaysNameByDate(new \Datetime("2016-08-09")));
        $this->assertEquals("day." . $this->testDate->format("N"), $this->helper->getDaysNameByDate($this->testDate));
    }
}
