<div class="search-container mt-16">
    <form action="/borrowers" method="GET" class="flex items-center">
        @csrf
        <div class="w-1/3">
            <div class="bg-white flex items-center px-4 w-full px-4 py-2 rounded shadow">
                <i class="lni-search mr-3 text-gray-500"></i>
                <input type="text" name="keyword"  class="font-semibold text-lg focus:outline-none w-full" placeholder="Search...">
            </div>
        </div>
        <div class="ml-2 text-xl w-1/5">
            <label class="text-gray-800 font-bold" for="status">Status: </label>
            <select name="status" class="bg-transparent focus:outline-none font-semibold text-gray-700 flex-1 border-b border-gray-500">
                <option value="All">All</option>
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <div class="ml-2 text-xl w-1/5">
            <label class="text-gray-800 font-bold" for="status">Sort: </label>
            <select name="status" class="bg-transparent focus:outline-none font-semibold text-gray-700 flex-1 border-b border-gray-500">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
        </div>
    </form>
</div>
