//------FOR CATEGORIES VARIABLE
var projecttype = document.getElementById("ptype-select");
var projectsubtype = document.getElementById("psubtype-select");
var projectspecifictype = document.getElementById("pstype-select");
var projectspecificsubtype = document.getElementById("pssubtype-select");
//------FOR CHECKBOXES
var peisscheck = document.getElementById("peiss-check");
var permitcheck = document.getElementById("permit-check");
var provincecheck = document.getElementById("province-check");
var statuscheck = document.getElementById("status-check");
var ptypecheck = document.getElementById("ptype-check");
var psubtypecheck = document.getElementById("psubtype-check");
var pstypecheck = document.getElementById("pstype-check");
var pssubtypecheck = document.getElementById("pssubtype-check");
var check_cmr = document.getElementById("check-cmr");
var check_ignore = document.getElementById("check-ignore");
//------FOR FORM CONTROLS
var peiss_select = document.getElementById("peiss-select");
var permit_select = document.getElementById("permit-select");
var date_from = document.getElementById("date-from");
var date_to = document.getElementById("date-to");
var province_select = document.getElementById("province-select"); //multiple
var status_select = document.getElementById("status-select"); //multiple
// ------------------------------------------------------------------------------
var select_cmr_submission = document.getElementById("select-cmr-submission"); //multiple
// var select_cmr_semester = document.getElementById('select-cmr-semester')
//------FOR FORM
var formexport = document.getElementById("form-export");

var obj_ptype = {};
var obj_stype = {};
var obj_pstype = {};
var obj_psstype = {};

document.addEventListener("DOMContentLoaded", function () {
  var firstVal = "";
  var options = [];
  var data = {
    message: "projecttype",
  };
  var request = new XMLHttpRequest();
  request.open("POST", "../../build/php/arrays.php");
  request.setRequestHeader("Content-Type", "application/json");
  request.onload = function () {
    var response = JSON.parse(request.responseText);
    obj_ptype = response;
    for (var i = 0; i < response[0].length; i++) {
      if (i == 0) {
        firstVal = i;
      }
      options[i] = document.createElement("option");
      options[i].value = i;
      options[i].text = response[0][i];
      projecttype.add(options[i]);
    }
  };
  request.send(JSON.stringify(data));

  var data2 = {
    message: "psubtype",
  };
  var request2 = new XMLHttpRequest();
  request2.open("POST", "../../build/php/arrays.php");
  request2.setRequestHeader("Content-Type", "application/json");
  request2.onload = function () {
    var response = JSON.parse(request2.responseText);
    obj_stype = response;
    for (var i = 0; i < response[0].length; i++) {
      if (i == 0) {
        firstVal = i;
      }
      options[i] = document.createElement("option");
      options[i].value = i;
      options[i].text = response[0][i];
      projectsubtype.add(options[i]);
    }
  };
  request2.send(JSON.stringify(data2));

  var data3 = {
    message: "psstype",
  };
  var request3 = new XMLHttpRequest();
  request3.open("POST", "../../build/php/arrays.php");
  request3.setRequestHeader("Content-Type", "application/json");
  request3.onload = function () {
    var response = JSON.parse(request3.responseText);
    obj_pstype = response;
    for (var i = 0; i < response[0].length; i++) {
      if (i == 0) {
        firstVal = i;
      }
      options[i] = document.createElement("option");
      options[i].value = i;
      options[i].text = response[0][i];
      projectspecifictype.add(options[i]);
    }
  };
  request3.send(JSON.stringify(data3));

  var data4 = {
    message: "pssubtype",
  };
  var request4 = new XMLHttpRequest();
  request4.open("POST", "../../build/php/arrays.php");
  request4.setRequestHeader("Content-Type", "application/json");
  request4.onload = function () {
    var response = JSON.parse(request4.responseText);
    obj_psstype = response;
    for (var i = 0; i < response[0].length; i++) {
      options[i] = document.createElement("option");
      options[i].value = i;
      options[i].text = response[0][i];
      projectspecificsubtype.add(options[i]);
    }
    $("#ptype-select").val("0").trigger("change");
  };
  request4.send(JSON.stringify(data4));

  //================================================================
  projecttype.onchange = function () {
    var firstVal = "";
    var options = [];
    var indexArray = [];
    var typeval = projecttype.value;
    switch (typeval) {
      case "0":
        projectsubtype.innerHTML = "";
        indexArray = [0, 4, 6, 12, 19, 22];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_stype[0][indexArray[i]];
          projectsubtype.add(options[i]);
        }
        break;
      case "1":
        projectsubtype.innerHTML = "";
        indexArray = [1, 2, 15, 17];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_stype[0][indexArray[i]];
          projectsubtype.add(options[i]);
        }
        break;
      case "2":
        projectsubtype.innerHTML = "";
        indexArray = [3, 5, 7, 8, 9, 10, 13, 16, 18, 23];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_stype[0][indexArray[i]];
          projectsubtype.add(options[i]);
        }
        break;
      case "3":
        firstVal = 14;
        projectsubtype.innerHTML = "";
        options[0] = document.createElement("option");
        options[0].value = 14;
        options[0].text = obj_stype[0][14];
        projectsubtype.add(options[0]);
        break;
      case "4":
        firstVal = 21;
        projectsubtype.innerHTML = "";
        options[0] = document.createElement("option");
        options[0].value = 21;
        options[0].text = obj_stype[0][21];
        projectsubtype.add(options[0]);
        break;
    }
    $("#psubtype-select").val(firstVal).trigger("change");
  };

  projectsubtype.onchange = function () {
    var firstVal = "";
    var options = [];
    var indexArray = [];
    var typeval = projectsubtype.value;
    switch (typeval) {
      case "0":
        projectspecifictype.innerHTML = "";
        indexArray = [0, 7];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "1":
        projectspecifictype.innerHTML = "";
        indexArray = [1];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "2":
        projectspecifictype.innerHTML = "";
        indexArray = [50, 60, 49, 48, 47, 37, 2, 63, 51];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "3":
        projectspecifictype.innerHTML = "";
        indexArray = [3, 15, 24, 16, 41, 6, 19, 66, 44];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "4":
        projectspecifictype.innerHTML = "";
        indexArray = [4];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "5":
        projectspecifictype.innerHTML = "";
        indexArray = [33, 20, 38, 39, 25, 53, 55, 22, 5];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "6":
        projectspecifictype.innerHTML = "";
        indexArray = [31, 23, 17, 18, 40, 8, 56, 68];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "7":
        projectspecifictype.innerHTML = "";
        indexArray = [9, 10, 57, 58, 11, 27];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "8":
        projectspecifictype.innerHTML = "";
        indexArray = [12, 26, 54, 43];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "9":
        projectspecifictype.innerHTML = "";
        indexArray = [13];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "10":
        projectspecifictype.innerHTML = "";
        indexArray = [14];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "12":
        projectspecifictype.innerHTML = "";
        indexArray = [21, 35, 34];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "13":
        projectspecifictype.innerHTML = "";
        indexArray = [22];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "14":
        projectspecifictype.innerHTML = "";
        indexArray = [28];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "15":
        projectspecifictype.innerHTML = "";
        indexArray = [29];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "16":
        projectspecifictype.innerHTML = "";
        indexArray = [30, 42];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "17":
        projectspecifictype.innerHTML = "";
        indexArray = [32, 36, 69];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "18":
        projectspecifictype.innerHTML = "";
        indexArray = [65, 62, 45, 61];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "19":
        projectspecifictype.innerHTML = "";
        indexArray = [46];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "21":
        projectspecifictype.innerHTML = "";
        indexArray = [52];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "22":
        projectspecifictype.innerHTML = "";
        indexArray = [64];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
      case "23":
        projectspecifictype.innerHTML = "";
        indexArray = [67];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_pstype[0][indexArray[i]];
          projectspecifictype.add(options[i]);
        }
        break;
    }
    $("#pstype-select").val(firstVal).trigger("change");
  };

  projectspecifictype.onchange = function () {
    var firstVal = "";
    var options = [];
    var indexArray = [];
    var typeval = projectspecifictype.value;
    switch (typeval) {
      case "0":
        projectspecificsubtype.innerHTML = "";
        indexArray = [0];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "1":
        projectspecificsubtype.innerHTML = "";
        indexArray = [1];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "2":
        projectspecificsubtype.innerHTML = "";
        indexArray = [2, 3, 4, 20, 21, 32, 64, 69, 95];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "3":
        projectspecificsubtype.innerHTML = "";
        indexArray = [5, 22, 54, 62, 73, 76, 97, 98, 107, 108, 117];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "4":
        projectspecificsubtype.innerHTML = "";
        indexArray = [6, 39];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "5":
        projectspecificsubtype.innerHTML = "";
        indexArray = [7, 72];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "6":
        projectspecificsubtype.innerHTML = "";
        indexArray = [8, 15, 53, 92];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "7":
        projectspecificsubtype.innerHTML = "";
        indexArray = [9];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "8":
        projectspecificsubtype.innerHTML = "";
        indexArray = [10, 43];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "9":
        projectspecificsubtype.innerHTML = "";
        indexArray = [11];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "10":
        projectspecificsubtype.innerHTML = "";
        indexArray = [11];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "11":
        projectspecificsubtype.innerHTML = "";
        indexArray = [94];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "12":
        projectspecificsubtype.innerHTML = "";
        indexArray = [12];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "13":
        projectspecificsubtype.innerHTML = "";
        indexArray = [12, 79, 86];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "14":
        projectspecificsubtype.innerHTML = "";
        indexArray = [13];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "15":
        projectspecificsubtype.innerHTML = "";
        indexArray = [14];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "16":
        projectspecificsubtype.innerHTML = "";
        indexArray = [16, 19, 28, 50, 51, 62, 65, 66, 71, 83, 90, 91, 117];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "17":
        projectspecificsubtype.innerHTML = "";
        indexArray = [17];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "16":
        projectspecificsubtype.innerHTML = "";
        indexArray = [16, 19, 28, 50, 51, 62, 65, 66, 71, 83, 90, 91, 117];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "17":
        projectspecificsubtype.innerHTML = "";
        indexArray = [17];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "18":
        projectspecificsubtype.innerHTML = "";
        indexArray = [18];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "19":
        projectspecificsubtype.innerHTML = "";
        indexArray = [60, 61, 101, 102, 109];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "20":
        projectspecificsubtype.innerHTML = "";
        indexArray = [49];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "21":
        projectspecificsubtype.innerHTML = "";
        indexArray = [27, 63, 75];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "22":
        projectspecificsubtype.innerHTML = "";
        if (projectsubtype.value == "5") {
          indexArray = [29, 88];
        } else if (projectsubtype.value == "13") {
          indexArray = [113];
        }
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "23":
        projectspecificsubtype.innerHTML = "";
        indexArray = [30, 36, 104];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "24":
        projectspecificsubtype.innerHTML = "";
        indexArray = [31, 47];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "25":
        projectspecificsubtype.innerHTML = "";
        indexArray = [33];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "26":
        projectspecificsubtype.innerHTML = "";
        indexArray = [34];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "27":
        projectspecificsubtype.innerHTML = "";
        indexArray = [35, 94];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "28":
        projectspecificsubtype.innerHTML = "";
        indexArray = [37, 89];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "29":
        projectspecificsubtype.innerHTML = "";
        indexArray = [38, 41];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "30":
        projectspecificsubtype.innerHTML = "";
        indexArray = [42, 59, 118];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "31":
        projectspecificsubtype.innerHTML = "";
        indexArray = [43, 117];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "32":
        projectspecificsubtype.innerHTML = "";
        indexArray = [44];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "33":
        projectspecificsubtype.innerHTML = "";
        indexArray = [45];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "34":
        projectspecificsubtype.innerHTML = "";
        indexArray = [46];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "35":
        projectspecificsubtype.innerHTML = "";
        indexArray = [48];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "36":
        projectspecificsubtype.innerHTML = "";
        indexArray = [52, 74, 77, 78, 80, 81];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "37":
        projectspecificsubtype.innerHTML = "";
        indexArray = [55, 69, 70, 85, 99];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "38":
        projectspecificsubtype.innerHTML = "";
        indexArray = [56];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "39":
        projectspecificsubtype.innerHTML = "";
        indexArray = [56];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "40":
        projectspecificsubtype.innerHTML = "";
        indexArray = [57];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "41":
        projectspecificsubtype.innerHTML = "";
        indexArray = [58, 62];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "42":
        projectspecificsubtype.innerHTML = "";
        indexArray = [59, 119];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "43":
        projectspecificsubtype.innerHTML = "";
        indexArray = [62, 40, 79];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "44":
        projectspecificsubtype.innerHTML = "";
        indexArray = [62, 111];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "45":
        projectspecificsubtype.innerHTML = "";
        indexArray = [67, 96];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "46":
        projectspecificsubtype.innerHTML = "";
        indexArray = [69];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "47":
        projectspecificsubtype.innerHTML = "";
        indexArray = [69, 94, 95];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "48":
        projectspecificsubtype.innerHTML = "";
        indexArray = [69, 70];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "49":
        projectspecificsubtype.innerHTML = "";
        indexArray = [69];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "50":
        projectspecificsubtype.innerHTML = "";
        indexArray = [69];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "51":
        projectspecificsubtype.innerHTML = "";
        indexArray = [70];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "52":
        projectspecificsubtype.innerHTML = "";
        indexArray = [100];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "53":
        projectspecificsubtype.innerHTML = "";
        indexArray = [82];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "54":
        projectspecificsubtype.innerHTML = "";
        indexArray = [84, 115];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "55":
        projectspecificsubtype.innerHTML = "";
        indexArray = [87, 106];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "56":
        projectspecificsubtype.innerHTML = "";
        indexArray = [93];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "57":
        projectspecificsubtype.innerHTML = "";
        indexArray = [94];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "58":
        projectspecificsubtype.innerHTML = "";
        indexArray = [94];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "60":
        projectspecificsubtype.innerHTML = "";
        indexArray = [95];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "61":
        projectspecificsubtype.innerHTML = "";
        indexArray = [96, 110];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "62":
        projectspecificsubtype.innerHTML = "";
        indexArray = [96, 116];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "63":
        projectspecificsubtype.innerHTML = "";
        indexArray = [103];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "64":
        projectspecificsubtype.innerHTML = "";
        indexArray = [105];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "65":
        projectspecificsubtype.innerHTML = "";
        indexArray = [110];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "66":
        projectspecificsubtype.innerHTML = "";
        indexArray = [111];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "67":
        projectspecificsubtype.innerHTML = "";
        indexArray = [112];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "68":
        projectspecificsubtype.innerHTML = "";
        indexArray = [68];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
      case "69":
        projectspecificsubtype.innerHTML = "";
        indexArray = [120];
        for (var i = 0; i < indexArray.length; i++) {
          if (i == 0) {
            firstVal = indexArray[i];
          }
          options[i] = document.createElement("option");
          options[i].value = indexArray[i];
          options[i].text = obj_psstype[0][indexArray[i]];
          projectspecificsubtype.add(options[i]);
        }
        break;
    }
    //$("#pssubtype-select").val(firstVal).trigger('change')
  };
});

formexport.addEventListener("submit", function (event) {
  event.preventDefault();
  event.stopPropagation();

  var buttongenerator = document.getElementById("button-generator");
  buttongenerator.disabled = true;

  // STORING SELECTED VALUES OF MULTIPLE TYPE SELECT ELEMENTS
  var selected_status = [];
  for (var option of status_select.options) {
    if (option.selected) {
      selected_status.push(option.value);
    }
  }
  var selected_province = [];
  for (var option of province_select.options) {
    if (option.selected) {
      selected_province.push(option.value);
    }
  }
  // var selected_cmr_submission = []
  var y2018 = [],
    y2019 = [],
    y2020 = [],
    y2021 = [],
    y2022 = [];
  for (var option of select_cmr_submission.options) {
    if (option.selected) {
      if (option.value == 1) y2018.push("First Semester");
      if (option.value == 2) y2018.push("Second Semester");
      if (option.value == 3) y2019.push("First Semester");
      if (option.value == 4) y2019.push("Second Semester");
      if (option.value == 5) y2020.push("First Semester");
      if (option.value == 6) y2020.push("Second Semester");
      if (option.value == 7) y2021.push("First Semester");
      if (option.value == 8) y2021.push("Second Semester");
      if (option.value == 9) y2022.push("First Semester");
      if (option.value == 10) y2022.push("Second Semester");
    }
  }
  // selected_cmr_submission.sort()

  if (check_ignore.checked == false) {
    var data = {
      statuscheck: statuscheck.checked,
      peisscheck: peisscheck.checked,
      permitcheck: permitcheck.checked,
      provincecheck: provincecheck.checked,
      ptypecheck: ptypecheck.checked,
      psubtypecheck: psubtypecheck.checked,
      pstypecheck: pstypecheck.checked,
      pssubtypecheck: pssubtypecheck.checked,
      cmrcheck: check_cmr.checked,
      peiss: peiss_select.value,
      permit: permit_select.value,
      datefrom: date_from.value,
      dateto: date_to.value,
      projecttype: projecttype.value,
      projectsubtype: projectsubtype.value,
      projectspecifictype: projectspecifictype.value,
      projectspecificsubtype: projectspecificsubtype.value,
      status: selected_status,
      province: selected_province,
      y2018: y2018,
      y2019: y2019,
      y2020: y2020,
      y2021: y2021,
      y2022: y2022,
    };
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/export_ajax.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.onload = function () {
      var response = JSON.parse(request.responseText);
      var dllink = document.getElementById("dllink");
      var dlprompt = document.getElementById("dlprompt");
      var successprompt = document.getElementById("success-prompt");
      dlprompt.innerHTML = `${response.counter} rows exported to excel!`;
      dllink.innerHTML = `<a href=${response.file} class='btn btn-block btn-success' download='UNIVERSE.xlsx'><i class='fas fa-file-excel'></i> Download Generated File</a>`;
      successprompt.style.display = "block";
      buttongenerator.disabled = false;
    };
    request.send(JSON.stringify(data));
    return false;
  }
  // If user ticks the ignore CMR checkbox
  // remove cmr data from object
  if (check_ignore.checked == true) {
    var data = {
      statuscheck: statuscheck.checked,
      peisscheck: peisscheck.checked,
      permitcheck: permitcheck.checked,
      provincecheck: provincecheck.checked,
      ptypecheck: ptypecheck.checked,
      psubtypecheck: psubtypecheck.checked,
      pstypecheck: pstypecheck.checked,
      pssubtypecheck: pssubtypecheck.checked,
      peiss: peiss_select.value,
      permit: permit_select.value,
      datefrom: date_from.value,
      dateto: date_to.value,
      projecttype: projecttype.value,
      projectsubtype: projectsubtype.value,
      projectspecifictype: projectspecifictype.value,
      projectspecificsubtype: projectspecificsubtype.value,
      status: selected_status,
      province: selected_province,
    };
    var request = new XMLHttpRequest();
    request.open("POST", "../../build/php/export_ajax_2.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.onload = function () {
      var response = JSON.parse(request.responseText);
      var dllink = document.getElementById("dllink");
      var dlprompt = document.getElementById("dlprompt");
      var successprompt = document.getElementById("success-prompt");
      dlprompt.innerHTML = `${response.counter} rows exported to excel!`;
      dllink.innerHTML = `<a href=${response.file} class='btn btn-block btn-success' download='UNIVERSE.xlsx'><i class='fas fa-file-excel'></i> Download Generated File</a>`;
      successprompt.style.display = "block";
      buttongenerator.disabled = false;
    };
    request.send(JSON.stringify(data));
    return false;
  }
});

peisscheck.onchange = function () {
  if (peisscheck.checked == true) {
    peiss_select.required = false;
    peiss_select.disabled = true;
  } else {
    peiss_select.required = true;
    peiss_select.disabled = false;
  }
};
permitcheck.onchange = function () {
  if (permitcheck.checked == true) {
    permit_select.required = false;
    permit_select.disabled = true;
    date_from.required = false;
    date_from.disabled = true;
    date_to.required = false;
    date_to.disabled = true;
  } else {
    permit_select.required = true;
    permit_select.disabled = false;
    date_from.required = true;
    date_from.disabled = false;
    date_to.required = true;
    date_to.disabled = false;
  }
};
provincecheck.onchange = function () {
  if (provincecheck.checked == true) {
    province_select.required = false;
    province_select.disabled = true;
  } else {
    province_select.required = true;
    province_select.disabled = false;
  }
};
statuscheck.onchange = function () {
  if (statuscheck.checked == true) {
    status_select.required = false;
    status_select.disabled = true;
  } else {
    status_select.required = true;
    status_select.disabled = false;
  }
};
ptypecheck.onchange = function () {
  if (ptypecheck.checked == true) {
    projecttype.required = false;
    projecttype.disabled = true;
  } else {
    projecttype.required = true;
    projecttype.disabled = false;
  }
};
psubtypecheck.onchange = function () {
  if (psubtypecheck.checked == true) {
    projectsubtype.required = false;
    projectsubtype.disabled = true;
  } else {
    projectsubtype.required = true;
    projectsubtype.disabled = false;
  }
};
pstypecheck.onchange = function () {
  if (pstypecheck.checked == true) {
    projectspecifictype.required = false;
    projectspecifictype.disabled = true;
  } else {
    projectspecifictype.required = true;
    projectspecifictype.disabled = false;
  }
};
pssubtypecheck.onchange = function () {
  if (pssubtypecheck.checked == true) {
    projectspecificsubtype.required = false;
    projectspecificsubtype.disabled = true;
  } else {
    projectspecificsubtype.required = true;
    projectspecificsubtype.disabled = false;
  }
};
check_cmr.onchange = function () {
  if (this.checked == true) {
    // console.log(selected_opt)
    select_cmr_year.required = false;
    select_cmr_year.disabled = true;
    select_cmr_semester.required = false;
    select_cmr_semester.disabled = true;
  } else {
    select_cmr_year.required = true;
    select_cmr_year.disabled = false;
    select_cmr_semester.required = true;
    select_cmr_semester.disabled = false;
  }
};
