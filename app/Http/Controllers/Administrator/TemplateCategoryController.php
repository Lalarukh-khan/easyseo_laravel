<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TemplateCategory as Category;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TemplateCategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = Category::latest('id')->get(['template_categories.*',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return view('admin.template.category.status_col')->with(['data'=>$row])->render();
                })
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    return view('admin.template.category.action')->with(['data'=>$row])->render();
                })
                ->rawColumns(['status', 'created_at','action'])
                ->make(true);
        }
        $data = array(
            'title' => 'All Categories',
        );

        return view('admin.template.category.index')->with($data);
    }

    public function save(Request $request)
    {
        $rules = [
            'category_name' => 'required|string|max:191',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $category = new Category();
        if (isset($request->category_id) && !empty($request->category_id)) {
            $category = $category::hashidFind($request->category_id);
            $msg = [
                'success' => 'Category Updated Successfully',
                'reload' => true,
            ];
        }else{
            $msg = [
                'success' => 'Category Added Successfully',
                'reload' => true,
            ];
        }

        $category->name = $request->category_name;
        $category->status = $request->status;
        $category->added_by_id = auth('admin')->id();
        $category->save();
        session()->flash('success-msg',$msg['success']);

        return response()->json($msg);
    }

    public function status_update($id)
    {
        try {
            $category = Category::hashidFind($id);
            $category->status = !$category->status;
            $category->save();
        } catch (Exception $e) {
            return response()->json($e);
        }
        session()->flash('success-msg','Category Status Updated Successfully');

        return response()->json([
            'success' => 'Category Status Updated Successfully',
            'reload' => true,
        ]);
    }

    public function delete($id)
    {
        try {
            $category = Category::hashidFind($id);
            $category->delete();
        } catch (Exception $e) {
            return response()->json($e);
        }
        session()->flash('success-msg','Category Deleted Successfully');

        return response()->json([
            'success' => 'Category Deleted Successfully',
            'reload' => true,
        ]);
    }
}
