<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GptHistory;
use App\Models\GptScoreHistory;
use App\Models\Setting;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helpers;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $templates = Template::where('status',1);
        $teplate_categories = TemplateCategory::with('templates')->where('status',1);

        if ($request->ajax()) {
            if ($request->category != 'all') {
                $templates = $templates->where('category_id',$request->category);
                $data = array(
                    'status' => true,
                    'res_view' => view('front.template.response.load_cat_temp',['templates'=>$templates->orderBy('name')->get()])->render(),
                );
            }else{
                $data = array(
                    'status' => true,
                    'res_view' => view('front.template.response.load_all',['categories'=>$teplate_categories->orderBy('name')->get()])->render(),
                );
            }

            return response()->json($data);
        }

        $data = array(
            'title' => 'Templates',
            'categories' => $teplate_categories->orderBy('name')->get(),
        );

        return view('front.template.all')->with($data);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $templates = Template::where('status',1);
        $teplate_categories = TemplateCategory::with('templates')->where('status',1);
        $search_template = Template::where('name', 'LIKE', '%'.$search.'%');

        if ($request->ajax()) {
            if ($request->category != 'all') {
                $templates = $templates->where('category_id',$request->category);
                $data = array(
                    'status' => true,
                    'res_view' => view('front.template.response.load_cat_temp',['templates'=>$templates->orderBy('name')->get()])->render(),
                );
            }else{
                $data = array(
                    'status' => true,
                    'res_view' => view('front.template.response.load_all',['categories'=>$teplate_categories->orderBy('name')->get()])->render(),
                );
            }

            return response()->json($data);
        }

        $data = array(
            'search' => $search_template->orderBy('name')->get(),
            'searchtext' => $search,
            'title' => 'Templates',
            'categories' => $teplate_categories->orderBy('name')->get(),
        );

        return view('front.template.search')->with($data);
    }

    public function load_more_by_cat(Request $request)
    {
        $teplate_categories = TemplateCategory::with('templates')->where(['status'=>1,'id'=>$request->category_id])->first();

        $data = array(
            'status' => true,
            'res_view' => view('front.template.response.load_more',['cat'=>$teplate_categories])->render(),
        );

        return response()->json($data);
    }


    public function template_view($id)
    {
        $template = Template::with('fields','setting')->hashidFind($id);

        $data = array(
            'title' => $template->name,
            'template_data' => $template
        );

        return view('front.template.temp_form')->with($data);
    }

    public function form_submit(Request $request)
    {    
        $settings_arr = json_decode($request->setting);
        $command = $request->command;
		$improve_score = $request->improve_score;
		$improve_content = $request->improve_content;
		   
		if($improve_score == true){
			  
			/*
			 *----------------------------------
			 * START:- Improve score request
			 *----------------------------------
			 */
				//$command = "I need you to act as a SEO enhancement specialist for the content I provide. You will be tasked with integrating strong SEO keywords into my text without altering the overall meaning. Your sole role will be to revise and enhance the SEO strength of my content; you are not to create new content or offer editorial feedback on the content's substance or style. Your revisions should be focused entirely on SEO improvement, ensuring my content is optimized for search engine visibility and ranking. Please remember to use the keywords naturally within the context of my content to maintain readability. The first content I need you to optimize is and at last Provide seo SCORE:- [score/100] :-\n\n";
				$command = "Please  replace some keywords naturally within the context of my content to maintain readability in below data to increase the seo score and at last Provide seo SCORE:- [score/88-100] :";
				$command .= '"'.$improve_content.'"';
				 
			 /*
			 *----------------------------------
			 * END:- Improve score request
			 *----------------------------------
			 */
			 
		}else{
			// $complete_prompt = '';
			
			foreach ($request->input as $key => $val) {
				$a = '[!'. $key .'!]';
				$command = $command = str_replace($a, $val, $command);
				// $complete_prompt .= ' '.$val;
			}

			// $command .= ' '.$complete_prompt .' ';

			if (isset($request->language) && !empty($request->language)) {
				$command = $command.'
	Write your answer in '.$request->language.' language';
			}

			if ($request->number_of_conecpet > 1) {
				$command = $command. ' and write '. $request->number_of_conecpet .' sections';
			}
			//$command .= '\n\n Provide seo SCORE:- [score/100] :-';
		}
		 
        // checking remaining words
        // $user_package = UserPackage::where('user_id',auth('web')->id())->latest()->first();
        // $userPackageWords = $user_package->words;

        // $From = $user_package->start_date;
        // $currentDate = date('Y-m-d');
        // $tomorrow = date('Y-m-d', strtotime(' +1 day'));
        // $end_date = strtotime($user_package->end_date);

        // $used_words = GptHistory::where([ ['user_id',auth('web')->id()] ])->whereBetween('created_at', [$From,$tomorrow])->sum('total_words');

        $authUserId = session()->get('authUserId');

        $user_package = session()->get('UserPackages');
        $userPackageWords = $user_package->words;

        $From = $user_package->start_date;
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime(' +1 day'));
        $end_date = strtotime($user_package->end_date);

        $used_words = session()->get('gpt_words');

        if (strtotime($currentDate) > $end_date && $used_words >= $userPackageWords) {
            return response()->json(['error' => __('error_msg.word_limit_reached')]);
        }elseif (strtotime($currentDate) > $end_date) {
            return response()->json(['error' => __('error_msg.word_limit_reached')]);
        }elseif ($used_words >= $userPackageWords) {
            return response()->json(['error' => __('error_msg.word_ended')]);
        }

        $setting = json_decode($request->setting);


        $key = new Setting();
        if ($key->count() == 0) {
            return response()->json(['error' => 'Api Key Not Found!']);
        }

        $key = $key::latest()->first();
		
		 
		if($setting->model == 'gpt-3.5-turbo'){
			$gpt_ans = $this->gpt3_turbo($setting,$command,base64_decode($key->api_key));
		}else{
			$gpt_ans = $this->gpt3_ans($setting,$command,base64_decode($key->api_key));
		}
		 
        // $gpt_ans = $this->gpt3_turbo($setting,$command,base64_decode($key->api_key));
// dd(trim($gpt_ans['message']));

        $gpt_answer = removeFirstTwoBrTags($gpt_ans['answer']);


        $history = new GptHistory();

        if(isset($gpt_ans['status']) && $gpt_ans['status'] == 400){
            $msg = [
                'status' => 400,
                'message' => trim($gpt_ans['message']),
            ];
            return response()->json($msg);
        }else{
            $history->user_id = $authUserId;
            $history->template_id = $request->template_id;
            $history->template_name = $request->template_name;
            $history->type = 'template';
            $history->prompt = $command;
            $history->answer = $gpt_answer;
            $history->setting = json_encode($request->setting);
            $history->prompt_tokens = $gpt_ans['prompt_tokens'];
            $history->completion_tokens = $gpt_ans['completion_tokens'];
            $history->total_tokens = $gpt_ans['total_tokens'];
            $history->total_words = str_word_count($gpt_ans['answer']);
			
			if($improve_score == false){
				
				$history->save();
			}  
			 
            $msg = [
                'status' => 200,
                'message' =>  Helpers::getSeoScoreNRemvContent($gpt_answer,$improve_score)['content'],
				'score' =>  Helpers::getSeoScoreNRemvContent($gpt_answer,$improve_score)['seo_score'],
                'temp_id' => $history->id,
                'word_count' => $history->total_words,
            ];
            return response()->json($msg);
        }
    }
	  
    public function seo_form_submit(Request $request)
    {
        // $history =  DB::table('gpt_score_histories');
        $history =  new GptScoreHistory();
        $history->temp_id = $request->temp_id;
        $history->score = $request->score;
		$history->save();
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
            'model'  => 'gpt-3.5-turbo',
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
}
