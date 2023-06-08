<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $authUser = auth('web')->user();
        $blogs = Blog::where('status', 1)->take(3)->get();
        $data = array(
            'title' => "Generate AI Content with EasySEO.ai: Best AI Writing Tool",
            'blogs' => $blogs,
            'words' => auth('web')->check() ? UserPackage::where('user_id',$authUser->user_type == 'main' ? $authUser->id : $authUser->main_user_id)->latest()->first()->words : 0,
        );
        return view('website.home')->with($data);
    }
    public function privacy()
    {
        $data = array(
            'title' => "Privacy Policy"
        );
        return view('website.pages.privacy')->with($data);
    }
    public function about_us()
    {
        $data = array(
            'title' => "About Us"
        );
        return view('website.pages.about_us')->with($data);
    }

    public function contact_us()
    {
        $data = array(
            'title' => "Contact Us"
        );
        return view('website.pages.contact_us')->with($data);
    }

    public function pricing()
    {
        $authUser = auth('web')->user();
        $data = array(
            'title' => "Pricing",
            'words' => auth('web')->check() ? UserPackage::where('user_id',$authUser->user_type == 'main' ? $authUser->id : $authUser->main_user_id)->latest()->first()->words : 0,
        );
        return view('website.pages.pricing')->with($data);
    }

    public function faqs()
    {
        $data = array(
            'title' => "FAQ`s"
        );
        return view('website.pages.faqs')->with($data);
    }

    public function terms()
    {
        $data = array(
            'title' => "TERMS OF SERVICE"
        );
        return view('website.pages.terms')->with($data);
    }

    public function cancellation_policy()
    {
        $data = array(
            'title' => "CANCELLATION & REFUND POLICY"
        );
        return view('website.pages.cancellation_policy')->with($data);
    }

    public function prohibited_content_policy()
    {
        $data = array(
            'title' => "PROHIBITED CONTENT POLICY"
        );
        return view('website.pages.prohibited_content_policy')->with($data);
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::where('status', 1)->latest()->paginate(6);
        $category = BlogCategory::latest()->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'res' => view('website.pages.blog.response')->with(['blogs' => $blogs])->render(),
            ]);
        }

        $data = array(
            'title' => 'Blogs',
            'blogs' => $blogs,
            'categories' => $category,
        );

        return view('website.pages.blog.inedx')->with($data);
    }

    public function get_blog_by_cat(Request $request)
    {
        $blogs = new Blog();

        if ($request->ajax()) {
            if ($request->category_id != 'all') {
                $id = hashids_decode($request->category_id);
                $blogs = $blogs->where(['category_id' => $id]);
            }

            if (isset($request->searchValue) && !empty($request->searchValue)) {
                $blogs = $blogs->where('title', 'like', "%{$request->searchValue}%");
            }

            $blogs = $blogs->where(['status' => 1])->latest()->paginate(6);
            $data = array(
                'status' => true,
                'res' => view('website.pages.blog.response')->with('blogs', $blogs)->render()
            );
            return response()->json($data);
        }
    }

    public function blog_details($slug)
    {
        $slug = htmlspecialchars($slug);

        if ($slug != "") {
            $blogData = Blog::where('slug', $slug)
                ->get();
        }
        if (empty($blogData[0])) {
            header("Location: /blogs");
            exit();
        } else {
            $blog = $blogData[0];
        }

        $relevant_blogs = Blog::where(['category_id' => $blog->category_id, 'status' => 1])->where('id', '!=', $blog->id)->latest()->limit(3)->get();

        $data = array(
            'title' => $blog->title,
            'data' => $blog,
            'relevant_blogs' => $relevant_blogs
        );

        return view('website.pages.blog.detail')->with($data);
    }
}
