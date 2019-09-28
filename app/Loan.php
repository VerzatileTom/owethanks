<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = [];

    public function paymentSchedules()
    {
        return $this->hasMany(PaymentSchedule::class, 'loan_id');
    }

    public function generateSchedules()
    {
        $now = now()->addMonth();
        while( $now <= now()->addMonths($this->payment_term) )
        {
            $this->paymentSchedules()->create([
                'amount' => ($this->amount/$this->payment_term),
                'date' => $now
            ]);
            $now->addMonth();
        }
    }
}
