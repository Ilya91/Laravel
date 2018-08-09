<?php

namespace Tests\Feature;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{
    public function testUserCanViewConcertListing()
    {
        $concert = Concert::create([
            'title' => 'Red Chord',
            'subtitle' => 'with Ann',
            'date' => Carbon::parse('December 12, 2018 8:00pm'),
            'ticket_price' => 3000
        ]);

        $this->visit('/concert/' . $concert->id);

        $this->see('Red Chord');

    }
}
