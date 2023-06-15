<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChatBotHistory;
use App\Models\GptHistory;
use App\Models\Setting;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {

        $text = "Hello ".auth('web')->user()->full_name.", how can I help you?";
        $old_prompt = array(
            array(
                'role' => 'assistant',
                "content" =>$text ,
            ),
            array(
                'role' => 'user',
                "content" => 'Act as a customer support chatbot named Easyseo. you are friendly, helpful and funny.' ,
            ),
            array(
                'role' => 'assistant',
                "content" => 'Hello there! Welcome to the Easyseo customer support. How can I assist you today?' ,
            ),
        );
        // $title = '
        // <div class="row nwctrownav">
        //     <div class="col-lg-6">
        //         <h3 class="nwctchateasybot">Chat Easy Bot</h3>
        //     </div>
        //     <div class="col-lg-6">
        //         <h3 class="nwctprompts">Prompts Library</h3>
        //     </div>
        // </div>';

        $data = array(
            'title' => 'Ezchat',
            // 'title' => $title,
            'old_prompt' => $old_prompt,
            'text' => "Hello there! Welcome to the Easyseo customer support. How can I assist you today?",
        );
        return view('front.chatbot.index')->with($data);
    }

    // public function res(Request $request)
    // {
    //     // Start the conversation with an initial prompt
    //     $initial_prompt = 'Hello! How can I assist you today?';
    //     $conversation_history = $initial_prompt . "\n";


    //     // Loop to handle user input
    //     while (!empty($request->prompt)) {
    //         // Get user input
    //         $input = '> ' . $request->prompt;

    //         // Append input to conversation history
    //         $conversation_history .= 'User: ' . $input . "\n";

    //         // Get response from OpenAI API
    //         $response = $this->get_response($conversation_history);

    //         // Append response to conversation history
    //         $conversation_history .= 'Chatbot: ' . $response . "\n";

    //         // Print response
    //         echo $response . "\n";
    //     }
    // }

    public function ai_response(Request $request)
    {
        // checking remaining words start
        $authUser = session()->get('authUser');

        // $user_package = UserPackage::where('user_id',auth('web')->id())->latest()->first();
        $user_package = session()->get('UserPackages');

        $userPackageWords = $user_package->words;

        $From = $user_package->start_date;
        $currentDate = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime(' +1 day'));
        $end_date = strtotime($user_package->end_date);

        // $used_words = GptHistory::where([ ['user_id',$authUser->user_type == 'workspace' ? $authUser->main_user_id : $authUser->main_user_id] ])->whereBetween('created_at', [$From,$tomorrow])->sum('total_words');
        $used_words = session()->get('gpt_words');

        $remaining_words = $userPackageWords - $used_words;

        if (strtotime($currentDate) > $end_date && $used_words >= $userPackageWords) {
            return response()->json(['error' => __('error_msg.word_limit_reached')]);
        }elseif (strtotime($currentDate) > $end_date) {
            return response()->json(['error' => __('error_msg.word_limit_reached')]);
        }elseif ($used_words >= $userPackageWords) {
            return response()->json(['error' => __('error_msg.word_ended')]);
        }
        // checking remaining words end

        $setting = Setting::latest()->first();
        $api_key = !empty($setting) ? base64_decode($setting::latest()->first()->api_key) : null;


        $old_prompt = json_decode($request->old_prompt);
        $old_prompt[] = array(
            'role' => 'user',
            "content" => $request->prompt,
        );
        $res = $this->get_response($old_prompt,$api_key);

        $save_res = json_decode(json_encode($res));

        // dd($save_res->original);


        if ($save_res->original->status == 400) {
            $msg = [
                'status' => 400,
                'message' => $save_res->original->message,
            ];
            return response()->json($msg,400);
        }

        $gpt_answer = removeFirstTwoBrTags($save_res->original->bot);
        if (str_word_count($gpt_answer) >= $remaining_words) {
            $gpt_answer = limitWords($gpt_answer,$remaining_words);
            $total_words = str_word_count($gpt_answer);
        }else{
            $total_words = str_word_count($gpt_answer);
        }

        // user role chat save to db
        $userChat = new ChatBotHistory();
        $userChat->user_id = $authUser->id;
        $userChat->role = 'user';
        $userChat->content = $request->prompt;
        $userChat->save();

        // assistant role chat save to db
        $assistantChat = new ChatBotHistory();
        $assistantChat->user_id = $authUser->id;
        $assistantChat->role = 'assistant';
        $assistantChat->content = $gpt_answer;
        // $assistantChat->prompt_tokens = $save_res->original->usage->prompt_tokens;
        // $assistantChat->completion_tokens = $save_res->original->usage->completion_tokens;
        // $assistantChat->total_tokens = $save_res->original->usage->total_tokens;
        $assistantChat->prompt_tokens = $save_res->original->usage->promptTokens;
        $assistantChat->completion_tokens = $save_res->original->usage->completionTokens;
        $assistantChat->total_tokens = $total_words;
        $assistantChat->save();


        $gpt_history = new GptHistory();
        $gpt_history->type = 'chatbot';
        $gpt_history->user_id = $authUser->id;
        $gpt_history->prompt = $request->prompt;
        $gpt_history->answer = $gpt_answer;
        // $gpt_history->prompt_tokens = $save_res->original->usage->prompt_tokens;
        // $gpt_history->completion_tokens = $save_res->original->usage->completion_tokens;
        // $gpt_history->total_tokens = $save_res->original->usage->total_tokens;
        $gpt_history->prompt_tokens = $save_res->original->usage->promptTokens;
        $gpt_history->completion_tokens = $save_res->original->usage->completionTokens;
        $gpt_history->total_tokens = $save_res->original->usage->totalTokens;
        $gpt_history->total_words = $total_words;
        $gpt_history->save();

        $msg = [
            'status' => 200,
            'bot' => $gpt_answer,
            'old_prompt' => $save_res->original->old_prompt,
        ];

        return response()->json($msg);
        // return $res;
    }

    public function get_response($prompt, $api_key)
    {
        $client = \OpenAI::client($api_key);

        $post_array = array(
            'model'  => 'gpt-3.5-turbo',
            'messages'  => $prompt,
        );

        $result = $client->chat()->create($post_array);

        $msg = [
            'status' => 200,
            'bot' => $result->choices[0]->message->content,
            'usage' => $result->usage,
            'old_prompt' => json_encode($prompt),
        ];

        return response()->json($msg);

        // $result = $client->chat()->create($post_array);

        // $msg = [
        //     'status' => 200,
        //     'bot' => $result->choices[0]->message->content,
        //     'usage' => $result->usage,
        //     'old_prompt' => json_encode($prompt),
        // ];
        // return response()->json($msg);
    }

    // Define function to get response from OpenAI API
    // public function get_response($prompt, $api_key)
    // {
    //     $curl = curl_init();
    //     $post_arry = array(
    //         'model'  => 'gpt-3.5-turbo',
    //         'messages'  => $prompt,
    //     );
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => json_encode($post_arry),
    //         CURLOPT_HTTPHEADER => array(
    //         'Content-Type: application/json',
    //         'Authorization: Bearer '.$api_key
    //         ),
    //         CURLOPT_SSL_VERIFYPEER => false
    //     ));


    //     $response = curl_exec($curl);
    //     curl_close($curl);
    //     $api_res = json_decode($response);
    //     $res = $api_res->choices[0]->message;
    //     $prompt[] = $res;


    //     if (isset($api_res->error)) {
    //         $msg = [
    //             'status' => 400,
    //             'message' => 'Error in API interface connection. Please contact support via support@easyseo.ai.',
    //         ];
    //         return response()->json($msg);
    //         die();
    //     }else{
    //         $msg = [
    //             'status' => 200,
    //             'bot' => $api_res->choices[0]->message->content,
    //             'usage' => $api_res->usage,
    //             'old_prompt' => json_encode($prompt),
    //         ];
    //         return response()->json($msg);
    //         die();
    //     }
    //     // return response()->json([
    //     //     'bot' => $api_res->choices[0]->message->content,
    //     //     'old_prompt' => json_encode($prompt)
    //     // ], 200);
    // }

}
