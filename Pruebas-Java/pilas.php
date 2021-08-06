<?php
//Crea la pila
$stack = new SplStack();

//Añade elementos
$stack->push('33338398861');
$stack->push('3315385166');
$stack->push('3310290676');

//Muestra el número de elementos de la pila (3)
echo $stack->count();

//Situa el puntero al final de la cola
$stack->rewind();

//Muestra los elementos (3, 2, 1)
while( $stack->valid() )
{
  echo $stack->current(), PHP_EOL;
  $stack->next();
}

 //Saca de la pila el último elemento y lo muestra
 echo $stack->pop();

//Situa el puntero al final de la cola
 $stack->rewind();

 //Muestra el número de elementos de la pila (2)
  echo $stack->count();

//Muestra los elementos (2, 1)
 while( $stack->valid() )
 {
  echo $stack->current(), PHP_EOL;
  $stack->next();
 }
?>