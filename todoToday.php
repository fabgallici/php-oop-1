<?php
//completare il file todoToday.php in modo da stampare tutte le configurazioni presenti del DB, attraverso la programmazione OOP
class Configurazione
{

  // variabili

  function __construct(/* parametri*/)
  {

    // valorizzazione variabili tramite parametri
  }

  //funzioni utili

  public function __toString()
  {

    return /* rappresentazione testuale dell'oggetto */;
  }
}

// connessione al DB

// download di tutte le configurazioni

$confs = [];
while ($conf = $res->fech_assoc()) {

  $confs[] = new Configurazione(
    $conf['id'],
    $conf['title'],
    $conf['description']
  );
}

foreach ($conf as $confs) {

  echo $conf;
}
