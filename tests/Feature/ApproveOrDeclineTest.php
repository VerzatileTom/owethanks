<?php

namespace Tests\Feature;

use App\Loan;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApproveOrDeclineTest extends TestCase
{
    protected $lender;

    public function setUp() : void
    {
        parent::setUp();

        $this->lender = factory(User::class)->create(['role' => 'Lender']);
    }

    public function test_the_lender_should_see_list_loan_requests()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($this->lender);
        $loans = factory(Loan::class, 10)->create([
            'lender_id' => $this->lender->id,
            'loaner_id' => factory(User::class)->create(['role' => 'Loaner'])->id
        ]);

        $loan_request = $this->get('/loan-requests');
        foreach( $loans as $loan )
        {
            $loan_request->assertSeeText($loan->first_name);
        }
    }

    public function test_the_lender_approved_the_loan_request()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($this->lender);

        $loan_request = factory(Loan::class)->create([
            'lender_id' => $this->lender->id,
            'loaner_id' => factory(User::class)->create(['role' => 'Loaner'])->id,
        ]);

        $status = 'approved';

        $response = $this->patch('/loan-request/'. $loan_request->id, ['status' => $status]);

        $response->assertRedirect('/home');

        tap($loan_request->fresh(), function ($loan_request){
            $this->assertEquals('approved', $loan_request->status);
        });
    }

    public function test_the_lender_declined_the_loan_request()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($this->lender);

        $loan_request = factory(Loan::class)->create([
            'lender_id' => $this->lender->id,
            'loaner_id' => factory(User::class)->create(['role' => 'Loaner'])->id,
        ]);

        $status = 'declined';

        $response = $this->patch('/loan-request/'. $loan_request->id, ['status' => $status]);

        $response->assertRedirect('/home');

        tap($loan_request->fresh(), function ($loan_request){
            $this->assertEquals('declined', $loan_request->status);
        });
    }
}
