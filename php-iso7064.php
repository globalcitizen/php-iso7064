<?php

# NOTE: This file is generated code. Do not edit manually.

# ISO/IEC 7064, MOD 11-2
# @param $input string Must contain only characters ('0123456789').
# @output A 1 character string containing '0123456789X',
#         or '' (empty string) on failure due to bad input.
function iso7064_mod11_2($input) {
 $input = strtoupper($input); # normalize
 if(!preg_match('/^[0123456789]+$/',$input)) { return ''; } # bad input
 $modulus       = 11;
 $radix         = 2;
 $output_values = '0123456789X';
 $p             = 0;
 for($i=0; $i<strlen($input); $i++) {
  $val = $chars.indexOf($input.charAt($i));
  if($val < 0) { return ''; } # illegal character encountered
  $p = (($p + $val) * $r) % $m;
 }
 $checksum = ($m - $p + 1) % $m;
 return $chars.charAt($checksum);
}

# ISO/IEC 7064, MOD 37-2
# @param $input string Must contain only characters ('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ').
# @output A 1 character string containing '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ*',
#         or '' (empty string) on failure due to bad input.
function iso7064_mod37_2($input) {
 $input = strtoupper($input); # normalize
 if(!preg_match('/^[0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ]+$/',$input)) { return ''; } # bad input
 $modulus       = 37;
 $radix         = 2;
 $output_values = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ*';
 $p             = 0;
 for($i=0; $i<strlen($input); $i++) {
  $val = $chars.indexOf($input.charAt($i));
  if($val < 0) { return ''; } # illegal character encountered
  $p = (($p + $val) * $r) % $m;
 }
 $checksum = ($m - $p + 1) % $m;
 return $chars.charAt($checksum);
}

# ISO/IEC 7064, MOD 97-10
# @param $input string Must contain only characters ('0123456789').
# @output A 2 character string containing '0123456789',
#         or '' (empty string) on failure due to bad input.
function iso7064_mod97_10($input) {
 $input = strtoupper($input); # normalize
 if(!preg_match('/^[0123456789]+$/',$input)) { return ''; } # bad input
 $modulus       = 97;
 $radix         = 10;
 $output_values = '0123456789';
 $p             = 0;
 for($i=0; $i<strlen($input); $i++) {
  $val = $chars.indexOf($input.charAt($i));
  if($val < 0) { return ''; } # illegal character encountered
  $p = (($p + $val) * $r) % $m;
 }
$p = ($p*$r) % $m;
 $checksum = ($m - $p + 1) % $m;
 $second = $checksum % $r;
 $first = ($checksum - $second) / $r;
 return $chars.charAt($first) . chars.charAt($second);
}

# ISO/IEC 7064, MOD 661-26
# @param $input string Must contain only characters ('ABCDEFGHIJKLMNOPQRSTUVWXYZ').
# @output A 2 character string containing 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
#         or '' (empty string) on failure due to bad input.
function iso7064_mod661_26($input) {
 $input = strtoupper($input); # normalize
 if(!preg_match('/^[ABCDEFGHIJKLMNOPQRSTUVWXYZ]+$/',$input)) { return ''; } # bad input
 $modulus       = 661;
 $radix         = 26;
 $output_values = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $p             = 0;
 for($i=0; $i<strlen($input); $i++) {
  $val = $chars.indexOf($input.charAt($i));
  if($val < 0) { return ''; } # illegal character encountered
  $p = (($p + $val) * $r) % $m;
 }
$p = ($p*$r) % $m;
 $checksum = ($m - $p + 1) % $m;
 $second = $checksum % $r;
 $first = ($checksum - $second) / $r;
 return $chars.charAt($first) . chars.charAt($second);
}

# ISO/IEC 7064, MOD 1271-36
# @param $input string Must contain only characters ('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ').
# @output A 2 character string containing '0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY',
#         or '' (empty string) on failure due to bad input.
function iso7064_mod1271_36($input) {
 $input = strtoupper($input); # normalize
 if(!preg_match('/^[0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ]+$/',$input)) { return ''; } # bad input
 $modulus       = 1271;
 $radix         = 36;
 $output_values = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY';
 $p             = 0;
 for($i=0; $i<strlen($input); $i++) {
  $val = $chars.indexOf($input.charAt($i));
  if($val < 0) { return ''; } # illegal character encountered
  $p = (($p + $val) * $r) % $m;
 }
$p = ($p*$r) % $m;
 $checksum = ($m - $p + 1) % $m;
 $second = $checksum % $r;
 $first = ($checksum - $second) / $r;
 return $chars.charAt($first) . chars.charAt($second);
}

?>
