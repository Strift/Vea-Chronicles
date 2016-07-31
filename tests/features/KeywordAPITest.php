<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeywordAPITest extends TestCase
{

	use DatabaseMigrations;

	public function testIndex()
	{
		factory(App\Keyword::class, 2)->create([]);
		$this->get('api/keywords/')
			->seeJsonStructure([
				"*" => [
				"word", "description", "id"
				]
			]);
	}

	public function testStore()
	{
		$this->post('api/keywords', ["word" => "word1", "description" => "The Description"])
			->seeJson([
				"word" => "word1", "description" => "The Description"
				]);
		$this->seeInDatabase('keywords', ["word" => "word1", "description" => "The Description"]);
	}

    public function testShow()
    {
    	$keyword = factory(App\Keyword::class)->create([]);
    	$this->get('api/keywords/' . $keyword->id)
    		->seeJsonStructure([
    			"word", "description", "id"
    			]);
    }

    public function testUpdate()
    {
    	$keyword = factory(App\Keyword::class)->create(["word" => "keyword2"]);
    	$this->put('api/keywords/' . $keyword->id, ["word" => "keyword2", "description" => "The Description"])
            ->seeJson([
                "word" => "keyword2", "description" => "The Description"
                ]);
		$this->seeInDatabase('keywords', ["word" => "keyword2", "description" => "The Description"]);
    }

    public function testDestroy()
    {
    	$keyword = factory(App\Keyword::class)->create([]);
    	$this->delete('api/keywords/' . $keyword->id);
    	$this->assertEquals(null, App\Keyword::find($keyword->id));
    }
    
}
