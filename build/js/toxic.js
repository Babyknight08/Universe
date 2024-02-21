var hazstate = "add";

var haz_datemonitored = document.getElementById("monitored-date-haz");
var haz_file = document.getElementById("haz-file");
var haz_select = document.getElementById("haz-monitoring-select");
var haz_filename = document.getElementById("attachment-name-haz");
var haz_filesize = document.getElementById("attachment-size-haz");
var reset_button_haz = document.getElementById("button-reset-haz");
var haz_form = document.getElementById("haz-form");

load_toxic();
load_hazwaste();

function load_toxic() {
  //load air table
  dtable = $("#toxic-table").DataTable({
    destroy: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    ajax: {
      url: "../../build/php/loadhaz_ajax.php",
      method: "POST",
      data: {
        id: projectid,
        law: "toxic",
      },
    },
  });
}

function load_hazwaste() {
  //load air table
  dtable = $("#hazwaste-table").DataTable({
    destroy: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    ajax: {
      url: "../../build/php/loadhaz_ajax.php",
      method: "POST",
      data: {
        id: projectid,
        law: "hazwaste",
      },
    },
  });
}

haz_file.addEventListener("change", function () {
  if (haz_file.value.length == 0) {
    haz_filename.innerHTML = "No File Selected";
    haz_filesize.innerHTML = "0MB";
  } else {
    if (haz_file.files[0].type !== "application/pdf") {
      haz_filename.innerHTML = "Please Upload a PDF File!";
      haz_filesize.innerHTML = "0MB";
      haz_file.value = "";
    } else {
      haz_filename.innerHTML = haz_file.files[0].name;
      haz_filesize.innerHTML =
        (haz_file.files[0].size / (1024 * 1024)).toFixed(2) + "MB";
    }
  }
});

haz_form.addEventListener("submit", function (event) {
  event.preventDefault();
  event.stopPropagation();

  if (hazstate == "add") {
    var data = new FormData();
    data.append("projectid", projectid);
    data.append("event_type", haz_select.value);
    data.append("datemonitored", haz_datemonitored.value);
    data.append("hazfile", haz_file.files[0]);

    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/haz_add.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Record Added!",
        });
        haz_form.reset();
        haz_filename.innerHTML = "No File Selected!";
        haz_filesize.innerHTML = "0MB";
        haz_file.value = "";
        load_toxic();
        load_hazwaste();
      } else {
        Toast.fire({
          icon: "error",
          title: request.responseText,
        });
      }
    };
    request.send(data);
  } else if (hazstate == "update") {
    var formdata = new FormData();
    formdata.append("id", hazupdateid);
    formdata.append("law", haz_select.value);
    formdata.append("datemonitored", haz_datemonitored.value);
    formdata.append("hazfile", haz_file.files[0]);
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/hazupdate.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Update Success!",
        });
        hazstate = "add";
        haz_select.disabled = false;
        haz_filename.innerHTML = "No File Selected";
        haz_filesize.innerHTML = "0MB";
        haz_file.required = true;
        haz_form.reset();
        load_toxic();
        load_hazwaste();
      }
    };
    request.send(formdata);
  }
});

$("#modal-delete-haz").on("show.bs.modal", function (event) {
  var cbutton = event.relatedTarget;
  var cbuttonID = cbutton.getAttribute("data-id");
  var cbuttonLaw = cbutton.getAttribute("data-law");
  var data = {
    event_type: "delete",
    id: cbuttonID,
    law: cbuttonLaw,
  };
  $("#button-delete-haz").click(function () {
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/hazfunctions.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.onload = function () {
      var response = JSON.parse(request.responseText);
      if (response.message == "success") {
        $("#button-dismiss-haz").trigger("click");
        Toast.fire({
          icon: "success",
          title: " Record deleted!",
        });
        load_toxic();
        load_hazwaste();
        haz_form.reset();
        haz_filename.innerHTML = "No File Selected!";
        haz_filesize.innerHTML = "0MB";
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

var hazupdateid = "";
function updateHAZ(event) {
  hazstate = "update";
  haz_file.required = false;
  hazupdateid = event.getAttribute("data-id");
  var data = {
    event_type: "load",
    id: hazupdateid,
    law: event.getAttribute("data-law"),
  };
  var request = new XMLHttpRequest();
  request.open("POST", "../../build/php/hazfunctions.php");
  request.setRequestHeader("Content-Type", "application/json");
  request.onload = function () {
    var response = JSON.parse(request.responseText);
    if (response.message == "success") {
      $("#haz-monitoring-select").val(response.law).trigger("change");
      haz_select.disabled = true;
      haz_datemonitored.value = response.datemonitored;
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

reset_button_haz.addEventListener("click", function () {
  hazstate = "add";
  haz_select.disabled = false;
  haz_form.reset();
  $("#haz-monitoring-select").val("toxic").trigger("change");
  haz_filename.innerHTML = "No File Selected";
  haz_filesize.innerHTML = "0MB";
  haz_file.required = true;
  Toast.fire({
    icon: "warning",
    title: " Add Mode",
  });
});
