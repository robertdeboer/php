<?php
use EnumToArray;
/**
* Enum Colors
* 
* Example of a backed enum
* Example of a backed string enum with trait functions 
*/
enum Colors: string {
    /**
    * Allow the names and values to be pulled as arrays
    * Colors::names() returns ['RED','BLUE']
    * Colors::values() returns ['red', 'blue']
    * Colors::array() returns ['RED' => 'red', 'BLUE' => 'blue']
    */
    use EnumToArray;

    case RED = 'red';
    case BLUE = 'blue';
}