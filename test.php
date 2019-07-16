<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Dynamic Tabs</h2>
  <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#mesy">Mesyuarat</a></li>
    <li><a data-toggle="tab" href="#lain">Lain-lain</a></li>
  </ul>

  <div class="tab-content">
    <div id="mesy" class="tab-pane fade in active">
      <h3>Mesyuarat</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="lain" class="tab-pane fade">
      <h3>Lain-lain</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<hr>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="profil.php/contentA">Section A</a></li>
    <li><a data-toggle="tab" href="profil.php/contentB">Section B</a></li>
</ul>

<div class="tab-content">
    <div id="sectionA" class="tab-pane fade in active">
        <p>Section A content…</p>
    </div>
    <div id="sectionB" class="tab-pane fade">
        <p>Section B content…</p>
    </div>
</div>


</body>
</html>

