<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;

class ConcertTest extends TestCase
{
    /** @test */
    function can_get_formatted_date()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2020-12-15 8:00pm'),
        ]);

        $this->assertEquals('December 15, 2020', $concert->formatted_date);
    }

    /** @test */
    function can_get_formatted_start_time()
    {
        $concert = factory(Concert::class)->make([
            'date' => Carbon::parse('2020-12-15 17:00:00'),
        ]);

        $this->assertEquals('5:00pm', $concert->formatted_start_time);
    }

    /** @test */
    function can_get_ticket_in_dollars()
    {
        $concert = factory(Concert::class)->make([
            'ticket_price' => 6995,
        ]);

        $this->assertEquals('69.95', $concert->ticket_price_in_dollar);
    }
}
