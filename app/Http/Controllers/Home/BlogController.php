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


class BlogController extends Controller
{
    public function HomeBlogs(){
        $popularBlog = Blog::with('editorChoice')
        ->orderBy('views_count', 'desc')
        ->take(4) // Get the top 4 popular blogs
        ->get();

        $editorChoiceBlogs = EditorChoice::with('blog')->get(); // Retrieve editor's choice blogs

        return view('frontend.home_slide', compact('popularBlog','editorChoiceBlogs'));
    } // End Method

    // public function RelatedPosts($id) {
    //     $blog = Blog::findOrFail($id);
    //     $relatedPosts = Blog::where('id', '<>', $id) // Exclude the current post
    //                        ->where(function ($query) use ($blog) {
    //                            $tags = explode(',', $blog->blog_tags);
    //                            foreach ($tags as $tag) {
    //                                $query->orWhere('blog_tags', 'like', '%' . $tag . '%');
    //                            }
    //                        })
    //                        ->latest()
    //                        ->take(3) // Get a certain number of related posts
    //                        ->get();

    //     return view('frontend.blog_related', compact('relatedPosts'.'id'));
    // }

    public function PopularBlogs(){
        $popularBlogs = Blog::with('editorChoice') // Include editor's choice relationship if you have one
            ->orderBy('views_count', 'desc') // Order by views_count in descending order
            ->take(5) // Get the top 5 popular blogs
            ->get();

        return view('frontend.popular_blogs', compact('popularBlogs'));
    }

    public function AllBlog(){
        $totalBlogs = Blog::count();
        $blogs = Blog::latest()->get();
        
        return view('admin.blogs.blogs_all',compact('blogs','totalBlogs'));
    } // End Method

    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_add',compact('categories'));
    } // End Method

    public function StoreBlog(Request $request){
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_image' => 'required',
            'blog_tags' => 'required',
        ],[
            'blog_title.required' => 'Blog Title is Required',
            'blog_category_id.required' => 'Blog Category is Required',
        ]);

            $image = $request->file('blog_image');
            $image_2 = $request->file('blog_thumb');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $name_id = hexdec(uniqid()).'.'.$image_2->getClientOriginalExtension();

            Image::make($image)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Image::make($image_2)->save('upload/blog/'.$name_id);
            $save_img = 'upload/blog/'.$name_id;

            $blog = Blog::create([
                'blog_category_id' => $request->blog_category_id,
                'comment_id' => $request->comment_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,

                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'blog_image' => $save_url,
                'blog_thumb' => $save_img,
                'created_at' => Carbon::now()

            ]);

            // Handle editor's choice status
            if ($request->has('editor_choice')) {
                $blog->editorChoice()->create([]); // Create EditorChoice record
            }

            if ($request->has('editor_choice')) {
                $editorChoiceStatus = true;
            } else {
                $editorChoiceStatus = false;
            }

            $notification = array(
                'message' => 'Blog Inserted Successfully',
                'alert-type' => 'success'
            );




            return redirect()->route('all.blog')->with($notification);
    } // End Method
    public function EditBlog($id){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();

        $blogs = Blog::findOrFail($id);
        return view('admin.blogs.blog_edit',compact('blogs','categories'));
    }

    public function UpdateBlog(Request $request)
{
    $blogs_id = $request->id;

    $request->validate([
        'id' => 'required', // Add this validation rule for the id
        'blog_category_id' => 'required',
        'blog_title' => 'required',
        'blog_tags' => 'required',
        'blog_description' => 'required'
    ], [
        'blog_category_id.required' => 'Blog Category is Required',
        'blog_title.required' => 'Blog Title is Required',
        'blog_tags.required' => 'Blog Tags are Required',
        'blog_description.required' => 'Blog Description is Required'
    ]);

    // Update editor's choice status
    $editorChoiceStatus = $request->has('editor_choice') ? true : false;

    // Fetch the blog
    $blog = Blog::findOrFail($blogs_id);

    // Update the blog attributes
    if ($request->file('blog_image') && $request->file('blog_thumb')) {
        $image = $request->file('blog_image');
        $image_2 = $request->file('blog_thumb');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $name_id = hexdec(uniqid()).'.'.$image_2->getClientOriginalExtension();

        Image::make($image)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        Image::make($image_2)->save('upload/blog/'.$name_id);
        $save_img = 'upload/blog/'.$name_id;

        $blog->update([
            'blog_category_id' => $request->blog_category_id,
            'comment_id' => $request->comment_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,

            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'blog_image' => $save_url,
            'blog_thumb' => $save_img,
            'created_at' => Carbon::now()
        ]);
        $message = 'Blog Updated With Image Successfully';
    } else {
        $blog->update([
            'blog_category_id' => $request->blog_category_id,
            'comment_id' => $request->comment_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
        ]);
        $message = 'Blog Updated Without Image Successfully';
    }

    // Update the editor's choice status if it's different from the current status
    if ($editorChoiceStatus != $blog->editorChoice) {
        if ($editorChoiceStatus) {
            // Mark as Editor's Choice
            EditorChoice::create([
                'blog_id' => $blog->id
            ]);
        } else {
            // Unmark from Editor's Choice
            $blog->editorChoice()->delete();
        }
    }

    $notification = [
        'message' => $message,
        'alert-type' => 'success'
    ];

    return redirect()->route('all.blog')->with($notification);
}

    public function DeleteBlog($id){
        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function BlogDetails($id) {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $blogs = Blog::findOrFail($id);
        $blogs->increment('views_count'); // Increment views count

        $allblogs = Blog::latest()->limit(5)->get();

        $relatedPosts = Blog::where('id', '!=', $id)
        ->where(function ($query) use ($blogs) {
            foreach (explode(',', $blogs->blog_tags) as $tag) {
                $query->orWhere('blog_tags', 'like', '%' . $tag . '%');
            }
        })
        ->latest()
        ->take(3)
        ->get();

        $popularBlogs = Blog::with('editorChoice') // Include editor's choice relationship if you have one
        ->orderBy('views_count', 'desc') // Order by views_count in descending order
        ->take(5) // Get the top 5 popular blogs
        ->get();

        // Generate the schema markup
        $schema = SchemaService::generateBlogPostSchema(
            $blog->blog_title,
            $blog->blog_description,
            $blog->created_at->toIso8601String(),
            $blog->category->blog_category_id
        );


        return view('frontend.blog_details',compact('blog','blogs','allblogs','categories','relatedPosts','popularBlogs','schema'));
    }//End Method

    public function RelatedPosts($id){
        $allblogs = Blog::latest()->paginate(3);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
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

        return view('frontend.related_blogs_details',compact('relatedPosts','blogs','categories','allblogs'));
    }

    public function CategoryBlog($id){
        $allblogs = Blog::latest()->paginate(3);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.cat_blogs_details',compact('blogpost','categories','categoryname','allblogs'));
    } //End Method


    public function BlogsAll(){
        $allblogs = Blog::latest()->paginate(5);

        $categories = BlogCategory::orderBy('blog_category','ASC')->get();

        return view('frontend.blogs_all',compact('allblogs','categories'));
    } //End Method

    public function search(Request $request)
{
    // Validate the search input
    $request->validate([
        'keyword' => 'required|string|max:255',
    ]);

    // Get the search keyword
    $keyword = $request->input('keyword');

    // Create a query builder for the Blog model
    $query = Blog::query();

    // Check if the keyword is not empty
    if (!empty($keyword)) {
        // Search in the 'blog_title' and 'blog_content' columns
        $query->where(function ($query) use ($keyword) {
            $query->where('blog_title', 'like', '%' . $keyword . '%')
                  ->orWhere('blog_description', 'like', '%' . $keyword . '%');
        });
    }

    // Paginate the search results with 10 results per page (you can adjust this number)
    $searchblogs = $query->paginate(10);
    $categories = BlogCategory::orderBy('blog_category','ASC')->get();

    return view('frontend.blog_search_results', compact('searchblogs','categories'));
}
public function rss()
{
    $blogs = Blog::latest()->limit(10)->get(); // Change the query as per your needs
    return response()->view('frontend.rss', compact('blogs'))->header('Content-Type', 'application/rss+xml');
}

public function share(Request $request, $id, $platform)
    {
        // Retrieve the post based on the given ID
        $post = Blog::findOrFail($id);

        // Perform platform-specific logic (you can customize this based on your needs)
        switch ($platform) {
            case 'facebook':
                // Implement Facebook sharing logic (e.g., redirect to the Facebook sharing URL)
                return redirect("https://www.facebook.com/sharer/sharer.php?u=" . url("posts/{$post->slug}"));
            case 'twitter':
                // Implement Twitter sharing logic
                return redirect("https://twitter.com/intent/tweet?url=" . url("posts/{$post->slug}"));
            case 'youtube':
                // Implement YouTube sharing logic
                // You might want to generate a YouTube video link or take some other action
                break;
            default:
                // Handle unsupported platforms
                abort(404);
        }
        return view('frontend.blog_details',compact('post'));
    }


}
