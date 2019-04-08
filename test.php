    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
$.ajax({
      type: "POST",
      url: "",
      data: { "method": "del", data: 23000 },
      dataType: "JSON",
      success: function(res) {
        alert(res);
        location.reload();
      }
    });
</script>
<?php
session_start();
$song = 'demo';
var_dump($_SESSION[$song]["lyrics"]);
var_dump($_POST["method"]);
?>