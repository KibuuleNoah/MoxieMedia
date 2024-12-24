<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Parsedown;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::latest()->paginate(3, ['*'], 'page',1);

        return view("blogs.index",["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Redirect
    {
        //
        return redirect()->route("blogs.show",["blog" => 1]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

        if ($blog->member_content && !Auth::check())
        {
            // if blog is for members and current user
            // is not authenticated redirect to login

            return redirect()->route("auth.signin.get");

        }

        return view("blogs.show",["blog" => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("blogs.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public  function preview(Request $request)
    {
        return response()->json(['html' => $this->markdownToHtml($request->json("markdown"))]);
    }


    public function markdownToHtml($markdown)
    {
        $parsedown = new Parsedown();
        $html = $parsedown->text($markdown);

        return $html;
    }



    public function fetchBlogs(Request $request, int $page = 1)
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(3, ['*'], 'page', $page);

        // Return a rendered Blade view for the posts
        return view('partials.blogs', compact('blogs'))->render();
    }

}
