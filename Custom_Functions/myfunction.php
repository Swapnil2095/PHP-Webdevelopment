<?php
// Syntax
function echo_stuff() {
  echo 'Hey boss!';
  echo "<br>";
}

echo_stuff();

// Function arguments
function my_name( $name ) {
  echo $name;
  echo "<br>";
}

my_name( 'John' );
my_name( 'Jane' );
my_name( 'Jeff' );

// Default arguments
function full_name( $firstname = 'John', $lastname = 'Morris' ) {
  echo $firstname . $lastname;
  echo "<br>";
}

full_name();
full_name('John', 'Doe');

// Return values
function multiply( $number, $multiplier ) {

  return $number * $multiplier;
}

$value = multiply( 2, 50 );

echo multiply( 2, 40 );
echo "<br>";
echo multiply( 2, 33 );
echo "<br>";
echo multiply( 1234323433, 23432343 );
echo "<br>";