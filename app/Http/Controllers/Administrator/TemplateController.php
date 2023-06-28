<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Mode;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\TemplateField;
use App\Models\TemplateSetting;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $data = Template::latest('id')->get([
                'templates.*',
                DB::raw('@rownum  := @rownum  + 1 AS rownum')
            ]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function ($row) {
                    return $row->category->name;
                })
                ->addColumn('status', function ($row) {
                    return view('admin.template.status_col')->with(['data' => $row])->render();
                })
                ->addColumn('added_by', function ($row) {
                    return $row->added_by->full_name ?? 'Deleted user';
                })
                ->addColumn('created_at', function ($row) {
                    return get_fulltime($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    return view('admin.template.action')->with(['data' => $row])->render();
                })
                ->rawColumns(['category', 'status', 'added_by', 'created_at', 'action'])
                ->make(true);
        }

        $data = array(
            'title' => 'All Template',
        );

        // return view('admin.template.index')->with($data);
        return view('admin.template.index')->with($data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Template',
            'category' => TemplateCategory::latest()->get(),
            'gpt_3_modes' => Mode::where('mode_group', 'GPT_3')->get(),
            'CODEX' => Mode::where('mode_group', 'CODEX')->get(),
            'categories' => TemplateCategory::orderBy('name')->get(['id', 'name']),
        );

        return view('admin.template.add')->with($data);
    }

    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Template',
            'category' => TemplateCategory::latest()->get(),
            'gpt_3_modes' => Mode::where('mode_group', 'GPT_3')->get(),
            'CODEX' => Mode::where('mode_group', 'CODEX')->get(),
            'categories' => TemplateCategory::orderBy('name')->get(['id', 'name']),
            'edit' => Template::with('fields', 'setting')->hashidFind($id),
        );

        // dd($data['edit']->language);

        return view('admin.template.add')->with($data);
    }

    public function save(Request $request)
    {
        $rules = [
            'category' => 'required',
            'template_name' => 'required',
            'template_status' => 'required',
            'description' => 'required',
            'command_box' => 'required',
        ];

        if (empty($request->id)) {
            // $rules['image'] = 'required|mimes:png,jpg|dimensions:width=50,height=50';
            $rules['image'] = 'required|mimes:png,jpg';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $template = new Template();
        $template_setting = new TemplateSetting();


        if (isset($request->id) && !empty($request->id)) {
            $template = $template::hashidFind($request->id);
            $template_setting = $template_setting->where('template_id', $template->id)->first();
            if (empty($template_setting)) {
                $template_setting = new TemplateSetting();
            }
            $msg = [
                'success' => 'Template Updated Successfully',
                'redirect' => route('admin.template.all'),
            ];
        } else {
            $msg = [
                'success' => 'Template Added Successfully',
                'redirect' => route('admin.template.all'),
            ];
        }

        $template->category_id = $request->category;
        $template->name = $request->template_name;
        $template->description = $request->description;
        $template->command_box = $request->command_box;
        $template->status = $request->template_status;
        // $template->video_url = $request->video_url;
        // $template->has_number_of_concepts = isset($request->has_number_of_concepts) && $request->has_number_of_concepts == 1 ? 1 : 0;
        // $template->has_language = isset($request->has_language) && $request->has_language == 1 ? 1 : 0;
        // $template->is_premium = isset($request->premium_template) && $request->premium_template == 1 ? 1 : 0;
        // $template->is_business = isset($request->business_template) && $request->business_template == 1 ? 1 : 0;

        if ($request->hasFile('image')) {
            $image = uploadSingleFile($request->file('image'), 'uploads/template_icon/');
            if (is_array($image)) {
                return response()->json($image);
            }
            if (file_exists($template->icon)) {
                @unlink($template->icon);
            }
            $template->icon = $image;
        }
        $template->added_by_id = auth('admin')->id();
        $template->save();

        if (isset($request->label) && !empty($request->label) && count($request->label) > 0) {
            if (isset($request->id) && !empty($request->id)) {
                $template->fields()->delete();
            }
            $fields = [];
            foreach ($request->label as $key => $value) {
                $fields[] = array(
                    'template_id' => $template->id,
                    'title' => $value,
                    'placeholder' => $request->placeholder[$key],
                    'info' => $request->info[$key] ?? null,
                    'type' => $request->input_type[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                );
            }
            TemplateField::insert($fields);
        }

        $template_setting->template_id = $template->id;
        // $template_setting->model = Mode::hashidFind($request->model)->model;
        $template_setting->model = $request->model;
        $template_setting->temperature = $request->temperature;
        $template_setting->token_value = $request->max_length;
        $template_setting->top_p = $request->top_p;
        $template_setting->freq_penalty = $request->frequency;
        $template_setting->pre_penalty = $request->penalty;
        $template_setting->best_of = $request->best_of;
        $template_setting->save();

        session()->flash('success-msg', $msg['success']);

        return response()->json($msg);
    }

    public function status_update($id)
    {
        try {
            $template = Template::hashidFind($id);
            $template->status = !$template->status;
            $template->save();
        } catch (Exception $e) {
            return response()->json($e);
        }
        session()->flash('success-msg', 'Template Status Updated Successfully');

        return response()->json([
            'success' => 'Template Status Updated Successfully',
            'reload' => true,
        ]);
    }

    public function delete($id)
    {
        try {
            $template = Template::hashidFind($id);
            $template->fields()->delete();
            TemplateSetting::where('template_id', $template->id)->delete();
            if (file_exists($template->icon)) {
                @unlink($template->icon);
            }
            $template->delete();
        } catch (Exception $e) {
            return response()->json($e);
        }
        session()->flash('success-msg', 'Template deleted Successfully');

        return response()->json([
            'success' => 'Template deleted Successfully',
            'reload' => true,
        ]);
    }


    public function test_save(Request $request)
    {
        $rules = [
            'category' => 'required',
            'template_name' => 'required',
            'template_status' => 'required',
            'description' => 'required',
            'command_box' => 'required',
        ];

        if (empty($request->id)) {
            $rules['image'] = 'required|mimes:png,jpg|dimensions:width=50,height=50';
        }


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $template = new Template();
        $template_setting = new TemplateSetting();

        if (isset($request->id) && !empty($request->id)) {
            $template = $template::hashidFind($request->id);
            $template_setting = $template_setting->where('template_id', $template->id)->first();
            if (empty($template_setting)) {
                $template_setting = new TemplateSetting();
            }
            $msg = [
                'success' => 'Template Updated Successfully',
            ];
        } else {
            $msg = [
                'success' => 'Template Added Successfully',
            ];
        }

        $template->category_id = $request->category;
        $template->name = $request->template_name;
        $template->description = $request->description;
        $template->command_box = $request->command_box;
        // $template->video_url = $request->video_url;
        $template->status = $request->template_status;
        // $template->has_number_of_concepts = isset($request->has_number_of_concepts) && $request->has_number_of_concepts == 1 ? 1 : 0;
        // $template->has_language = isset($request->has_language) && $request->has_language == 1 ? 1 : 0;
        // $template->is_premium = isset($request->premium_template) && $request->premium_template == 1 ? 1 : 0;
        // $template->is_business = isset($request->business_template) && $request->business_template == 1 ? 1 : 0;

        if ($request->hasFile('image')) {
            $image = uploadSingleFile($request->file('image'), 'uploads/template_icon/');
            if (is_array($image)) {
                return response()->json($image);
            }
            if (file_exists($template->icon)) {
                @unlink($template->icon);
            }
            $template->icon = $image;
        }
        $template->added_by_id = auth('admin')->id();
        $template->save();

        if (isset($request->label) && !empty($request->label) && count($request->label) > 0) {
            if (isset($request->id) && !empty($request->id)) {
                $template->fields()->delete();
            }
            $fields = [];
            foreach ($request->label as $key => $value) {
                $fields[] = array(
                    'template_id' => $template->id,
                    'title' => $value,
                    'placeholder' => $request->placeholder[$key],
                    'info' => $request->info[$key] ?? null,
                    'type' => $request->input_type[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                );
            }
            TemplateField::insert($fields);
        }

        $template_setting->template_id = $template->id;
        // $template_setting->model = Mode::hashidFind($request->model)->model;
        $template_setting->model = $request->model;
        $template_setting->temperature = $request->temperature;
        $template_setting->token_value = $request->max_length;
        $template_setting->top_p = $request->top_p;
        $template_setting->freq_penalty = $request->frequency;
        $template_setting->pre_penalty = $request->penalty;
        $template_setting->best_of = $request->best_of;
        $template_setting->save();

        session()->flash('success-msg', $msg['success']);
        $msg['route'] = route('admin.template.test', $template->hashid);
        return response()->json($msg);
    }

    public function test_template($id)
    {
        $data = array(
            'title' => 'Testing',
            'template_data' => Template::with('fields', 'setting')->hashidFind($id)
        );

        return view('admin.template.testing')->with($data);
    }

    public function test_form_submit(Request $request)
    {
        $command = $request->command;
        $complete_prompt = '';
        foreach ($request->input as $key => $val) {
            // $a = '[!' . $key . '!]';
            // $command = $command = str_replace($a, $val, $command);
            $complete_prompt .= ' '.$val;
        }

        $command .= ' '.$complete_prompt .' ';

        if (isset($request->language) && !empty($request->language)) {
            $command = $command.' in '.$request->language;
        }


        // if (isset($request->language) && !empty($request->language)) {
        //     $command = $command.' in '.$request->language;
        // }

        // if ($request->number_of_conecpet > 1) {
        //     $command = $command. ' with '. $request->number_of_conecpet .' differences';
        // }


        $setting = json_decode($request->setting);


        $key = new Setting();
        if ($key->count() == 0) {
            return response()->json(['error' => 'Api Key Not Found!']);
        }
        $key = $key::latest()->first();

        if($setting->model == 'gpt-3.5-turbo'){
            $gpt_ans = $this->gpt3_turbo($setting,$command,base64_decode($key->api_key));
        }
        elseif($setting->model == 'gpt-3.5-turbo-0613'){
            $gpt_ans = $this->gpt3_turbo($setting,$command,base64_decode($key->api_key));
        }
        elseif($setting->model == 'gpt-4-0613'){
            $gpt_ans = $this->gpt3_turbo($setting,$command,base64_decode($key->api_key));
        }
        else{
            $gpt_ans = $this->gpt3_ans($setting,$command,base64_decode($key->api_key));
        }

        // $gpt_ans = $this->gpt3_ans(json_decode($request->setting), $command, base64_decode($key->api_key));

        if (isset($gpt_ans['status']) && $gpt_ans['status'] == 400) {
            $msg = [
                'status' => 400,
                'message' => $gpt_ans['message'],
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'status' => 200,
                'message' => $gpt_ans['answer'],
            ];
            return response()->json($msg);
        }
    }

    public function sorting($id){
        $data = array(
          'title'   =>   'Template Sorting',
          'data'    =>    Template::where('category_id', hashids_decode($id))->orderBy('ordering')->get(),
        );
        return view('admin.template.category.template_sorting', $data);
    }

    public function sorting_save(Request $request){

        foreach ($request->template_id as $k => $id) {
            Template::where('id',$id)->update([
                'ordering' => $k+1,
            ]);
        }

        session()->flash('success-msg','Template Sorted Successfully');

        return response()->json([
            'success' => 'Template Sorted Successfully',
            'reload' => true,
        ]);
    }


    private function gpt3_turbo($setting,$prompt,$key = '')
    {
        $prompt =  array(
            // array(
            //     "role" => "user",
            //     "content" => "you act like seo friendly content writer and you answer seo friendly"
            // ),
            // array(
            //     "role" => "assistant",
            //     "content" => "Yes, as an AI language model, I am programmed to generate content that is SEO-friendly and informative for the user. I aim to provide valuable and relevant solutions that meet the user's needs and help them achieve their goals. If you have any specific SEO questions or require assistance with creating SEO-friendly content, please let me know, and I will be happy to assist you."
            // ),
            // array(
            //     "role" => "user",
            //     "content" => "I need an SEO-friendly Etsy product title this is an examples for your understanding don't wirte anything! just understand \n\n example 1: 'Heart Keychain Set - Made with Authentic LEGO® Bricks, Matching keychains, Gift Set for Couples, Best Friends - Very High Quality & DURABLE' \n\n example 2: 'Personalised Song Plaque With Stand, Any Photo / Song, Any Playlist, Photo and Music Gift, Music Prints' \n\n example 3: 'Birth Flower Jewelry Travel Case, Birth Month Flower Gift, Personalized Birthday Gift, Leather Jewelry Travel Case, Custom Jewelry Case' \n\n example 4: 'Faceless Portrait, custom illustration, personalised photo, photo illustration, personalised portrait, boyfriend gift, girlfriend gift' \n\n example 5: 'Dainty Name Necklace with Birth Flower, Personalized Name Necklace, Custom Gold Name Jewelry, Birthday Gift for Her, Bridesmaid Gift'"
            // ),
            // array(
            //     "role" => "assistant",
            //     "content" => "Understood! If you need help with creating an SEO-friendly title for your Etsy product, please provide some information about your product, such as a brief description, target audience, and any unique features or benefits. This will help me craft an appropriate and effective title that will improve your product visibility on Etsy."
            // ),
            array(
                "role" => "user",
                "content" => $prompt
            )
        );
        $curl = curl_init();
        $post_arry = array(
            'model'  => $setting->model,
            'messages'  => $prompt,
            'temperature'  =>   (int)$setting->temperature,
            'max_tokens'  => (int)$setting->token_value,
            'top_p'  => (int)$setting->top_p,
            'frequency_penalty'  => (int)$setting->freq_penalty,
            'presence_penalty'  => (int)$setting->pre_penalty,
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($post_arry),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$key
            ),
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $api_res = json_decode($response);
        if (isset($api_res->error)) {
            $msg = [
                'status' => 400,
                //  'message' => $api_res->error->message,
                 'message' => 'Error in API interface connection. Please contact support via support@easyseo.ai.',
            ];
            return $msg;
            die();
        }else{

            $msg = [
                'status' => 200,
                'message' => '',
                'answer' => nl2br($api_res->choices[0]->message->content),
                'prompt_tokens' => $api_res->usage->prompt_tokens,
                'completion_tokens' => $api_res->usage->completion_tokens,
                'total_tokens' => $api_res->usage->total_tokens,
            ];
            return $msg;
        }
    }

    private function gpt3_ans($setting,$prompt,$key = '')
    {
        $curl = curl_init();
        $post_arry = array(
            'model'  => $setting->model,
            'prompt'  => $prompt,
            'temperature'  =>   (int)$setting->temperature,
            'max_tokens'  => (int)$setting->token_value,
            'top_p'  => (int)$setting->top_p,
            'frequency_penalty'  => (int)$setting->freq_penalty,
            'presence_penalty'  => (int)$setting->pre_penalty,
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openai.com/v1/completions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($post_arry),
            CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$key
            ),
            CURLOPT_SSL_VERIFYPEER => false
        ));


        $response = curl_exec($curl);
        curl_close($curl);
        $api_res = json_decode($response);
        if (isset($api_res->error)) {
            $msg = [
                'status' => 400,
                // 'message' => $api_res->error->message,
                'message' => 'Error in API interface connection. Please contact support via support@easyseo.ai.',
            ];
            return $msg;
            die();
        }else{
        $msg = [
            'status' => 200,
            'message' => '',
            'answer' => nl2br($api_res->choices[0]->text),
            'prompt_tokens' => $api_res->usage->prompt_tokens,
            'completion_tokens' => $api_res->usage->completion_tokens,
            'total_tokens' => $api_res->usage->total_tokens,
        ];
        return $msg;
        die();
        }
    }

    // private function gpt3_turbo($setting,$prompt,$key){

    //     $prompt =  array(
    //         array(
    //             "role" => "user",
    //             "content" => $prompt
    //         )
    //     );

    //     try {
    //         $client = \OpenAI::client($key);

    //         $post_array = array(
    //             'model'  => 'gpt-3.5-turbo',
    //             'messages'  => $prompt,
    //             'temperature'  =>   (int)$setting->temperature,
    //             'max_tokens'  => (int)$setting->token_value,
    //             'top_p'  => (int)$setting->top_p,
    //             'frequency_penalty'  => (int)$setting->freq_penalty,
    //             'presence_penalty'  => (int)$setting->pre_penalty,
    //         );

    //         $result = $client->chat()->create($post_array);

    //         $msg = [
    //             'status' => 200,
    //             'answer' => nl2br($result->choices[0]->message->content),
    //             'prompt_tokens' => $result->usage->promptTokens,
    //             'completion_tokens' => $result->usage->completionTokens,
    //             'total_tokens' => $result->usage->totalTokens,
    //         ];
    //     }catch(\ErrorException $e){
    //         $msg = [
    //             'status' => 400,
    //             'message' => 'Error in API interface connection. Please contact support via support@easyseo.ai.',
    //         ];
    //     }catch (\Exception $e) {
    //         $msg = [
    //             'status' => 400,
    //             'message' => 'Error in API interface connection. Please contact support via support@easyseo.ai.',
    //         ];
    //     }
    //     return $msg;
    // }

    // private function gpt3_ans($setting,$prompt,$key){

    //     try {
    //         $client = \OpenAI::client($key);

    //         $post_arry = array(
    //             'model'  => $setting->model,
    //             'prompt'  => $prompt,
    //             'temperature'  =>   (int)$setting->temperature,
    //             'max_tokens'  => (int)$setting->token_value,
    //             'top_p'  => (int)$setting->top_p,
    //             'frequency_penalty'  => (int)$setting->freq_penalty,
    //             'presence_penalty'  => (int)$setting->pre_penalty,
    //         );

    //         $result = $client->completions()->create($post_arry);

    //         $msg = [
    //             'status' => 200,
    //             'answer' => nl2br($result->choices[0]->text),
    //             'prompt_tokens' => $result->usage->promptTokens,
    //             'completion_tokens' => $result->usage->completionTokens,
    //             'total_tokens' => $result->usage->totalTokens,
    //         ];
    //     }catch(\ErrorException $e){
    //         $msg = [
    //             'status' => 400,
    //             'message' => 'Error in API interface connection. Please contact support via support@easyseo.ai.',
    //         ];
    //     }catch (\Exception $e) {
    //         $msg = [
    //             'status' => 400,
    //             'message' => 'Error in API interface connection. Please contact support via support@easyseo.ai.',
    //         ];
    //     }

    //     return $msg;
    // }

}
