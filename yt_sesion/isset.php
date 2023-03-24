<?php

$login="Hola";

var_dump( isset($login) );

if( isset($login) ){
    echo '<br>Esta variable esta iniciada';
}else{
    echo '<br>La variable no esta iniciada';
}