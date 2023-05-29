<?php
/**
 * Class Category
 * @property \App\Category $model
 */

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public $module = ''; //Project module name
    public $_info = null; // Project module info
    public $_route = '';

    public $model = null; // Model Object
    public $table = '';
    public $id_key = '';

    var $where = '1';


    public function __construct()
    {
        $this->module = getUri(2);
        $this->_route = admin_url($this->module);
        $model = 'App\\' . \Str::studly(\Str::singular($this->module));
        $this->model = new $model;
        $this->table = $this->model->getTable();
        $this->id_key = $this->model->getKeyName();

        $this->_info = getModuleDetail();

        if (user_do_action('self_records')) {
            $user_id = \Auth::id();
            $this->where .= " AND {$this->table}.created_by = '{$user_id}'";
        }
    }


    /**
     * *****************************************************************************************************************
     * @method categories index | Grid | listing
     * *****************************************************************************************************************
     */
    public function index()
    {
        /** -------- Breadcrumb */
        \Breadcrumb::add_item($this->_info->title, admin_url('', true));

        /** -------- Pagination Config */
        $config = collect(['sort' => $this->id_key, 'dir' => 'desc', 'limit' => 25, 'group' => 'categories.' . $this->id_key])->merge(request()->query())->toArray();

        /** -------- Query */
        $select = "categories.id
, categories.title
, categories.slug
, categories.thumb
, categories.include_in_menu
-- , categories.include_in_menu
, categories.status
, categories.ordering

    ";
        $SQL = $this->model->select(\DB::raw($select));

        //$SQL = $SQL->leftJoin('categories', 'categories.id', '=', 'categories.parent_id');
        //$SQL = $SQL->leftJoin('categories', 'categories.id', '=', 'categories.include_in_menu');
        /** -------- WHERE */
        $where = $this->where;
        //$select = $SQL;
        $where .= getWhereClause($select);
        if (!empty($where)) {
            $SQL = $SQL->whereRaw($where);
        }

        $SQL = $SQL->orderBy($config['sort'], $config['dir'])->groupBy($config['group']);

        $paginate_OBJ = $SQL->paginate($config['limit']);
        $query = $SQL->toSql();

        /** -------- Response */
        if (request()->ajax() || request()->is('api/*')) {
            return api_response(['status' => true, 'response' => $paginate_OBJ]);
        } else {
            \View::share('_this', (object)get_object_vars($this));
            return view("admin.{$this->module}.grid", compact('paginate_OBJ', 'query'));
        }
    }


    /**
     * *****************************************************************************************************************
     * @method categories form
     * *****************************************************************************************************************
     */
    public function form()
    {
        $id = getUri(4);
        if ($id > 0) {
            $row = $this->model->find($id);
            if ($row->{$this->id_key} <= 0) {
                set_notification('Access forbidden!');
                if (request()->ajax() || request()->is('api/*')) {
                    return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors())]);
                }
                return redirect()->back();
            }
        }

        /** -------- Breadcrumb */
        \Breadcrumb::add_item($this->_info->title, $this->_route);
        \Breadcrumb::add_item(($id > 0) ? "Edit -> id:[$id]" : 'Add New');

        /** -------- Response */
        \View::share('_this', (object)get_object_vars($this));
        return view("admin.{$this->module}.form", compact('row'));
    }


    /**
     * *****************************************************************************************************************
     * @method categories store | Insert & Update
     * *****************************************************************************************************************
     */
    public function store()
    {
        $id = request()->input($this->id_key);

        /** -------- Validation */
        $validator_rules = [
            'parent_id' => "required",
            'title' => "required",
            'slug' => "required|unique:{$this->table},slug,{$id},{$this->id_key}",
            'icon' => "image|mimes:gif,jpg,jpeg,png|max:2048",
            'thumb' => "image|mimes:gif,jpg,jpeg,png|max:2048",
            'image' => "image|mimes:gif,jpg,jpeg,png|max:5120",

        ];
        $validator = \Validator::make(request()->all(), $validator_rules);
        if ($validator->fails()) {
            if (request()->ajax() || request()->is('api/*')) {
                return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors($validator))]);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = DB_FormFields($this->model);

        /** -------- Upload Files */
        $data['data']['include_in_menu'] = intval(req('include_in_menu'));
        $files = upload_files(['icon', 'thumb', 'image'], "assets/front/{$this->table}/");
        if (count($files) > 0) {
            foreach ($files as $name => $file) {
                if ($file) {
                    $data['data'][$name] = $file->getFilename();
                }
            }
        }

        if ($id > 0) {
            $row = $this->model->find($id);
            $row = $row->fill($data['data']);
        } else {
            $row = $this->model->fill($data['data']);
        }

        if ($status = $row->save()) {
            if ($id == 0) {
                $id = $row->{$this->id_key};
                set_notification('Record has been inserted!', 'success');
                activity_log('Add', $this->table, $id);
            } else {
                set_notification('Record has been updated!', 'success');
                activity_log('Update', $this->table, $id);
            }
        } else {
            set_notification('Some error occurred!', 'error');
        }

        if (request()->ajax() || request()->is('api/*')) {
            return api_response(['status' => true, 'message' => join('<br/>', show_validation_errors())]);
        } else {
            $__redirect = (!empty(getVar('__redirect')) ? getVar('__redirect') : admin_url("", true));
            return \Redirect::to($__redirect);
        }

    }


    /**
     * *****************************************************************************************************************
     * @method Status
     * @unlink Delete Files (unlink)
     * *****************************************************************************************************************
     */
    function status()
    {
        $id = getUri(4);
        $ids = request()->input('ids');
        if ($id > 0) {
            $ids = [$id];
        }

        $data = ['status' => request('status')];
        $this->model->whereIn($this->id_key, $ids)->update($data);

        set_notification('Status has been updated', 'success');

        activity_log(getUri(3), $this->table, $ids);

        if (request()->ajax() || request()->is('api/*')) {
            return api_response(['status' => true, 'message' => join('<br/>', show_validation_errors())]);
        }

        return redirect()->back();//return redirect(admin_url('', true));
    }


    /**
     * *****************************************************************************************************************
     * @method categories delete
     * *****************************************************************************************************************
     */
    public function delete()
    {
        $id = getUri(4);
        $ids = request()->input('ids');
        if ($id > 0) {
            $ids = [$id];
        }
        if ($ids == null || count($ids) == 0) {
            set_notification('Select minimum one row!');
            if (request()->ajax() || request()->is('api/*')) {
                return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors())]);
            }
            return redirect()->back();
        }

        $unlink = ['icon' => "assets/front/{$this->table}",
            'thumb' => "assets/front/{$this->table}",
            'image' => "assets/front/{$this->table}",
        ];
        $affectedRows = delete_rows($this->table, "{$this->id_key} IN(" . implode($ids, ',') . ")", true, $unlink);
        //$this->model->whereIn($this->id_key, $ids)->delete();

        activity_log(getUri(3), $this->table, $ids);

        set_notification('Record has been deleted!', 'success');
        if (request()->ajax() || request()->is('api/*')) {
            return api_response(['status' => true, 'message' => join('<br/>', show_validation_errors())]);
        }

        return \Redirect::to(admin_url('', true));
    }


    /**
     * *****************************************************************************************************************
     * @method categories view | Record
     * *****************************************************************************************************************
     */
    public function view()
    {
        $id = getUri(4);
        if ($id > 0) {
            $row = $this->model->find($id);
            if ($row->{$this->id_key} <= 0) {
                set_notification('Access forbidden!');
                if (request()->ajax() || request()->is('api/*')) {
                    return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors())]);
                }
                return redirect()->back();// \Redirect::to(admin_url('', true));
            }

        } else {
            set_notification('Invalid URL!');
            if (request()->ajax() || request()->is('api/*')) {
                return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors())]);
            }
            return redirect()->back();// \Redirect::to(admin_url('', true));
        }

        \Breadcrumb::add_item($this->_info->title, $this->_route);
        \Breadcrumb::add_item("View -> id:[$id]");

        $config['buttons'] = ['new', 'edit', 'delete', 'refresh', 'print', 'back'];
        $config['hidden_fields'] = ['created_by'];
        $config['image_fields'] = [
            'icon' => ['path' => asset_url("front/{$this->table}/"), 'size' => '128x128'],
            'thumb' => ['path' => asset_url("front/{$this->table}/"), 'size' => '128x128'],
            'image' => ['path' => asset_url("front/{$this->table}/"), 'size' => '128x128'],
        ];
        $config['attributes'] = [
            'id' => ['title' => 'ID'],
        ];

        activity_log(getUri(3), $this->table, $id);

        /** -------- Response */
        \View::share('_this', (object)get_object_vars($this));
        if (request()->ajax() || request()->is('api/*')) {
            return api_response(['status' => true, 'response' => $row]);
        } else if (view()->exists("admin.{$this->module}.view")) {
            return view("admin.{$this->module}.view", compact('row', 'config'), ['_info' => $this->_info]);
        } else {
            return view("admin.layouts.view_record", compact('row', 'config'), ['_info' => $this->_info]);
        }
    }

    /**
     * *****************************************************************************************************************
     * @method categories AJAX actions
     * *****************************************************************************************************************
     */
    function ajax()
    {
        $action = request('action') ?? getUri(4);
        $id = request('id') ?? getUri(5);
        switch ($action) {
            case 'delete_img':
                $field = getUri(6);
                $del_img = [$field => asset_dir("front/{$this->table}/")];
                $JSON['status'] = delete_rows($this->table, [$this->id_key, $id], false, $del_img);
                $JSON['message'] = ucwords($field) . ' has been deleted!';
                break;
            case 'ordering':
                $field = array_keys($_GET)[0];
                $value = getVar($field)[$id];
                $JSON['status'] = $this->model->where($this->id_key, $id)->update([$field => $value]);
                $JSON['message'] = 'updated!';
                break;
            case 'validate':
                $field = array_keys($_GET)[0];
                $value = getVar($field);

                $row = \DB::table($this->table)->where($field, $value);
                if ($id > 0) {
                    $row = $row->where($this->id_key, '!=', $id);
                }
                $row = $row->first();
                if ($row->{$this->id_key} > 0) {
                    exit('false');
                }
                exit('true');
                break;
        }

        return $JSON;
    }


    /**
     * *****************************************************************************************************************
     * @method categories duplicate
     * *****************************************************************************************************************
     */

    public function duplicate()
    {
        $id = getUri(4);
        $OBJ = $this->model->find($id);

        $unique = ['id','slug'];
        $newOBJ = $OBJ->replicate($unique);

        $newOBJ->icon = '';
        $newOBJ->thumb = '';
        $newOBJ->image = '';
        $newOBJ->save();
        $newID = $newOBJ->{$this->id_key};

        set_notification('Record has been duplicated!', 'success');
        if (request()->ajax() || request()->is('api/*')) {
            return api_response(['status' => true, 'message' => join('<br/>', show_validation_errors()), 'response' => $newOBJ]);
        }
        return \Redirect::to(admin_url("form/{$newID}", true));
    }

    /**
     * *****************************************************************************************************************
     * @method categories import
     * *****************************************************************************************************************
     */
    public function import()
    {
        if (\request()->isMethod('POST')) {
            $model = \Str::studly($this->module);
            $import_CLS = "App\Imports\\{$model}Import";
            Excel::import(new $import_CLS(), request()->file('file'));

            set_notification('All records has been import!', 'success');

            if (request()->ajax() || request()->is('api/*')) {
                return api_response(['status' => false, 'message' => join('<br/>', show_validation_errors())]);
            }
            return redirect()->back();//redirect(admin_url('', true));
        } else {

            /** -------- Breadcrumb */
            \Breadcrumb::add_item($this->_info->title, $this->_route);
            \Breadcrumb::add_item("Import");

            /** -------- Response */
            \View::share('_this', (object)get_object_vars($this));
            return view('admin.layouts.import');
        }
    }

    /**
     * *****************************************************************************************************************
     * @method categories export
     * @type csv & xml
     * *****************************************************************************************************************
     */
    public function export()
    {
        $ext = 'csv';
        $OBJ = $this->model->all();
        return $OBJ->downloadExcel("{$this->module}.{$ext}", ucfirst($ext), true);
        //return Excel::download($OBJ, "{$this->module}.{$ext}");
    }


    private function update_files_DB($id)
    {

        $table = '';
        $files_remove = req('files_remove');
        if (count($files_remove) > 0) {
            $delete_files = array(
                //'' => './'
                '' => asset_dir("front/{$this->module}/")
            );
            delete_rows($table, "id IN(" . join(',', $files_remove) . ")  AND ='{$id}'", true, $delete_files);
        }
        //delete_rows($table, "='{$id}'");

        $files = req('files');
        $files_data = req('files_data');

        if (count($files) > 0) {
            foreach ($files as $i => $f) {
                if (!empty($f)) {
                    $__file_db = [
                        '' => $id,
                        '' => $f,
                        '' => $files_data[''][$i],

                        //'created' => date('Y-m-d H:i:s'),
                        //'ordering' => intval($files_data['ordering'][$i])
                        //'desc' => $img_data['desc'][$i],
                        //'default' => (getVar('default') == $img ? 1 : 0),
                        //'ordering' => ($i + 1)
                    ];
                    $where = '';
                    if (!empty($files_data['id'][$i])) {
                        $where .= "id='{$files_data['id'][$i]}'";
                        unset($__file_db['created']);
                    }
                    save($table, $__file_db, $where);
                }
            }
        }

    }

    public function file_upload()
    {
        $data = [];
        $dir = "assets/front/{$this->table}/";
        $files = upload_files(['icon', 'thumb', 'image'], $dir, ['ext' => 'gif,jpg,jpeg,png,gif,jpg,jpeg,png,gif,jpg,jpeg,png']);
        if (count($files) > 0) {
            foreach ($files as $name => $file) {
                if ($file) {
                    $data[$name]->filename = $file->getFilename();
                    $data[$name]->image_url = $dir . $data[$name]->filename;
                    $data[$name]->thumb_url = _img($dir . $data[$name]->filename, 200, 200);
                    $data[$name]->title = \Str::replaceLast("." . $file->getExtension(), '', $file->getFilename());
                    $data[$name]->size = $file->getSize();
                    $data[$name]->mime = $file->getMimeType();
                    $data[$name]->ext = $file->getExtension();
                } else {
                    $data[$name]->filename = $file->getFilename();
                    $data[$name]->error = $file->error;
                }
            }
        }

        return $data;
    }

}
