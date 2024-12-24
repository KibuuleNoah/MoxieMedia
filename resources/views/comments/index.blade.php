@extends("layouts.main")

@section("content")
    @if (count($comments) > 0)

        @foreach($comments as $comment)

            <div class="container mx-auto p-4">
                <!-- Comments Section -->
                <div class="card bg-base-100 w-full shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{ $comment->user->name  }}</h2>
                        <p>{{ $comment->message }}</p>
                    </div>
                </div>
            </div>

        @endforeach

    @else

        <div class="card text-center">No Comments Yet</div>

    @endif
@endsection
