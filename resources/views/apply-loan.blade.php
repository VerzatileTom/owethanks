@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex item-center">
            <div class="w-3/5 mx-auto py-2">
                <div class="card">
                    <div class="card-header font-black leading-loose px-6 text-4xl">{{ __('Apply Loan') }}</div>

                    <div class="card-body leading-loose px-6">
                        <form method="POST" action="">
                            @csrf

                            <div class="flex py-4 -mx-2">
                                <div class="w-1/3">
                                    <div class="mx-2">
                                        <label for="name">{{ __('First Name') }}</label>

                                        <div>
                                            <input
                                                id="first_name"
                                                type="text" first_name="first_name"
                                                class="w-full rounded py-2 px-4 shadow @error('first_name') is-invalid @enderror"
                                                value="{{ old('first_name') }}"
                                                placeholder="Cardo"
                                                required
                                                autofocus
                                            />

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/3">
                                    <div class="mx-2">
                                        <label for="email">{{ __('Middle Name') }}</label>

                                        <div>
                                            <input
                                                id="last_name"
                                                type="text"
                                                name="last_name"
                                                class="w-full rounded py-2 px-4 shadow @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name') }}"
                                                placeholder="Immortal"
                                                required
                                            />

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/3">
                                    <div class="mx-2">
                                        <label for="email">{{ __('Last Name') }}</label>

                                        <div>
                                            <input
                                                id="middle_name"
                                                type="text"
                                                name="middle_name"
                                                class="w-full rounded py-2 px-4 shadow @error('middle_name') is-invalid @enderror"
                                                value="{{ old('middle_name') }}"
                                                placeholder="Dalisay"
                                                required
                                            >

                                            @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex py-4 -mx-2">
                                <div class="w-1/2">
                                    <div class="mx-2">
                                        <label for="email">{{ __('Phone Number') }}</label>

                                        <div>
                                            <input
                                                id="phone_number"
                                                type="text"
                                                name="phone_number"
                                                class="w-full rounded py-2 px-4 shadow @error('phone_number') is-invalid @enderror"
                                                value="{{ old('phone_number') }}"
                                                placeholder="09123456789"
                                                required
                                            >

                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/2">
                                    <div class="mx-2">
                                        <label for="email_address">{{ __('Email Address') }}</label>

                                        <div>
                                            <input
                                                id="email_address"
                                                type="text"
                                                name="email_address"
                                                class="w-full rounded py-2 px-4 shadow @error('email_address') is-invalid @enderror"
                                                value="{{ old('email_address') }}"
                                                placeholder="cardodalisay@fligno.com"
                                                required
                                            >

                                            @error('email_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex py-4 -mx-2">
                                <div class="w-1/2">
                                    <div class="mx-2">
                                        <label for="employment">{{ __('Employment') }}</label>

                                        <div>
                                            <select name="employment" id="employment" class="w-full rounded py-3 px-4 shadow">
                                                <option value="" disabled selected>Please select</option>
                                                <option value="Self-employed">Self-employed</option>
                                                <option value="Private">Private</option>
                                                <option value="Government">Government</option>
                                                <option value="Retired">Retired</option>
                                            </select>

                                            @error('employment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="w-1/2">
                                    <div class="mx-2">
                                        <label for="email">{{ __('Position Title') }}</label>

                                        <div>
                                            <input
                                                id="position"
                                                type="text"
                                                name="position"
                                                class="w-full rounded py-2 px-4 shadow @error('position') is-invalid @enderror"
                                                value="{{ old('position') }}"
                                                placeholder="Police"
                                                required
                                            />

                                            @error('position')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex py-4 -mx-2">
                                <div class="w-1/2">
                                    <div class="mx-2">
                                        <label for="amount">{{ __('Loan Amount') }}</label>

                                        <div>
                                            <input
                                                id="amount"
                                                type="number"
                                                name="amount"
                                                class="w-full rounded py-2 px-4 shadow @error('amount') is-invalid @enderror"
                                                value="{{ old('amount') }}"
                                                placeholder="10000"
                                                required
                                            />

                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <div class="mx-2">
                                        <label for="payment_term">{{ __('Payment Terms in Months') }}</label>

                                        <div>
                                            <input
                                                id="payment_term"
                                                type="number"
                                                name="payment_term"
                                                class="w-full rounded py-2 px-4 shadow @error('payment_term') is-invalid @enderror"
                                                value="{{ old('payment_term') }}"
                                                placeholder="6"
                                                required
                                            />

                                            @error('payment_term')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="py-4">
                                <label for="agreement">
                                    <input type="checkbox" name="agreement" id="agreement">
                                    Magbayad ko, promise!
                                </label>

                                @error('agreement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="py-4">
                                <div>
                                    <button
                                        type="submit"
                                        class="bg-blue-500 btn btn-primary font-semibold hover:bg-blue-700 px-4 py-2 rounded text-white"
                                    >
                                        {{ __('Apply For Loan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
