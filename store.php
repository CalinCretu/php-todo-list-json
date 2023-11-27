<?php // file creato per gestire i dati inviati dal client
// recuperare il parametro tramite $_POST dal file js
$new_todo = $_POST['todo'] ?? '';
// questa todo dobbiamo pusharla nel nostro array
$todo = [
  'text' => $new_todo,
  'done' => false
];
$response = [
  'success' => true,
  'results' => $todo
];

if ($new_todo) {
  // leggere il contenuto del file json
  $todos_string = file_get_contents('./todos.json');

  // decodificare il file json per ottenere un array di todos
  $todos = json_decode($todos_string, true);

  //pushare la nuova todo nell'array

  $todos[] = $todo;

  $response['results'] = $todos;

  // risalvare il file
  // - codificare la stringa json dall'array di todos

  $todos_string = json_encode($todos);

  // - salvare il file con il nuovo contenuto

  file_put_contents('./todos.json', $todos_string);
} else {
  $response['success'] = false;
  $response['message'] = 'Valore non valido';
};

header('Content-Type: application/json');
echo json_encode($response);

//dare una response in formato json