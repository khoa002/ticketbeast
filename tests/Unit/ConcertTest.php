<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ConcertTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function can_get_formatted_date()
    {
        // Create a concert with a known date
        $concert = factory(Concert::class)->create([
            'date' => Carbon::parse('2020-12-15 8:00pm'),
        ]);

        // Retrieve the formatted date
        $date = $concert->formatted_date;

        // Verify that the date is formatted as expected
        $this->assertEquals('December 15, 2020', $date);
    }
}
