@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center">
        <div class="w-2/5 mx-auto py-2">
            <div class="card">
                <div class="card-header font-black leading-loose px-6 text-4xl">{{ __('Register') }}</div>

                <div class="card-body leading-loose px-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="py-4">
                            <label for="name">{{ __('Name') }}</label>

                            <div>
                                <input id="name" type="text" class="w-full rounded py-2 px-4 shadow @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="py-4">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="w-full rounded py-2 px-4 shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="py-4">
                            <label for="email">Register As</label>

                            <div class="col-md-6">
                                <select name="role" id="role" class="w-full rounded py-4 px-4 shadow">
                                    <option value="" disabled selected>Please select</option>
                                    <option value="Lender">Lender</option>
                                    <option value="Loaner">Loaner</option>
                                </select>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex">
                            <div class="py-4 w-1/2 mr-2">
                                <label for="password">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="w-full rounded py-2 px-4 shadow @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="py-4 w-1/2 ml-2">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="w-full rounded py-2 px-4 shadow" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="py-4">
                            <div>
                                <button type="submit" class="bg-blue-500 btn btn-primary font-semibold hover:bg-blue-700 px-4 py-2 rounded text-white">
                                    {{ __('Register') }}
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
