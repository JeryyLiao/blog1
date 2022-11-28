@extends('layouts.master')

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sprinkles Spiral</title>
  <link rel="stylesheet" href="{{ asset('spiral/style.css') }}">

</head>
<body>
  <!-- partial:index.partial.html -->
<canvas id="canvas"></canvas>
<!-- partial -->
@section('spiral')
  <script  src="{{ asset('spiral/script.js') }}"></script>
</body>
</html>
