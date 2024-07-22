<?php
// archivo Conexion.php
//Usen este archivo general para la conexion a la BD

class Conexion {
  private static $instance = null;
  private $host = "";
  private $dbname = "";
  private $user = "";
  private $password = "";

  public static function getInstance() {
    if (self::$instance == null) {
        self::$instance = new Conexion();
    }
    return self::$instance;
  }

  public static conexion() {
    try {
        $PDO = new PDO("mysql:host".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
        retun $PDO;
    } catch(PDOException $e) {
        return $e->getMessage();
    }
  }

}

/*
1. private static $instance = null;: Esta línea declara una variable estática privada llamada $instance que se 
utiliza para almacenar la instancia única de la clase Conexion. La variable se inicializa con un valor de null.

2. private $host = "";: Esta línea declara una variable privada llamada $host que se utiliza para almacenar 
el nombre del host de la base de datos. La variable se inicializa con un valor vacío.

3. private $dbname = "";: Esta línea declara una variable privada llamada $dbname que se utiliza para almacenar 
el nombre de la base de datos. La variable se inicializa con un valor vacío.

4. private $user = "";: Esta línea declara una variable privada llamada $user que se utiliza para almacenar el 
nombre de usuario de la base de datos. La variable se inicializa con un valor vacío.

5. private $password = "";: Esta línea declara una variable privada llamada $password que se utiliza para almacenar 
la contraseña de la base de datos. La variable se inicializa con un valor vacío.

6. public static function getInstance() {... }: Esta línea declara un método estático llamado getInstance que se 
utiliza para obtener la instancia única de la clase Conexion.

7. if (self::$instance == null) {... }: Esta línea verifica si la variable estática $instance es null. Si es así, 
se crea una nueva instancia de la clase Conexion y se asigna a la variable $instance.

8. self::$instance = new Conexion();: Esta línea crea una nueva instancia de la clase Conexion y 
la asigna a la variable estática $instance.

9. return self::$instance;: Esta línea devuelve la instancia única de la clase Conexion.

10. public static function conexion() {... }: Esta línea declara un método estático llamado conexion que se 
utiliza para establecer la conexión con la base de datos.

11. try {... } catch(PDOException $e) {... }: Esta línea utiliza un bloque try-catch para capturar cualquier 
excepción que se produzca al intentar establecer la conexión con la base de datos.

12. $PDO = new PDO("mysql:host".$this->host.";dbname=".$this->dbname, $this->user, $this->password);: Esta línea 
crea una nueva instancia de la clase PDO y la utiliza para establecer la conexión con la base de datos. La cadena de 
conexión se construye utilizando las variables $host, $dbname, $user y $password.

13. retun $PDO;: Esta línea devuelve la instancia de PDO que se ha creado. Nota: Hay un error de sintaxis en esta 
línea, debería ser return en lugar de retun.

14. return $e->getMessage();: Esta línea devuelve el mensaje de error que se ha producido al intentar establecer la conexión 
con la base de datos.
*/
?>