<?php

error_reporting(E_ALL);

require_once(dirname(dirname(__FILE__))) . '/php-iso7064.php';


################# ALGORITHM ############################ INPUT ################ OUTPUT ###################
$tests = array(
		'iso7064_mod11_2' 	=> array(
							'0794' 		=>	'0',
							'079'  		=> 	'X'
					   ),
		'iso7064_mod1271_36' 	=> array(
							'ISO79'		=>	'3W'
					   ),
		'iso7064_mod37_2'	=> array(
							'G123489654321'	=>	'Y'
					   ),
		'iso7064_mod661_26'	=> array(
							'BAISDLAFK'	=>	'BM'
					   ),
		'iso7064_mod97_10'	=> array(
							'794'		=>	'44',
							'107571'	=>	'07'
					   )
	 );

# Execute tests
foreach(array_keys($tests) as $algorithm) {
 print "[$algorithm]\n";
 foreach($tests[$algorithm] as $input=>$expected_output) {
  print " - $algorithm('$input') ... ";
  $result = $algorithm($input);
  if($result != $expected_output) {
   print "FAILED (expected '$expected_output', received '$result').\n";
   #exit(1);
  }
  else {
   print "OK.\n";
  }
 }
}

print "All tests OK.\n";
exit(0);

?>
