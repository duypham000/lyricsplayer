<?php 
session_start();
$song = $_SESSION['song'];  
if (isset($_POST)) {
    if (isset($_POST['time'])&&isset($_POST['text'])) {
        $lyric = [
            "line" => $_POST['text'],
            "time" => $_POST['time']
        ];
        array_push($_SESSION[$song]["lyrics"], $lyric);
    }
    if (isset($_POST["method"])) {
        if ($_POST["method"] == "del") {
            $time = $_POST['data'];
            for ($i=0; $i < count($_SESSION[$song]["lyrics"]); $i++) {
                if ($time == $_SESSION[$song]["lyrics"][$i]["time"]) {
                    array_splice($_SESSION[$song]["lyrics"], $i, 1);
                    echo "deleted";
                } 
            }
        }
        if ($_POST['method']=="up") {
            $time = $_POST['data'];
            for ($i=0; $i < count($_SESSION[$song]["lyrics"]); $i++) { 
                if ($_SESSION[$song]["lyrics"][$i]["time"] == $time) {
                    $_SESSION[$song]["lyrics"][$i]["time"] = $_POST["newtime"];
                    $_SESSION[$song]["lyrics"][$i]["line"] = $_POST["newlyric"];
                    echo "updated";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $song ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/addsong.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./js/addsong.js"></script>
</head>
<body>
    <form action="" method="post" id="song">
    <div class="lyrics">
        <h1><?php echo $song ?></h1>
    <div class="textbox time">
        <input type="text" id="ti" placeholder="h:m:s" name="time">
    </div>
    <div class="textbox">
        <input type="text" class="text" id="text" placeholder="lyric" name="text">
    </div>
        <input type="button" class="btn" value="Add" id="btnAdd">
        <input type="button" class="btn" value="Send" id="btnSend">
    </div>
    <div class="lyrics" id="lyrics">
     <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Time</th>
          <th>Lyric</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
      </tbody>
    </table>
  </div>
</section>
    </div>
    </form>
    <script>
    var data = <?php echo json_encode($_SESSION[$song]) ?>;
    </script>
</body>
</html>