@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center">
            <div class="w-3/5 mx-auto py-2">
                <div class="card">
                    <div class="card-header flex items-center justify-center">
                        <img src="https://i.pravatar.cc/100" class="rounded shadow-lg">
                        <span class="font-black leading-loose px-6 text-4xl">{{ Str::fakeName() }}</span>
                    </div>

                    <div class="card-body">
                        <table class="w-full table-fixed mt-12 bg-blue-100">
                            <thead>
                                <th class="w-1/6 border border-blue-200 py-2">Date</th>
                                <th class="w-1/6 border border-blue-200 py-2">Amount</th>
                                <th class="w-1/6 border border-blue-200 py-2">Status</th>
                                <th class="flex-1 border border-blue-200 py-2">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr class="my-4">
                                        <td class="border border-blue-200 p-2">{{ $schedule }}</td>
                                        <td class="border border-blue-200 p-2 text-right">2000</td>
                                        <td class="border border-blue-200 p-2">Not Paid</td>
                                        <td class="border border-blue-200 p-2">
                                            <div class="flex items-center justify-center">
                                                <button class="bg-blue-200 border-blue-300 rounded py-2 px-3 mx-2 text-blue-700">Update Status</button>
                                                <button class="bg-blue-200 border-blue-300 rounded py-2 px-3 mx-2 text-blue-700">Send Email Reminder</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
