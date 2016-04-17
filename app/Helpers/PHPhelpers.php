<?php
namespace acempresarial\Helpers;

use Carbon\Carbon;

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
       * Takes the fields and orders its labels by length.
       * It is used to properly extract the PDF information.
       * @param  array $field [description]
       * @return array        [description]
       */
      public function order_fields_labels_by_length($fields)
      {
          foreach ($fields as $key => $field) {
              $lenghts = array();

              foreach ($field['labels'] as $number => $option) {
                  $lenghts[$number] = strlen($option['label']);
              }
              array_multisort($lenghts, SORT_DESC, $field['labels']);
              $fields[$key]['labels'] = $field['labels'];
          }
          return $fields;
      }

        /**
         * It compares if the string given stars with the
         * caracters from the $needle variable
         * @param  string $haystack [description]
         * @param  string $needle   [description]
         * @return bool           [description]
         */
        public function startsWith($haystack, $needle)
        {
           
         // search backwards starting from haystack length characters from the end
             return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
        }

        /**
         * Converts Chilean datetime to DB datetime string
         * @param [type] $date [description]
         */
        public function CHL_datetime_to_DB($date)
        {
            try {
                $formatted_date = Carbon::createFromFormat('d/m/Y H:i', $date)
                    ->toDateTimeString();
            } catch (Exception $e) {
                dd('Message: ' .$e->getMessage()) ;
            }
            return $formatted_date;
        }

        /**
         * Converts Chilean date with sepparated with -
         *  to DB datetime string
         * @param $date [description]
         */
        public function CHL_date_to_DB($date)
        {
            $formatted_date = Carbon::createFromFormat('d-m-Y', '01−09−2008');
            return $formatted_date;
        }

         /**
         * Converts a given Month and Year to a DB datetime string         *
         * @param $date [description]
         */
        public function month_year_to_DB_datetime($month, $year)
        {
            $formatted_date = Carbon::createFromFormat('d-m-Y H:i', "01-$month-$year 00:00");
            return $formatted_date;
        }
}
