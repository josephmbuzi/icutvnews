<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioMultiImages;
use App\Models\Services;
use Illuminate\Support\Carbon;
use Image;

class PortfolioController extends Controller
{
    public function AllPortfolio(){

        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all',compact('portfolio'));

    } // End Method

    public function AddPortfolio(){
        $services = Services::orderBy('service_name','ASC')->get();
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_add',compact('portfolio','services'));

    } // End Method

    public function Storeportfolio(Request $request){
        $request->validate([
            'portfolio_name' => 'required',
            'service_name_id' => 'required',
            'portfolio_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Updated validation rule for main image
            'client' => 'required',
        ], [
            'portfolio_name.required' => 'Portfolio Name is Required',
            'service_name_id.required' => 'Service is Required',
            'portfolio_image.required' => 'Main Portfolio Image is Required', // Added validation message for main image
        ]);

        // Process main image
        $mainImage = $request->file('portfolio_image');
        $mainImageName = hexdec(uniqid()) . '.' . $mainImage->getClientOriginalExtension();
        Image::make($mainImage)->save('upload/portfolio/' . $mainImageName);
        $mainImageSaveUrl = 'upload/portfolio/' . $mainImageName;

        // Create a new portfolio
        $portfolio = Portfolio::create([
            'portfolio_name' => $request->portfolio_name,
            'service_name_id' => $request->service_name_id,
            'portfolio_title' => $request->portfolio_title,
            'client' => $request->client,
            'industry' => $request->industry,
            'link' => $request->link,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_short_description' => $request->portfolio_short_description,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'portfolio_image' => $mainImageSaveUrl,
            'created_at' => Carbon::now(),
        ]);

        // Process multi-images
        $multiImages = $request->file('portfolio_images');
        $multiImageUrls = [];
        foreach ($multiImages as $multiImage) {
            $name_gen = hexdec(uniqid()) . '.' . $multiImage->getClientOriginalExtension();
            Image::make($multiImage)->save('upload/portfolio/multi/' . $name_gen);
            $multiImageUrls[] = 'upload/portfolio/multi/' . $name_gen;
        }

        // Create and associate multi-images with the portfolio
        $portfolioMultiImages = [];
        foreach ($multiImageUrls as $multiImageUrl) {
            $portfolioMultiImages[] = ['portfolio_multi_images' => $multiImageUrl];
        }
        $portfolio->images()->createMany($portfolioMultiImages);

        $notification = [
            'message' => 'Portfolio Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.portfolio')->with($notification);
    }


    public function EditPortfolio($id){
        $services = Services::orderBy('service_name','ASC')->get();
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit',compact('portfolio','services'));
    }// End Method

    public function updatePortfolio(Request $request)
    {
        $portfolio_id = $request->id;

        $portfolio = Portfolio::findOrFail($portfolio_id);

        $request->validate([
            'portfolio_name' => 'required',
            'service_name_id' => 'required',
            'portfolio_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'required',
        ], [
            'portfolio_name.required' => 'Portfolio Name is Required',
            'service_name_id.required' => 'Service is Required',
        ]);

        // Update portfolio fields
        $portfolio->update([
            'portfolio_name' => $request->portfolio_name,
            'service_name_id' => $request->service_name_id,
            'portfolio_title' => $request->portfolio_title,
            'client' => $request->client,
            'industry' => $request->industry,
            'link' => $request->link,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_short_description' => $request->portfolio_short_description,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
        ]);

        // Process and update main image if provided
        if ($request->hasFile('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/portfolio/' . $name_gen);
            $main_image_url = 'upload/portfolio/' . $name_gen;

            // Delete old main image if exists
            if (file_exists($portfolio->portfolio_image)) {
                unlink($portfolio->portfolio_image);
            }

            $portfolio->update([
                'portfolio_image' => $main_image_url,
            ]);
        }

        // Process and update multiple images if provided
        $multiimages = $request->file('portfolio_images');
        if ($multiimages) {
            $imageUrls = [];
            foreach ($multiimages as $multi_image) {
                $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
                Image::make($multi_image)->save('upload/portfolio/multi/' . $name_gen);
                $imageUrls[] = 'upload/portfolio/multi/' . $name_gen;
            }

            $portfolio->images()->delete();
            $portfolio->images()->createMany(
                array_map(function ($imageUrl) {
                    return ['portfolio_multi_images' => $imageUrl];
                }, $imageUrls)
            );
        }

        $notification = [
            'message' => 'Portfolio Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.portfolio')->with($notification);
    }


    public function DeletePortfolio($id){
        $portfolio = Portfolio::findOrFail($id);

        // Delete related multi-images
        $multiImages = PortfolioMultiImages::where('portfolio_id', $id)->get();
        foreach ($multiImages as $multiImage) {
            // Unlink image
            if (file_exists($multiImage->portfolio_images)) {
                unlink($multiImage->portfolio_images);
            }
            $multiImage->delete();
        }

        // Unlink and delete main image
        $mainImage = $portfolio->portfolio_image;
        if (file_exists($mainImage)) {
            unlink($mainImage);
        }

        $portfolio->delete();

        $notification = array(
            'message' => 'Portfolio Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } //End Method

    public function PortfolioDetails($id) {
        $portfolio = Portfolio::findOrFail($id);
        $services = $portfolio->service;
        $images = PortfolioMultiImages::where('portfolio_id', $id)->orderBy('portfolio_multi_images', 'ASC')->get();
        return view('frontend.portfolio_details',compact('portfolio','images','services'));
    }//End Method

    public function HomePortfolio(){
        $portfolio = Portfolio::latest()->get();
        return view('frontend.portfolio',compact('portfolio'));
    } //End Method
}
