var label_project = document.getElementById("label-projectname");
var label_refno = document.getElementById("label-referenceno");
var label_eccstatus = document.getElementById("label-eccstatus");
var label_dateapproved = document.getElementById("label-dateapproved");
var label_proponent = document.getElementById("label-proponent");
var label_ptype = document.getElementById("label-ptype");
var label_psubtype = document.getElementById("label-psubtype");
var label_projectstype = document.getElementById("label-projectstype");
var label_pssubtype = document.getElementById("label-pssubtype");
var label_address = document.getElementById("label-address");
var label_geocoordinates = document.getElementById("label-geocoordinates");
var label_laws = document.getElementById("label-laws");
var label_cmr = document.getElementById("label-cmr");

var cmr_req_check = document.getElementById("cmr-req-check");

var laws_arr = [];

document.addEventListener("DOMContentLoaded", function () {
  var xhrData = {
    projectid: projectid,
  };
  var xhrReq = new XMLHttpRequest();
  xhrReq.open("POST", "../../build/php/load_industryprofile.php");
  xhrReq.setRequestHeader("Content-Type", "application/json");
  xhrReq.onload = function () {
    var xhrRes = JSON.parse(xhrReq.responseText);
    if (xhrRes.RA8749 == "true") {
      laws_arr.splice(0, 0, "RA8749");
    }
    if (xhrRes.RA9275 == "true") {
      laws_arr.splice(0, 0, "RA9275");
    }
    if (xhrRes.RA6969 == "true") {
      laws_arr.splice(0, 0, "RA6969");
    }
    label_project.innerHTML = xhrRes.projectname;
    label_refno.innerHTML = xhrRes.refno;
    label_eccstatus.innerHTML = xhrRes.eccstatus;
    label_dateapproved.innerHTML = xhrRes.dateapproved;
    label_proponent.innerHTML = xhrRes.proponent;
    label_ptype.innerHTML = xhrRes.projecttype;
    label_psubtype.innerHTML = xhrRes.projectsubtype;
    label_projectstype.innerHTML = xhrRes.projectspecifictype;
    label_pssubtype.innerHTML = xhrRes.projectspecificsubtype;
    label_address.innerHTML = xhrRes.address;
    label_geocoordinates.innerHTML = xhrRes.latitude + ", " + xhrRes.longitude;
    label_laws.innerHTML = "";
    laws_arr.forEach(function (law, index) {
      if (index == 0) {
        label_laws.innerHTML = law;
      } else {
        label_laws.innerHTML += ", " + law;
      }
    });
    // IF CMR IS REQUIRED OR NOT
    if (xhrRes.CMR == "true") {
      label_cmr.innerHTML = "YES";
      // enable all form elements
      var allElem = document.querySelectorAll(
        "#cmr-div select, #cmr-div input, #cmr-div button, #cmr-div a"
      );
      for (let element of allElem) {
        element.disabled = false;
      }
      cmr_req_check.checked = true;
    } else {
      label_cmr.innerHTML = "NO";
      // disable all form elements
      var allElem = document.querySelectorAll(
        "#cmr-div select, #cmr-div input, #cmr-div button, #cmr-div a"
      );
      for (let element of allElem) {
        element.disabled = true;
      }
      cmr_req_check.checked = false;
    }
  };
  xhrReq.send(JSON.stringify(xhrData));
});

cmr_req_check.onclick = function () {
  var cmrcheck = this.checked;
  var data = {
    projectid: projectid,
    cmrcheck: cmrcheck,
  };
  fetch("../../build/php/require_cmr.php", {
    method: "POST",
    headers: {
      Accept: "application/json, text/plain, */*",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((res) => res.json())
    .then((res) => {
      if (res.message == "invalid") {
        cmr_req_check.checked = false;
        $("#modal-cmr").modal("toggle");
        return false;
      } else {
        var allElem = document.querySelectorAll(
          "#cmr-div select, #cmr-div input, #cmr-div button, #cmr-div a"
        );
        if (cmrcheck == true) {
          label_cmr.innerHTML = "YES";
          for (let element of allElem) {
            element.disabled = false;
          }
        }
        if (cmrcheck == false) {
          label_cmr.innerHTML = "NO";
          for (let element of allElem) {
            element.disabled = true;
          }
        }
      }
    });
};
