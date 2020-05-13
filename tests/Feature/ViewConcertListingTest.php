<?php

namespace Tests\Feature;

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{
    use  DatabaseMigrations;

    /** @test */
    public function user_can_view_a_published_concert_listings()
    {
        $concert = factory(Concert::class)->states('published')->create([
            'title'                  => 'The Red Chord',
            'subtitle'               => 'with Animosity and Lethargy',
            'date'                   => Carbon::parse('2020-12-14 20:00:00'),
            'ticket_price'           => 3250,
            'venue'                  => 'The Mosh Pit',
            'venue_address'          => '123 Example Lane',
            'venue_city'             => 'Phoenix',
            'venue_state'            => 'AZ',
            'venue_zip'              => '85210',
            'additional_information' => 'For tickets, call (555) 555-5555.',
        ]);

        $this->visit('/concerts/' . $concert->id);

        $this->see('The Red Chord');
        $this->see('with Animosity and Lethargy');
        $this->see('December 14, 2020');
        $this->see('8:00pm');
        $this->see('32.50');
        $this->see('The Mosh Pit');
        $this->see('123 Example Lane');
        $this->see('Phoenix, AZ 85210');
        $this->see('For tickets, call (555) 555-5555.');
    }

    /** @test */
    public function user_cannot_view_unpublished_listings()
    {
        $concert = factory(Concert::class)->states('unpublished')->create();

        $this->get('/concerts/' . $concert->id);

        $this->assertResponseStatus(404);
    }
}
