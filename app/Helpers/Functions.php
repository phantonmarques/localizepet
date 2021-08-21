<?php

if (!function_exists('attributeLogin')) {
     function attributeLogin($string): string
     {
           # Verifica se o login está sendo feito por e-mail ou usuário
           strstr($string, '@') ? $attribute = 'email' : $attribute = 'username';
               
           return $attribute;
      }
};

if (!function_exists('formatDateAndTime')) {

      function formatDateAndTime($value, $format = 'd/m/Y')
      {
            # Utiliza a classe de Carbon para converter ao formato de data ou hora desejado
            return Carbon\Carbon::parse($value)->format($format);
      }
};

if (!function_exists('formatPhone')) {

      function formatPhone($number)
      {
            # Formatador de número de celular e telefone
            if (empty($number))
                  return '';

            $formatedPhone = preg_replace('/[^0-9]/', '', $number);

            $matches = [];

            preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);

            if ($matches) 
                return '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
        
            return $number;
      }
};