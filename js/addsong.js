$(function() {
  showLyrics(data);
  // event listener
  $("#btnSend").click(function() {});
  $("#btnAdd").click(function() {
    var time = gettime($("#ti").val());
    data.lyrics.forEach(e => {
      if ((e.time != time && time != "") || e) {
        $("#ti").val(time);
        $("#song").submit();
      } else {
        alert("đoạn đó đã có lời, vui lòng sửa lại");
      }
    });
  });
  $(".btnDel").click(function() {
    var time = $(".btnDel").attr("id");
    $.ajax({
      type: "POST",
      url: "",
      data: { method: "del", data: time },
      dataType: "JSON",
      success: function(res) {
        alert(res);
        location.reload();
      }
    });
  });
});
function showLyrics(data) {
  data.lyrics.forEach(e => {
    var show =
      "<tr><td>" +
      e.time +
      "</td><td>" +
      e.line +
      '</td><td><input class="btn btn-mini btnDel" id="' +
      e.time +
      '" type="button" value="Xóa"><input class="btn btn-mini btnUp"  style="float: right" id="' +
      e.time +
      '" value="Sửa" type="button"></td></tr >';
    $("tbody").append(show);
  });
}
function gettime(time) {
  var check = true;
  var ti = time.split(":");
  ti.forEach(e => {
    var ele = parseInt(e);
    if (!Number.isInteger(ele)) {
      check = false;
    }
  });
  if (check) {
    var result;
    if (ti.length == 1) {
      result = parseInt(ti[0]);
    }
    if (ti.length == 2) {
      result = parseInt(ti[1]) * 60 + parseInt(ti[0]);
    }
    if (ti.length == 3) {
      result = parseInt(ti[0]) + parseInt(ti[1]) * 60 + parseInt(ti[2]) * 360;
    }
    return result * 1000;
  } else {
    console.log("nhập số đi!");
  }
}
