const name1 = document.getElementById("name1");
const address = document.getElementById("SpecificAddress1");
const latitude = document.getElementById("Latitude1");
const longitude = document.getElementById("Longitude1");
const nob = document.getElementById("nob1");
const pco = document.getElementById("PCO1");

loadPage = () => {
  var loadData = new FormData();
  loadData.append("action", "loadPage");

  fetch("../../build/php/records1.php", {
    body: loadData,
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      var estabname = document.getElementById("name1");
      var defaultval = document.createElement("option");
      defaultval.value = 0;
      defaultval.text = "-- Please Select Name of Establishment --";
      estabname.add(defaultval);
      data.forEach((element) => {
        var newopt = document.createElement("option");
        newopt.value = element[0];
        newopt.text = element[7];
        estabname.add(newopt);
      });
    });
};

name1.onchange = () => {
  console.log(name1.value);
  if (name1.value == 0) {
    address.value = "";
  }

  var fetchData = new FormData();
  fetchData.append("action", "fetchData");
  fetchData.append("project_id", name1.value);

  fetch("../../build/php/records1.php", {
    body: fetchData,
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data == "none") {
        address.value = "";
        latitude.value = "";
        longitude.value = "";
        nob.value = "";
        // pco.value = "";
      } else {
        var specific_address =
          data.SpecificAddress +
          ", " +
          data.Municipality +
          ", " +
          data.Province;
        address.value = specific_address;
        latitude.value = data.Latitude;
        longitude.value = data.Longitude;
        nob.value = data.nob;
        // pco.value = data.PCOName;
        nob.dataset.nobid = data.ProjectSpecificSubtype;
      }
    });
};

$(document).ready(function () {
  loadPage();

  var dataRecords = $("#recordListing").DataTable({
    responsive: true,
    lengthChange: true,
    processing: true,
    lengthMenu: [10, 20, 50, 100, 200, 500],
    serverSide: true,
    processing: true,
    serverSide: true,
    autoWidth: true,
    ordering: true,
    info: true,
    pagingType: "first_last_numbers",
    serverMethod: "post",
    paging: true,
    order: [],
    ajax: {
      url: "../../build/php/ajax_action.php",
      type: "POST",
      data: { action: "listRecords" },
      dataType: "json",
    },
    columnDefs: [
      {
        width: "21%",
        targets: [1],
      },
      {
        width: "10%",
        targets: [0],
        orderable: false,
      },
      {
        width: "5%",
        targets: [4],
      },
    ],
    pageLength: 10,
  });

  $("#addRecord").click(function () {
    $("#recordModal").modal("show");
    $("#recordForm")[0].reset();
    $(".modal-title").html("<i class='fa fa-plus'></i> Add Record");
    $("#action").val("addRecord");
    $("#save").val("Add");
  });

  // update button
  $("#recordListing").on("click", ".update", function () {
    var id = $(this).attr("id");
    var action = "getRecord";
    $.ajax({
      url: "../../build/php/ajax_action.php",
      method: "POST",
      data: { id: id, action: action },
      dataType: "json",
      success: function (data) {
        $("#recordModal").modal("show");
        $("#id").val(data.id);
        $("#reportcontrol").val(data.Reportcontrol);
        $("#doi").val(data.DateofInspection);
        $("#missionorder").val(data.MissionOrder);
        $("#laws").val(data.Laws);
        $("#name").val(data.ProjectName);
        $("#SpecificAddress").val(
          data.SpecificAddress + ", " + data.Municipality + ", " + data.Province
        );
        $("#nob").val(data.NatureofBusiness);
        $("#PSICCode").val(data.PSIC);
        $("#Product").val(data.Product);
        $("#PCO").val(data.PCOName);
        $("#Latitude").val(data.Latitude);
        $("#Longitude").val(data.Longitude);
        $("#YearEstablished").val(data.YearEstablished);
        $("#MHead").val(data.ManagingHead);
        $("#PCOAccreditation").val(data.PCOAccreditation);
        $(".modal-title").html("<strong>Edit Report</strong>");
        $("#action").val("updateRecord");
        $("#save").val("Save");

        if (data.ReportRA8749 == "true") {
          document.getElementById("Air").checked = true;
        }
        if (data.ReportRA9275 == "true") {
          document.getElementById("Water").checked = true;
        }
        if (data.ReportPD1586 == "true") {
          document.getElementById("EIA").checked = true;
        }
        if (data.ReportRA6969 == "true") {
          document.getElementById("CHWMS").checked = true;
        }
        if (data.ReportRA9003 == "true") {
          document.getElementById("SolidWaste").checked = true;
        }
      },
    });
  });

  // open modal
  $("#searchBtn").click(function () {
    $("#searchModal").modal("show");
    $("#searchForm")[0].reset();
    $(".modal-title").html("<strong>Monitoring Report</strong>");
    $("#action1").val("createRecord");
    $("#save1").val("Add");
  });

  // submit search
  $("#searchModal").on("submit", "#searchForm", function (event) {
    event.preventDefault();
    $("#save1").attr("disabled", "disabled");
    var formData = $(this).serialize();

    $.ajax({
      url: "../../build/php/ajax_action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        $("#searchForm")[0].reset();
        $("#searchModal").modal("hide");
        $("#save1").attr("disabled", false);
        dataRecords.ajax.reload();
        Swal.fire({
          icon: "success",
          title: "Successfully Added!",
          showConfirmButton: true,
          timer: 500000,
        });
      },
    });
  });

  // submit modal
  $("#recordModal").on("submit", "#recordForm", function (event) {
    event.preventDefault();
    $("#save").attr("disabled", "disabled");
    var formData = $(this).serialize();
    $.ajax({
      url: "../../build/php/ajax_action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        $("#recordForm")[0].reset();
        $("#recordModal").modal("hide");
        $("#save").attr("disabled", false);
        dataRecords.ajax.reload();
        Swal.fire("Good job!", "Action Saved!", "success");
      },
    });
  });

  // Delete button
  $("#recordListing").on("click", ".delete", function () {
    var id = $(this).attr("id");
    var action = "deleteRecord";

    Swal.fire({
      title: "Are you sure?",
      text: "It will be deleted permanently!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
      showLoaderOnConfirm: true,

      preConfirm: function () {
        return new Promise(function () {
          $.ajax({
            url: "../../build/php/ajax_action.php",
            method: "POST",
            data: { id: id, action: action },
            success: function () {
              dataRecords.ajax.reload();
            },
          }).done(function (response) {
            Swal.fire({
              icon: "success",
              title: "Successfully Deleted!",
              showConfirmButton: true,
              timer: 500000,
            });
          });
        });
      },
      allowOutsideClick: false,
    });
  });

  // Export PDF button
  $("#recordListing").on("click", "#pdf", function () {
    Swal.fire({
      title: "Hello there!",
      text: "This feature is under maintenance. Thank you!",
      imageUrl: "/universe1/undermaintenance.png",
      imageWidth: 400,
      imageHeight: 400,
      imageAlt: "Custom image",
      customClass: "swal-wide",
      allowOutsideClick: false,
    });
  });

  $("#closebtn").click(function () {
    document.getElementById("recordForm").reset();
  });
});

function others() {
  otherspv = document.getElementById("otherspv");
  otherspv_text = document.getElementById("otherspv_text");

  if (otherspv.checked == true) {
    otherspv_text.style.display = "block";
  } else {
    otherspv_text.style.display = "none";
  }

  var others2 = document.getElementById("others2");
  var display2 = document.getElementById("display2");

  if (others2.checked == true) {
    display2.style.display = "block";
  } else {
    display2.style.display = "none";
  }
}
