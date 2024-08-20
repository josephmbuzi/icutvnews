<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\AdvertController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\CommentsController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FaqController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PageController;
use App\Http\Controllers\Home\PropertyCategoryController;
use App\Http\Controllers\Home\PropertyController;
use App\Http\Controllers\Home\PropertyLocationController;
use App\Http\Controllers\Home\ReviewCategoryController;
use App\Http\Controllers\Home\ReviewController;
use App\Http\Controllers\Home\RobotsTxtController;
use App\Http\Controllers\Home\ServicesController;
use App\Http\Controllers\Home\SubscriberController;
use App\Http\Controllers\Home\TeamController;
use App\Http\Controllers\Home\TestimonialController;
use App\Http\Controllers\Home\SitemapController;
use App\Http\Controllers\Home\ErrorController;
use App\Http\Controllers\Home\UserController;
use App\Http\Controllers\Home\YoutubeController;
use App\Http\Controllers\Home\CommentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });


// Admin All Route
Route::middleware(['adminuser'])->group(function () {
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about/page', 'AboutPage')->name('about.page');
        Route::post('/update/about', 'UpdateAbout')->name('update.about');
        // Route::get('/about', 'HomeAbout')->name('home.about');
        Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
        Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
        Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
        Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
        Route::post('/Update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
        Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
    
    
    });
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
        Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category{id}', 'EditBlogCategory')->name('edit.blog.category');
        Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/all/users', 'users')->name('all.users');
        Route::get('/add/user', 'addUsers')->name('add.user');
        Route::post('/add/user', 'insertUsers')->name('insert.user');
        Route::get('/edit/user{id}', 'editUsers')->name('edit.user');
        Route::post('/edit/user{id}', 'updateUsers')->name('update.user');
        Route::get('/delete/user{id}', 'deleteUser')->name('delete.user');
    
    });

    // HomeSlide All Route
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('/home/slide', 'HomeSlider')->name('home.slide');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');

});
});
// Admin All Route
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');


    });
});

Route::fallback([ErrorController::class, 'NotFound']);



// Home All Route
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'HomeMain')->name('home');


});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'HomeAbout')->name('home.about');

});

// Page All Route
Route::controller(PageController::class)->group(function () {
    Route::get('/all/pages', 'AllPages')->name('all.pages');
    Route::get('/add/pages', 'AddPages')->name('add.pages');
    Route::post('/store/page', 'StorePage')->name('store.page');
    Route::get('/edit/page{id}', 'EditPage')->name('edit.page');
    Route::post('/update/page', 'UpdatePage')->name('update.page');
    Route::get('/delete/page{id}', 'DeletePage')->name('delete.page');


});

// About Page All Route


// FAQ Route
Route::controller(FaqController::class)->group(function () {
    Route::get('/all/faq', 'AllFaq')->name('all.faq');
    Route::get('/add/faq', 'AddFaq')->name('add.faq');
    Route::post('/store/faq', 'StoreFaq')->name('store.faq');
    Route::get('/edit/faq{id}', 'EditFaq')->name('edit.faq');
    Route::post('/update/faq', 'UpdateFaq')->name('update.faq');
    Route::get('/delete/faq{id}', 'DeleteFaq')->name('delete.faq');

});

// Portfolio All Route
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio{id}', 'DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details{id}', 'PortfolioDetails')->name('portfolio.details');
    Route::get('/portfolio', 'HomePortfolio')->name('home.portfolio');


});



// Blog All Route
Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'AllBlog')->name('all.blog');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/blog{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/blog{id}', 'DeleteBlog')->name('delete.blog');
    Route::get('/blog/details{id}', 'BlogDetails')->name('blog.details');
    Route::get('/blogs/all', 'BlogsAll')->name('blogs.all');
    Route::get('/category/blog{id}', 'CategoryBlog')->name('category.blog');
    Route::get('/popular/blogs', 'PopularBlogs')->name('popular.blogs');
    Route::get('/related/posts{id}', 'RelatedPosts')->name('related.posts');
    Route::get('/home/blogs', 'HomeBlogs')->name('home.blogs');
    Route::get('/search/blogs', 'Search')->name('search.blogs');
    Route::get('/rss', 'rss');
    Route::get('/blog/details{id}/share/{platform}', [BlogController::class, 'SharePost'])->name('post.share');
    Route::post('/blog/like/{id}', 'likeBlog')->name('blog.like');
    Route::get('/author/{id}/blogs', 'authorBlogs')->name('author.blogs');

    // Route::get('/blog', 'HomeBlog')->name('home.blog');



});

Route::controller(CommentController::class)->group(function () {
    Route::post('/blog/{id}/comments', 'store')->name('comments.store');
});

// Youtube All Route
Route::controller(YoutubeController::class)->group(function () {
    Route::get('/all/youtube', 'AllYoutube')->name('all.youtube');
    Route::get('/add/youtube', 'AddYoutube')->name('add.youtube');
    Route::post('/store/youtube', 'StoreYoutube')->name('store.youtube');
    Route::get('/edit/youtube/{id}', 'EditYoutube')->name('edit.youtube');
    Route::post('/update/youtube/{id}', 'UpdateYoutube')->name('update.youtube');
    Route::get('/delete/youtube{id}', 'DeleteYoutube')->name('delete.youtube');
    // Route::get('/blog/details{id}', 'BlogDetails')->name('blog.details');
    // Route::get('/blogs/all', 'BlogsAll')->name('blogs.all');
    // Route::get('/category/blog{id}', 'CategoryBlog')->name('category.blog');
    // Route::get('/popular/blogs', 'PopularBlogs')->name('popular.blogs');
    // Route::get('/related/posts{id}', 'RelatedPosts')->name('related.posts');
    // Route::get('/home/blogs', 'HomeBlogs')->name('home.blogs');
    // Route::get('/search/blogs', 'Search')->name('search.blogs');
    // Route::get('/rss', 'rss');
    // Route::get('/blog/details{id}/share/{platform}', [BlogController::class, 'SharePost'])->name('post.share');

    // Route::get('/blog', 'HomeBlog')->name('home.blog');



});



// Review Category Route
Route::controller(ReviewCategoryController::class)->group(function () {
    Route::get('/all/review/category', 'AllReviewCategory')->name('all.review.category');
    Route::get('/add/review/category', 'AddReviewCategory')->name('add.review.category');
    Route::post('/store/review/category', 'StoreReviewCategory')->name('store.review.category');
    Route::get('/edit/review/category{id}', 'EditReviewCategory')->name('edit.review.category');
    Route::post('/update/review/category', 'UpdateReviewCategory')->name('update.review.category');
    Route::get('/delete/review/category{id}', 'DeleteReviewCategory')->name('delete.review.category');

});

// Review All Route
Route::controller(ReviewController::class)->group(function () {
    Route::get('/all/review', 'AllReview')->name('all.review');
    Route::get('/add/review', 'AddReview')->name('add.review');
    Route::post('/store/review', 'StoreReview')->name('store.review');
    Route::get('/edit/review{id}', 'EditReview')->name('edit.review');
    Route::post('/update/review', 'UpdateReview')->name('update.review');
    Route::get('/delete/review{id}', 'DeleteReview')->name('delete.review');
    Route::get('/review/details{id}', 'ReviewDetails')->name('review.details');
    Route::get('/reviews/all', 'ReviewsAll')->name('reviews.all');
    Route::get('/category/review{id}', 'CategoryReview')->name('category.review');
    Route::get('/related/reviews{id}', 'RelatedReviews')->name('related.reviews');
    Route::get('/home/reviews', 'HomeReviews')->name('home.reviews');



});

// Advert All Route
Route::controller(AdvertController::class)->group(function () {
    Route::get('/advert/setup', 'AdvertSetup')->name('advert.setup');
    Route::get('/show/advert', 'ShowAdvert')->name('show.advert');
    Route::post('/store/advert', 'StoreAdvert')->name('store.advert');
    Route::get('/edit/advert{id}', 'EditAdvert')->name('edit.advert');
    Route::post('/update/advert', 'UpdateAdvert')->name('update.advert');
    Route::get('/home/advert', 'AdvertHome')->name('home.advert');


});

// Property Category Route
Route::controller(PropertyCategoryController::class)->group(function () {
    Route::get('/all/property/category', 'AllPropertyCategory')->name('all.property.category');
    Route::get('/add/property/category', 'AddPropertyCategory')->name('add.property.category');
    Route::post('/store/property/category', 'StorePropertyCategory')->name('store.property.category');
    Route::get('/edit/property/category{id}', 'EditPropertyCategory')->name('edit.property.category');
    Route::post('/update/property/category', 'UpdatePropertyCategory')->name('update.property.category');
    Route::get('/delete/property/category{id}', 'DeletePropertyCategory')->name('delete.property.category');

});

// Property Location Route
Route::controller(PropertyLocationController::class)->group(function () {
    Route::get('/all/property/location', 'AllPropertyLocation')->name('all.property.location');
    Route::get('/add/property/location', 'AddPropertyLocation')->name('add.property.location');
    Route::post('/store/property/location', 'StorePropertyLocation')->name('store.property.location');
    Route::get('/edit/property/location{id}', 'EditPropertyLocation')->name('edit.property.location');
    Route::post('/update/property/location', 'UpdatePropertyLocation')->name('update.property.location');
    Route::get('/delete/property/location{id}', 'DeletePropertyLocation')->name('delete.property.location');

});

// Property All Route
Route::controller(PropertyController::class)->group(function () {
    Route::get('/all/property', 'AllProperty')->name('all.property');
    Route::get('/add/property', 'AddProperty')->name('add.property');
    Route::post('/store/property', 'StoreProperty')->name('store.property');
    Route::get('/edit/property{id}', 'EditProperty')->name('edit.property');
    Route::post('/update/property', 'UpdateProperty')->name('update.property');
    Route::get('/delete/property{id}', 'DeleteProperty')->name('delete.property');
    Route::get('/property/details{id}', 'PropertyDetails')->name('property.details');
    Route::get('/properties', 'HomeProperties')->name('home.properties');
    Route::get('/category/property{id}', 'CategoryProperty')->name('category.property');
    Route::get('/search/property', 'Search')->name('search.property');



});
// Service All Route
Route::controller(ServicesController::class)->group(function () {
    Route::get('/all/services', 'AllServices')->name('all.services');
    Route::get('/add/services', 'AddServices')->name('add.services');
    Route::post('/store/service', 'StoreService')->name('store.service');
    Route::get('/edit/service{id}', 'EditService')->name('edit.service');
    Route::post('/update/service', 'UpdateService')->name('update.service');
    Route::get('/delete/service{id}', 'DeleteService')->name('delete.service');
    Route::get('/service/details{id}', 'ServiceDetails')->name('service.details');
    Route::get('/services', 'HomeServices')->name('home.services');


});

// Team All Route
Route::controller(TeamController::class)->group(function () {
    Route::get('/all/team', 'AllTeam')->name('all.team');
    Route::get('/add/team', 'AddTeam')->name('add.team');
    Route::post('/store/team', 'StoreTeam')->name('store.team');
    Route::get('/edit/team{id}', 'EditTeam')->name('edit.team');
    Route::post('/update/team', 'UpdateTeam')->name('update.team');
    Route::get('/delete/team{id}', 'DeleteTeam')->name('delete.team');
    Route::get('/team/details{id}', 'TeamDetails')->name('team.details');
});

// Testimonial All Route
Route::controller(TestimonialController::class)->group(function () {
    Route::get('/all/testimonials', 'AllTestimonials')->name('all.testimonials');
    Route::get('/add/testimonials', 'AddTestimonials')->name('add.testimonials');
    Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
    Route::get('/edit/testimonial{id}', 'EditTestimonial')->name('edit.testimonial');
    Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
    Route::get('/delete/testimonial{id}', 'DeleteTestimonial')->name('delete.testimonial');


});



// Comments All Route

Route::group(['middleware' => ['web']], function () {
    // Display comments on the frontend
    Route::get('/index', [CommentsController::class, 'index'])->name('index');

    // Display the comment submission form
    // Route::get('/add/comments', [CommentsController::class, 'create'])->name('add.comments');

    // Store a new comment
    Route::post('/store/comment', [CommentsController::class, 'storeComment'])->name('store.comment');

    // Display unapproved comments in the admin dashboard
    Route::get('/approve/comments', [CommentsController::class, 'unapprovedComment'])->name('approve.comments');

    // Display approved comments on the frontend
    Route::get('/approved/comments', [CommentsController::class, 'approvedComment'])->name('approved.comments');

    // Display the comment for approval
    Route::patch('/approve/commenter/comment/{id}', [CommentsController::class, 'approveComment'])->name('approve.commenter.comment');
});

Route::group(['middleware' => ['web']], function () {
    // Display reviews on the frontend
    Route::get('/index', [ReviewController::class, 'index'])->name('index');


    // Store a new review
    Route::post('/store/review', [ReviewController::class, 'storeReview'])->name('store.review');

    // Display unapproved reviews in the admin dashboard
    Route::get('/approve/reviews', [ReviewController::class, 'unapprovedReview'])->name('approve.reviews');

    // Display approved reviews on the frontend
    Route::get('/approved/reviews', [ReviewController::class, 'approvedReview'])->name('approved.reviews');

    // Display the reviews for approval
    Route::patch('/approve/reviewer/review/{id}', [ReviewController::class, 'approveReview'])->name('approve.reviewer.review');
});


// Footer All Route
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');


});

// Contact All Route
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.us');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message{id}', 'DeleteMessage')->name('delete.message');

});

// Contact All Route
Route::controller(SubscriberController::class)->group(function () {
    Route::post('/store/subscriber', 'StoreSubscriber')->name('store.subscriber');
    Route::get('/subscriber/email', 'SubscriberEmail')->name('subscriber.email');
    Route::get('/delete/subscriber{id}', 'DeleteSubscriber')->name('delete.subscriber');

});


Route::controller(SitemapController::class)->group(function () {
    Route::get('/sitemap.xml', 'index');

});

Route::controller(RobotsTxtController::class)->group(function () {
    Route::get('/robots.txt', 'index');

});






Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
