<?php

namespace Tests\Feature;

use App\Loan;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentScheduleTest extends TestCase
{
    protected $lender;

    public function setUp() : void
    {
        parent::setUp();
        $this->lender = factory(User::class)->create(['role' => 'Lender']);
    }

    public function test_a_user_can_view_payment_schedules()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($this->lender);

        $loan = factory(Loan::class)->create([
            'lender_id' => $this->lender->id,
            'loaner_id' => factory(User::class)->create(['role' => 'Loaner'])->id,
            'payment_term' => 6,
            'amount' => 2000,
        ]);

        $loan->generateSchedules();
        $this->assertEquals((2000/6), $loan->paymentSchedules->first()->amount);

    }
}
