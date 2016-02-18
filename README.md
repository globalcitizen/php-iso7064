php-iso7064
===========

This is a reference implementation of the various 'pure' ISO7064 algorithms in PHP. It is 100% generated code, from [algorithm metadata](https://github.com/globalcitizen/php-iso7064/blob/master/utils/algorithms.txt). Note that the 'hybrid' algorithms are not implemented.

[![Build Status](https://travis-ci.org/globalcitizen/php-iso7064.png)](https://travis-ci.org/globalcitizen/php-iso7064)
[![Latest Stable Version](https://poser.pugx.org/globalcitizen/php-iso7064/v/stable)](https://packagist.org/packages/globalcitizen/php-iso7064)
[![License](https://poser.pugx.org/globalcitizen/php-iso7064/license)](https://packagist.org/packages/globalcitizen/php-iso7064)

Algorithms implemented
----------------------

| Algorithm | Function name | Input | Output |
| --------- | ------------- | ----- | ------ |
| ISO/IEC 7064, MOD 11-2 | `iso7064_mod11_2()` | Numeric | 1 x Alphanumeric|
| ISO/IEC 7064, MOD 37-2 | `iso7064_mod37_2()` | Alphanumeric | 1 x Alphanumeric|
| ISO/IEC 7064, MOD 97-10 | `iso7064_mod97_10()` | Numeric | 2 x Numeric|
| ISO/IEC 7064, MOD 661-26 | `iso7064_mod661_26()` | Alphabetic | 2 x Alphabetic|
| ISO/IEC 7064, MOD 1271-36 | `iso7064_mod1271_36()` | Alphanumeric | 2 x Alphanumeric|

History
-------

__February 2016__
* __[Version 0.1.2](https://github.com/globalcitizen/php-iban/releases/tag/v0.1.2) released__: On the way to functionality.
* __[Version 0.1.1](https://github.com/globalcitizen/php-iban/releases/tag/v0.1.1) released__: Syntax error resolved.
* __[Version 0.1.0](https://github.com/globalcitizen/php-iban/releases/tag/v0.1.0) released__: Absolutely and completely untested! :)

Inspiration was [@danieltwager](https://github.com/danieltwagner/)'s [ISO7064 Java Library](https://github.com/danieltwagner/iso7064/) and the pressing need to auto-detect checksum algorithms for [php-iban](https://github.com/globalcitizen/php-iban). Annoyingly, there didn't seem to be any way to define normal functions dynamically in PHP, so I had to settle for code generation instead of a reflective implementation.
