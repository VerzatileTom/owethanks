<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Loan;
use App\Mail\AppliedForLoan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoanController extends Controller
{
    public function show(User $lender)
    {
        return view('apply-loan', compact('lender'));
    }

    public function store(User $lender, LoanRequest $request)
    {
        $validated = $request->except('agreement');
        $attributes = array_merge($validated, [
            'lender_id' => $lender->id,
            'loaner_id' => auth()->user()->id,
        ]);

        $loan = Loan::create($attributes);

        Mail::to($lender)->send(new AppliedForLoan($loan));

        return redirect('/');
    }
}
