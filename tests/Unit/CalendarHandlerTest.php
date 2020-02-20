<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;

class CalendarHandlerTest extends TestCase
{
    public function testGetStartEnd()
    {
        $data=\CalendarHandler::getStartEnd(['year'=>'2020','month'=>'2' ]);
        $this->assertEquals($data['start'], '2020-02-01');
        $this->assertEquals($data['end'], '2020-02-29');
    }

    public function testDatumTwoChar()
    {
        $this->assertEquals(\CalendarHandler::datumTwoChar('2020-1-1'), '2020-01-01');
    }

}
