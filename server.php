<?php
$todos_json = file_get_contents('./todos.json');    // importiamo l'array dal file todos.json
$todos = json_decode($todos_json, true);    // trasformiamo l'array da linguaggio JSON a PHP

$response = [                               // creare un array con due valori
  'success' => true,                  // aggiungiamo il valore success all'array    
  'results' => $todos,                // assegnare a results il valore dell'array decodificato importato da todos.json
];

header('Content-Type: application/json');   // impostiamo l'header da fare prima di qualsiasi output della pagina
echo json_encode($response);          // convertiamo l'array da formato PHP a formato JSON