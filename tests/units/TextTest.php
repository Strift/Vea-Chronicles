<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TextTest extends TestCase
{

	use DatabaseMigrations;

    public function testGeneratesPreviewOnCreation()
    {
        $text = factory(App\Text::class)->create([]);
        $this->assertTrue($text->preview != null);
    }
    
}
