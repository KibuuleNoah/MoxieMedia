<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Content</title>
    @include("partials.shared_styles")
  </head>
  <body
    class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300"
  >
    <!-- Header -->
    <header class="bg-white shadow dark:bg-gray-800 dark:shadow-gray-700">
      @include("partials.nav_bar")
      @include("partials.alert")
    </header>

    <main class="container mx-auto py-10 px-6">
        <div class="mt-10">@yield("content")</div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 dark:bg-gray-900">
      <div class="container mx-auto text-center">
        <p>&copy; 2024 MoxieMedia. All rights reserved.</p>
      </div>
    </footer>
    @include("partials.shared_scripts")
    <script>
$(document).ready(function () {
    $('#loadMore').click(function () {
        let button = $(this);
        let page = button.data('page'); // Get current page number

        $.ajax({
            url: '/fetch/blogs/' + page, // Your route
            type: 'GET',
            beforeSend: function () {
                button.text('Loading...'); // Show loading text
                button.prop('disabled', true); // Disable button
            },
            success: function (response) {
                alert(response.hasMore)
                // Append the rendered HTML to the container
                $('#blogContainer').append(response);

                // Increment the page number
                button.data('page', page + 1);

                // Hide button if no more posts (you may add additional logic for this)
                if (response.trim() === '') {
                    button.hide();
                }
            },
            complete: function () {
                button.text('Load More'); // Reset button text
                button.prop('disabled', false); // Enable button
            },
            error: function () {
                alert('Failed to load posts. Please try again.');
                button.text('Load More'); // Reset button text
                button.prop('disabled', false); // Enable button
            }
        });
    });
});
</script>

  </body>
</html>
