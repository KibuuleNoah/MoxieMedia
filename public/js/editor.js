$(document).ready(function () {
    const easyMDE = new EasyMDE({
        element: document.getElementById("markdownEditor"),
    });
    easyMDE.value(`
            # Welcome to My Funny Blog!

## A Day in the Life of a Coffee Mug

Ah, the life of a coffee mug. You think it's glamorous? Think again! Here's a behind-the-scenes look at the daily struggles of your trusty caffeine vessel.

![Coffee Mug in Action](https://via.placeholder.com/600x300.png?text=Coffee+Mug+in+Action)
*Caption: Behold the mighty coffee mug in its natural habitat.*

### Morning Rush: The First Pour
It’s 7 a.m., and before I even get a chance to stretch my handle, BOOM—hot coffee comes pouring in. No "Good morning," no "How’s your ceramic holding up?" Just scalding liquid and a frantic human muttering, “Why am I awake?”

[Learn more about how caffeine works](https://en.wikipedia.org/wiki/Caffeine).

            `);

    $("#previewBtn").click(function () {
        $("#blogEditorContainer").fadeToggle();
        $("#blogPreviewContainer").fadeToggle();

        markdown = easyMDE.value();

        $.ajax({
            url: "/blog/preview",
            type: "POST",
            data: JSON.stringify({ markdown: markdown }),
            contentType: "application/json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $("#blogPreview").html(response.html); // Display the HTML
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            },
        });

        $("#blogContent").val(markdown);
    });

    // $("#publishBtn").click(function () {
    //     $.ajax({
    //         url: "/blogs/",
    //         type: "POST",
    //         data: JSON.stringify({ markdown: easyMDE.value() }),
    //         contentType: "application/json",
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         error: function (xhr, status, error) {
    //             console.error("Error:", error);
    //         },
    //     });
    // });

    $("#editBtn").click(function () {
        $("#blogEditorContainer").fadeToggle();
        $("#blogPreviewContainer").fadeToggle();
    });
    // publishBtn
});
