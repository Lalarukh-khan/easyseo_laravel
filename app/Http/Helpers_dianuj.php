<?php

use Hashids\Hashids;

if (!function_exists('get_fulltime')) {

    function get_fulltime($date, $format = 'd, M Y h:i a')
    {
        $new_date = new \DateTime($date);
        return $new_date->format($format);
    }
}


if (!function_exists('get_date')) {

    function get_date($date)
    {
        return get_fulltime($date, 'D  d/m/Y');
    }
}
if (!function_exists('containsOnlyNull')) {
    function containsOnlyNull($input)
    {
        return empty(array_filter($input, function ($a) {
            return $a !== null;
        }));
    }
}

if (!function_exists('get_date_month')) {

    function get_date_month($date)
    {
        return get_fulltime($date, 'M Y');
    }
}


if (!function_exists('get_time')) {

    function get_time($date, $format = 'h:i A')
    {
        $new_date = new \DateTime($date);
        return $new_date->format($format);
    }
}

if (!function_exists('get_date_differences')) {
    function get_date_differences($start, $end, $interval = '1 month')
    {
        $start    = new \DateTime($start); // Today date
        $end      = new \DateTime($end); // Create a datetime object from your Carbon object
        $interval = \DateInterval::createFromDateString($interval); // 1 month interval
        $period   = new DatePeriod($start, $interval, $end); // Get a set of date beetween the 2 period

        return $period;
    }
}

if (!function_exists('get_price')) {

    function get_price($price)
    {
        return '$' . number_format($price, 2);
    }
}

if (!function_exists("safeCount")) {

    function safeCount($array)
    {
        if (is_array($array) || is_object($array)) {
            return count($array);
        } else {
            return 0;
        }
    }
}

if (!function_exists('dummy_image')) {

    function dummy_image($type = null)
    {
        switch ($type) {
            case 'user':
                return asset('admin_assets/assets/images/user-img-dummy.png');
            default:
                return asset('admin_assets/assets/images/image-not-found.jpg');
        }
    }
}

if (!function_exists('check_file')) {

    function check_file($file = null, $type = null)
    {
        if ($file && $file != '' && file_exists($file)) {
            return asset($file);
        } else {
            return dummy_image($type);
        }
    }
}

if (!function_exists('hashids_encode')) {

    function hashids_encode($str)
    {
        $hashids = new Hashids('', 20);
        return $hashids->encode($str);
    }
}

if (!function_exists('hashids_decode')) {

    function hashids_decode($str)
    {
        try {
            $hashids = new Hashids('', 20);
            return $hashids->decode($str)[0];
        } catch (Exception $e) {
            return abort(404);
        }
    }
}

if (!function_exists('user_types')) {
    function user_types($index = null)
    {
        $arr = [
            "normal" => ['title' => 'Normal', 'class' => 'blue'],
            "admin" => ['title' => 'Admin', 'class' => 'danger'],
        ];
        if ($index) {
            return $arr[$index] ?? $arr['admin'];
        }
        return $arr;
    }
}

if (!function_exists('download_file')) {
    function download_file($file)
    {
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            flush(); // Flush system output buffer
            readfile($file);
            die();
        }
        abort(404);
    }
}

if (!function_exists('ordinal')) {
    function ordinal($number)
    {
        $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
        if ((($number % 100) >= 11) && (($number % 100) <= 13))
            return $number . 'th';
        else
            return $number . $ends[$number % 10];
    }

    if (!function_exists('getQuotientAndRemainder')) {
        function getQuotientAndRemainder($divisor, $dividend)
        {
            $quotient = (int)($divisor / $dividend);
            $remainder = $divisor % $dividend;
            return array('quotient' => $quotient, 'remainder' => $remainder);
        }
    }
}

if (!function_exists('get_states')) {
    function get_states()
    {
        $states = array([
            'name' => 'New South Wales',
            'abbreviation' => '(NSW)',
        ], [
            'name' => 'Victoria',
            'abbreviation' => '(VIC)',
        ], [
            'name' => 'Queensland',
            'abbreviation' => '(QLD)',
        ], [
            'name' => 'Tasmania',
            'abbreviation' => '(TAS)',
        ], [
            'name' => 'South Australia',
            'abbreviation' => '(SA)',
        ], [
            'name' => 'Western Australia',
            'abbreviation' => '(WA)',
        ], [
            'name' => 'Northern Territory',
            'abbreviation' => '(NT)',
        ], [
            'name' => 'Australian Capital Territory',
            'abbreviation' => '(ACT)',
        ]);
        return $states;
    }
}

if (!function_exists('convertToHoursMins')) {
    function convertToHoursMins($time)
    {
        $hours    = floor($time / 60);
        $minutes  = ($time % 60);
        if ($minutes == 0) {
            $output_format = $hours == 1 ? '%02d hour' : '%02d hours';
            $hoursToMinutes = sprintf($output_format, $hours);
        } else if ($hours == 0) {
            if ($minutes < 10) {
                $minutes = '0' . $minutes;
            }
            $output_format = $minutes == 1 ? '%02d min' : '%02d mins';
            $hoursToMinutes = sprintf($output_format,  $minutes);
        } else {
            $output_format = $hours == 1 ? '%02d hour %02d mins' : '%02d hours %02d mins';
            $hoursToMinutes = sprintf($output_format, $hours, $minutes);
        }

        return $hoursToMinutes;
    }
}

if (!function_exists('ads_check_counter')) {
    function ads_check_counter($item,$match) {
        $counter = 0;
        foreach ($item as $key => $value) {
            if ($match == $value) {
                $counter = $counter+1;
            }
        }
        return $counter;
    }
}

if (!function_exists('uploadSingleFile')) {
    function uploadSingleFile($file, $path = 'uploads/images/', $types = "png,gif,csv,jpeg,jpg", $filesize = '20000', $rule_msgs = [])
    {
        $path = $path . date('Y') . '/';
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $rules = array('file' => 'required|mimes:' . $types . "|max:" . $filesize);
        $validator = \Validator::make(array('file' => $file), $rules, $rule_msgs);
        if ($validator->passes()) {
            $rand = time() . "_" . \Str::random(15) . "_";
            $f_name = $rand . $file->getClientOriginalName();
            $filename = $path . $f_name;
            //full size image
            $file->move($path, $f_name);
            return $filename;
        } else {
            return ['error' => $validator->errors()->first('file')];
        }
    }
}

if (!function_exists('limit_text')) {
    function limit_text($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}
if (!function_exists('removeFirstTwoBrTags')) {
    function removeFirstTwoBrTags($text) {
        $pattern = '/<br\s*\/?>/i'; // Regular expression pattern to match <br> tags (case-insensitive)
        $count = 0; // Counter to keep track of removed tags
        // Callback function to remove the first two <br> tags
        $cleanText = preg_replace_callback($pattern, function ($matches) use (&$count) {
            $count++; // Increment the counter
            return ($count <= 2) ? '' : $matches[0]; // Remove the tag if it's one of the first two, otherwise keep it
        }, $text);
        return $cleanText;
    }
}
