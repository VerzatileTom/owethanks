<div class="search-container mt-16">
    <form action="/search" method="GET" class="flex items-center">
        @csrf
        <div class="w-1/3">
            <div class="bg-white flex items-center px-4 w-full px-4 py-2 rounded shadow">
                <i class="lni-search mr-3 text-gray-500"></i>
                <input type="text" name="keyword"  class="font-semibold text-lg focus:outline-none w-full" placeholder="Search...">
            </div>
        </div>
        <div class="ml-2">
            <select name="type" class="bg-transparent focus:outline-none font-semibold text-gray-700 text-xl w-24">
                <option value="All">All</option>
                <option value="Lender">Lender</option>
                <option value="Loaner">Loaner</option>
            </select>
        </div>
    </form>
</div>
