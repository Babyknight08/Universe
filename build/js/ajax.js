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
        $("#operating_day").val(data.OperatingDay);
        $("#operating_week").val(data.OperatingWeek);
        $("#operating_year").val(data.OperatingYear);
        $("#MHead").val(data.ManagingHead);
        $("#PCOAccreditation").val(data.PCOAccreditation);
        $("#PCOA_Date").val(data.PCOA_Date);
        $("#contactnumber").val(data.ContactNumber);
        $("#email_address").val(data.EmailAddress);
        $("#otherspv_text").val(data.OthersPV_Text);
        $("#others_text").val(data.Others_Text);
        $("#ECC").val(data.ECC);
        $("#ECC_DOI").val(data.ECC_DOI);
        $("#ECC_DE").val(data.ECC_DE);
        $("#DENRID").val(data.DENRID);
        $("#DENRID_DOI").val(data.DENRID_DOI);
        $("#DENRID_DE").val(data.DENRID_DE);
        $("#PCL_Compliance").val(data.PCL_Compliance);
        $("#PCL_Compliance_DOI").val(data.PCL_Compliance_DOI);
        $("#PCL_Compliance_DE").val(data.PCL_Compliance_DE);
        $("#CCO_Registry").val(data.CCO_Registry);
        $("#CCO_Registry_DOI").val(data.CCO_Registry_DOI);
        $("#CCO_Registry_DE").val(data.CCO_Registry_DE);
        $("#Importation_Clearance").val(data.Importation_Clearance);
        $("#Importation_Clearance_DOI").val(data.Importation_Clearance_DOI);
        $("#Importation_Clearance_DE").val(data.Importation_Clearance_DE);
        $("#COT_Issued").val(data.COT_Issued);
        $("#COT_Issued_DOI").val(data.COT_Issued_DOI);
        $("#COT_Issued_DE").val(data.COT_Issued_DE);
        $("#TSD_RegistrationCert").val(data.TSD_RegistrationCert);
        $("#TSD_RegistrationCert_DOI").val(data.TSD_RegistrationCert_DOI);
        $("#TSD_RegistrationCert_DE").val(data.TSD_RegistrationCert_DE);
        $("#POA_No").val(data.POA_No);
        $("#POA_No_DOI").val(data.POA_No_DOI);
        $("#POA_No_DE").val(data.POA_No_DE);
        $("#Discharge_Permit").val(data.Discharge_Permit);
        $("#Discharge_Permit_DOI").val(data.Discharge_Permit_DOI);
        $("#Discharge_Permit_DE").val(data.Discharge_Permit_DE);
        $("#MOA_Agreement").val(data.MOA_Agreement);
        $("#MOA_Agreement_DOI").val(data.MOA_Agreement_DOI);
        $("#MOA_Agreement_DE").val(data.MOA_Agreement_DE);
        // $("#ECC_Condition").val(data.ECC_Condition);
        $("#Haz_PCLCompliance").val(data.Haz_PCLCompliance);
        $("#Haz_PCLComplianceText").val(data.Haz_PCLComplianceText);
        $("#Annual_Reporting").val(data.Annual_Reporting);
        $("#Annual_ReportingText").val(data.Annual_ReportingText);
        $("#Biennial_Report").val(data.Biennial_Report);
        $("#Biennial_ReportText").val(data.Biennial_ReportText);
        $("#CCO_Registration").val(data.CCO_Registration);
        $("#CCO_RegistrationText").val(data.CCO_RegistrationText);
        $("#Importation").val(data.Importation);
        $("#ImportationText").val(data.ImportationText);
        $("#Valid_ImportanceClearance").val(data.Valid_ImportanceClearance);
        $("#Valid_ImportanceClearanceText").val(
          data.Valid_ImportanceClearanceText
        );
        $("#Bill_LadingText").val(data.Bill_LadingText);
        $("#Registration_HWGText").val(data.Registration_HWGText);
        $("#Temp_HazStorageFacilityText").val(data.Temp_HazStorageFacilityText);
        $("#Report_HazGeneratedText").val(data.Report_HazGeneratedText);
        $("#Haz_WasteLabelled").val(data.Haz_WasteLabelled);
        $("#Haz_WasteLabelledText").val(data.Haz_WasteLabelledText);
        $("#Valid_PermitTranspo").val(data.Valid_PermitTranspo);
        $("#Valid_PermitTranspoText").val(data.Valid_PermitTranspoText);
        $("#Valid_RegTranspoTreaters").val(data.Valid_RegTranspoTreaters);
        $("#Valid_RegTranspoTreatersText").val(
          data.Valid_RegTranspoTreatersText
        );
        $("#Waste_Transporter").val(data.Waste_Transporter);
        $("#Waste_TransporterText").val(data.Waste_TransporterText);
        $("#Valid_CertTreatment").val(data.Valid_CertTreatment);
        $("#Valid_CertTreatmentText").val(data.Valid_CertTreatmentText);

        $("#Air_ValidPOA").val(data.Air_ValidPOA);
        $("#Air_ValidPOAText").val(data.Air_ValidPOAText);
        $("#Air_EmissionPOA").val(data.Air_EmissionPOA);
        $("#Air_EmissionPOAText").val(data.Air_EmissionPOAText);
        $("#Air_DisplayInstallation").val(data.Air_DisplayInstallation);
        $("#Air_DisplayInstallationText").val(data.Air_DisplayInstallationText);
        $("#Air_PermitCondition").val(data.Air_PermitCondition);
        $("#Air_PermitConditionText").val(data.Air_PermitConditionText);
        $("#Air_WindDevice").val(data.Air_WindDevice);
        $("#Air_WindDeviceText").val(data.Air_WindDeviceText);
        $("#Air_PlantOperationProblem").val(data.Air_PlantOperationProblem);
        $("#Air_PlantOperationProblemText").val(
          data.Air_PlantOperationProblemText
        );

        $("#Air_CCTVInstalled").val(data.Air_CCTVInstalled);
        $("#Air_CCTVInstalledText").val(data.Air_CCTVInstalledText);
        $("#Air_CEMSorPEMS").val(data.Air_CEMSorPEMS);
        $("#Air_CEMSorPEMSText").val(data.Air_CEMSorPEMSText);
        $("#Air_YearlyRATA").val(data.Air_YearlyRATA);
        $("#Air_YearlyRATAText").val(data.Air_YearlyRATAText);
        $("#Air_EmissionTestStandard").val(data.Air_EmissionTestStandard);
        $("#Air_EmissionTestStandardText").val(
          data.Air_EmissionTestStandardText
        );
        $("#Air_AmbientQualityStandard").val(data.Air_AmbientQualityStandard);
        $("#Air_AmbientQualityStandardText").val(
          data.Air_AmbientQualityStandardText
        );

        $(".modal-title").html("<strong>Edit Report</strong>");
        $("#action").val("updateRecord");
        $("#save").val("Save");

        // Checkbox
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

        if (data.VerifyAccuracy == "true") {
          document.getElementById("verify").checked = true;
        }

        if (data.PMPIN_Hazardous == "NEW") {
          document.getElementById("PMPIN_HazardousNew").checked = true;
        }

        if (data.PMPIN_Hazardous == "RENEW") {
          document.getElementById("PMPIN_HazardousRenew").checked = true;
        }

        if (data.PMPIN_Hazardous == "NOT APPLICABLE") {
          document.getElementById("PMPIN_HazardousNA").checked = true;
        }

        if (data.HWIDRegistration == "NEW") {
          document.getElementById("HWIDRegistrationNew").checked = true;
        }

        if (data.HWIDRegistration == "RENEW") {
          document.getElementById("HWIDRegistrationRenew").checked = true;
        }

        if (data.HWIDRegistration == "NOT APPLICABLE") {
          document.getElementById("HWIDRegistrationNA").checked = true;
        }

        if (data.HWTRegistration == "NEW") {
          document.getElementById("HWTRegistrationNew").checked = true;
        }

        if (data.HWTRegistration == "RENEW") {
          document.getElementById("HWTRegistrationRenew").checked = true;
        }

        if (data.HWTRegistration == "NOT APPLICABLE") {
          document.getElementById("HWTRegistrationNA").checked = true;
        }

        if (data.HWTSDRegistration == "NEW") {
          document.getElementById("HWTSDRegistrationNew").checked = true;
        }

        if (data.HWTSDRegistration == "RENEW") {
          document.getElementById("HWTSDRegistrationRenew").checked = true;
        }

        if (data.HWTSDRegistration == "NOT APPLICABLE") {
          document.getElementById("HWTSDRegistrationNA").checked = true;
        }

        if (data.HWTSDRegistration == "NEW") {
          document.getElementById("HWTSDRegistrationNew").checked = true;
        }

        if (data.HWTSDRegistration == "RENEW") {
          document.getElementById("HWTSDRegistrationRenew").checked = true;
        }

        if (data.HWTSDRegistration == "NOT APPLICABLE") {
          document.getElementById("HWTSDRegistrationNA").checked = true;
        }

        if (data.PTOAPCI == "NEW") {
          document.getElementById("PTOAPCINew").checked = true;
        }

        if (data.PTOAPCI == "RENEW") {
          document.getElementById("PTOAPCIRenew").checked = true;
        }

        if (data.PTOAPCI == "NOT APPLICABLE") {
          document.getElementById("PTOAPCINA").checked = true;
        }

        if (data.DischargePermit == "NEW") {
          document.getElementById("DischargePermitNew").checked = true;
        }

        if (data.DischargePermit == "RENEW") {
          document.getElementById("DischargePermitRenew").checked = true;
        }

        if (data.DischargePermit == "NOT APPLICABLE") {
          document.getElementById("DischargePermitNA").checked = true;
        }

        if (data.DetermineCompliance == "true") {
          document.getElementById("determinecompliance").checked = true;
        }

        if (data.InvestigateComplaints == "true") {
          document.getElementById("investigatecomplaints").checked = true;
        }

        if (data.StatusCommitments == "true") {
          document.getElementById("statuscommitments").checked = true;
        }

        if (data.EwatchProgram == "true") {
          document.getElementById("ewatchprogram").checked = true;
        }

        if (data.PEPP == "true") {
          document.getElementById("PEPP").checked = true;
        }

        if (data.PAB == "true") {
          document.getElementById("pab").checked = true;
        }

        // Others Person Verification Button
        if (data.OthersPV == "true") {
          $("#otherspv").prop("checked", true);
          $("#otherspv_text").show();
        } else {
          $("#otherspv_text").val = "";
          $("#otherspv_text").hide();
        }

        $("#otherspv").click(function () {
          if ($(this).is(":checked")) {
            // Show the hidden input
            $("#otherspv_text").show();
          }
          if ($(this).is(":unchecked")) {
            // Hide the hidden input
            $("#otherspv_text").val("");
            $("#otherspv_text").hide();
          } else {
            $("#otherspv_text").val(data.OthersPV_Text);
            $("#otherspv_text").show();
          }
        });

        //Others Check Button
        if (data.Others == "true") {
          $("#others").prop("checked", true);
          $("#others_text").show();
        } else {
          $("#others_text").val = "";
          $("#others_text").hide();
        }

        $("#others").click(function () {
          if ($(this).is(":checked")) {
            // Show the hidden input
            $("#others_text").show();
          }
          if ($(this).is(":unchecked")) {
            // Hide the hidden input
            $("#others_text").val("");
            $("#others_text").hide();
          } else {
            $("#others_text").val(data.Others_Text);
            $("#others_text").show();
          }
        });

        // PSIC Select2 Show Value from Database
        $("#PSICCode").val(data.PSIC).trigger("change");
        var selectElementPSIC = $("#PSICCode");
        var currentValuePSIC = selectElementPSIC.val();
        selectElementPSIC.select2("destroy");
        selectElementPSIC.val(currentValuePSIC).select2();

        // Product Select2 Show Value from Database
        $("#Product").val(data.Product).trigger("change");
        var selectElementProduct = $("#Product");
        var currentValueProduct = selectElementProduct.val();
        selectElementProduct.select2("destroy");
        selectElementProduct.val(currentValueProduct).select2();

        // PCL Compliance Select2 Show Value from Database
        $("#Haz_PCLCompliance").val(data.Haz_PCLCompliance).trigger("change");
        var Haz_PCLCompliance = $("#Haz_PCLCompliance");
        var currentValueHaz_PCLCompliance = Haz_PCLCompliance.val();
        Haz_PCLCompliance.select2("destroy");
        Haz_PCLCompliance.val(currentValueHaz_PCLCompliance).select2();

        $("#Annual_Reporting").val(data.Annual_Reporting).trigger("change");
        var Annual_Reporting = $("#Annual_Reporting");
        var currentValueAnnual_Reporting = Annual_Reporting.val();
        Annual_Reporting.select2("destroy");
        Annual_Reporting.val(currentValueAnnual_Reporting).select2();

        $("#Biennial_Report").val(data.Biennial_Report).trigger("change");
        var Biennial_Report = $("#Biennial_Report");
        var currentValueBiennial_Report = Biennial_Report.val();
        Biennial_Report.select2("destroy");
        Biennial_Report.val(currentValueBiennial_Report).select2();

        $("#CCO_Registration").val(data.CCO_Registration).trigger("change");
        var CCO_Registration = $("#CCO_Registration");
        var currentValueCCO_Registration = CCO_Registration.val();
        CCO_Registration.select2("destroy");
        CCO_Registration.val(currentValueCCO_Registration).select2();

        $("#Importation").val(data.Importation).trigger("change");
        var Importation = $("#Importation");
        var currentValueImportation = Importation.val();
        Importation.select2("destroy");
        Importation.val(currentValueImportation).select2();

        $("#Valid_ImportanceClearance")
          .val(data.Valid_ImportanceClearance)
          .trigger("change");
        var Valid_ImportanceClearance = $("#Valid_ImportanceClearance");
        var currentValueValid_ImportanceClearance =
          Valid_ImportanceClearance.val();
        Valid_ImportanceClearance.select2("destroy");
        Valid_ImportanceClearance.val(
          currentValueValid_ImportanceClearance
        ).select2();

        $("#Bill_Lading").val(data.Bill_Lading).trigger("change");
        var Bill_Lading = $("#Bill_Lading");
        var currentValueBill_Lading = Bill_Lading.val();
        Bill_Lading.select2("destroy");
        Bill_Lading.val(currentValueBill_Lading).select2();

        $("#Registration_HWG").val(data.Registration_HWG).trigger("change");
        var Registration_HWG = $("#Registration_HWG");
        var currentValueRegistration_HWG = Registration_HWG.val();
        Registration_HWG.select2("destroy");
        Registration_HWG.val(currentValueRegistration_HWG).select2();

        $("#Temp_HazStorageFacility")
          .val(data.Temp_HazStorageFacility)
          .trigger("change");
        var Temp_HazStorageFacility = $("#Temp_HazStorageFacility");
        var currentValueTemp_HazStorageFacility = Temp_HazStorageFacility.val();
        Temp_HazStorageFacility.select2("destroy");
        Temp_HazStorageFacility.val(
          currentValueTemp_HazStorageFacility
        ).select2();

        $("#Report_HazGenerated")
          .val(data.Report_HazGenerated)
          .trigger("change");
        var Report_HazGenerated = $("#Report_HazGenerated");
        var currentValueReport_HazGenerated = Report_HazGenerated.val();
        Report_HazGenerated.select2("destroy");
        Report_HazGenerated.val(currentValueReport_HazGenerated).select2();

        $("#Haz_WasteLabelled").val(data.Haz_WasteLabelled).trigger("change");
        var Haz_WasteLabelled = $("#Haz_WasteLabelled");
        var currentValueHaz_WasteLabelled = Haz_WasteLabelled.val();
        Haz_WasteLabelled.select2("destroy");
        Haz_WasteLabelled.val(currentValueHaz_WasteLabelled).select2();

        $("#Valid_PermitTranspo")
          .val(data.Valid_PermitTranspo)
          .trigger("change");
        var Valid_PermitTranspo = $("#Valid_PermitTranspo");
        var currentValueValid_PermitTranspo = Valid_PermitTranspo.val();
        Valid_PermitTranspo.select2("destroy");
        Valid_PermitTranspo.val(currentValueValid_PermitTranspo).select2();

        $("#Valid_RegTranspoTreaters")
          .val(data.Valid_RegTranspoTreaters)
          .trigger("change");
        var Valid_RegTranspoTreaters = $("#Valid_RegTranspoTreaters");
        var currentValueValid_RegTranspoTreaters =
          Valid_RegTranspoTreaters.val();
        Valid_RegTranspoTreaters.select2("destroy");
        Valid_RegTranspoTreaters.val(
          currentValueValid_RegTranspoTreaters
        ).select2();

        $("#Waste_Transporter").val(data.Waste_Transporter).trigger("change");
        var Waste_Transporter = $("#Waste_Transporter");
        var currentValueWaste_Transporter = Waste_Transporter.val();
        Waste_Transporter.select2("destroy");
        Waste_Transporter.val(currentValueWaste_Transporter).select2();

        $("#Valid_CertTreatment")
          .val(data.Valid_CertTreatment)
          .trigger("change");
        var Valid_CertTreatment = $("#Valid_CertTreatment");
        var currentValueValid_CertTreatment = Valid_CertTreatment.val();
        Valid_CertTreatment.select2("destroy");
        Valid_CertTreatment.val(currentValueValid_CertTreatment).select2();

        $("#Air_ValidPOA").val(data.Air_ValidPOA).trigger("change");
        var Air_ValidPOA = $("#Air_ValidPOA");
        var currentValueAir_ValidPOA = Air_ValidPOA.val();
        Air_ValidPOA.select2("destroy");
        Air_ValidPOA.val(currentValueAir_ValidPOA).select2();

        $("#Air_EmissionPOA").val(data.Air_EmissionPOA).trigger("change");
        var Air_EmissionPOA = $("#Air_EmissionPOA");
        var currentValueAir_EmissionPOA = Air_EmissionPOA.val();
        Air_EmissionPOA.select2("destroy");
        Air_EmissionPOA.val(currentValueAir_EmissionPOA).select2();

        $("#Air_DisplayInstallation")
          .val(data.Air_DisplayInstallation)
          .trigger("change");
        var Air_DisplayInstallation = $("#Air_DisplayInstallation");
        var currentValueAir_DisplayInstallation = Air_DisplayInstallation.val();
        Air_DisplayInstallation.select2("destroy");
        Air_DisplayInstallation.val(
          currentValueAir_DisplayInstallation
        ).select2();

        $("#Air_PermitCondition")
          .val(data.Air_PermitCondition)
          .trigger("change");
        var Air_PermitCondition = $("#Air_PermitCondition");
        var currentValueAir_PermitCondition = Air_PermitCondition.val();
        Air_PermitCondition.select2("destroy");
        Air_PermitCondition.val(currentValueAir_PermitCondition).select2();

        $("#Air_WindDevice").val(data.Air_WindDevice).trigger("change");
        var Air_WindDevice = $("#Air_WindDevice");
        var currentValueAir_WindDevice = Air_WindDevice.val();
        Air_WindDevice.select2("destroy");
        Air_WindDevice.val(currentValueAir_WindDevice).select2();

        $("#Air_PlantOperationProblem")
          .val(data.Air_PlantOperationProblem)
          .trigger("change");
        var Air_PlantOperationProblem = $("#Air_PlantOperationProblem");
        var currentValueAir_PlantOperationProblem =
          Air_PlantOperationProblem.val();
        Air_PlantOperationProblem.select2("destroy");
        Air_PlantOperationProblem.val(
          currentValueAir_PlantOperationProblem
        ).select2();

        $("#Air_CCTVInstalled").val(data.Air_CCTVInstalled).trigger("change");
        var Air_CCTVInstalled = $("#Air_CCTVInstalled");
        var currentValueAir_CCTVInstalled = Air_CCTVInstalled.val();
        Air_CCTVInstalled.select2("destroy");
        Air_CCTVInstalled.val(currentValueAir_CCTVInstalled).select2();

        $("#Air_CEMSorPEMS").val(data.Air_CEMSorPEMS).trigger("change");
        var Air_CEMSorPEMS = $("#Air_CEMSorPEMS");
        var currentValueAir_CEMSorPEMS = Air_CEMSorPEMS.val();
        Air_CEMSorPEMS.select2("destroy");
        Air_CEMSorPEMS.val(currentValueAir_CEMSorPEMS).select2();

        $("#Air_YearlyRATA").val(data.Air_YearlyRATA).trigger("change");
        var Air_YearlyRATA = $("#Air_YearlyRATA");
        var currentValueAir_YearlyRATA = Air_YearlyRATA.val();
        Air_YearlyRATA.select2("destroy");
        Air_YearlyRATA.val(currentValueAir_YearlyRATA).select2();

        $("#Air_EmissionTestStandard")
          .val(data.Air_EmissionTestStandard)
          .trigger("change");
        var Air_EmissionTestStandard = $("#Air_EmissionTestStandard");
        var currentValueAir_EmissionTestStandard =
          Air_EmissionTestStandard.val();
        Air_EmissionTestStandard.select2("destroy");
        Air_EmissionTestStandard.val(
          currentValueAir_EmissionTestStandard
        ).select2();

        $("#Air_AmbientQualityStandard")
          .val(data.Air_AmbientQualityStandard)
          .trigger("change");
        var Air_AmbientQualityStandard = $("#Air_AmbientQualityStandard");
        var currentValueAir_AmbientQualityStandard =
          Air_AmbientQualityStandard.val();
        Air_AmbientQualityStandard.select2("destroy");
        Air_AmbientQualityStandard.val(
          currentValueAir_AmbientQualityStandard
        ).select2();

        // Please modify
        var data = data.ECC_Condition;

        var dataArray = data.split(";");

        dataArray.forEach(function (value) {
          var input = document.createElement("input");

          input.type = "text";
          input.className = "form-control";
          input.value = value;

          var container = document.getElementById("id123");
          container.appendChild(input);
        });
        //
      },
    });

    $(document).on("click", ".btn_remove", function () {
      var button_id = $(this).attr("id");
      $("#row" + button_id + "").remove();
    });
    //
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

  $("#closebtn").click(function () {
    document.getElementById("recordForm").reset();
  });
});

// Create Record others checked check
function others() {
  otherspv1 = document.getElementById("otherspv1");
  otherspv_text1 = document.getElementById("otherspv1_text");
  otherspv = document.getElementById("otherspv");

  if (otherspv1.checked == true) {
    otherspv_text1.style.display = "block";
  } else {
    otherspv_text1.style.display = "none";
  }

  var others1 = document.getElementById("others1");
  var others1_text = document.getElementById("others1_text");

  if (others1.checked == true) {
    others1_text.style.display = "block";
  } else {
    others1_text.style.display = "none";
  }
}

// Export PDF button
$("#recordListing").on("click", ".pdf", function () {
  var id = $(this).attr("id");
  console.log(id);
  var action = "pdfRecord";
  $.ajax({
    url: "../../build/php/ajax_action.php",
    method: "POST",
    data: { id: id, action: action },
  });
});

// Add and Remove row inserting data
var i = 1;
$("#add1").click(function () {
  i++;
  $("#dynamic_field1").append(
    '<tr id="row1' +
      i +
      '"><td><input type="text" name="ECC_Condition1[]" placeholder="ECC Condition" class="form-control name_list"/></td><td><button type="button" name="remove" id="' +
      i +
      '" class="btn btn-danger btn_remove1">X</button></td></tr>'
  );
});

$(document).on("click", ".btn_remove1", function () {
  var button_id = $(this).attr("id");
  $("#row1" + button_id + "").remove();
});
//

// Add and Remove row Updating data
var i = 1;
$("#add").click(function () {
  i++;
  $("#dynamic_field").append(
    '<tr id="row' +
      i +
      '"><td><input type="text" name="ECC_Condition[]" placeholder="ECC Condition" class="form-control name_list"/></td><td><button type="button" name="remove" id="' +
      i +
      '" class="btn btn-danger btn_remove">X</button></td></tr>'
  );
});
