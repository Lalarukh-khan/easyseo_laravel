<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mods = [[
            'mode_group' => "GPT_3",
             'model' => "text-davinci-003",
             'temperature' => "0.7",
             'max_length' => "256",
             'token_value' => "4000",
             'stop_seq' => "",
             'top_p' => "1",
             'freq_penalty' => "0",
             'pre_penalty' => "0",
             'best_of' => "1"
         ],
         [
           'mode_group' => "GPT_3",
            'model' => "text-davinci-002",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "4000",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "text-curie-001",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "text-babbage-001",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "text-ada-001",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "text-davinci-001",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "davinci-instruct-beta",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "davinci",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "curie-instruct-beta",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "curie",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "babbage",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "GPT_3",
            'model' => "ada",
            'temperature' => "0.7",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "CODEX",
            'model' => "code-davinci-002",
            'temperature' => "0",
            'max_length' => "256",
            'token_value' => "8000",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1"
        ],
        [
            'mode_group' => "CODEX",
            'model' => "code-cushman-001",
            'temperature' => "0",
            'max_length' => "256",
            'token_value' => "2048",
            'stop_seq' => "",
            'top_p' => "1",
            'freq_penalty' => "0",
            'pre_penalty' => "0",
            'best_of' => "1",
        ]];
        for($i = 0; $i < count($mods); $i++){
            $mods[$i]['created_at'] = date('Y-m-d H:i:s');
            $mods[$i]['updated_at'] = date('Y-m-d H:i:s');
        }
        DB::table('modes')->insert($mods);
    }
}
