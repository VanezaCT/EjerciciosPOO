<?php
// definimos la clase abstracta (abstraccion y encapsulamiento)
abstract class Auto {
     // propiedades con atributos son iguales (publica, privada y estatica)
     //metodo keyword
     public function  __construct(
        private string  $tipo, 
        private string $marca, 
        private string $modelo
        ) {
        
     }
     // metodo getter para acceder a las propiedades y retornar algun valor
     public function getTipo(): string 
     {
        //acceder a las propiedades
        return $this->tipo;
     }
    
     public function getMarca(): string
     {
        return $this->marca;
     }

     public function getModelo(): string
     {
        return $this->modelo;
     }

     //metodo bastracto no devuelve nada y que debe ser implementado por la subclases
     abstract public function arrancar(): void;

     //metodo comun a todas las subclases
     public function detener():void
     {
        echo "El".$this->tipo. " ". $this->marca. " ". $this->modelo."de ha detenido<hr>";
     }
     
     public static function crearDesdeArray(array $datos): Auto
     {
        switch ($datos["tipo"]){
            case 'Camion':
                return new Camion(
                    $datos["tipo"],
                    $datos["marca"],
                    $datos["modelo"],
                    $datos["capacidadDeCarga"],
                );
                break;

            case 'AutoDeportivo':
                return new AutoDeportivo(
                    $datos["tipo"],
                    $datos["marca"],
                    $datos["modelo"],
                    $datos["velocidadMaxima"],
                );
                break;
            default:
                throw new InvalidArgumentException('Tipo de vehiculo no es soportado');
            break;
        }
     }
}

// hereda (camion hereda de auto)
class Camion extends Auto {
    public function __construct(
        string $tipo, 
        string $marca, 
        string $modelo,
        private string $capacidadDeCarga,
        ) {
            //hacer referencia a nuestra clase padre y trae los valores
            parent::__construct($tipo, $marca, $modelo);
        }
    public function getcapacidadDeCarga(): string {
        return $this ->capacidadDeCarga;
    }

    public function cargar(): void{
        echo "El"
        . $this->getTipo()." "
        . $this->getMarca()." "
        . $this->getModelo()." esta cargado con"
        . $this->getcapacidadDeCarga()."kg<br>";
    }

    public function arrancar(): void{
        echo "El"
        . $this->getTipo()." "
        . $this->getMarca()." "
        . $this->getModelo()." esta arrancando en la autopista<br>";
}
}
class AutoDeportivo extends Auto {
    public function __construct(
        string $tipo, 
        string $marca, 
        string $modelo, 
       private  string $velocidadMaxima
        ){
            parent::__construct($tipo, $marca, $modelo);
    }

    public function arrancar():void
    {
        echo "El"
        . $this->getTipo()." "
        . $this->getMarca()." "
        . $this->getModelo()." esta arrancando a gran velocidad<br>";

    }
    public function mostrarVelocidadMaxima():void
    {
        echo "El"
        . $this->getTipo()." "
        . $this->getMarca()." "
        . $this->getModelo()." tiene una velocidad maxima de".$this->velocidadMaxima."Km/h<br>";

    }
}

//instanciar un objeto o darle valor a los parametros
$camion = new Camion("Camion", "mercedes","Actros ", "300.000");
$camion->arrancar();
$camion->cargar();
$camion->detener();

$autoDeportivo = new AutoDeportivo("Auto deportivo", "Ferrari", "488", "330");
$autoDeportivo->arrancar();
$autoDeportivo->mostrarVelocidadMaxima();
$autoDeportivo->detener();

$datosCamion = [
    'tipo' => 'Camion',
    'marca' => 'Volvo',
    'modelo' => '54',
    'capacidadDeCarga' => '250.000'
];

$datosAutoDeportivo = [
    'tipo'=> 'AutoDeportivo',
    'marca' => 'BWM',
    'modelo' => '89',
    'velocidadMaxima' => '350'
];

//Llamar a metodos estaticos nombre de la clase seguido de dos puntos nombre de la clase estatica
$camion2 = Auto::crearDesdeArray($datosCamion);
$camion2->arrancar();
$camion2->detener();

$autodepotivo2 = Auto::crearDesdeArray($datosAutoDeportivo);
$autodepotivo2->arrancar();
$autodepotivo2->detener();
