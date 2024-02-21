var eiastate = "add";

var datemonitored = document.getElementById("monitored-date-eia");
var eia_file = document.getElementById("eia-file");
var span_filename = document.getElementById("attachment-name-eia");
var span_filesize = document.getElementById("attachment-size-eia");
var reset_button_eia = document.getElementById("button-reset-eia");

load_eia();

function load_eia() {
  dtable = $("#eia-table").DataTable({
    destroy: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    ajax: {
      url: "../../build/php/loadeia_ajax.php",
      method: "POST",
      data: { id: projectid },
    },
  });
}

eia_file.addEventListener("change", function () {
  if (eia_file.value.length == 0) {
    span_filename.innerHTML = "No File Selected";
    span_filesize.innerHTML = "0MB";
  } else {
    if (eia_file.files[0].type !== "application/pdf") {
      span_filename.innerHTML = "Please Upload a PDF File!";
      span_filesize.innerHTML = "0MB";
      eia_file.value = "";
    } else {
      span_filename.innerHTML = eia_file.files[0].name;
      span_filesize.innerHTML =
        (eia_file.files[0].size / (1024 * 1024)).toFixed(2) + "MB";
    }
  }
});

var eia_form = document.getElementById("eia-form");
eia_form.addEventListener("submit", function (event) {
  event.preventDefault();
  event.stopPropagation();

  if (eiastate == "add") {
    var data = new FormData();
    data.append("projectid", projectid);
    data.append("datemonitored", datemonitored.value);
    data.append("eiafile", eia_file.files[0]);
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/eia_add.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Record Added!",
        });
        eia_form.reset();
        span_filename.innerHTML = "No File Selected!";
        span_filesize.innerHTML = "0MB";
        eia_file.value = "";
        load_eia();
      } else {
        Toast.fire({
          icon: "error",
          title: request.responseText,
        });
      }
    };
    request.send(data);
  } else if (eiastate == "update") {
    var formdata = new FormData();
    formdata.append("id", eiaupdateid);
    formdata.append("datemonitored", datemonitored.value);
    formdata.append("eiafile", eia_file.files[0]);
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/eiaupdate.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Update Success!",
        });
        eiastate = "add";
        span_filename.innerHTML = "No File Selected";
        span_filesize.innerHTML = "0MB";
        eia_file.required = true;
        eia_form.reset();
        load_eia();
      }
    };
    request.send(formdata);
  }
});

$("#modal-delete-eia").on("show.bs.modal", function (event) {
  var cbutton = event.relatedTarget;
  var cbuttonID = cbutton.getAttribute("data-id");
  var data = {
    event_type: "delete",
    id: cbuttonID,
  };
  $("#button-delete-eia").click(function () {
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/eiafunctions.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.onload = function () {
      var response = JSON.parse(request.responseText);
      if (response.message == "success") {
        $("#button-dismiss-eia").trigger("click");
        Toast.fire({
          icon: "success",
          title: " Record deleted!",
        });
        load_eia();
        eia_form.reset();
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

var eiaupdateid = "";
function updateEIA(event) {
  eiastate = "update";
  eia_file.required = false;
  eiaupdateid = event.getAttribute("data-id");
  var data = {
    event_type: "load",
    id: eiaupdateid,
  };
  var request = new XMLHttpRequest();
  request.open("POST", "../../build/php/eiafunctions.php");
  request.setRequestHeader("Content-Type", "application/json");
  request.onload = function () {
    var response = JSON.parse(request.responseText);
    console.log(response);
    if (response.message == "success") {
      datemonitored.value = response.datemonitored;
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

reset_button_eia.addEventListener("click", function () {
  eiastate = "add";
  span_filename.innerHTML = "No File Selected";
  span_filesize.innerHTML = "0MB";
  eia_file.required = true;
  Toast.fire({
    icon: "warning",
    title: " Add Mode",
  });
});
