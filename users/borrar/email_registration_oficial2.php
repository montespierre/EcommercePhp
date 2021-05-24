<?PHP
$hostname_localhost="localhost";
$database_localhost="libfio_8mm";
$username_localhost="moche";
$password_localhost="2322715";

$json=array();
 if(isset($_GET['user_name']) && isset($_GET['user_email']) && isset($_GET['user_password'])){
  $user_name = $_GET['user_name'];
  $user_email = $_GET['user_email'];
  $user_password = $_GET['user_password'];

  $conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

 
  
  
    
  $insert="INSERT INTO users(user_name, user_email, user_password, date_created) VALUES('$user_name', '$user_email', '$user_password', NOW())";
  
  
 
  if($conexion->query($insert)===TRUE){
   
   
   $resultado = $conexion->query("SELECT * FROM users");
   //$resultado=mysqli_query($conexion, $consulta);
  
   if($registro=mysqli_fetch_array($resultado)){
    $json['usuario'][]=$registro;
   }
   mysqli_close($conexion);
   echo json_encode($json);
   
  }else{
    $resulta["user_name"]="NO registra";
    $resulta["user_email"]="NO registra";
    $resulta["user_password"]="NO registra";
    $json['usuario'][]=$resulta;
    echo json_encode($json);
  }
 }else{
  $resulta["user_name"]="WS NO retorna";
  $resulta["user_email"]="WS NO retorna";
  $resulta["usuario"]="WS NO retorna";

  $json['usuario'][]=$resulta;
  echo json_encode($json);
 }
?>