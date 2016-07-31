<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TextAPITest extends TestCase
{

	use DatabaseMigrations;

	public function testIndex()
	{
		factory(App\Text::class, 2)->create([]);
		$this->get('api/texts/')
			->seeJsonStructure([
				"*" => [
				"id", "title", "content", "keywords"
				]
			]);
	}

    public function testStore()
    {
        $this->post('api/texts', ["title" => "TheTitle", "content" => "Un paragraphe"])
            ->seeJson([
                "title" => "TheTitle", "content" => "Un paragraphe"
                ]);
        $this->seeInDatabase('texts', ["title" => "TheTitle", "content" => "Un paragraphe"]);
    }

    public function testShow()
    {
        $text = factory(App\Text::class)->create([]);
        $this->get('api/texts/' . $text->id)
            ->seeJsonStructure([
                "id", "title", "content", "keywords"
                ]);
    }

    public function testUpdate()
    {
        $text = factory(App\Text::class)->create(["title" => "TheTitle"]);
        $this->put('api/texts/' . $text->id, ["title" => "TheTitle", "content" => "The content"])
            ->seeJsonStructure([
                "id", "title", "content", "keywords"
                ]);
        $this->seeInDatabase('texts', ["title" => "TheTitle", "content" => "The content"]);
    }

    public function testDestroy()
    {
        $text = factory(App\Text::class)->create([]);
        $this->delete('api/texts/' . $text->id);
        $this->assertEquals(null, App\Text::find($text->id));
    }
    
}
