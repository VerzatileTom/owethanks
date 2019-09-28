<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Http\Requests\UpdateLoanStatusRequest;
use App\Loan;
use App\Mail\AppliedForLoan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoanController extends Controller
{
    public function index()
    {
        $loan_requests = Loan::where('lender_id', auth()->user()->id)->get();
        return view('loan-requests', compact('loan_requests'));
    }

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

    public function update(Loan $loan, UpdateLoanStatusRequest $request)
    {
        $loan->update($request->validated());
        return redirect('/home');
    }
}
