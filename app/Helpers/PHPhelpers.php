<?php
namespace acempresarial\Helpers;

class PHPhelpers
{
    /**
         * Extracs the value from the Xml when they
         * are an array.
         * @param  array or string $content
         * @return string
         */
      public function extract_value($content)
      {
          if (is_array($content)) {
              $content = $content['b'];
          }
          return $content;
      }

        /**
         * It compares if the string given stars with the
         * caracters from the $needle variable
         * @param  string $haystack [description]
         * @param  string $needle   [description]
         * @return bool           [description]
         */
        public function startsWith($haystack, $needle)
        {            // search backwards starting from haystack length characters from the end
             return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
        }
}
