<?php

if (!function_exists('format_timestamp_br')) {

    function format_timestamp_br($value, $format = 'd/m/Y')
    {
        return Carbon\Carbon::parse($value)->format($format);
    }
};


if (!function_exists('format_phone_br')) {

    function format_phone_br(?string $number): string
    {
        if (empty($number)) {
            return '';
        }

        $formattedPhone = preg_replace('/[^0-9]/', '', $number);

        $matches = [];

        preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formattedPhone, $matches);

        if ($matches) {
            return '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
        }

        return $number;
    }
};

if (!function_exists('format_size_in_kb')) {

    function format_size_in_kb(int $size): string
    {
        return number_format($size / 1024, 2);
    }
};

if (!function_exists('exception_details')) {

    /**
     * Returns the custom \Exception toString: Message + File + Line
     * @param        $exception
     * @param bool   $visible [ Visible Users? ]
     *
     * @return string
     */
    function exception_details($exception = null, $visible = false): string
    {
        $details = [];

        if ($exception instanceof \Exception) {

            $details[] = 'Exception: ' . $exception->getMessage();

            if (config('app.env') == 'local' || $visible == false) {
                $details[] = ' No arquivo: ' . $exception->getFile() . ' Na linha: ' . $exception->getLine();
            }
        }

        return implode(' ', $details);
    }
};

if (!function_exists('first_word')) {

    function first_word(string $value, int $limit = 22): string
    {
        $value = explode(' ', $value);

        $value = current($value);

        return substr($value, 0, $limit);
    }
};

if (!function_exists('array_to_object')) {

    /**
     * Convert string JSON or array in object
     * @param array $array
     * @param bool  $json
     *
     * @return object
     */
    function array_to_object($array = [], $json = true): stdClass
    {
        $array = (array)$array;

        if ($json) {
            return (object)json_decode(json_encode($array), false);
        }

        $object = new stdClass();

        foreach ($array as $key => $value) {

            if (is_array($value)) {
                $value = array_to_object($value, $json);
            }

            $object->{$key} = $value;
        }

        return $object;
    }
};

if (!function_exists('str_random')) {
    /**
     * Generate string random
     *
     * @param  int  $number
     * @param  string  $complementString
     * @return string
     */
    function str_random(int $number = 16, string $complementString = ''): string
    {
        return \Illuminate\Support\Str::random($number) . trim($complementString);
    }
}

if (!function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    function str_slug(string $title, string $separator = '-', string $language = 'en'): string
    {
        return \Illuminate\Support\Str::slug($title, $separator, $language);
    }
}

if (!function_exists('date_br')) {
    /**
     * Date in BR Format
     */
    function date_br($value, $format = 'd/m/Y', $default = ''): string
    {
        return trim($value ? date($format, strtotime($value)) : $default);
    }
}