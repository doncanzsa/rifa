<?php
class conexion
{
    // Variables de conexion al servidor
    private $host;
    private $driver;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function __construct(){
        $db_cfg = require 'db_config.php';
        $this->driver = $db_cfg["driver"];
        $this->host = $db_cfg["host"];
        $this->db = $db_cfg["db"];
        $this->user = $db_cfg["user"];
        $this->pass = $db_cfg["pass"];
        $this->charset = $db_cfg["charset"];
    }

# Para establecer la conexion

  public function conectar()
  {
    $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
    mysqli_select_db($initial_params, $this->db);
  }

# Para ejecutar las Consultas
 public function mantto($consulta, $sendId=0)
 {
    $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
    mysqli_select_db($initial_params, $this->db);
    $resultado=mysqli_query($initial_params, $consulta);
    if(!$resultado)
    {
      echo "Hubo un Error: " . mysqli_error($initial_params);
      exit;
    }
    if($sendId==1)
    {
      return mysqli_insert_id($initial_params);
    }
    else
    {
      return $resultado;
    }
 }

 public function afectadas()
 {
    $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
    mysqli_select_db($initial_params, $this->db);
   return mysqli_affected_rows($initial_params);
 }

 public function consulta($sql){
    $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
    mysqli_select_db($initial_params, $this->db);

    $resultado=mysqli_query($initial_params, $sql);
    if(!$resultado){
      echo "Hubo un Errror:".mysqli_error($initial_params);
        exit;
    }
    return $resultado;
  }

    public function obtnerFila($consulta){
        $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
        mysqli_select_db($initial_params, $this->db);

      return mysqli_fetch_array($initial_params, $consulta);

    }

    public function conteoFilas($consulta){
        $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
        mysqli_select_db($initial_params, $this->db);

      return mysqli_num_rows($consulta);
    }

# Para ejecutar el fetch array
public function arreglo($consulta)
{
    $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
    mysqli_select_db($initial_params, $this->db);

	return mysqli_fetch_array($consulta);
}

# Para el conteo de registros
public function conteo($consulta)
{
    $initial_params = mysqli_connect($this->host,$this->user,$this->pass);
    mysqli_select_db($initial_params, $this->db);

	return mysqli_num_rows($consulta);
}
}
?>
