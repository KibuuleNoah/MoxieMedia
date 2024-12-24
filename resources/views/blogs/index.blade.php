@extends("layouts.main")

@section("content")
<div id="blogContainer" class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3 pt-10">
    @include("partials.blogs")
</div>

<button id="loadMore" data-page="2">Load More</button>



@endsection
