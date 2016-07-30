<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeywordAPITest extends TestCase
{

	use DatabaseMigrations;

    public function testShow()
    {
    	$keyword = factory(App\Keyword::class)->create([]);
    	$this->get('api/keywords/' . $keyword->id)
    		->seeJsonStructure([
    			"word", "description", "id"
    			]);
    }
    
}
