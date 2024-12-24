@extends("layouts.admin")

{{-- <title>@yield("title")</title> --}}

@push("styles")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
@endpush

@section("content")
    <h2 class="text-xl text-violet-700 text-center font-extrabold m-3">Blog Editor</h2>
    <div class="m-3 md:m-5 lg:m-10">
        <textarea id="markdownEditor"></textarea>
    </div>

@endsection

@push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <script src="{{ url('js/editor.js') }}"></script>
@endpush



