<?php

 //Crea la cola
 $queue= new SplQueue();

 //Añade elementos


 $queue->enqueue('3338398861');
 $queue->enqueue('3315385166');
 $queue->enqueue('3310290676');

 //Muestra el número de elementos de la cola(3)
 /*echo $queue->count();

 //Situa el puntero al principio de la cola
 $queue->rewind();

 //Muestra los elementos (1, 2, 3)
 /*while( $queue->valid() )
 {
   echo $queue->current(), PHP_EOL;
   $queue->next();
 }*/

  //Saca de la cola el primer elemento y lo muestra
   echo $queue->dequeue();

 //Situa el puntero al principio de la cola
  $queue->rewind();


  //Muestra el número de elementos de la cola(2)
/*   echo $queue->count();*/

 //Muestra los elementos (2, 3)
 /* while( $queue->valid() )
  {
   echo $queue->current(), PHP_EOL;
   $queue->next();
  }*/





  $equipo_futbol = array
  (
  array("Rooney","Chicharito","Gigs"),
  array("Suarez"),
  array("Torres","Terry","Etoo")
  );
  var_dump ($equipo_futbol);









  /*while($queue->valid()){
    echo $queue->dequeue();
    /*Imprime el segundo
    echo $queue->current(), PHP_EOL . "<br>";
    $queue->next();
  }
for($i=0; $i=sizeof($queue); $i++){
  echo $queue->dequeue();

  $queue->rewind();
}*/

?>