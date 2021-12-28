<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Inquiry;
use App\Models\Link;
use App\Models\Logo;
use App\Models\Planinquiry;
use App\Models\Planpdf;
use App\Models\Product;
use App\Models\Service;
use App\Models\Servicepdf;
use App\Models\Slider;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Slider::select('*')->get();
        $about = About::select('*')->first();
        $services = Service::select('*')->paginate(4);
        $products = Product::select('*')->where('enabled',1)->get();
        return view('frontend.index',compact('banner','about','services','products'));
    }

    //about us
    public function aboutUs()
    {
        $about = About::select('*')->first();
        return view('frontend.about',compact('about'));
    }
    //blogs
    public function blogs()
    {
        $blogs = Blog::select('*')->latest()->paginate(12);
        return view('frontend.blog.index',compact('blogs'));
    }
    public function singleBlog($slug)
    {
        $blog = Blog::select('*')->where('slug',$slug)->first();
        return view('frontend.blog.show',compact('blog'));
    }

    //contact page
    public function contact()
    {
        $logo = Logo::select('*')->first();
        $contact = Contact::select('*')->first();
        $links = Link::select('*')->get();
        return view('frontend.contact',compact('contact','links','logo'));
    }
    //post inquiry
    public function sendInquiry(Request $request)
    {
        $inquiry = new Inquiry();
        $inquiry->full_name = $request->full_name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->message = $request->message;
        $status = $inquiry->save();

        //for mail system
        $name = $request->full_name;
        $email = $request->email;
        $phone = $request->phone;
        $messages = $request->message;

        if($status){
            return redirect()->back()->with('success','Inquiry Message Send Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while sending inquiry.');
        }
    }


    //services
    public function services()
    {
        $services = Service::select('*')->get();
        return view('frontend.service.index',compact('services'));
    }
    public function singleService($slug)
    {
        $service = Service::select('*')->where('slug',$slug)->first();
        $servicepdf = Servicepdf::select('*')->where('service_id',$service->id)->latest()->get();
        return view('frontend.service.show',compact('service','servicepdf'));
    }
    //for pdf downloads
    public function downloadPDF($slug)
    {
        $category = Category::select('*')->where('slug',$slug)->first();
        $downloads = Document::select('*')->where('category_id',$category->id)->latest()->get();
        return view('frontend.downloads',compact('category','downloads'));
    }
    //service plan
    public function plan()
    {
        $products = Product::select('*')->where('enabled',1)->get();
        return view('frontend.plan.index',compact('products'));
    }
    public function singlePlan($slug)
    {
        $product = Product::select('*')->where('slug',$slug)->first();
        $planpdf = Planpdf::select('*')->where('product_id',$product->id)->latest()->get();
        return view('frontend.plan.show',compact('product','planpdf'));
    }

    //post plan inquiry
    public function planInquiry(Request $request)
    {
        $planinquiry = new Planinquiry();
        $planinquiry->plan_name = $request->plan_name;
        $planinquiry->name = $request->name;
        $planinquiry->email = $request->email;
        $planinquiry->contact = $request->contact;
        $planinquiry->message = $request->message;
        $status = $planinquiry->save();

        //for mail
        $plan = $request->plan_name;
        $name = $request->name;
        $email = $request->email;
        $contact = $request->contact;
        $messages = $request->message;

        if($status){
            return redirect()->back()->with('success','Plan Inquiry Message Send Successfully.');
        }else{
            return redirect()->back()->with('error','Something is missing while sending inquiry.');
        }
    }
}
