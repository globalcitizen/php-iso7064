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

__iso7064_load_algorithms();

print "<?php\n\n# NOTE: This file is generated code. Do not edit manually.\n\n";
foreach(array_keys($__iso7064_algorithms) as $algorithm) {
 print "# " . $__iso7064_algorithms[$algorithm]['title'] . "\n";
 print "# @param \$input string Must contain only characters ('".$__iso7064_algorithms[$algorithm]['inputs']."').\n";
 print "# @output A " . $__iso7064_algorithms[$algorithm]['output_qty'] . " character string containing '" . $__iso7064_algorithms[$algorithm]['output_values'] . "',\n";
 print "#         or '' (empty string) on failure due to bad input.\n";
 print "function $algorithm(\$input) {\n";
 print " \$input = strtoupper(\$input); # normalize\n";
 print " if(!preg_match('/^[" . $__iso7064_algorithms[$algorithm]['inputs'] . "]+$/',\$input)) { return ''; } # bad input\n";
 print " \$modulus       = " . $__iso7064_algorithms[$algorithm]['modulus'] . ";\n";          # m
 print " \$radix         = " . $__iso7064_algorithms[$algorithm]['radix'] . ";\n";            # r
 print " \$output_values = '" . $__iso7064_algorithms[$algorithm]['output_values'] . "';\n";    # chars
 print " \$p             = 0;\n";
 print " for(\$i=0; \$i<strlen(\$input); \$i++) {\n";
 print "  \$val = strpos(\$output_values,substr(\$input,\$i,1));\n"; # later +1?
 print "  if(\$val < 0) { return ''; } # illegal character encountered\n";
 print "  \$p = ((\$p + \$val) * \$radix) % \$modulus;\n";
 print " }\n";
 if($__iso7064_algorithms[$algorithm]['output_qty']>1) {
  print " \$p = (\$p*\$radix) % \$modulus;\n";
 }
 print " \$checksum = (\$modulus - \$p + 1) % \$modulus;\n";
 if($__iso7064_algorithms[$algorithm]['output_qty']>1) {   	
  print " \$second = \$checksum % \$radix;\n";
  print " \$first = (\$checksum - \$second) / \$radix;\n";
  print " return substr(\$output_values,\$first,1) . substr(\$output_values,\$second,1);\n";
 }
 else {
  print " return substr(\$output_values,\$checksum,1);\n"; # later +1?
 }
 print "}\n\n";
}

print "?>\n";

?>
