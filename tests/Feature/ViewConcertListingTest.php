<?php

namespace Tests\Feature;

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{

    use DatabaseMigrations;

    public function testUserCanViewConcertListing()
    {
        $concert = Concert::create([
            'title' => 'The Red Chord',
            'subtitle' => 'with Ann',
            'date' => Carbon::parse('December 12, 2018 8:00pm'),
            'ticket_price' => 32,
            'venue' => 'The Mosh Pit',
            'venue_address' => '123 Example Lane',
            'city' => 'Minsk',
            'state' => 'ON',
            'zip' => '225320',
            'additional_information' => 'For tickets, call + 375 25 2345465.'
        ]);

        $this->visit('/concerts/'.$concert->id);

        $this->see('The Red Chord');
        $this->see('with Ann');
        $this->see('December 12, 2018 8:00pm');
        $this->see('8:00pm');
        $this->see('32');
        $this->see('The Mosh Pit');
        $this->see('123 Example Lane');
        $this->see('Minsk');
        $this->see('ON');
        $this->see('225320');
        $this->see('For tickets, call + 375 25 2345465.');

    }
}
