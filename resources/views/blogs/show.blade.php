@extends("layouts.main")

@section("content")
    <div class="pt-10">
      <!-- Blog Title -->
      <h2 class="text-4xl font-bold mb-4">{{ $blog->title }}</h2>

      <!-- Metadata -->
      <div class="flex items-center justify-between text-sm mb-6">
        <span class="mr-4"
          >By
          <span class="text-indigo-600 dark:text-indigo-400 font-medium"
            >Author Name</span
          ></span
        >
        <span class="mr-4"><i class="bx bx-calendar-event"></i> Published on <span>{{ $blog->created_at->format('M j, Y') }}</span></span>
        <span class="mr-4"><span><i class="bx bx-time"></i> {{ $blog->read_time }} mins read</span></span>

      </div>

      <!-- Cover Image -->
      <img
        src="https://via.placeholder.com/800x400"
        alt="Blog Cover"
        class="w-full h-auto rounded-lg shadow mb-6"
      />

      <!-- Blog Content -->
      <article class="prose lg:prose-xl max-w-none mb-10 dark:prose-invert space-y-4">
        {{ $blog->content }}
      </article>

      <!-- Tags -->
      <div class="flex flex-wrap gap-2 mb-10">
        @foreach(explode(',',$blog->tags) as $tag)

        <span
          class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm font-medium dark:bg-indigo-800 dark:text-indigo-300"
          >#{{ $tag }}</span
        >

      @endforeach
    </div>

    <section class="bg-gray-100 dark:bg-gray-900 py-4">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">

          <!-- Action Buttons -->
          <div class="flex items-center justify-between space-x-4">
            <!-- Like Button -->
            <button class="flex items-center space-x-2 text-gray-600 hover:text-red-600 dark:text-gray-300 dark:hover:text-red-400">
                <span class="text-sm"><i class="bx bx-like"></i> Like</span>
            </button>

            <!-- Save Button -->
            <button class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">
                <span class="text-sm"><i class="bx bx-save"></i> Save</span>
            </button>

            <!-- Share Button -->
            <button class="flex items-center space-x-2 text-gray-600 hover:text-green-600 dark:text-gray-300 dark:hover:text-green-400">
              <span class="text-sm"><i class="bx bx-share"></i> Share</span>
            </button>

        </div>
        </div>
    </section>

      <!-- Comments Section -->
      <section
        class="bg-white shadow rounded-lg p-6 dark:bg-gray-800 dark:shadow-gray-700"
      >
        <h3 class="text-2xl font-bold mb-4">Comments</h3>

        <div class="p-4 border border-gray-300 rounded-lg shadow-md mb-2 h-80 overflow-auto @if (!$user_comment && !count($sample_comments))flex justify-center items-center @endif">
            @if ($user_comment)
                <x-comment-card author="{{ $user->name }}" createdAt="{{ $user_comment->created_at->diffForHumans() }}" message="{{ $user_comment->message }}" />
            @endif

            @if (count($sample_comments) > 0)
                @foreach($sample_comments as $comment )
                    <x-comment-card author="{{ $comment->user->name }}" createdAt="{{ $comment->created_at->diffForHumans() }}" message="{{ $comment->message }}" />
                @endforeach
                <div class="flex items-end">
                    <a href="{{ route('comments.index',['blog' => $blog->id]) }}" class="text-blue-300">See More...</a>
                </div>

            @elseif ($user_comment)
                {{--Do Nothing--}}
            @else
                <div class="text-center text-gray-400">No Comments Yet</div>
            @endif

        </div>

        @guest
            Write Comment
        @endguest

        @auth
            @if (!$user_comment)
                <!-- Comment Form -->
                <form class="mt-6" method="post" action="{{ route('comments.store') }}">

                    @csrf
                    <label for="comment" class="block text-sm font-medium"
                                         >Leave a Comment</label
                                     >
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <textarea
                                class="textarea textarea-bordered"
                                id="message"
                                name="message"
                                rows="4"
                                placeholder="Write Comment"
                                ></textarea>
                        <button
                                type="submit"
                                class="mt-4 bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 dark:bg-indigo-400 dark:hover:bg-indigo-500"
                                >
                                Post Comment
                        </button>
                </form>
            @endif
        @endauth
      </section>
      <section class="bg-gray-100 dark:bg-gray-900 py-8">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">
      You May Also Like These Blogs
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Blog Card 1 -->
      <a href="#" class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
        <img src="https://via.placeholder.com/400x200" alt="Blog 1" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
            10 Tips for Writing Better Blogs
          </h3>
          <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
            Learn how to captivate your audience with these essential blogging tips.
          </p>
          <span class="text-indigo-600 dark:text-indigo-400 text-sm font-medium block mt-4">Read More →</span>
        </div>
      </a>

      <!-- Blog Card 2 -->
      <a href="#" class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
        <img src="https://via.placeholder.com/400x200" alt="Blog 2" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
            How to Optimize Your Blog for SEO
          </h3>
          <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
            A beginner's guide to improving your blog's search engine visibility.
          </p>
          <span class="text-indigo-600 dark:text-indigo-400 text-sm font-medium block mt-4">Read More →</span>
        </div>
      </a>
    </div>
  </div>
</section>
</div>

@endsection
