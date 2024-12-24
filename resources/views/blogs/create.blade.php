@extends("layouts.admin")

{{-- <title>@yield("title")</title> --}}

@push("styles")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
@endpush

@section("content")

    <h2 class="text-xl text-violet-700 text-center font-extrabold m-3">Blog Editor</h2>

    <div id="blogEditorContainer" class="m-3 md:m-5 lg:m-10">
        <textarea id="markdownEditor"></textarea>
        <div class="mt-4">
            <button
              id="previewBtn"
              href="#"
              class="inline-block px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900"
            >
              Preview
            </button>
        </div>

    </div>

    <div id="blogPreviewContainer" class="hidden m-3 md:m-5 lg:m-10">
        <article id="blogPreview" class="prose mx-auto"></article>
        <div class="mt-4 flex justify-between">
            <div>
                <button
                        id="editBtn"
                        href="#"
                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900"
                        >
                        Edit
                </button>
            </div>
            <div>
                <form method="post" action="{{ route('blogs.store') }}">
                    @csrf
                    <input id="blogContent" name="blog-content" type="hidden" value="">
                    <button
                        id="publishBtn"
                        href="#"
                        type="submit"
                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900"
                        >
                        Publish
                    </button>
                </form>

            </div>
        </div>

    </div>

@endsection

@push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <script src="{{ url('js/editor.js') }}"></script>
@endpush


