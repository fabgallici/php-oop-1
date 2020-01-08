<?php
//completare il file todoToday.php in modo da stampare tutte le configurazioni presenti del DB, attraverso la programmazione OOP

header('Content-Type: application/json');
class Configurazione
{

  // variabili
  public $id;
  public $title;
  public $description;

  function __construct($id, $title = '', $description = '') {

    // valorizzazione variabili tramite parametri
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
  }

  //funzioni utili

  public function __toString()
  {
    return "[" . $this->id . "] "
      . $this->title . " - "
      . substr($this->description, 0, 5);
  }
}

// connessione al DB
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "hoteldb";

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_errno) {

  echo json_encode(-1);
  return;
}
// download di tutte le configurazioni
$sql = "

    SELECT id, title, description
    FROM configurazioni

  ";
$res = $conn->query($sql);
if ($res->num_rows < 1) {

  echo json_encode(-2);
  return;
}


$confs = [];
while ($conf = $res->fetch_assoc()) {

  $confs[] = new Configurazione(
    $conf['id'],
    $conf['title'],
    $conf['description']
  );
}

echo json_encode($confs);
// foreach ($conf as $confs) {

//   echo $conf;
// }
