@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <span class="mt-16 text-5xl">
            <span class="font-light">My</span> <span class="font-black">Borrowers</span>
        </span>

        @component('components/filters')
        @endcomponent

        <div class="lenders mt-12">
            <div class="flex items-center flex-wrap">
                @foreach (range(0, 7) as $people)
                    @component('components/person')
                        {{ Str::fakeName() }}
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endsection
