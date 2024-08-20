<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\EditorChoice;
use App\Services\SchemaService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
use App\Models\User;

class BlogController extends Controller
{
    public function HomeBlogs()
    {
        $popularBlog = Blog::with('editorChoice')
            ->orderBy('views_count', 'desc')
            ->take(4) // Get the top 4 popular blogs
            ->get();

        $editorChoiceBlogs = EditorChoice::with('blog')->get(); // Retrieve editor's choice blogs

        return view('frontend.home_slide', compact('popularBlog', 'editorChoiceBlogs'));
    }

    public function PopularBlogs()
    {
        $popularBlogs = Blog::with('editorChoice') // Include editor's choice relationship if you have one
            ->orderBy('views_count', 'desc') // Order by views_count in descending order
            ->take(5) // Get the top 5 popular blogs
            ->get();

        return view('frontend.popular_blogs', compact('popularBlogs'));
    }

    public function AllBlog()
    {
        $user = auth()->user();

        // If the user is an admin, retrieve all blogs
        if ($user->is_admin == 1) {
            $blogs = Blog::latest()->get();
        } else {
            // If the user is not an admin, retrieve only their blogs
            $blogs = Blog::where('user_id', $user->id)->latest()->get();
        }

        $totalBlogs = Blog::count();

        return view('admin.blogs.blogs_all', compact('blogs', 'totalBlogs'));
    }

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_add', compact('categories'));
    }

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_image' => 'required',
            'blog_tags' => 'required',
        ], [
            'blog_title.required' => 'Blog Title is Required',
            'blog_category_id.required' => 'Blog Category is Required',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->fit(350, 300)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        $blog = Blog::create([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),
            'user_id' => auth()->id()
        ]);

        // Handle editor's choice status
        if ($request->has('editor_choice')) {
            $blog->editorChoice()->create([]);
        }

        return redirect()->route('all.blog')->with('success', 'Blog Inserted Successfully');
    }

    public function EditBlog($id)
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogs = Blog::findOrFail($id);

        return view('admin.blogs.blog_edit', compact('blogs', 'categories'));
    }

    public function UpdateBlog(Request $request)
    {
        $blogs_id = $request->id;

        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
        ]);

        $blog = Blog::findOrFail($blogs_id);

        // Update the blog attributes
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->fit(350, 300)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            $blog->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'blog_image' => $save_url,
            ]);
        } else {
            $blog->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
            ]);
        }

        // Update the editor's choice status
        if ($request->has('editor_choice')) {
            $blog->editorChoice()->updateOrCreate(['blog_id' => $blog->id]);
        } else {
            $blog->editorChoice()->delete();
        }

        return redirect()->route('all.blog')->with('success', 'Blog Updated Successfully');
    }

    public function DeleteBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Blog Data Deleted Successfully');
    }

    public function BlogDetails($id)
    {
        $blog = Blog::with('author')->findOrFail($id);
        $blog->increment('views_count');

        $relatedPosts = Blog::where('id', '!=', $id)
            ->where(function ($query) use ($blog) {
                foreach (explode(',', $blog->blog_tags) as $tag) {
                    $query->orWhere('blog_tags', 'like', '%' . $tag . '%');
                }
            })
            ->latest()
            ->take(3)
            ->get();

        $popularBlogs = Blog::with('editorChoice')
            ->orderBy('views_count', 'desc')
            ->take(5)
            ->get();

        // Generate the schema markup
        $schema = SchemaService::generateBlogPostSchema(
            $blog->blog_title,
            $blog->blog_description,
            $blog->created_at->toIso8601String(),
            $blog->blog_category_id
        );

        return view('frontend.blog_details', compact('blog', 'relatedPosts', 'popularBlogs', 'schema'));
    }

    public function RelatedPosts($id)
    {
        $allblogs = Blog::latest()->paginate(3);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogs = Blog::findOrFail($id);

        $relatedPosts = Blog::where('id', '!=', $id)
            ->where(function ($query) use ($blogs) {
                foreach (explode(',', $blogs->blog_tags) as $tag) {
                    $query->orWhere('blog_tags', 'like', '%' . $tag . '%');
                }
            })
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.related_blogs_details', compact('relatedPosts', 'blogs', 'categories', 'allblogs'));
    }

    public function likeBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->increment('likes_count'); // Assuming you have a `likes_count` column

        return response()->json([
            'likes_count' => $blog->likes_count,
        ]);
    }

    public function CategoryBlog($id)
    {
        $categoryname = BlogCategory::findOrFail($id);
        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();

        return view('frontend.cat_blogs_details', compact('blogpost', 'categories', 'categoryname'));
    }

    public function authorBlogs($id)
    {
        $author = User::findOrFail($id);
        $blogs = Blog::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $popularBlogs = Blog::orderBy('views_count', 'desc')->take(5)->get();

        return view('frontend.author_blogs', compact('blogs', 'author', 'categories', 'popularBlogs'));
    }

    public function BlogsAll()
    {
        $allblogs = Blog::latest()->paginate(5);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();

        return view('frontend.blogs_all', compact('allblogs', 'categories'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $keyword = $request->input('keyword');

        $searchblogs = Blog::query()
            ->where('blog_title', 'like', '%' . $keyword . '%')
            ->orWhere('blog_description', 'like', '%' . $keyword . '%')
            ->paginate(10);

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();

        return view('frontend.blog_search_results', compact('searchblogs', 'categories'));
    }

    public function rss()
    {
        $blogs = Blog::latest()->limit(10)->get();
        return response()->view('frontend.rss', compact('blogs'))->header('Content-Type', 'application/rss+xml');
    }

    public function share(Request $request, $id, $platform)
    {
        $post = Blog::findOrFail($id);

        switch ($platform) {
            case 'facebook':
                return redirect("https://www.facebook.com/sharer/sharer.php?u=" . url("posts/{$post->slug}"));
            case 'twitter':
                return redirect("https://twitter.com/intent/tweet?url=" . url("posts/{$post->slug}"));
            default:
                abort(404);
        }
    }
}
