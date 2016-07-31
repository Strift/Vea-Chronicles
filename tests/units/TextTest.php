<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TextTest extends TestCase
{
    use DatabaseMigrations;

    public function testKasKeywords()
    {
    	$text = factory(App\Text::class)->create([]);
    	$this->assertNotEquals($text->keywords, null);
    }
}
