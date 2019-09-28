<?php

namespace Tests\Feature;

use App\Loan;
use App\Mail\AppliedForLoan;
use App\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplyLoanTest extends TestCase
{
    protected $lender;
    protected $loaner;

    public function setUp() : void
    {
        parent::setUp();

        $this->lender = factory(User::class)->create(['role' => 'Lender']);
        $this->loaner = factory(User::class)->create(['role' => 'Loaner']);
    }

    /** @test */
    public function a_user_should_see_the_apply_loan_form()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($this->loaner);

        $this->get('/apply-loan/' .$this->lender->id)
             ->assertSeeText('Apply Loan')
             ->assertSeeText($this->lender->name);
    }

    /** @test */
    public function a_loaner_can_apply_for_loan()
    {
        Mail::fake();
        $this->withoutExceptionHandling();

        // Given
        $this->actingAs($this->loaner);
        $loan = factory(Loan::class)->raw([
            'amount' => 10000,
            'agreement' => true
        ]);

        // When
        $this->post('/apply-loan/' . $this->lender->id, $loan)
             ->assertRedirect('/');

        // Then
        Mail::assertSent(AppliedForLoan::class, function ($mail) {
            return $mail->hasTo($this->lender->email);
        });
    }


    public function test_it_should_require_all_fields()
    {
        $this->actingAs($this->loaner);

        $this->post('/apply-loan/' . $this->lender->id, [])
             ->assertSessionHasErrors();
    }
}
