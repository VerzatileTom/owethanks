@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-2/5">
                <div class="card">
                    <div class="card-header font-black text-4xl">Dashboard</div>

                    <div class="card-body mt-6">
                        @if (!auth()->user()->verified)
                            <div class="bg-red-300 px-4 py-2 rounded text-red-800">
                                You are not yet verified. Upload a photo to get verified.
                            </div>

                            <form action="/verify" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="py-4">
                                    <label for="name">Photo</label>

                                    <div>
                                        <input id="photo" name="photo" type="file">

                                        @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mt-6">
                                        <button class="p-2 bg-blue-500 text-white rounded">Upload</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="w-full flex mt-6">
                                <div>
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="rounded shadow-lg">
                                </div>

                                <span class="font-semibold text-center text-2xl ml-4">{{ auth()->user()->name }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
