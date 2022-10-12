<?php

if (!function_exists('formatDateAndTime')) {

    /**
     * Format date using default Brazilian
     * @param $value
     * @param string $format
     * @return string
     */
    function formatDateAndTime($value, $format = 'd/m/Y')
    {
        return Carbon\Carbon::parse($value)->format($format);
    }
};


if (!function_exists('formatPhone')) {

    /**
     * Format cell or phone (99) 9999?-9999
     * @param $number
     * @return string
     */
    function formatPhone($number)
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

if (false == function_exists('exceptionString')) {

    /**
     * Returns the custom \Exception toString: Message + File + Line
     * @param        $exception
     * @param bool   $visible [ Visible Users? ]
     *
     * @return string
     */
    function exceptionString($exception = null, $visible = false) : string
    {
        $result = [];

        if ($exception instanceof \Exception) {

            $result[] = 'Exception: ' . $exception->getMessage();

            if (config('app.env') == 'local' || $visible == false) {
                $result[] = ' No arquivo: ' . $exception->getFile() . ' Na linha: ' . $exception->getLine();
            }
        }

        return implode(' ', $result);
    }
};

if (!function_exists('firstName')) {

    /**
     * Get possible first name in string with name complete [ template e-mail have limit width the 22 chars ]
     * @param $nameComplete
     * @return string
     */
    function firstName($nameComplete)
    {
        $nameComplete = explode(' ', $nameComplete);

        $nameComplete = current($nameComplete);

        return substr($nameComplete, '0', '22');
    }
};

if (false == function_exists('convertArrayInObject')) {

    /**
     * Convert string JSON or array in object
     * @param array $array
     * @param bool  $json
     *
     * @return object
     */
    function convertArrayInObject($array = [], $json = true)
    {
        $array = (array)$array;

        if ($json) {
            return (object)json_decode(json_encode($array), false);
        }

        $object = new stdClass();

        foreach ($array as $key => $value) {

            if (is_array($value)) {
                $value = convertArrayInObject($value, $json);
            }

            $object->$key = $value;
        }

        return $object;
    }
};
