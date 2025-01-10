@extends("layouts.main")

@section("content")
<div id="blogContainer" class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3 pt-10">
    @include("partials.blogs")
</div>

<div class="flex w-full items-center mt-4">
    <button id="loadMore" class="inline-block px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900" data-page="2">Load More</button>
</div>

@endsection
