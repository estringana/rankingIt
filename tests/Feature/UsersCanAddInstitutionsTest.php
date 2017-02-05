<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Institution;

class UsersCanAddInstitutionsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function institutions_can_be_added()
    {
        $this->disableExceptionHandling();

        $name = 'Some institution name';

        $this->assertCount(0, Institution::all());

        $this->post('/institutions',
            [
                'name' => $name
            ]
        )->assertStatus(201);

        $this->assertCount(1, Institution::all());
    }
}
