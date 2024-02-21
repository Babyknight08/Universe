var awsstate = "add";

var aws_datemonitored = document.getElementById("monitored-date-aws");
var aws_file = document.getElementById("aws-file");
var aws_select = document.getElementById("aws-monitoring-select");
var aws_filename = document.getElementById("attachment-name-aws");
var aws_filesize = document.getElementById("attachment-size-aws");
var reset_button_aws = document.getElementById("button-reset-aws");
var aws_form = document.getElementById("aws-form");

load_air();
load_water();

function load_air() {
  //load air table
  dtable = $("#air-table").DataTable({
    destroy: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    ajax: {
      url: "../../build/php/loadaws_ajax.php",
      method: "POST",
      data: {
        id: projectid,
        law: "air",
      },
    },
  });
}

function load_water() {
  //load air table
  dtable = $("#water-table").DataTable({
    destroy: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    ajax: {
      url: "../../build/php/loadaws_ajax.php",
      method: "POST",
      data: {
        id: projectid,
        law: "water",
      },
    },
  });
}

aws_file.addEventListener("change", function () {
  if (aws_file.value.length == 0) {
    aws_filename.innerHTML = "No File Selected";
    aws_filesize.innerHTML = "0MB";
  } else {
    if (aws_file.files[0].type !== "application/pdf") {
      aws_filename.innerHTML = "Please Upload a PDF File!";
      aws_filesize.innerHTML = "0MB";
      aws_file.value = "";
    } else {
      aws_filename.innerHTML = aws_file.files[0].name;
      aws_filesize.innerHTML =
        (aws_file.files[0].size / (1024 * 1024)).toFixed(2) + "MB";
    }
  }
});

aws_form.addEventListener("submit", function (event) {
  event.preventDefault();
  event.stopPropagation();

  if (awsstate == "add") {
    var data = new FormData();
    data.append("projectid", projectid);
    data.append("event_type", aws_select.value);
    data.append("datemonitored", aws_datemonitored.value);
    data.append("awsfile", aws_file.files[0]);

    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/aws_add.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Record Added!",
        });
        aws_form.reset();
        aws_filename.innerHTML = "No File Selected!";
        aws_filesize.innerHTML = "0MB";
        aws_file.value = "";
        var aws_select = $("#aws-monitoring-select");
        aws_select.val("air").trigger("change");
        load_air();
        load_water();
      } else {
        Toast.fire({
          icon: "error",
          title: request.responseText,
        });
      }
    };
    request.send(data);
  } else if (awsstate == "update") {
    var formdata = new FormData();
    formdata.append("id", awsupdateid);
    formdata.append("law", aws_select.value);
    formdata.append("datemonitored", aws_datemonitored.value);
    formdata.append("awsfile", aws_file.files[0]);
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/awsupdate.php");
    request.onload = function () {
      if (request.responseText == "success") {
        Toast.fire({
          icon: "success",
          title: " Update Success!",
        });
        awsstate = "add";
        aws_select.disabled = false;
        aws_filename.innerHTML = "No File Selected";
        aws_filesize.innerHTML = "0MB";
        aws_file.required = true;
        aws_form.reset();
        load_air();
        load_water();
      }
    };
    request.send(formdata);
  }
});

$("#modal-delete-aws").on("show.bs.modal", function (event) {
  var cbutton = event.relatedTarget;
  var cbuttonID = cbutton.getAttribute("data-id");
  var cbuttonLaw = cbutton.getAttribute("data-law");
  var data = {
    event_type: "delete",
    id: cbuttonID,
    law: cbuttonLaw,
  };
  $("#button-delete-aws").click(function () {
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/awsfunctions.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.onload = function () {
      var response = JSON.parse(request.responseText);
      if (response.message == "success") {
        $("#button-dismiss-aws").trigger("click");
        Toast.fire({
          icon: "success",
          title: " Record deleted!",
        });
        load_air();
        load_water();
        aws_form.reset();
        aws_filename.innerHTML = "No File Selected!";
        aws_filesize.innerHTML = "0MB";
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

var awsupdateid = "";
function updateAWS(event) {
  awsstate = "update";
  aws_file.required = false;
  awsupdateid = event.getAttribute("data-id");
  var data = {
    event_type: "load",
    id: awsupdateid,
    law: event.getAttribute("data-law"),
  };
  var request = new XMLHttpRequest();
  request.open("POST", "../../build/php/awsfunctions.php");
  request.setRequestHeader("Content-Type", "application/json");
  request.onload = function () {
    var response = JSON.parse(request.responseText);
    if (response.message == "success") {
      $("#aws-monitoring-select").val(response.law).trigger("change");
      aws_select.disabled = true;
      aws_datemonitored.value = response.datemonitored;
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

reset_button_aws.addEventListener("click", function () {
  awsstate = "add";
  aws_select.disabled = false;
  aws_form.reset();
  $("#aws-monitoring-select").val("air").trigger("change");
  aws_filename.innerHTML = "No File Selected";
  aws_filesize.innerHTML = "0MB";
  aws_file.required = true;
  Toast.fire({
    icon: "warning",
    title: " Add Mode",
  });
});
