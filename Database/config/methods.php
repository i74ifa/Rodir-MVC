<?php

/**
 * #### wrapping text with single quotation marks
 * Like:
 *    - array("Hi there", "Hi")
 * - after wrapping 
 *    - array("'hi'", "'Hi'")
 *  
 * 
 */
function CommaArray($array)
{
  if (!is_array($array))
    return 'This Not Array';
  $valuesComma = [];
  foreach ($array as $ar) {
    if (!is_integer($ar) && !strpos($ar, '()'))
      array_push($valuesComma, "'$ar'");
    else
      array_push($valuesComma, $ar);
  }
  return $valuesComma;
}