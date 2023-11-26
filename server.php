<?php
$todos_json = file_get_contents('./todos.json');
$todos = json_decode($todos_json, true);

header('Content-Type: application/json');

$response = [
  'success' => true,
  'results' => $todos,
];

echo json_encode($response);