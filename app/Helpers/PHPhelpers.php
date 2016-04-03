<?php
namespace acempresarial\Helpers;


class PHPhelpers 
{
		/**
		 * [extract_value description]
		 * @param  [type] $content [description]
		 * @return [type]          [description]
		 */
	  function extract_value($content)
        {
            if (is_array($content)) {
                $content = $content['b'];
            }
            return $content;
        }

        /**
         * [startsWith description]
         * @param  [type] $haystack [description]
         * @param  [type] $needle   [description]
         * @return [type]           [description]
         */
        function startsWith($haystack, $needle)
        {
            // search backwards starting from haystack length characters from the end
   			 return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
        }
}