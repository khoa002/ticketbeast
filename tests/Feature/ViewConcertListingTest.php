<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{
    /** @test */
    public function userCanViewAConcertListing()
    {
        // ARRANGE
        // Create a concert
        $concert = Concert::create([
            'title'                  => 'The Red Chord',
            'subtitle'               => 'with Animosity and Lethargy',
            'date'                   => Carbon::parse('2020-12-14 20:00:00'),
            'ticket_price'           => 3250,
            'venue'                  => 'The Mosh Pit',
            'venue_address'          => '123 Example Lane',
            'venue_city'             => 'Phoenix',
            'venue_state'            => 'AZ',
            'venue_zip'              => '85210',
            'additional_information' => '',
        ]);

        // ACT
        // View the concert listing
        $this->visit('/concerts/' . $concert->id);

        // ASSERT
        // See the concert details
        $this->see('The Red Chord');
        $this->see('with Animosity and Lethargy');
        $this->see('December 14, 2020');
        $this->see('8:00pm');
        $this->see('35.50');
        $this->see('The Mosh Pit');
        $this->see('123 Example Lane');
        $this->see('Phoenix, AZ 85210');
        $this->see('For tickets, call (555) 555-5555.');
    }
}
