$("#table_recommendations").on(
  "click",
  ".btn_recommendation_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);

// tbl eiss
// insert
$("#add_eiss1").click(function () {
  i++;
  $("#table_eiss1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="eissData1[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm eiss_remove1">X</button></td></tr>'
  );
});

$("#table_eiss1").on("click", ".eiss_remove1", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// update
$("#add_eiss").click(function () {
  i++;
  $("#table_eiss tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="eissData[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm eiss_remove">X</button></td></tr>'
  );
});

$("#table_eiss").on("click", ".eiss_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

// tbl chem mngmt
$("#add_Chemical_Management1").click(function () {
  i++;
  $("#table_Chemical_Management1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Chemical_Management1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Chemical_Management1_remove">X</button></td></tr>'
  );
});

$("#table_Chemical_Management1").on(
  "click",
  ".Chemical_Management1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);

// update
$("#add_Chemical_Management").click(function () {
  i++;
  $("#table_Chemical_Management tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea class="form-control" name="Chemical_Management_Data[]"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Chemical_Management_remove">X</button></td></tr>'
  );
});

$("#table_Chemical_Management").on(
  "click",
  ".Chemical_Management_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
//

// HWG
$("#add_HW_Management1").click(function () {
  console.log("hello");
  i++;
  $("#table_HW_Management1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="HW_Management1_Data[]" id="HW_Management1_Data[]" class="form-control"></textarea></td></td><button type="button" name="remove" class="btn btn-danger btn-sm HW_Management1_remove" id="HW_Management1_remove">X</button></td></tr>'
  );
});

$("#table_HW_Management1").on("click", ".HW_Management1_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// update
$("#add_HW_Management").click(function () {
  i++;
  $("#tbody_hw_management").append(
    '<tr id="row' +
      i +
      '"><td><textarea type="text" name="HW_Management_Data[]" id="HW_Management_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm HW_Management_remove" id="HW_Management_remove">X</button></td></tr>'
  );
});

$("#table_HW_Management").on("click", ".HW_Management_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

// AQ
$("#add_AQ_Management1").click(function () {
  i++;
  $("#table_AQ_Management1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="AQ_Management1_Data[]" id="AQ_Management1_Data[]" class="form-control"></textarea></td></td><td><button type="button" name="remove" class="btn btn-danger btn-sm AQ_Management1_remove" id="AQ_Management1_remove">X</button></td></tr>'
  );
});

$("#table_AQ_Management1").on("click", ".AQ_Management1_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// update
$("#add_AQ_Management").click(function () {
  i++;
  $("#table_AQ_Management tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="AQ_Management_Data[]" id="AQ_Management_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm AQ_Management_remove" id="AQ_Management_remove">X</button></td></tr>'
  );
});

$("#table_AQ_Management").on("click", ".AQ_Management_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

// WQ
$("#add_WQ_Management1").click(function () {
  i++;
  $("#table_WQ_Management1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="WQ_Management1_Data[]" id="WQ_Management1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm WQ_Management1_remove" id="WQ_Management1_remove">X</button></td></tr>'
  );
});

$("#table_WQ_Management1").on("click", ".WQ_Management1_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// update
$("#add_WQ_Management").click(function () {
  i++;
  $("#table_WQ_Management tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="WQ_Management_Data[]" id="WQ_Management_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm WQ_Management_remove" id="WQ_Management_remove">X</button></td></tr>'
  );
});

$("#table_WQ_Management").on("click", ".WQ_Management_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// SW
$("#add_SW_Management1").click(function () {
  i++;
  $("#table_SW_Management1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="SW_Management1_Data[]" id="SW_Management1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm SW_Management1_remove" id="SW_Management1_remove">X</button></td></tr>'
  );
});

$("#table_SW_Management1").on("click", ".SW_Management1_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// update
$("#add_SW_Management").click(function () {
  i++;
  $("#table_SW_Management tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="SW_Management_Data[]" id="SW_Management_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm SW_Management_remove" id="SW_Management_remove">X</button></td></tr>'
  );
});

$("#table_SW_Management").on("click", ".SW_Management_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

//

// Tech
$("#add_Commitment_TechConA1").click(function () {
  i++;
  $("#table_Chemical_Management1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Commitment_TechCon1_Data[]" id="Commitment_TechCon1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Commitment_TechCon1_remove" id="Commitment_TechCon1_remove">X</button></td></tr>'
  );
});

$("#table_Chemical_Management1").on(
  "click",
  ".Commitment_TechCon1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
// update
$("#add_Commitment_TechConA").click(function () {
  console.log("clicked!");
  i++;
  $("#table_TechCon  tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Commitment_TechCon_Data[]" id="Commitment_TechCon_Data[]" class="form-control" /></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Commitment_TechCon_remove" id="Commitment_TechCon_remove">X</button></td></tr>'
  );
});

$("#table_TechCon").on("click", ".Commitment_TechCon_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

// Tech
// insert
$("#add_Rec_confirmatorysampling1").click(function () {
  i++;
  $("#table_Rec_confirmatorysampling1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_confirmatorysampling1_Data[]" id="Rec_confirmatorysampling1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_confirmatorysampling1_remove" id="Rec_confirmatorysampling1_remove">X</button></td></tr>'
  );
});

$("#table_Rec_confirmatorysampling1").on(
  "click",
  ".Rec_confirmatorysampling1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);

// update
$("#add_Rec_confirmatorysampling").click(function () {
  i++;
  $("#table_Rec_confirmatorysampling tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_confirmatorysampling_Data[]" id="Rec_confirmatorysampling_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_confirmatorysampling_remove" id="Rec_confirmatorysampling_remove">X</button></td></tr>'
  );
});

$("#table_Rec_confirmatorysampling").on(
  "click",
  ".Rec_confirmatorysampling_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
//
// insert
$("#add_Rec_tempPtoDp1").click(function () {
  i++;
  $("#table_Rec_tempPtoDp1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_tempPtoDp1_Data[]" id="Rec_tempPtoDp1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_tempPtoDp1_remove" id="Rec_tempPtoDp1_remove">X</button></td></tr>'
  );
});

$("#table_Rec_tempPtoDp1").on("click", ".Rec_tempPtoDp1_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
// update
$("#add_Rec_tempPtoDp").click(function () {
  i++;
  $("#table_Rec_tempPtoDp tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea type="text" name="Rec_tempPtoDp_Data[]" id="Rec_tempPtoDp_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_tempPtoDp_remove" id="Rec_tempPtoDp_remove">X</button></td></tr>'
  );
});

$("#table_Rec_tempPtoDp").on("click", ".Rec_tempPtoDp_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

//
$("#add_Rec_PCOSem1").click(function () {
  i++;
  $("#table_Rec_PCOSem1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_PCOSem1_Data[]" id="Rec_PCOSem1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_PCOSem_remove" id="Rec_PCOSem_remove">X</button></td></tr>'
  );
});

$("#table_Rec_PCOSem1").on("click", ".Rec_PCOSem_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// update
$("#add_Rec_PCOSem").click(function () {
  i++;
  $("#table_Rec_PCOSem tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_PCOSem_Data[]" id="Rec_PCOSem_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_PCOSem_remove" id="Rec_PCOSem_remove">X</button></td></tr>'
  );
});

$("#table_Rec_PCOSem").on("click", ".Rec_PCOSem_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

$("#add_Rec_SMRCMR_Submission1").click(function () {
  i++;
  $("#table_Rec_SMRCMR_Submission1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_SMRCMR_Submission1_Data[]" id="Rec_SMRCMR_Submission1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_SMRCMR_Submission1_remove" id="Rec_SMRCMR_Submission1_remove">X</button></td></tr>'
  );
});

$("#table_Rec_SMRCMR_Submission1").on(
  "click",
  ".Rec_SMRCMR_Submission1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
// update
$("#add_Rec_SMRCMR_Submission").click(function () {
  i++;
  $("#table_Rec_SMRCMR_Submission tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_SMRCMR_Submission_Data[]" id="Rec_SMRCMR_Submission_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_SMRCMR_Submission_remove" id="Rec_SMRCMR_Submission_remove">X</button></td></tr>'
  );
});

$("#table_Rec_SMRCMR_Submission").on(
  "click",
  ".Rec_SMRCMR_Submission_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
//

//
$("#add_Rec_NOMTC1").click(function () {
  i++;
  $("#table_Rec_NOMTC1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_NOMTC1_Data[]" id="Rec_NOMTC_Data1[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOMTC1_remove" id="Rec_NOMTC1_remove">X</button></td></tr>'
  );
});

$("#table_Rec_NOMTC1").on("click", ".Rec_NOMTC1_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});

// update
$("#add_Rec_NOMTC").click(function () {
  console.log("you clicked!");
  i++;
  $("#table_Rec_NOMTC tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_NOMTC_Data[]" id="Rec_NOMTC_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOMTC_remove" id="Rec_NOMTC_remove">X</button></td></tr>'
  );
});

$("#table_Rec_NOMTC").on("click", ".Rec_NOMTC_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

//
$("#add_Rec_NOVIssuance1").click(function () {
  i++;
  $("#table_Rec_NOVIssuance1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_NOVIssuance1_Data[]" id="Rec_NOVIssuance1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOVIssuance1_remove" id="Rec_NOVIssuance1_remove">X</button></td></tr>'
  );
});

$("#table_Rec_NOVIssuance1").on(
  "click",
  ".Rec_NOVIssuance1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
// update
$("#add_Rec_NOVIssuance").click(function () {
  i++;
  $("#table_Rec_NOVIssuance tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_NOVIssuance_Data[]" id="Rec_NOVIssuance_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOVIssuance_remove" id="Rec_NOVIssuance_remove">X</button></td></tr>'
  );
});

$("#table_Rec_NOVIssuance").on("click", ".Rec_NOVIssuance_remove", function () {
  var button_id = $(this).closest("tr").attr("id");
  $("#" + button_id).remove();
});
//

//
$("#add_Rec_Issuance5DayCDO1").click(function () {
  i++;
  $("#table_Rec_Issuance5DayCDO1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_Issuance5DayCDO1_Data[]" id="Rec_Issuance5DayCDO1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_Issuance5DayCDO1_remove" id="Rec_Issuance5DayCDO1_remove">X</button></td></tr>'
  );
});

$("#table_Rec_Issuance5DayCDO1").on(
  "click",
  ".Rec_Issuance5DayCDO1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
// update
$("#add_Rec_Issuance5DayCDO").click(function () {
  i++;
  $("#table_Rec_Issuance5DayCDO tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_Issuance5DayCDO_Data[]" id="Rec_Issuance5DayCDO_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_Issuance5DayCDO_remove" id="Rec_Issuance5DayCDO_remove">X</button></td></tr>'
  );
});

$("#table_Rec_Issuance5DayCDO").on(
  "click",
  ".Rec_Issuance5DayCDO_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
//

//
$("#add_Rec_EndorsementPAB1").click(function () {
  i++;
  $("#table_Rec_EndorsementPAB1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_EndorsementPAB1_Data[]" id="Rec_EndorsementPAB1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_EndorsementPAB1_remove" id="Rec_EndorsementPAB1_remove">X</button></td></tr>'
  );
});

$("#table_Rec_EndorsementPAB1").on(
  "click",
  ".Rec_EndorsementPAB1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);

// update
$("#add_Rec_EndorsementPAB").click(function () {
  i++;
  $("#table_Rec_EndorsementPAB tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="Rec_EndorsementPAB_Data[]" id="Rec_EndorsementPAB_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_EndorsementPAB_remove" id="Rec_EndorsementPAB_remove">X</button></td></tr>'
  );
});

$("#table_Rec_EndorsementPAB").on(
  "click",
  ".Rec_EndorsementPAB_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
//

//
$("#add_recommendation1").click(function () {
  i++;
  $("#table_OtherRecommendations1 tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="OtherRecommendations1_Data[]" id="OtherRecommendations1_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm OtherRecommendations1_remove" id="OtherRecommendations1_remove">X</button></td></tr>'
  );
});

$("#table_OtherRecommendations1").on(
  "click",
  ".OtherRecommendations1_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);

$("#add_recommendation").click(function () {
  i++;
  $("#table_OtherRecommendations tbody").append(
    '<tr id="row' +
      i +
      '"><td><textarea name="OtherRecommendations_Data[]" id="OtherRecommendations_Data[]" class="form-control"></textarea></td><td><button type="button" name="remove" class="btn btn-danger btn-sm OtherRecommendations_remove" id="OtherRecommendations_remove">X</button></td></tr>'
  );
});

$("#table_OtherRecommendations").on(
  "click",
  ".OtherRecommendations_remove",
  function () {
    var button_id = $(this).closest("tr").attr("id");
    $("#" + button_id).remove();
  }
);
//

var checkboxEIS_SystemA1 = document.getElementById("checkboxEIS_SystemA1");
var checkboxEIS_SystemB1 = document.getElementById("checkboxEIS_SystemB1");
var checkboxEIS_SystemC1 = document.getElementById("checkboxEIS_SystemC1");
var eissData1Container = document.getElementById("eissData1Container");

checkboxEIS_SystemA1.addEventListener("change", function () {
  if (this.checked) {
    eissData1Container.style.display = "block";
  } else {
    eissData1Container.style.display = "none";
  }
});

checkboxEIS_SystemB1.addEventListener("change", function () {
  if (this.checked) {
    eissData1Container.style.display = "block";
  } else {
    eissData1Container.style.display = "none";
  }
});

checkboxEIS_SystemC1.addEventListener("change", function () {
  if (this.checked) {
    eissData1Container.style.display = "none";
  }
});
//

// Summary of Findings and Observation
var Chemical_ManagementA1 = document.getElementById("Chemical_ManagementA1");
var Chemical_ManagementB1 = document.getElementById("Chemical_ManagementB1");
var Chemical_ManagementC1 = document.getElementById("Chemical_ManagementC1");
var Chemical_Management1Container = document.getElementById(
  "Chemical_Management1Container"
);

Chemical_ManagementA1.addEventListener("change", function () {
  if (this.checked) {
    Chemical_Management1Container.style.display = "block";
  } else {
    Chemical_Management1Container.style.display = "none";
  }
});

Chemical_ManagementB1.addEventListener("change", function () {
  if (this.checked) {
    Chemical_Management1Container.style.display = "block";
  } else {
    Chemical_Management1Container.style.display = "none";
  }
});

Chemical_ManagementC1.addEventListener("change", function () {
  if (this.checked) {
    Chemical_Management1Container.style.display = "none";
  }
});
//

// Summary of Findings and Observation
var HW_ManagementA1 = document.getElementById("HW_ManagementA1");
var HW_ManagementB1 = document.getElementById("HW_ManagementB1");
var HW_ManagementC1 = document.getElementById("HW_ManagementC1");
var HW_ManagementA1Container = document.getElementById(
  "HW_ManagementA1Container"
);

HW_ManagementA1.addEventListener("change", function () {
  if (this.checked) {
    HW_ManagementA1Container.style.display = "block";
  } else {
    HW_ManagementA1Container.style.display = "none";
  }
});

HW_ManagementB1.addEventListener("change", function () {
  if (this.checked) {
    HW_ManagementA1Container.style.display = "block";
  } else {
    HW_ManagementA1Container.style.display = "none";
  }
});

HW_ManagementC1.addEventListener("change", function () {
  if (this.checked) {
    HW_ManagementA1Container.style.display = "none";
  }
});
//

// Summary of Findings and Observation
var AQ_ManagementA1 = document.getElementById("AQ_ManagementA1");
var AQ_ManagementB1 = document.getElementById("AQ_ManagementB1");
var AQ_ManagementC1 = document.getElementById("AQ_ManagementC1");
var AQ_Management1Container = document.getElementById(
  "AQ_Management1Container"
);

AQ_ManagementA1.addEventListener("change", function () {
  if (this.checked) {
    AQ_Management1Container.style.display = "block";
  } else {
    AQ_Management1Container.style.display = "none";
  }
});

AQ_ManagementB1.addEventListener("change", function () {
  if (this.checked) {
    AQ_Management1Container.style.display = "block";
  } else {
    AQ_Management1Container.style.display = "none";
  }
});

AQ_ManagementC1.addEventListener("change", function () {
  if (this.checked) {
    AQ_Management1Container.style.display = "none";
  }
});
//

// Summary of Findings and Observation
var WQ_ManagementA1 = document.getElementById("WQ_ManagementA1");
var WQ_ManagementB1 = document.getElementById("WQ_ManagementB1");
var WQ_ManagementC1 = document.getElementById("WQ_ManagementC1");
var WQ_Management1Container = document.getElementById(
  "WQ_Management1Container"
);

WQ_ManagementA1.addEventListener("change", function () {
  if (this.checked) {
    WQ_Management1Container.style.display = "block";
  } else {
    WQ_Management1Container.style.display = "none";
  }
});

WQ_ManagementB1.addEventListener("change", function () {
  if (this.checked) {
    WQ_Management1Container.style.display = "block";
  } else {
    WQ_Management1Container.style.display = "none";
  }
});

WQ_ManagementC1.addEventListener("change", function () {
  if (this.checked) {
    WQ_Management1Container.style.display = "none";
  }
});
//

// Summary of Findings and Observation
var SW_ManagementA1 = document.getElementById("SW_ManagementA1");
var SW_ManagementB1 = document.getElementById("SW_ManagementB1");
var SW_ManagementC1 = document.getElementById("SW_ManagementC1");
var SW_Management1Container = document.getElementById(
  "SW_Management1Container"
);

SW_ManagementA1.addEventListener("change", function () {
  if (this.checked) {
    SW_Management1Container.style.display = "block";
  } else {
    SW_Management1Container.style.display = "none";
  }
});

SW_ManagementB1.addEventListener("change", function () {
  if (this.checked) {
    SW_Management1Container.style.display = "block";
  } else {
    SW_Management1Container.style.display = "none";
  }
});

SW_ManagementC1.addEventListener("change", function () {
  if (this.checked) {
    SW_Management1Container.style.display = "none";
  }
});
//

// Summary of Findings and Observation
var Commitment_TechConA1 = document.getElementById("Commitment_TechConA1");
var Commitment_TechConB1 = document.getElementById("Commitment_TechConB1");
var Commitment_TechConC1 = document.getElementById("Commitment_TechConC1");
var Commitment_TechConA1Container = document.getElementById(
  "Commitment_TechConA1Container"
);

Commitment_TechConA1.addEventListener("change", function () {
  if (this.checked) {
    Commitment_TechConA1Container.style.display = "block";
  } else {
    Commitment_TechConA1Container.style.display = "none";
  }
});

Commitment_TechConB1.addEventListener("change", function () {
  if (this.checked) {
    Commitment_TechConA1Container.style.display = "block";
  } else {
    Commitment_TechConA1Container.style.display = "none";
  }
});

Commitment_TechConC1.addEventListener("change", function () {
  if (this.checked) {
    Commitment_TechConA1Container.style.display = "none";
  }
});
//

// // DISABLE SEMICOLON AND PASTE SEMICOLON
// var inputFieldECC_Condition1 = document.getElementById("ECC_Condition1[]");
// var inputFieldECC_ConditionRemarks1 = document.getElementById(
//   "ECC_ConditionRemarks1[]"
// );

// inputFieldECC_Condition1.addEventListener("keydown", function (event) {
//   if (event.key === ";") {
//     event.preventDefault();
//   }
// });

// inputFieldECC_Condition1.addEventListener("paste", function (event) {
//   event.preventDefault();

//   var pastedText = event.clipboardData.getData("text");

//   var filteredText = pastedText.replace(/;/g, "");

//   document.execCommand("insertHTML", false, filteredText);
// });

// inputFieldECC_ConditionRemarks1.addEventListener("keydown", function (event) {
//   if (event.key === ";") {
//     event.preventDefault();
//   }
// });

// inputFieldECC_ConditionRemarks1.addEventListener("paste", function (event) {
//   event.preventDefault();

//   var pastedText = event.clipboardData.getData("text");

//   var filteredText = pastedText.replace(/;/g, "");

//   document.execCommand("insertHTML", false, filteredText);
// });

// // EISS
// var inputFieldeissData1 = document.getElementById("eissData1[]");

// inputFieldeissData1.addEventListener("keydown", function (event) {
//   if (event.key === ";") {
//     event.preventDefault();
//   }
// });

// inputFieldeissData1.addEventListener("paste", function (event) {
//   event.preventDefault();
//   var pastedText = event.clipboardData.getData("text");
//   var filteredText = pastedText.replace(/;/g, "");

//   document.execCommand("insertHTML", false, filteredText);
// });

// RECOMMENDATION
var Rec_confirmatorysampling1 = document.getElementById(
  "Rec_confirmatorysampling1"
);
var Rec_confirmatorysampling1Container = document.getElementById(
  "Rec_confirmatorysampling1Container"
);

Rec_confirmatorysampling1.addEventListener("change", function () {
  if (this.checked) {
    Rec_confirmatorysampling1Container.style.display = "block";
  } else {
    Rec_confirmatorysampling1Container.style.display = "none";
  }
});

var Rec_tempPtoDp1 = document.getElementById("Rec_tempPtoDp1");
var Rec_tempPtoDp1Container = document.getElementById(
  "Rec_tempPtoDp1Container"
);

Rec_tempPtoDp1.addEventListener("change", function () {
  if (this.checked) {
    Rec_tempPtoDp1Container.style.display = "block";
  } else {
    Rec_tempPtoDp1Container.style.display = "none";
  }
});

var Rec_PCOSem1 = document.getElementById("Rec_PCOSem1");
var Rec_PCOSemContainer1 = document.getElementById("Rec_PCOSem1Container");
Rec_PCOSem1.addEventListener("change", function () {
  if (this.checked) {
    console.log("checked");
    Rec_PCOSemContainer1.style.display = "block";
  } else {
    Rec_PCOSemContainer1.style.display = "none";
    console.log("unchecked");
  }
});

var Rec_SMRCMR_Submission1 = document.getElementById("Rec_SMRCMR_Submission1");
var Rec_SMRCMR_SubmissionContainer1 = document.getElementById(
  "Rec_SMRCMR_SubmissionContainer1"
);

Rec_SMRCMR_Submission1.addEventListener("change", function () {
  if (this.checked) {
    Rec_SMRCMR_SubmissionContainer1.style.display = "block";
  } else {
    Rec_SMRCMR_SubmissionContainer1.style.display = "none";
  }
});

var Rec_NOMTC1 = document.getElementById("Rec_NOMTC1");
var Rec_NOMTCContainer1 = document.getElementById("Rec_NOMTCContainer1");

Rec_NOMTC1.addEventListener("change", function () {
  if (this.checked) {
    Rec_NOMTCContainer1.style.display = "block";
  } else {
    Rec_NOMTCContainer1.style.display = "none";
  }
});

var Rec_NOVIssuance1 = document.getElementById("Rec_NOVIssuance1");
var Rec_NOVIssuanceContainer1 = document.getElementById(
  "Rec_NOVIssuanceContainer1"
);

Rec_NOVIssuance1.addEventListener("change", function () {
  if (this.checked) {
    Rec_NOVIssuanceContainer1.style.display = "block";
  } else {
    Rec_NOVIssuanceContainer1.style.display = "none";
  }
});

var Rec_Issuance5DayCDO1 = document.getElementById("Rec_Issuance5DayCDO1");
var Rec_Issuance5DayCDOContainer1 = document.getElementById(
  "Rec_Issuance5DayCDOContainer1"
);

Rec_Issuance5DayCDO1.addEventListener("change", function () {
  if (this.checked) {
    Rec_Issuance5DayCDOContainer1.style.display = "block";
  } else {
    Rec_Issuance5DayCDOContainer1.style.display = "none";
  }
});

var Rec_EndorsementPAB1 = document.getElementById("Rec_EndorsementPAB1");
var Rec_EndorsementPABContainer1 = document.getElementById(
  "Rec_EndorsementPABContainer1"
);

Rec_EndorsementPAB1.addEventListener("change", function () {
  if (this.checked) {
    Rec_EndorsementPABContainer1.style.display = "block";
  } else {
    Rec_EndorsementPABContainer1.style.display = "none";
  }
});

var OtherRecommendations1 = document.getElementById("OtherRecommendations1");
var OtherRecommendations1Container = document.getElementById(
  "OtherRecommendations1Container"
);
OtherRecommendations1.addEventListener("change", function () {
  if (this.checked) {
    OtherRecommendations1Container.style.display = "block";
  } else {
    OtherRecommendations1Container.style.display = "none";
  }
});
