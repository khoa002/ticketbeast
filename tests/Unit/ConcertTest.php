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

    /** @test */
    function concerts_with_a_published_at_date_are_published()
    {
        $publishedCOncertA = factory(Concert::class)->create([
            'published_at' => Carbon::parse('-1 week')
        ]);
        $publishedCOncertB = factory(Concert::class)->create([
            'published_at' => Carbon::parse('-2 week')
        ]);
        $unpublishedConcert = factory(Concert::class)->create([
            'published_at' => null,
        ]);

        $publishedConcerts = Concert::published()->get();

        $this->assertTrue($publishedConcerts->contains($publishedCOncertA));
        $this->assertTrue($publishedConcerts->contains($publishedCOncertB));
        $this->assertFalse($publishedConcerts->contains($unpublishedConcert));
    }
}
