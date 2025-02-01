<?php  
$name =  "Vaneza";
$age = 6;


define('LOGO_URL', 'https://es.m.wikipedia.org/wiki/Archivo:PHP-logo.svg');
//match es mejor que utilizar if
$outputAge = match(true){
 $age < 5 => "eres un bebe , $name",
 $age < 18 => "eres un adolescente, $name",
 $age < 30 => "eres un adulto, $name",
 $age < 60 => "eres un viejo, $name " ,
 default => "eres viejicimo, $name"
};
echo $outputAge; 
?>
<img src="<?=LOGO_URL?>" alt="PHP LOGO" width="200">
<style>
    :root{
        color-scheme: light dark;
    }
    body {
    display: grid;
    place-content: center;
}
</style>






