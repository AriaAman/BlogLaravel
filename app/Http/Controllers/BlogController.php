<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BlogController extends Controller
{


    public function home(): View {

        return view('welcome', [
            'posts'=> Post::paginate(3)
        ]);
    }


    public function index(BlogFilterRequest $request): View {
        /*dd($request ->validated());*/
        return view('blog.index', [
            'posts'=> Post::paginate(3)
        ]);
    }

    public function show(string $slug, string $id): RedirectResponse | View {
        $post = Post::findorFail($id);
        if ($post->slug != $slug){
            return to_route('blog.show', ['slug' => $post ->slug, 'id'=> $post->id]);
        }

        return view('blog.show', [
            'posts' => $post
        ]);
    }

}
