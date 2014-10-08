<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Geography</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="src/img/favicon.png">
  <link rel="stylesheet" href="src/css/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <link rel="stylesheet" href="src/css/styles.css">
  <script src="src/js/jquery-2.1.1.min.js"></script>
  <script src="src/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="src/js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="src/js/bootstrap.min.js"></script>
  <script src="src/js/json.js"></script>
  <script src="src/js/all.js"></script>
</head>
<body>
  <div id="left_column">
    <div class="wrap">
      <div class="text-center">
        <h1 class="text-center">Geography</h1>
        <hr>
        <h3>Question <span id="count_q">1</span> of <span id="num_q">10</span></h3>
        <h3>Score <span id="score">0</span>/<span id="all_score">100</span></h3>
        <hr>
        <h3 id="question">Find, please, <u><b>Russia</b></u></h3>
        <button class="btn btn-large btn-success" id="confirm">Confirm</button>
        <button class="btn btn-large btn-primary none" id="next_q">Next</button>
        <button class="btn btn-large btn-info play_again none" id="playAgain">Play again</button>
        <button class="btn btn-large btn-warning" id="hint">Hint</button>
        <hr>
      </div>
      <div id="more-info" class="none">
        <h2 class="text-center">More information</h2>
        <div class="text-center"><button class="btn" id="open-video">Open video about this country</button></div>
        <div><br></div>
        <div id="loading" class="none"><small>Loading...</small></div>
        <div id="info-wiki"></div>
      </div>
    </div>
  </div>
  <div id="world-map"></div>

  <div class="alert hide" id="answer"></div>

  <div id="videoModal" class="modal hide fade modal-wide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Video</h3>
    </div>
    <div class="modal-body">
      <iframe width="720" height="405" src="" frameborder="0" id="youtube-video" allowfullscreen="true"></iframe>
    </div>
  </div>

  <div id="resultModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Your score</h3>
    </div>
    <div class="modal-body">
      <h2 id="res_score">0</h2>
    </div>
    <div class="modal-footer">
      <button class="btn btn-info play_again" data-dismiss="modal" aria-hidden="true">Play Again</button>
    </div>
  </div>

<!-- <script src="src/js/bootstrap-modal.js"></script> -->
</body>
</html>
