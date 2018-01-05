<?PHP

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'id3647831_root');
define('DB_SERVER_PASSWORD', '789123');
define('DB_DATABASE', 'id3647831_sistema');

$con = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysqli_select_db( $con,DB_DATABASE);

?>