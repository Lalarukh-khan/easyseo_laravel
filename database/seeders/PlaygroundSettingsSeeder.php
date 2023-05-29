<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaygroundSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [[
            'name' => 'Grammatical Standard English',
            'mode_id' => 1,
            'temperature' => 0,
            'max_length' => 60,
            'token_value' => 4000,
            'stop_seq' => "",
            'top_p' => 1,
            'freq_penalty' => 0,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => 'Correct this to standard English:
            She no went to the market.',

        ],[
            'name' => 'Summarize for a 2nd grader',
            'model_id' => 1,
            'temperature' => 0.7,
            'max_length' => 256,
            'token_value' => 4000,
            'stop_seq' => "",
            'top_p' => 1,
            'freq_penalty' => 0,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => 'Summarize this for a second-grade student:
            Jupiter is the fifth planet from the Sun and the largest in the Solar System. It is a gas giant with a mass one-thousandth that of the Sun, but two-and-a-half times that of all the other planets in the Solar System combined. Jupiter is one of the brightest objects visible to the naked eye in the night sky, and has been known to ancient civilizations since before recorded history. It is named after the Roman god Jupiter.[19] When viewed from Earth, Jupiter can be bright enough for its reflected light to cast visible shadows,[20] and is on average the third-brightest natural object in the night sky after the Moon and Venus.',

        ],
        [
            'name' => 'Text to command',
            'model_id' => 1,
            'temperature' => 0,
            'max_length' => 100,
            'token_value' => 4000,
            'stop_seq' => "",
            'top_p' => 1,
            'freq_penalty' => 0.2,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => 'Convert this text to a programmatic command:
            Example: Ask Constance if we need some bread
            Output: send-msg `find constance` Do we need some bread?
            Contact the ski store and figure out if I can get my skis fixed before I leave on Thursday',

        ],
        [
            'name' => 'English to other languages',
            'model_id' => 1,
            'temperature' => 0.3,
            'max_length' => 100,
            'token_value' => 4000,
            'stop_seq' => "",
            'top_p' => 1,
            'freq_penalty' => 0,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => 'Translate this into 1. French, 2. Spanish and 3. Japanese:
            What rooms do you have available?
            1.',

        ],
        [
            'name' => 'Parse unstructured data',
            'model_id' => 1,
            'temperature' => 0,
            'max_length' => 100,
            'token_value' => 4000,
            'stop_seq' => "",
            'top_p' => 1,
            'freq_penalty' => 0,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => 'A table summarizing the fruits from Goocrux:
            There are many fruits that were found on the recently discovered planet Goocrux. There are neoskizzles that grow there, which are purple and taste like candy. There are also loheckles, which are a grayish blue fruit and are very tart, a little bit like a lemon. Pounits are a bright green color and are more savory than sweet. There are also plenty of loopnovas which are a neon pink flavor and taste like cotton candy. Finally, there are fruits called glowls, which have a very sour and bitter taste which is acidic and caustic, and a pale orange tinge to them.
            | Fruit | Color | Flavor |',

        ],
        [
            'name' => 'Classification',
            'model_id' => 1,
            'temperature' => 0,
            'max_length' => 6,
            'token_value' => 4000,
            'stop_seq' => "['\n']",
            'top_p' => 1,
            'freq_penalty' => 0,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => 'The following is a list of companies and the categories they fall into:
            Apple, Facebook, Fedex
            Apple
            Category:',

        ],
        [
            'name' => 'Natural language to python',
            'model_id' => 1,
            'temperature' => 0,
            'max_length' => 300,
            'token_value' => 8000,
            'stop_seq' => "",
            'top_p' => 1,
            'freq_penalty' => 0,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => '"
            1. Create a list of first names
            2. Create a list of last names
            3. Combine them randomly into a list of 100 full names
            "',

        ],
        [
            'name' => 'Explain code',
            'model_id' => 13,
            'temperature' => 0,
            'max_length' => 64,
            'token_value' => 8000,
            'stop_seq' => "",
            'top_p' => 1,
            'freq_penalty' => 0,
            'pre_penalty' => 0,
            'best_of' => "1",
            'prompt' => 'class Log:
            def __init__(self, path):
                dirname = os.path.dirname(path)
                os.makedirs(dirname, exist_ok=True)
                f = open(path, "a+")

                # Check that the file is newline-terminated
                size = os.path.getsize(path)
                if size > 0:
                    f.seek(size - 1)
                    end = f.read(1)
                    if end != "\n":
                        f.write("\n")
                self.f = f
                self.path = path

            def log(self, event):
                event["_event_id"] = str(uuid.uuid4())
                json.dump(event, self.f)
                self.f.write("\n")

            def state(self):
                state = {"complete": set(), "last": None}
                for line in open(self.path):
                    event = json.loads(line)
                    if event["type"] == "submit" and event["success"]:
                        state["complete"].add(event["id"])
                        state["last"] = event
                return state

        """
        Here s what the above class is doing:
        1.',

        ]];
        for($i = 0; $i < count($settings); $i++){
            $settings[$i]['created_at'] = date('Y-m-d H:i:s');
            $settings[$i]['updated_at'] = date('Y-m-d H:i:s');
        }
        DB::table('user_playground_settings')->insert($settings);
    }
}
