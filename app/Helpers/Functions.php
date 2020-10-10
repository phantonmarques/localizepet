<?php

if (!function_exists('attributeLogin')) {
     function attributeLogin($string): string
     {
           strstr($string, '@') ? $attribute = 'email' : $attribute = 'username';
               
           return $attribute;
      }
};