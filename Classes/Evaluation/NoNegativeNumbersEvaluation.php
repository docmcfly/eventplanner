<?php 

namespace Cylancer\Eventplanner\Evaluation;

/**
 * Class for field value validation/evaluation to be used in 'eval' of TCA
 */
class NoNegativeNumbersEvaluation
{

   /**
    * JavaScript code for client side validation/evaluation
    *
    * @return string JavaScript code for client side validation/evaluation
    */
   public function returnFieldJS()
   {
      return 'return Math.max(value,0)';
   }

   /**
    * Server-side validation/evaluation on saving the record
    *
    * @param string $value The field value to be evaluated
    * @param string $is_in The "is_in" value of the field configuration from TCA
    * @param bool $set Boolean defining if the value is written to the database or not.
    * @return string Evaluated field value
    */
   public function evaluateFieldValue($value, $is_in, &$set)
   {
      $set = intval($value) >= 0;
      return max(intval($value), 0);
   }

   /**
    * Server-side validation/evaluation on opening the record
    *
    * @param array $parameters Array with key 'value' containing the field value from the database
    * @return string Evaluated field value
    */
   public function deevaluateFieldValue(array $parameters)
   {
      return  max(intval($parameters['value']),0 );
   }
}