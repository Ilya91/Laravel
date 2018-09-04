<?php

namespace Tests\Unit;

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConcertTest extends TestCase
{

    use DatabaseMigrations;

    public function testCanGetFormattedDate(): void
    {
        // Create a concert with a known date
        $concert = factory(Concert::class)->create([
            'date' => Carbon::parse('2018-12-12 8:00pm'),
        ]);

        // Retrieve the formatted date
        $date = $concert->formatted_date;


        // Verify the date is formatted as expected
        $this->assertEquals($date, 'December 12, 2018');

    }
}
