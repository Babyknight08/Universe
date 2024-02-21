var eccstate = "add";

var datemonitored = document.getElementById("monitored-date-ecc");
var ecc_file = document.getElementById("ecc-file");
var eccremarks = document.getElementById("eccremarks");
var span_filename = document.getElementById("attachment-name-ecc");
var span_filesize = document.getElementById("attachment-size-ecc");
var reset_button_ecc = document.getElementById("button-reset-ecc");

load_ecc();

function load_ecc() {
  dtable = $("#ecc-table").DataTable({
    destroy: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    ajax: {
      url: "../../build/php/loadecc_ajax.php",
      method: "POST",
      data: { id: projectid },
    },
  });
}

ecc_file.addEventListener("change", function () {
  if (ecc_file.value.length == 0) {
    span_filename.innerHTML = "No File Selected";
    span_filesize.innerHTML = "0MB";
  } else {
    if (ecc_file.files[0].type !== "application/pdf") {
      span_filename.innerHTML = "Please Upload a PDF File!";
      span_filesize.innerHTML = "0MB";
      ecc_file.value = "";
    } else {
      span_filename.innerHTML = ecc_file.files[0].name;
      span_filesize.innerHTML =
        (ecc_file.files[0].size / (1024 * 1024)).toFixed(2) + "MB";
    }
  }
});

var ecc_form = document.getElementById("ecc-form");
ecc_form.addEventListener("submit", function (event) {
  event.preventDefault();
  event.stopPropagation();

  if (eccstate == "add") {
    var data = new FormData();
    data.append("projectid", projectid);
    data.append("datemonitored", datemonitored.value);
    data.append("eccremarks", eccremarks.value);
    data.append("eccfile", ecc_file.files[0]);
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/ecc_add.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Record Added!",
        });
        ecc_form.reset();
        span_filename.innerHTML = "No File Selected!";
        span_filesize.innerHTML = "0MB";
        ecc_file.value = "";
        load_ecc();
      } else {
        Toast.fire({
          icon: "error",
          title: request.responseText,
        });
      }
    };
    request.send(data);
  } else if (eccstate == "update") {
    var formdata = new FormData();
    formdata.append("id", eccupdateid);
    formdata.append("datemonitored", datemonitored.value);
    formdata.append("eccremarks", eccremarks.value);
    formdata.append("eccfile", ecc_file.files[0]);
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/eccupdate.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Update Success!",
        });
        eccstate = "add";
        span_filename.innerHTML = "No File Selected";
        span_filesize.innerHTML = "0MB";
        ecc_file.required = true;
        ecc_form.reset();
        load_ecc();
      }
    };
    request.send(formdata);
  }
});

$("#modal-delete-ecc").on("show.bs.modal", function (event) {
  var cbutton = event.relatedTarget;
  var cbuttonID = cbutton.getAttribute("data-id");
  var data = {
    event_type: "delete",
    id: cbuttonID,
  };
  $("#button-delete-ecc").click(function () {
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/eccfunctions.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.onload = function () {
      var response = JSON.parse(request.responseText);
      if (response.message == "success") {
        $("#button-dismiss-ecc").trigger("click");
        Toast.fire({
          icon: "success",
          title: " Record deleted!",
        });
        load_ecc();
        ecc_form.reset();
        span_filename.innerHTML = "No File Selected!";
        span_filesize.innerHTML = "0MB";
      } else {
        Toast.fire({
          icon: "error",
          title: response.message,
        });
      }
    };
    request.send(JSON.stringify(data));
  });
});

var eccupdateid = "";
function updateecc(event) {
  eccstate = "update";
  ecc_file.required = false;
  eccupdateid = event.getAttribute("data-id");
  var data = {
    event_type: "load",
    id: eccupdateid,
  };
  var request = new XMLHttpRequest();
  request.open("POST", "../../build/php/eccfunctions.php");
  request.setRequestHeader("Content-Type", "application/json");
  request.onload = function () {
    var response = JSON.parse(request.responseText);
    console.log(response);
    if (response.message == "success") {
      datemonitored.value = response.datemonitored;
      eccremarks.value = response.eccremarks;
      Toast.fire({
        icon: "warning",
        title: " Edit Mode",
      });
    } else {
      Toast.fire({
        icon: "error",
        title: response.message,
      });
    }
  };
  request.send(JSON.stringify(data));
}

reset_button_ecc.addEventListener("click", function () {
  eccstate = "add";
  span_filename.innerHTML = "No File Selected";
  span_filesize.innerHTML = "0MB";
  ecc_file.required = true;
  Toast.fire({
    icon: "warning",
    title: " Add Mode",
  });
});
