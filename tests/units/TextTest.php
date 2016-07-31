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

    public function testAttachKeyword()
    {
    	$text = factory(App\Text::class)->create([]);
    	$keyword = factory(App\Keyword::class)->create(["word" => "Vea"]);
    	$text->attachKeyword($keyword);
    	$this->seeInDatabase('keyword_text', ["keyword_id" => $keyword->id, "text_id" => $text->id]);
    }

}