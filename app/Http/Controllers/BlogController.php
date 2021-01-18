<?php


namespace App\Http\Controllers;

use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\User;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Category;

class BlogController extends Controller
{

    public function index(Request $request): View
    {
        $user = $request->user();

        $blogs = Blog::with('user')
            ->orderBy ('updated_at', 'DESC')
            ->paginate(5);

        return view('blogs.index', [
            'blogs' => $blogs,
            'userEmail' => $user->email ?? null]);
    }

    public function create()
    {
        return view('blogs/create');
    }

    public function show($blogId)
    {
        $blog = Blog::query()
            ->where('id', '=', $blogId)
            ->first();

        return view('blogs.show',compact('blog'));
    }

    public function edit(Blog $blogs)
    {
        return view('blogs.edit',compact('blogs'));
    }


    public function store(CreateBlogRequest $request): RedirectResponse
    {
        /** @var UploadedFile $file */
        /** @var User|null $user */

        $validated = $request->validated();

        $blog = new Blog();
        $blog->user_id = $request->user()->id;
        $blog->title = $validated['title'];
        $blog->text = $validated['text'];
        $blog->text = $validated['slug'];

        $blog->save();
        $blog->load('user');
        return redirect('/blogs');
    }



    public function update(UpdateBlogRequest $request, $blogId)
    {
        $blog = Blog::query()
            ->where('id', '=', $blogId)
            ->first();

        if ($blog->user_id == Auth::user()->id)

            if (!$blog) {
                return response()->json(['error' => 'Оголошення не знайдене з ID: ' . $blogId], Response::HTTP_NOT_FOUND);
            }
        $validated = $request->validated();
        $blog->title = $validated['title'] ?? $blog->title;
        $blog->text = $validated['text'] ?? $blog->text;

        $blog->save();

        return redirect()->route('blogs.index')
            ->with('success', 'Оголошення оновлено');
    }

    public function destroy($blogId)
    {
        $blog = Blog::query()
            ->where('id', '=', $blogId)
            ->first();

        if (!$blog) {
            return response()->json(['error' => 'голошення не знайдене з ID: ' . $blogId], Response::HTTP_NOT_FOUND);
        }

        $blog->delete();

        return redirect('/blogs')
            ->with('success', 'Оголошення видалено!');
    }

}
