<?php

require __DIR__.'/../lib/function.php';

$dataList = fetchAll();

if (!$dataList) {
  error404();
}

$questions = [];
foreach ($dataList as $data) {
  # code...
  $questions[] = generateFormattedData($data);
}

$assignData = [
  'questions' => $questions,
];

loadTemplate('index', $assignData);
