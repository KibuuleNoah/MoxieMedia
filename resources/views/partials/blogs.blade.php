@foreach($blogs as $blog)

        <div class="max-w-sm mx-auto">
          <div class="bg-white dark:bg-gray-900 border border-purple-300 dark:border-purple-700 rounded-lg shadow-lg overflow-hidden">
            <!-- Blog Image -->
            <img
              src="https://via.placeholder.com/400x200"
              alt="Blog Thumbnail"
              class="w-full h-48 object-cover"
            />

            <!-- Blog Content -->
            <div class="p-5">
              <!-- Blog Title -->
              <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                  {{ $blog->title }}
              </h2>

              <!-- Blog Description -->
              <p class="mt-2 text-gray-600 dark:text-gray-300">
                  {{ $blog->summary }}
              </p>

              <div class="flex items-center justify-between mt-4">
                <div class="text-xs text-gray-500 dark:text-gray-400"><i class="bx bx-calendar-event"></i> Published {{ $blog->created_at->diffForHumans() }}</p></div>
                <div><i class="bx bx-show-alt"></i> {{ $blog->reads }}</div>
              </div>

              <!-- Read More Button -->
              <div class="mt-4 flex justify-between">
                <a
                    href="{{ route('blogs.show',['blog' => $blog->id]) }}"
                  class="inline-block px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900"
                >
                  Read More
                </a>
                @if ($blog->member_content)
                    <span class="text-yellow-200"><i class="bx bx-lock bx-sm"></i></span>
                @endif
              </div>
            </div>
          </div>
        </div>

    @endforeach
    {{-- {{ $hasMore }} --}}

