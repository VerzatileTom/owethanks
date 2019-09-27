<div class="lender-card w-1/4 px-3 mb-12">
    <a href="">
        <div class="lender-card__body">
            <img src="{{ 'https://i.pravatar.cc/250?v=' . random_int(1, 100) . time() }}" class="rounded shadow-lg mx-auto">
            <span class="font-semibold mt-4 text-center text-lg w-full">{{ $slot }}</span>
        </div>
    </a>
</div>
