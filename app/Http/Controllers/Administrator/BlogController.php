<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\Slug;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // category blog functions start
    public function all_category()
    {
        $data = array(
            'title' => 'Categories',
            'page_action' => 'Add'
        );

        if(request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = BlogCategory::latest('id')->get(['blog_category.*',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('admin.blog.category.edit',$row->hashid).'" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a> &nbsp;&nbsp;
                    <a href="javascript:void(0);" onclick="ajaxRequest(this)" data-url="'.route('admin.blog.category.delete',$row->hashid).'" style="font-size:20px;"><i class="fadeIn animated bx bx-trash" style=" color: red; "></i></a>';
                })
                ->rawColumns(['created_at','action'])
                ->make(true);
        }

        return view('admin.blog.all_category')->with($data);
    }

    public function edit_category(Request $request)
    {
        $data = array(
            'title' => 'Categories',
            'page_action' => 'Edit',
            'cat_data' => BlogCategory::hashidFind($request->id),
        );
        return view('admin.blog.all_category')->with($data);
    }

    public function save_category(Request $request)
    {
        if(empty($request->cat_id)){
            $category = new BlogCategory();
            $msg = 'Category Added Successfully';
        }else{
            $category = BlogCategory::find($request->cat_id);
            $msg = 'Category Edit Successfully';
        }

        $category->name = $request->cat_name;
        if (isset($request->cat_slug) && !empty($request->cat_slug)) {
            $category->slug = strtolower(str_replace(' ','-',$request->cat_slug));
        }else{
            $category->slug = strtolower(str_replace(' ','-',$request->cat_name));
        }
        $category->save();
        session()->flash('success-msg',$msg);

        return response()->json([
            'redirect' => route('admin.blog.category.all'),
        ]);
    }

    public function delete_category(Request $request)
    {
        $category = BlogCategory::hashidFind($request->id);
        // $category->blogs()->delete();
        $category->delete();

        session()->flash('success-msg','Category Deleted Successfully');

        return response()->json([
            'redirect' => route('admin.blog.category.all'),
        ]);
    }
    // category blog functions end

    //blog functions start
    public function all_blog()
    {
        $data = array(
            'title' => 'Blogs',
            'page_action' => 'Add'
        );

        if(request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = Blog::JOIN('blog_category', 'blogs.category_id', '=', 'blog_category.id')->latest('id')->get(['blogs.*','blog_category.name as categoryName',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->editColumn('status', function ($row) {
                    $status = (( $row->status == 1 ) ? '<span class="badge bg-success">Published</span>' : '<span class="badge bg-primary">Draft</span>');
                    return $status;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('web.blog.details',$row->hashid).'" target="_blank" style="font-size:20px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right text-info"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></a> &nbsp;<a href="'.route('admin.blog.edit',$row->hashid).'" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a> &nbsp;&nbsp;
                    <a href="javascript:void(0);" onclick="ajaxRequest(this)" data-url="'.route('admin.blog.delete',$row->hashid).'" style="font-size:20px;"><i class="fadeIn animated bx bx-trash" style=" color: red; "></i></a>';
                })
                ->rawColumns(['created_at','status','action'])
                ->make(true);
        }

        return view('admin.blog.all_blog')->with($data);
    }

    public function add_blog()
    {
        $data = array(
            'title' => 'Add Blog',
            'categories' => BlogCategory::orderBy('name')->get(['id','name'])
        );

        return view('admin.blog.add_blog')->with($data);
    }

    public function edit_blog($id)
    {
        $data = array(
            'title' => 'Edit Blog',
            'page_action' => 'Edit',
            'edit' => Blog::hashidFind($id),
            'categories' => BlogCategory::orderBy('name')->get(['id','name'])
        );
        return view('admin.blog.add_blog')->with($data);
    }

    public function save_blog(Request $request,Slug $slug)
    {
        // dd($request->description);
        $rules = [
            'title' => 'required',
            'meta_description' => 'required',
            'description' => 'required',
            'category' => 'required',
            'auther' => 'required',
        ];

        if (empty($request->id)) {
            $rules['image'] = 'required|mimes:jpeg,png,jpg|max:2048|dimensions:width=800,height=400';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $blog = new Blog();

        if (isset($request->id) && !empty($request->id)) {
            $blog = $blog::hashidFind($request->id);
            $blog->slug = $slug->createSlug('blogs', $request->title, $blog->id);
            $msg = 'Blog Updated Successfully';
        }else{
            $blog->slug = $slug->createSlug('blogs', $request->title);
            $msg = 'Blog Added Successfully';
        }


        if ($request->hasFile('image')) {
            $image = uploadSingleFile($request->file('image'), 'uploads/blogs/');
            if (is_array($image)) {
                return response()->json($image);
            }
            if (file_exists($blog->image)) {
                @unlink($blog->image);
            }
            $blog->image = $image;
        }


        $blog->category_id = $request->category;
        $blog->title = $request->title;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->auther = $request->auther;
        if (isset($request->status) && $request->status == 0) {
            $blog->status = 0;
        }else{
            $blog->status = 1;
        }
        $blog->save();

        session()->flash('success-msg',$msg);

        return response()->json([
            'redirect' => route('admin.blog.all'),
        ]);
    }

    public function delete_blog($id)
    {
        $blog = Blog::hashidFind($id);
        if (file_exists($blog->image)) {
            @unlink($blog->image);
        }
        $blog->delete();
        session()->flash('success-msg','Blog Deleted Successfully');

        return response()->json([
            'redirect' => route('admin.blog.all'),
        ]);
    }
}
