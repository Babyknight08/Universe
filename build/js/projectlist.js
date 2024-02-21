//INITIALIZE TOAST NOTIFICATION PLUGIN
var Toast = Swal.mixin({
  toast: true,
  position: "top",
  showConfirmButton: false,
  timer: 3000,
});
//LOAD PROJECTS TABLE
$(function () {
  load_projects();
});
//LOAD PROJECTS TABLE FUNCTION (REUSABLE)
function load_projects() {
  dtable = $("#projects-table").DataTable({
    destroy: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    ajax: {
      url: "../../build/php/loadprojects_ajax.php",
      method: "POST",
    },
  });
}

var span_prompt = document.getElementById("span-prompt");
var upload_excel = document.getElementById("upload-excel");
var span_size = document.getElementById("span-size");
var upload_form = document.getElementById("form-upload");

upload_excel.addEventListener("change", function () {
  if (upload_excel.value.length == 0) {
    span_prompt.classList.remove("text-success");
    span_prompt.classList.add("text-danger");
    span_prompt.innerHTML = "No file selected";
    span_size.innerHTML = "0";
  } else {
    //var file_extension = upload_excel.files[0].name.substr(upload_excel.files[0].name.lastIndexOf('.')).toLowerCase()
    if (
      upload_excel.files[0].type !==
      "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
    ) {
      span_prompt.classList.remove("text-success");
      span_prompt.classList.add("text-danger");
      span_prompt.innerHTML = "Selected file is not supported!";
      span_size.innerHTML = "0";
      upload_excel.value = "";
    } else {
      span_prompt.classList.add("text-success");
      span_prompt.classList.remove("text-danger");
      span_prompt.innerHTML = upload_excel.files[0].name;
      span_size.innerHTML = (
        upload_excel.files[0].size /
        (1024 * 1024)
      ).toFixed(2);
    }
  }
});

upload_form.addEventListener("submit", function (event) {
  event.preventDefault();
  event.stopPropagation();
  var files = upload_excel.files;
  var file = files[0];
  if (file.length == 0) {
    alert("Please select a formatted xlsx file to import!");
    return false;
  }
  var overlay = document.getElementById("overlays");
  overlay.innerHTML = `<div class="overlay">
                            <i class="fas fa-2x fa-sync fa-spin"></i>
                        </div>`;
  var formData = new FormData();
  var files = upload_excel.files;
  var file = files[0];
  formData.append("fileAjax", file, file.name);
  var request = new XMLHttpRequest();
  request.open("POST", "../../build/php/import_ajax.php");
  request.onload = function () {
    var response = request.responseText;
    overlay.innerHTML = "";
    Toast.fire({
      icon: "success",
      title: file.name + " successfully imported!",
    });
    load_projects();
    $("#modal-import").modal("hide");
    span_prompt.classList.remove("text-success");
    span_prompt.classList.add("text-danger");
    span_prompt.innerHTML = "No file selected";
    span_size.innerHTML = "0";
    upload_excel.value = "";
  };
  request.send(formData);
});

function projectLink(event) {
  localStorage.setItem("projectid", event.getAttribute("data-id"));
  localStorage.setItem("projectfkey", event.getAttribute("data-fkey"));
  window.location.href = "industryprofile.php";
}

function updateProj(event) {
  localStorage.setItem("projectid", event.getAttribute("data-id"));
  window.location.href = "updateproject.php";
}

const dataDel = {
  id: 0,
  pname: "",
  fkey: "",
};
$("#modal-delete").on("show.bs.modal", function (event) {
  var clickedButton = $(event.relatedTarget);
  var id = clickedButton.data("id");
  var pname = clickedButton.data("pname");
  dataDel.id = id;
  dataDel.pname = pname;
  dataDel.fkey = clickedButton.data("fkey");
  document.getElementById("modal-delete-prompt").innerHTML =
    "Are you sure you want to delete <b>" +
    pname +
    "</b> and all its related files?";
  // console.log(pname)
});

const button_delete = document.getElementById("button-delete");
button_delete.addEventListener("click", function () {
  button_delete.innerHTML = "Deleting . . .";
  button_delete.disabled = true;
  var request = new XMLHttpRequest();
  request.open("POST", "../../build/php/delete_firm.php");
  request.setRequestHeader("Content-Type", "application/json");
  request.onload = function () {
    var response = JSON.parse(request.responseText);
    if (response.message == "success") {
      button_delete.innerHTML = "Confirm Delete";
      button_delete.disabled = false;
      load_projects();
      $("#modal-delete").modal("toggle");
    } else {
      button_delete.innerHTML = "Confirm Delete";
      button_delete.disabled = false;
      var prompt = document.getElementById("modal-delete-prompt");
      prompt.innerHTML = response.message;
      prompt.style.display = "block";
      setTimeout(function () {
        $("#modal-delete-prompt").fadeOut(1500);
      }, 3000);
    }
  };
  request.send(JSON.stringify(dataDel));
});
