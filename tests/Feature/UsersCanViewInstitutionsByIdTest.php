<?php

namespace Tests\Feature\feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Institution;

class UsersCanViewInstitutionsByIdTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_shows_institution_name_when_visiting_the_url_and_passing_its_id()
    {
        $institution = factory(Institution::class)->create([]);

        $this->get('/institutions/'.$institution->id)
            ->assertJson($institution->toArray());
    }

    /** @test */
    public function it_returns_404_when_institution_not_found()
    {
        $this->get('/institutions/1234')
            ->assertStatus(404);
    }
}
