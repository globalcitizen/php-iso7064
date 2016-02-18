<?php

global $__iso7064_algorithms;

function __iso7064_load_algorithms() {
 global $__iso7064_algorithms;
 $algorithms_definition = dirname(__FILE__) . "/algorithms.txt";
 $data = file_get_contents($algorithms_definition);
 $lines = split("\n",$data);
 array_shift($lines); # drop header
 foreach($lines as $line) {
  if($line!='') {
   list($title,$code,$inputs,$output_qty,$output_values,$modulus,$radix) = explode('|',$line);
   $algorithm_details = array(
				'title'		=> $title,
				'code'		=> $code,
				'inputs'	=> $inputs,
				'output_qty'	=> $output_qty,
				'output_values'	=> $output_values,
				'modulus'	=> $modulus,
				'radix'		=> $radix
			);
   $__iso7064_algorithms[$code] = $algorithm_details;
  }
 }
}

function gimme_description($inputs) {
 $contains_alpha = false;
 $contains_number = false;
 if(preg_match('/[A-Z]/',$inputs)) { $contains_alpha = true; }
 if(preg_match('/[0-9]/',$inputs)) { $contains_number= true; }
 if($contains_alpha) {
  if($contains_number) {
   return 'Alphanumeric';
  }
  else {
   return 'Alphabetic';
  }
 }
 else {
  return 'Numeric';
 }
}

__iso7064_load_algorithms();

print "| Algorithm | Function name | Input | Output |\n";
print "| --------- | ------------- | ----- | ------ |\n";
foreach(array_keys($__iso7064_algorithms) as $algorithm) {
 print "| " . $__iso7064_algorithms[$algorithm]['title'] . " | `" . $algorithm . "()` | " . gimme_description($__iso7064_algorithms[$algorithm]['inputs']) . " | " . $__iso7064_algorithms[$algorithm]['output_qty'] . ' x ' . gimme_description($__iso7064_algorithms[$algorithm]['output_values']) . "|\n";
}

?>
