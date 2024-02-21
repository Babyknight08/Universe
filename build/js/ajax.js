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

        ECC1.value = data.ReferenceNo;
        DENRID1.value = data.HWGID_PermitNumber;
        DENRID_DOI1.value = data.HWGID_IssuanceDate;
        DENRID_DE1.value = data.HWGID_ExpirationDate;
        POA_No1.value = data.PTO_PTOCode;
        POA_No_DOI1.value = data.PTO_IssuanceDate;
        POA_No_DE1.value = data.PTO_ExpirationDate;
        Discharge_Permit1.value = data.DP_WWDPCode;
        Discharge_Permit_DOI1.value = data.DP_IssuanceDate;
        Discharge_Permit_DE1.value = data.DP_ExpirationDate;
        TSD_RegistrationCert1.value = data.TSD_Permitnumber;
        TSD_RegistrationCert_DOI1.value = data.TSD_IssuanceDate;
        TSD_RegistrationCert_DE1.value = data.TSD_ExpirationDate;
        PCO1.value = data.PCO_PCOName;
        PCOAccreditation1.value = data.PCO_PCOCode;
        contactnumber1.value = data.PCO_ContactNo;
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

  // $("#recordModal").on("hide.bs.modal", (e) => {
  //   addECCCondition(tbody, numrows);
  // });

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
        $("#Latitude").val(data.Latitude);
        $("#Longitude").val(data.Longitude);
        $("#YearEstablished").val(data.YearEstablished);
        $("#operating_day").val(data.OperatingDay);
        $("#operating_week").val(data.OperatingWeek);
        $("#operating_year").val(data.OperatingYear);
        $("#MHead").val(data.ManagingHead);
        $("#Product_Line").val(data.Product_Line);
        $("#ProdRateECCDeclared").val(data.ProdRateECCDeclared);
        $("#ActualProdRate").val(data.ActualProdRate);
        $("#PCO").val(data.PCOName);
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
        $("#Water_ValidDP").val(data.Water_ValidDP);
        $("#Water_ValidDPText").val(data.Water_ValidDPText);
        $("#Water_VolumeDP").val(data.Water_VolumeDP);
        $("#Water_VolumeDPText").val(data.Water_VolumeDPText);
        $("#Water_PermitsComplied").val(data.Water_PermitsComplied);
        $("#Water_PermitsCompliedText").val(data.Water_PermitsCompliedText);
        $("#Water_FlowMeterDevice").val(data.Water_FlowMeterDevice);
        $("#Water_FlowMeterDeviceText").val(data.Water_FlowMeterDeviceText);
        $("#Water_CertifiedSiphoning").val(data.Water_CertifiedSiphoning);
        $("#Water_CertifiedSiphoningText").val(
          data.Water_CertifiedSiphoningText
        );
        $("#Water_ComplianceEffluent").val(data.Water_ComplianceEffluent);
        $("#Water_ComplianceEffluentText").val(
          data.Water_ComplianceEffluentText
        );
        $("#Water_AmbientQualityMonitoring").val(
          data.Water_AmbientQualityMonitoring
        );
        $("#Water_AmbientQualityMonitoringText").val(
          data.Water_AmbientQualityMonitoringText
        );
        $("#Water_PaymentWastewater").val(data.Water_PaymentWastewater);
        $("#Water_PaymentWastewaterText").val(data.Water_PaymentWastewaterText);

        $("#SWM_WasteSegregation").val(data.SWM_WasteSegregation);
        $("#SWM_WasteSegregationText").val(data.SWM_WasteSegregationText);
        $("#SWM_WasteDisposalFacilities").val(data.SWM_WasteDisposalFacilities);
        $("#SWM_WasteDisposalFacilitiesText").val(
          data.SWM_WasteDisposalFacilitiesText
        );
        $("#PCO_Guidelines").val(data.PCO_Guidelines);
        $("#PCO_GuidelinesText").val(data.PCO_GuidelinesText);
        $("#DAO_SMRSubmission").val(data.DAO_SMRSubmission);
        $("#DAO_SMRSubmissionText").val(data.DAO_SMRSubmissionText);
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

        if (data.HWIDRegistration == "NEW") {
          document.getElementById("HWIDRegistrationNew").checked = true;
        }

        if (data.HWIDRegistration == "RENEW") {
          document.getElementById("HWIDRegistrationRenew").checked = true;
        }

        if (data.HWTRegistration == "NEW") {
          document.getElementById("HWTRegistrationNew").checked = true;
        }

        if (data.HWTRegistration == "RENEW") {
          document.getElementById("HWTRegistrationRenew").checked = true;
        }

        if (data.HWTSDRegistration == "NEW") {
          document.getElementById("HWTSDRegistrationNew").checked = true;
        }

        if (data.HWTSDRegistration == "RENEW") {
          document.getElementById("HWTSDRegistrationRenew").checked = true;
        }

        if (data.HWTSDRegistration == "NEW") {
          document.getElementById("HWTSDRegistrationNew").checked = true;
        }

        if (data.HWTSDRegistration == "RENEW") {
          document.getElementById("HWTSDRegistrationRenew").checked = true;
        }

        if (data.PTOAPCI == "NEW") {
          document.getElementById("PTOAPCINew").checked = true;
        }

        if (data.PTOAPCI == "RENEW") {
          document.getElementById("PTOAPCIRenew").checked = true;
        }

        if (data.DischargePermit == "NEW") {
          document.getElementById("DischargePermitNew").checked = true;
        }

        if (data.DischargePermit == "RENEW") {
          document.getElementById("DischargePermitRenew").checked = true;
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

        switch (data.EIS_System) {
          case "Compliant":
            document.getElementById("checkboxEIS_SystemA").checked = true;
            break;
          case "Non-Compliant":
            document.getElementById("checkboxEIS_SystemB").checked = true;
            break;
          default:
            document.getElementById("checkboxEIS_SystemC").checked = true;
            break;
        }

        switch (data.Chemical_Management) {
          case "Compliant":
            document.getElementById("Chemical_ManagementA").checked = true;
            break;
          case "Non-Compliant":
            document.getElementById("Chemical_ManagementB").checked = true;
            break;
          default:
            document.getElementById("Chemical_ManagementC").checked = true;
            break;
        }

        switch (data.HW_Management) {
          case "Compliant":
            document.getElementById("HW_ManagementA").checked = true;
            break;
          case "Non-Compliant":
            document.getElementById("HW_ManagementB").checked = true;
            break;
          default:
            document.getElementById("HW_ManagementC").checked = true;
            break;
        }

        switch (data.AQ_Management) {
          case "Compliant":
            document.getElementById("AQ_ManagementA").checked = true;
            break;
          case "Non-Compliant":
            document.getElementById("AQ_ManagementB").checked = true;
            break;
          default:
            document.getElementById("AQ_ManagementC").checked = true;
            break;
        }

        switch (data.WQ_Management) {
          case "Compliant":
            document.getElementById("WQ_ManagementA").checked = true;
            break;
          case "Non-Compliant":
            document.getElementById("WQ_ManagementB").checked = true;
            break;
          default:
            document.getElementById("WQ_ManagementC").checked = true;
            break;
        }

        switch (data.SW_Management) {
          case "Compliant":
            document.getElementById("SW_ManagementA").checked = true;
            break;
          case "Non-Compliant":
            document.getElementById("SW_ManagementB").checked = true;
            break;
          default:
            document.getElementById("SW_ManagementC").checked = true;
            break;
        }

        switch (data.Commitment_TechCon) {
          case "Compliant":
            document.getElementById("Commitment_TechConA").checked = true;
            break;
          case "Non-Compliant":
            document.getElementById("Commitment_TechConB").checked = true;
            break;
          default:
            document.getElementById("Commitment_TechConC").checked = true;
            break;
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

        //

        $("#Water_ValidDP").val(data.Water_ValidDP).trigger("change");
        var Water_ValidDP = $("#Water_ValidDP");
        var currentValueWater_ValidDP = Water_ValidDP.val();
        Water_ValidDP.select2("destroy");
        Water_ValidDP.val(currentValueWater_ValidDP).select2();

        $("#Water_VolumeDP").val(data.Water_VolumeDP).trigger("change");
        var Water_VolumeDP = $("#Water_VolumeDP");
        var currentValueWater_VolumeDP = Water_VolumeDP.val();
        Water_VolumeDP.select2("destroy");
        Water_VolumeDP.val(currentValueWater_VolumeDP).select2();

        $("#Water_PermitsComplied")
          .val(data.Water_PermitsComplied)
          .trigger("change");
        var Water_PermitsComplied = $("#Water_PermitsComplied");
        var currentValueWater_PermitsComplied = Water_PermitsComplied.val();
        Water_PermitsComplied.select2("destroy");
        Water_PermitsComplied.val(currentValueWater_PermitsComplied).select2();

        $("#Water_FlowMeterDevice")
          .val(data.Water_FlowMeterDevice)
          .trigger("change");
        var Water_FlowMeterDevice = $("#Water_FlowMeterDevice");
        var currentValueWater_FlowMeterDevice = Water_FlowMeterDevice.val();
        Water_FlowMeterDevice.select2("destroy");
        Water_FlowMeterDevice.val(currentValueWater_FlowMeterDevice).select2();

        $("#Water_CertifiedSiphoning")
          .val(data.Water_CertifiedSiphoning)
          .trigger("change");
        var Water_CertifiedSiphoning = $("#Water_CertifiedSiphoning");
        var currentValueWater_CertifiedSiphoning =
          Water_CertifiedSiphoning.val();
        Water_CertifiedSiphoning.select2("destroy");
        Water_CertifiedSiphoning.val(
          currentValueWater_CertifiedSiphoning
        ).select2();

        $("#Water_ComplianceEffluent")
          .val(data.Water_ComplianceEffluent)
          .trigger("change");
        var Water_ComplianceEffluent = $("#Water_ComplianceEffluent");
        var currentValueWater_ComplianceEffluent =
          Water_ComplianceEffluent.val();
        Water_ComplianceEffluent.select2("destroy");
        Water_ComplianceEffluent.val(
          currentValueWater_ComplianceEffluent
        ).select2();

        $("#Water_AmbientQualityMonitoring")
          .val(data.Water_AmbientQualityMonitoring)
          .trigger("change");
        var Water_AmbientQualityMonitoring = $(
          "#Water_AmbientQualityMonitoring"
        );
        var currentValueWater_AmbientQualityMonitoring =
          Water_AmbientQualityMonitoring.val();
        Water_AmbientQualityMonitoring.select2("destroy");
        Water_AmbientQualityMonitoring.val(
          currentValueWater_AmbientQualityMonitoring
        ).select2();

        $("#Water_PaymentWastewater")
          .val(data.Water_PaymentWastewater)
          .trigger("change");
        var Water_PaymentWastewater = $("#Water_PaymentWastewater");
        var currentValueWater_PaymentWastewater = Water_PaymentWastewater.val();
        Water_PaymentWastewater.select2("destroy");
        Water_PaymentWastewater.val(
          currentValueWater_PaymentWastewater
        ).select2();

        $("#SWM_WasteSegregation")
          .val(data.SWM_WasteSegregation)
          .trigger("change");
        var SWM_WasteSegregation = $("#SWM_WasteSegregation");
        var currentValueSWM_WasteSegregation = SWM_WasteSegregation.val();
        SWM_WasteSegregation.select2("destroy");
        SWM_WasteSegregation.val(currentValueSWM_WasteSegregation).select2();

        $("#SWM_WasteDisposalFacilities")
          .val(data.SWM_WasteDisposalFacilities)
          .trigger("change");
        var SWM_WasteDisposalFacilities = $("#SWM_WasteDisposalFacilities");
        var currentValueSWM_WasteDisposalFacilities =
          SWM_WasteDisposalFacilities.val();
        SWM_WasteDisposalFacilities.select2("destroy");
        SWM_WasteDisposalFacilities.val(
          currentValueSWM_WasteDisposalFacilities
        ).select2();

        $("#PCO_Guidelines").val(data.PCO_Guidelines).trigger("change");
        var PCO_Guidelines = $("#PCO_Guidelines");
        var currentValuePCO_Guidelines = PCO_Guidelines.val();
        PCO_Guidelines.select2("destroy");
        PCO_Guidelines.val(currentValuePCO_Guidelines).select2();

        $("#DAO_SMRSubmission").val(data.DAO_SMRSubmission).trigger("change");
        var DAO_SMRSubmission = $("#DAO_SMRSubmission");
        var currentValueDAO_SMRSubmission = DAO_SMRSubmission.val();
        DAO_SMRSubmission.select2("destroy");
        DAO_SMRSubmission.val(currentValueDAO_SMRSubmission).select2();
        //

        //----------------------------------------------------------------------------------------------------------

        var storedECC_ConditionArr = data.ECC_Condition.split("|");
        var storedECC_ConditionRemarks = data.ECC_ConditionRemarks.split("|");
        var storedECC_ConditionSelect = data.ECC_ConditionSelect.split("|");

        // Clear the existing rows
        var eccid = document.getElementById("dynamic_field");
        var ecctbody = eccid.getElementsByTagName("tbody")[0];
        ecctbody.innerHTML = "";

        // Display the stored data in the form
        storedECC_ConditionArr.forEach((el, index) => {
          var tr = document.createElement("tr");
          tr.id = "row" + index;

          var tdInput = document.createElement("td");
          var inputElement = document.createElement("textarea");
          inputElement.value = el;
          inputElement.className = "form-control";
          inputElement.type = "textarea";
          inputElement.name = "ECC_Condition[]";
          tdInput.append(inputElement);

          var tdinputECCSelect = document.createElement("td");
          var inputECCSelect = document.createElement("select");
          inputECCSelect.className = "form-control select2";
          inputECCSelect.name = "ECC_ConditionSelect[]";

          var optionCompliant = document.createElement("option");
          optionCompliant.text = "Yes";
          optionCompliant.value = "Yes";
          if (storedECC_ConditionSelect[index] === "Yes") {
            optionCompliant.selected = true;
          }
          inputECCSelect.add(optionCompliant);
          var optionNonCompliant = document.createElement("option");
          optionNonCompliant.text = "No";
          optionNonCompliant.value = "No";
          if (storedECC_ConditionSelect[index] === "No") {
            optionNonCompliant.selected = true;
          }
          inputECCSelect.add(optionNonCompliant);

          var optionNA = document.createElement("option");
          optionNA.text = "N/A";
          optionNA.value = "N/A";
          if (storedECC_ConditionSelect[index] === "N/A") {
            optionNA.selected = true;
          }
          inputECCSelect.add(optionNA);

          tdinputECCSelect.append(inputECCSelect);

          var tdEccRemarks = document.createElement("td");
          var eccRemarks = document.createElement("textarea");
          eccRemarks.className = "form-control";
          eccRemarks.name = "ECC_ConditionRemarks[]";
          eccRemarks.value = storedECC_ConditionRemarks[index];
          tdEccRemarks.append(eccRemarks);

          var tdButton = document.createElement("td");
          var button = document.createElement("button");
          button.innerHTML = "X";
          button.type = "button";
          button.name = "btn-eccCondition";
          button.className = "btn btn-danger btn-sm";
          button.addEventListener("click", function () {
            tr.remove();
          });

          tdButton.append(button);

          tr.append(tdInput);
          tr.append(tdinputECCSelect);
          tr.append(tdEccRemarks);
          tr.append(tdButton);

          ecctbody.appendChild(tr);
        });

        // NAKADI AK KNINA!

        let eissDataContainer = document.getElementById("eissDataContainer");
        let table_eiss = document.getElementById("table_eiss");
        let tbody = table_eiss.getElementsByTagName("tbody")[0];

        // Clear existing data in the table
        tbody.innerHTML = "";

        if (
          data.EIS_System === "Compliant" ||
          data.EIS_System === "Non-Compliant"
        ) {
          eissDataContainer.style.display = "block";

          let EIS_Data1 = data.EISS_Data.split("|");

          EIS_Data1.forEach((el) => {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            let inputText = document.createElement("textarea");
            inputText.textContent = el;
            inputText.className = "form-control";
            inputText.type = "text";
            inputText.name = "eissData[]";

            let tdButton = document.createElement("td");
            let button = document.createElement("button");
            button.innerHTML = "X";
            button.type = "button";
            button.name = "eiss_remove";
            button.className = "btn btn-danger btn-sm";
            tdButton.appendChild(button);

            td.appendChild(inputText);
            tr.appendChild(td);
            tr.appendChild(tdButton);
            tbody.appendChild(tr);

            button.addEventListener("click", function () {
              tr.remove();
            });
          });
        } else {
          inputText = document.createElement("input");
          inputText.value = "";
          inputText.name = "eissData[]";
          eissDataContainer.style.display = "none";
          tbody.innerHTML = "";
        }

        // Get checkbox elements
        const checkboxEIS_SystemA = document.getElementById(
          "checkboxEIS_SystemA"
        );
        const checkboxEIS_SystemB = document.getElementById(
          "checkboxEIS_SystemB"
        );
        const checkboxEIS_SystemC = document.getElementById(
          "checkboxEIS_SystemC"
        );

        // Add event listener for checkboxEIS_SystemA
        checkboxEIS_SystemA.addEventListener("change", () => {
          const eissDataContainer =
            document.getElementById("eissDataContainer");
          const table_eiss = document.getElementById("table_eiss");
          const tbody = table_eiss.getElementsByTagName("tbody")[0];

          // Remove existing rows
          tbody.innerHTML = "";

          if (checkboxEIS_SystemA.checked) {
            eissDataContainer.style.display = "block";
            const EIS_Data1 = data.EISS_Data.split("|");

            // Check if EIS_Data1 array has any elements
            if (EIS_Data1.length > 0) {
              EIS_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "eissData[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "eiss_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody.appendChild(tr);
            }
          } else {
            eissDataContainer.style.display = "none";
          }
        });

        // Add event listener for checkboxEIS_SystemB
        checkboxEIS_SystemB.addEventListener("change", () => {
          const eissDataContainer =
            document.getElementById("eissDataContainer");
          const table_eiss = document.getElementById("table_eiss");
          const tbody = table_eiss.getElementsByTagName("tbody")[0];

          // Remove existing rows
          tbody.innerHTML = "";

          if (checkboxEIS_SystemB.checked) {
            eissDataContainer.style.display = "block";
            const EIS_Data1 = data.EISS_Data.split("|");
            EIS_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "eissData[]";

              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "eiss_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);

              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody.appendChild(tr);

              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            const EIS_Data1 = data.EISS_Data.split("|");
            EIS_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Chemical_Management_Data[]";

              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Chemical_Management_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);

              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody.appendChild(tr);

              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          }
        });

        // Add event listener for checkboxEIS_SystemC
        checkboxEIS_SystemC.addEventListener("change", () => {
          const eissDataContainer =
            document.getElementById("eissDataContainer");
          eissDataContainer.style.display = "none";

          const eissDataInputs = document.getElementsByName("eissData[]");
          eissDataInputs.forEach((input) => {
            input.value = "";
          });
        });

        //  start chem
        let Chemical_ManagementContainer = document.getElementById(
          "Chemical_ManagementContainer"
        );
        let table_Chemical_Management = document.getElementById(
          "table_Chemical_Management"
        );
        let tbody_chem_management = table_Chemical_Management.querySelector(
          "tbody#tbody_chem_management"
        );

        tbody_chem_management.innerHTML = "";

        if (
          data.Chemical_Management === "Compliant" ||
          data.Chemical_Management === "Non-Compliant"
        ) {
          Chemical_ManagementContainer.style.display = "block";

          let Chemical_Management_Data1 =
            data.Chemical_Management_Data.split("|");

          Chemical_Management_Data1.forEach((el) => {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            let inputText = document.createElement("textarea");
            inputText.textContent = el;
            inputText.className = "form-control";
            inputText.type = "text";
            inputText.name = "Chemical_Management_Data[]";

            let tdButton = document.createElement("td");
            let button = document.createElement("button");
            button.innerHTML = "X";
            button.type = "button";
            button.name = "Chemical_Management_remove";
            button.className = "btn btn-danger btn-sm";
            tdButton.appendChild(button);

            td.appendChild(inputText);
            tr.appendChild(td);
            tr.appendChild(tdButton);
            tbody_chem_management.appendChild(tr);

            button.addEventListener("click", function () {
              tr.remove();
            });
          });
        } else {
          inputText = document.createElement("input");
          inputText.value = "";
          inputText.name = "Chemical_Management_Data[]";
          Chemical_ManagementContainer.style.display = "none";
          tbody_chem_management.innerHTML = "";
        }

        const Chemical_ManagementA = document.getElementById(
          "Chemical_ManagementA"
        );
        const Chemical_ManagementB = document.getElementById(
          "Chemical_ManagementB"
        );
        const Chemical_ManagementC = document.getElementById(
          "Chemical_ManagementC"
        );

        Chemical_ManagementA.addEventListener("change", () => {
          const Chemical_ManagementContainer = document.getElementById(
            "Chemical_ManagementContainer"
          );
          const table_Chemical_Management = document.getElementById(
            "table_Chemical_Management"
          );
          let tbody_chem_management = table_Chemical_Management.querySelector(
            "tbody#tbody_chem_management"
          );

          tbody_chem_management.innerHTML = "";

          if (Chemical_ManagementA.checked) {
            Chemical_ManagementContainer.style.display = "block";
            const Chemical_Management_Data1 =
              data.Chemical_Management_Data.split("|");

            if (Chemical_Management_Data1.length > 0) {
              Chemical_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Chemical_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Chemical_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_chem_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = "";

              tr.appendChild(td);
              tbody_chem_management.appendChild(tr);
            }
          } else {
            Chemical_ManagementContainer.style.display = "none";
          }
        });

        Chemical_ManagementB.addEventListener("change", () => {
          const Chemical_ManagementContainer = document.getElementById(
            "Chemical_ManagementContainer"
          );
          const table_Chemical_Management = document.getElementById(
            "table_Chemical_Management"
          );
          let tbody_chem_management = table_Chemical_Management.querySelector(
            "tbody#tbody_chem_management"
          );

          tbody_chem_management.innerHTML = "";

          if (Chemical_ManagementB.checked) {
            Chemical_ManagementContainer.style.display = "block";
            const Chemical_Management_Data1 =
              data.Chemical_Management_Data.split("|");

            if (Chemical_Management_Data1.length > 0) {
              Chemical_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Chemical_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Chemical_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_chem_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_chem_management.appendChild(tr);
            }
          } else {
            Chemical_ManagementContainer.style.display = "none";
          }
        });

        // Add event listener for checkboxEIS_SystemC
        Chemical_ManagementC.addEventListener("change", () => {
          const Chemical_ManagementContainer = document.getElementById(
            "Chemical_ManagementContainer"
          );
          Chemical_ManagementContainer.style.display = "none";

          const Chemical_Management_DataInput = document.getElementsByName(
            "Chemical_Management_Data[]"
          );
          Chemical_Management_DataInput.forEach((input) => {
            input.value = "";
          });
        });

        // start hw management
        //  start chem
        let HW_ManagementContainer = document.getElementById(
          "HW_ManagementContainer"
        );
        let table_HW_Management = document.getElementById(
          "table_HW_Management"
        );
        let tbody_hw_management = table_HW_Management.querySelector(
          "tbody#tbody_hw_management"
        );

        tbody_hw_management.innerHTML = "";

        if (
          data.HW_Management === "Compliant" ||
          data.HW_Management === "Non-Compliant"
        ) {
          HW_ManagementContainer.style.display = "block";

          let HW_Management_Data1 = data.HW_Management_Data.split("|");

          HW_Management_Data1.forEach((el) => {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            let inputText = document.createElement("textarea");
            inputText.textContent = el;
            inputText.className = "form-control";
            inputText.type = "text";
            inputText.name = "HW_Management_Data[]";

            let tdButton = document.createElement("td");
            let button = document.createElement("button");
            button.innerHTML = "X";
            button.type = "button";
            button.name = "HW_Management_remove";
            button.className = "btn btn-danger btn-sm";
            tdButton.appendChild(button);

            td.appendChild(inputText);
            tr.appendChild(td);
            tr.appendChild(tdButton);
            tbody_hw_management.appendChild(tr);

            button.addEventListener("click", function () {
              tr.remove();
            });
          });
        } else {
          inputText = document.createElement("input");
          inputText.value = "";
          inputText.name = "HW_Management_Data[]";
          HW_ManagementContainer.style.display = "none";
          tbody_hw_management.innerHTML = "";
        }

        const HW_ManagementA = document.getElementById("HW_ManagementA");
        const HW_ManagementB = document.getElementById("HW_ManagementB");
        const HW_ManagementC = document.getElementById("HW_ManagementC");

        HW_ManagementA.addEventListener("change", () => {
          const HW_ManagementContainer = document.getElementById(
            "HW_ManagementContainer"
          );
          const table_HW_Management = document.getElementById(
            "table_HW_Management"
          );
          let tbody_hw_management = table_HW_Management.querySelector(
            "tbody#tbody_hw_management"
          );

          tbody_hw_management.innerHTML = "";

          if (HW_ManagementA.checked) {
            HW_ManagementContainer.style.display = "block";
            const HW_Management_Data1 = data.HW_Management_Data.split("|");

            if (HW_Management_Data1.length > 0) {
              HW_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "HW_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "HW_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_hw_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = "";

              tr.appendChild(td);
              tbody_hw_management.appendChild(tr);
            }
          } else {
            HW_ManagementContainer.style.display = "none";
          }
        });

        HW_ManagementB.addEventListener("change", () => {
          const HW_ManagementContainer = document.getElementById(
            "HW_ManagementContainer"
          );
          const table_HW_Management = document.getElementById(
            "table_HW_Management"
          );
          let tbody_hw_management = table_HW_Management.querySelector(
            "tbody#tbody_hw_management"
          );

          tbody_hw_management.innerHTML = "";

          if (HW_ManagementB.checked) {
            HW_ManagementContainer.style.display = "block";
            const HW_Management_Data1 = data.HW_Management_Data.split("|");

            if (HW_Management_Data1.length > 0) {
              HW_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "HW_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "HW_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_hw_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_hw_management.appendChild(tr);
            }
          } else {
            HW_ManagementContainer.style.display = "none";
          }
        });

        // Add event listener for checkboxEIS_SystemC
        HW_ManagementC.addEventListener("change", () => {
          const HW_ManagementContainer = document.getElementById(
            "HW_ManagementContainer"
          );
          HW_ManagementContainer.style.display = "none";

          const HW_Management_DataInput = document.getElementsByName(
            "HW_Management_Data[]"
          );
          HW_Management_DataInput.forEach((input) => {
            input.value = "";
          });
        });

        //

        let AQ_ManagementContainer = document.getElementById(
          "AQ_ManagementContainer"
        );
        let table_AQ_Management = document.getElementById(
          "table_AQ_Management"
        );
        let tbody_aq_management = table_AQ_Management.querySelector(
          "tbody#tbody_aq_management"
        );

        tbody_aq_management.innerHTML = "";

        if (
          data.AQ_Management === "Compliant" ||
          data.AQ_Management === "Non-Compliant"
        ) {
          AQ_ManagementContainer.style.display = "block";

          let AQ_Management_Data1 = data.AQ_Management_Data.split("|");

          AQ_Management_Data1.forEach((el) => {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            let inputText = document.createElement("textarea");
            inputText.textContent = el;
            inputText.className = "form-control";
            inputText.type = "text";
            inputText.name = "AQ_Management_Data[]";

            let tdButton = document.createElement("td");
            let button = document.createElement("button");
            button.innerHTML = "X";
            button.type = "button";
            button.name = "AQ_Management_remove";
            button.className = "btn btn-danger btn-sm";
            tdButton.appendChild(button);

            td.appendChild(inputText);
            tr.appendChild(td);
            tr.appendChild(tdButton);
            tbody_aq_management.appendChild(tr);

            button.addEventListener("click", function () {
              tr.remove();
            });
          });
        } else {
          inputText = document.createElement("input");
          inputText.value = "";
          inputText.name = "AQ_Management_Data[]";
          AQ_ManagementContainer.style.display = "none";
          tbody_aq_management.innerHTML = "";
        }

        const AQ_ManagementA = document.getElementById("AQ_ManagementA");
        const AQ_ManagementB = document.getElementById("AQ_ManagementB");
        const AQ_ManagementC = document.getElementById("AQ_ManagementC");

        AQ_ManagementA.addEventListener("change", () => {
          const AQ_ManagementContainer = document.getElementById(
            "AQ_ManagementContainer"
          );
          const table_AQ_Management = document.getElementById(
            "table_AQ_Management"
          );
          let tbody_aq_management = table_AQ_Management.querySelector(
            "tbody#tbody_aq_management"
          );

          tbody_aq_management.innerHTML = "";

          if (AQ_ManagementA.checked) {
            AQ_ManagementContainer.style.display = "block";
            const AQ_Management_Data1 = data.AQ_Management_Data.split("|");

            if (AQ_Management_Data1.length > 0) {
              AQ_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "AQ_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "AQ_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_aq_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = "";

              tr.appendChild(td);
              tbody_aq_management.appendChild(tr);
            }
          } else {
            AQ_ManagementContainer.style.display = "none";
          }
        });

        AQ_ManagementB.addEventListener("change", () => {
          const AQ_ManagementContainer = document.getElementById(
            "AQ_ManagementContainer"
          );
          const table_AQ_Management = document.getElementById(
            "table_AQ_Management"
          );
          let tbody_aq_management = table_AQ_Management.querySelector(
            "tbody#tbody_aq_management"
          );

          tbody_aq_management.innerHTML = "";

          if (AQ_ManagementB.checked) {
            AQ_ManagementContainer.style.display = "block";
            const AQ_Management_Data1 = data.AQ_Management_Data.split("|");

            if (AQ_Management_Data1.length > 0) {
              AQ_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "AQ_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "AQ_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_aq_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_aq_management.appendChild(tr);
            }
          } else {
            AQ_ManagementContainer.style.display = "none";
          }
        });

        // Add event listener for checkboxEIS_SystemC
        AQ_ManagementC.addEventListener("change", () => {
          const AQ_ManagementContainer = document.getElementById(
            "AQ_ManagementContainer"
          );
          AQ_ManagementContainer.style.display = "none";

          const AQ_Management_DataInput = document.getElementsByName(
            "AQ_Management_Data[]"
          );
          AQ_Management_DataInput.forEach((input) => {
            input.value = "";
          });
        });
        //

        // start WQ
        let WQ_ManagementContainer = document.getElementById(
          "WQ_ManagementContainer"
        );
        let table_WQ_Management = document.getElementById(
          "table_WQ_Management"
        );
        let tbody_wq_management = table_WQ_Management.querySelector(
          "tbody#tbody_wq_management"
        );

        tbody_wq_management.innerHTML = "";

        if (
          data.WQ_Management === "Compliant" ||
          data.WQ_Management === "Non-Compliant"
        ) {
          WQ_ManagementContainer.style.display = "block";

          let WQ_Management_Data1 = data.WQ_Management_Data.split("|");

          WQ_Management_Data1.forEach((el) => {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            let inputText = document.createElement("textarea");
            inputText.textContent = el;
            inputText.className = "form-control";
            inputText.type = "text";
            inputText.name = "WQ_Management_Data[]";

            let tdButton = document.createElement("td");
            let button = document.createElement("button");
            button.innerHTML = "X";
            button.type = "button";
            button.name = "WQ_Management_remove";
            button.className = "btn btn-danger btn-sm";
            tdButton.appendChild(button);

            td.appendChild(inputText);
            tr.appendChild(td);
            tr.appendChild(tdButton);
            tbody_wq_management.appendChild(tr);

            button.addEventListener("click", function () {
              tr.remove();
            });
          });
        } else {
          inputText = document.createElement("input");
          inputText.value = "";
          inputText.name = "WQ_Management_Data[]";
          WQ_ManagementContainer.style.display = "none";
          tbody_wq_management.innerHTML = "";
        }

        const WQ_ManagementA = document.getElementById("WQ_ManagementA");
        const WQ_ManagementB = document.getElementById("WQ_ManagementB");
        const WQ_ManagementC = document.getElementById("WQ_ManagementC");

        WQ_ManagementA.addEventListener("change", () => {
          const WQ_ManagementContainer = document.getElementById(
            "WQ_ManagementContainer"
          );
          const table_WQ_Management = document.getElementById(
            "table_WQ_Management"
          );
          let tbody_wq_management = table_WQ_Management.querySelector(
            "tbody#tbody_wq_management"
          );

          tbody_wq_management.innerHTML = "";

          if (WQ_ManagementA.checked) {
            WQ_ManagementContainer.style.display = "block";
            const WQ_Management_Data1 = data.WQ_Management_Data.split("|");

            if (WQ_Management_Data1.length > 0) {
              WQ_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "WQ_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "WQ_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_wq_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = "";

              tr.appendChild(td);
              tbody_wq_management.appendChild(tr);
            }
          } else {
            WQ_ManagementContainer.style.display = "none";
          }
        });

        WQ_ManagementB.addEventListener("change", () => {
          const WQ_ManagementContainer = document.getElementById(
            "WQ_ManagementContainer"
          );
          const table_WQ_Management = document.getElementById(
            "table_WQ_Management"
          );
          let tbody_wq_management = table_WQ_Management.querySelector(
            "tbody#tbody_wq_management"
          );

          tbody_wq_management.innerHTML = "";

          if (WQ_ManagementB.checked) {
            WQ_ManagementContainer.style.display = "block";
            const WQ_Management_Data1 = data.WQ_Management_Data.split("|");

            if (WQ_Management_Data1.length > 0) {
              WQ_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "WQ_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "WQ_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_wq_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_wq_management.appendChild(tr);
            }
          } else {
            WQ_ManagementContainer.style.display = "none";
          }
        });

        // Add event listener for checkboxEIS_SystemC
        WQ_ManagementC.addEventListener("change", () => {
          const WQ_ManagementContainer = document.getElementById(
            "WQ_ManagementContainer"
          );
          WQ_ManagementContainer.style.display = "none";

          const WQ_Management_DataInput = document.getElementsByName(
            "WQ_Management_Data[]"
          );
          WQ_Management_DataInput.forEach((input) => {
            input.value = "";
          });
        });
        //

        // start sw
        let SW_ManagementContainer = document.getElementById(
          "SW_ManagementContainer"
        );
        let table_SW_Management = document.getElementById(
          "table_SW_Management"
        );
        let tbody_sw_management = table_SW_Management.querySelector(
          "tbody#tbody_sw_management"
        );

        tbody_sw_management.innerHTML = "";

        if (
          data.SW_Management === "Compliant" ||
          data.SW_Management === "Non-Compliant"
        ) {
          SW_ManagementContainer.style.display = "block";

          let SW_Management_Data1 = data.SW_Management_Data.split("|");

          SW_Management_Data1.forEach((el) => {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            let inputText = document.createElement("textarea");
            inputText.textContent = el;
            inputText.className = "form-control";
            inputText.type = "text";
            inputText.name = "SW_Management_Data[]";

            let tdButton = document.createElement("td");
            let button = document.createElement("button");
            button.innerHTML = "X";
            button.type = "button";
            button.name = "WQ_Management_remove";
            button.className = "btn btn-danger btn-sm";
            tdButton.appendChild(button);

            td.appendChild(inputText);
            tr.appendChild(td);
            tr.appendChild(tdButton);
            tbody_sw_management.appendChild(tr);

            button.addEventListener("click", function () {
              tr.remove();
            });
          });
        } else {
          inputText = document.createElement("input");
          inputText.value = "";
          inputText.name = "SW_Management_Data[]";
          SW_ManagementContainer.style.display = "none";
          tbody_sw_management.innerHTML = "";
        }

        const SW_ManagementA = document.getElementById("SW_ManagementA");
        const SW_ManagementB = document.getElementById("SW_ManagementB");
        const SW_ManagementC = document.getElementById("SW_ManagementC");

        SW_ManagementA.addEventListener("change", () => {
          const SW_ManagementContainer = document.getElementById(
            "SW_ManagementContainer"
          );
          const table_SW_Management = document.getElementById(
            "table_SW_Management"
          );
          let tbody_sw_management = table_SW_Management.querySelector(
            "tbody#tbody_sw_management"
          );

          tbody_sw_management.innerHTML = "";

          if (SW_ManagementA.checked) {
            SW_ManagementContainer.style.display = "block";
            const SW_Management_Data1 = data.SW_Management_Data.split("|");

            if (SW_Management_Data1.length > 0) {
              SW_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "SW_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "SW_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_sw_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = "";

              tr.appendChild(td);
              tbody_sw_management.appendChild(tr);
            }
          } else {
            SW_ManagementContainer.style.display = "none";
          }
        });

        SW_ManagementB.addEventListener("change", () => {
          const SW_ManagementContainer = document.getElementById(
            "SW_ManagementContainer"
          );
          const table_SW_Management = document.getElementById(
            "table_SW_Management"
          );
          let tbody_sw_management = table_SW_Management.querySelector(
            "tbody#tbody_sw_management"
          );

          tbody_sw_management.innerHTML = "";

          if (SW_ManagementB.checked) {
            SW_ManagementContainer.style.display = "block";
            const SW_Management_Data1 = data.SW_Management_Data.split("|");

            if (SW_Management_Data1.length > 0) {
              SW_Management_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "SW_Management_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "SW_Management_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_sw_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_sw_management.appendChild(tr);
            }
          } else {
            SW_ManagementContainer.style.display = "none";
          }
        });

        // Add event listener for checkboxEIS_SystemC
        SW_ManagementC.addEventListener("change", () => {
          const SW_ManagementContainer = document.getElementById(
            "SW_ManagementContainer"
          );
          SW_ManagementContainer.style.display = "none";

          const SW_Management_DataInput = document.getElementsByName(
            "SW_Management_Data[]"
          );
          SW_Management_DataInput.forEach((input) => {
            input.value = "";
          });
        });
        //

        // techCON
        let Commitment_TechConAContainer = document.getElementById(
          "Commitment_TechConAContainer"
        );
        let table_TechCon = document.getElementById("table_TechCon");
        let tbody_tc_management = table_TechCon.querySelector(
          "tbody#tbody_tc_management"
        );

        tbody_tc_management.innerHTML = "";

        if (
          data.Commitment_TechCon === "Compliant" ||
          data.Commitment_TechCon === "Non-Compliant"
        ) {
          Commitment_TechConAContainer.style.display = "block";

          let Commitment_TechCon_Data1 =
            data.Commitment_TechCon_Data.split("|");

          Commitment_TechCon_Data1.forEach((el) => {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            let inputText = document.createElement("textarea");
            inputText.textContent = el;
            inputText.className = "form-control";
            inputText.type = "text";
            inputText.name = "Commitment_TechCon_Data[]";

            let tdButton = document.createElement("td");
            let button = document.createElement("button");
            button.innerHTML = "X";
            button.type = "button";
            button.name = "Commitment_TechCon_remove";
            button.className = "btn btn-danger btn-sm";
            tdButton.appendChild(button);

            td.appendChild(inputText);
            tr.appendChild(td);
            tr.appendChild(tdButton);
            tbody_tc_management.appendChild(tr);

            button.addEventListener("click", function () {
              tr.remove();
            });
          });
        } else {
          inputText = document.createElement("input");
          inputText.value = "";
          inputText.name = "Commitment_TechCon_Data[]";
          Commitment_TechConAContainer.style.display = "none";
          table_Chemical_Management1.innerHTML = "";
        }

        const Commitment_TechConA = document.getElementById(
          "Commitment_TechConA"
        );
        const Commitment_TechConB = document.getElementById(
          "Commitment_TechConB"
        );
        const Commitment_TechConC = document.getElementById(
          "Commitment_TechConC"
        );

        Commitment_TechConA.addEventListener("change", () => {
          const Commitment_TechConAContainer = document.getElementById(
            "Commitment_TechConAContainer"
          );
          const table_TechCon = document.getElementById("table_TechCon");
          let tbody_tc_management = table_TechCon.querySelector(
            "tbody#tbody_tc_management"
          );

          tbody_tc_management.innerHTML = "";

          if (Commitment_TechConA.checked) {
            Commitment_TechConAContainer.style.display = "block";
            const Commitment_TechCon_Data1 =
              data.Commitment_TechCon_Data.split("|");

            if (Commitment_TechCon_Data1.length > 0) {
              Commitment_TechCon_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Commitment_TechCon_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Commitment_TechCon_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_tc_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = "";

              tr.appendChild(td);
              tbody_tc_management.appendChild(tr);
            }
          } else {
            Commitment_TechConAContainer.style.display = "none";
            table_TechCon.innerHTML = "";
          }
        });

        Commitment_TechConB.addEventListener("change", () => {
          const Commitment_TechConAContainer = document.getElementById(
            "Commitment_TechConAContainer"
          );
          const table_TechCon = document.getElementById("table_TechCon");
          let tbody_tc_management = table_TechCon.querySelector(
            "tbody#tbody_tc_management"
          );

          tbody_tc_management.innerHTML = "";

          if (Commitment_TechConB.checked) {
            Commitment_TechConAContainer.style.display = "block";
            const Commitment_TechCon_Data1 =
              data.Commitment_TechCon_Data.split("|");

            if (Commitment_TechCon_Data1.length > 0) {
              Commitment_TechCon_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Commitment_TechCon_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Commitment_TechCon_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_tc_management.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_tc_management.appendChild(tr);
            }
          } else {
            Commitment_TechConAContainer.style.display = "none";
            table_TechCon.innerHTML = "";
          }
        });

        // Add event listener for checkboxEIS_SystemC
        Commitment_TechConC.addEventListener("change", () => {
          const Commitment_TechConAContainer = document.getElementById(
            "Commitment_TechConAContainer"
          );
          Commitment_TechConAContainer.style.display = "none";

          const Commitment_TechCon_DataInput = document.getElementsByName(
            "Commitment_TechCon_Data[]"
          );
          Commitment_TechCon_DataInput.forEach((input) => {
            input.value = "";
          });
        });

        // recommendation
        // Confirmatory Sampling
        var Rec_confirmatorysampling = document.getElementById(
          "Rec_confirmatorysampling"
        );
        var Rec_confirmatorysamplingContainer = document.getElementById(
          "Rec_confirmatorysamplingContainer"
        );

        let table_Rec_confirmatorysampling = document.getElementById(
          "table_Rec_confirmatorysampling"
        );
        let tbody_rec_confirmatorysampling =
          table_Rec_confirmatorysampling.querySelector(
            "tbody#tbody_rec_confirmatorysampling"
          );

        if (data.Rec_ConfirmatorySampling == "true") {
          Rec_confirmatorysampling.checked = true;
        }

        if (Rec_confirmatorysampling.checked) {
          Rec_confirmatorysamplingContainer.style.display = "block";
          tbody_rec_confirmatorysampling.innerHTML = ""; // Clear existing rows

          const Rec_ConfirmatorySampling_Data1 =
            data.Rec_ConfirmatorySampling_Data.split("|");

          if (Rec_ConfirmatorySampling_Data1.length > 0) {
            Rec_ConfirmatorySampling_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_confirmatorysampling_Data[]";

              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_ConfirmatorySampling_Data_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);

              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_rec_confirmatorysampling.appendChild(tr);

              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_confirmatorysamplingContainer.style.display = "none";
          tbody_rec_confirmatorysampling.innerHTML = ""; // Clear existing rows
        }

        Rec_confirmatorysampling.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_confirmatorysamplingContainer.style.display = "block";
            tbody_rec_confirmatorysampling.innerHTML = ""; // Clear existing rows

            const Rec_ConfirmatorySampling_Data1 =
              data.Rec_ConfirmatorySampling_Data.split("|");

            if (Rec_ConfirmatorySampling_Data1.length > 0) {
              Rec_ConfirmatorySampling_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_ConfirmatorySampling_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Commitment_TechCon_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_rec_confirmatorysampling.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_rec_confirmatorysampling.appendChild(tr);
            }
          } else {
            Rec_confirmatorysamplingContainer.style.display = "none";
            tbody_rec_confirmatorysampling.innerHTML = ""; // Clear existing rows
          }
        });
        // Confirmatory Sampling End

        // Temporary PTO DP start
        var Rec_tempPtoDp = document.getElementById("Rec_tempPtoDp");
        var Rec_tempPtoDpContainer = document.getElementById(
          "Rec_tempPtoDpContainer"
        );

        let table_Rec_tempPtoDp = document.getElementById(
          "table_Rec_tempPtoDp"
        );
        let tbody_Rec_tempPtoDp = table_Rec_tempPtoDp.querySelector(
          "tbody#tbody_tempPtoDp"
        );

        if (data.Rec_TempPtoDp === "true") {
          Rec_tempPtoDp.checked = true;
        }

        if (Rec_tempPtoDp.checked) {
          Rec_tempPtoDpContainer.style.display = "block";
          tbody_Rec_tempPtoDp.innerHTML = ""; // Clear existing rows

          const Rec_tempPtoDp_Data1 = data.Rec_TempPtoDp_Data.split("|");

          if (Rec_tempPtoDp_Data1.length > 0) {
            Rec_tempPtoDp_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_tempPtoDp_Data[]";

              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_tempPtoDp_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);

              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_Rec_tempPtoDp.appendChild(tr);

              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_tempPtoDpContainer.style.display = "none";
          tbody_Rec_tempPtoDp.innerHTML = ""; // Clear existing rows
        }

        Rec_tempPtoDp.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_tempPtoDpContainer.style.display = "block";
            tbody_Rec_tempPtoDp.innerHTML = ""; // Clear existing rows

            const Rec_tempPtoDp_Data1 = data.Rec_TempPtoDp_Data.split("|");

            if (Rec_tempPtoDp_Data1.length > 0) {
              Rec_tempPtoDp_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_tempPtoDp_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Rec_tempPtoDp_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_Rec_tempPtoDp.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_Rec_tempPtoDp.appendChild(tr);
            }
          } else {
            Rec_tempPtoDpContainer.style.display = "none";
            tbody_Rec_tempPtoDp.innerHTML = ""; // Clear existing rows
          }
        });
        // Temporary PTO DP end

        // PCO Seminar Start
        var Rec_PCOSem = document.getElementById("Rec_PCOSem");
        var Rec_PCOSemContainer = document.getElementById(
          "Rec_PCOSemContainer"
        );

        let table_Rec_PCOSem = document.getElementById("table_Rec_PCOSem");
        let tbody_Rec_PCOSem = table_Rec_PCOSem.querySelector(
          "tbody#tbody_Rec_PCOSem"
        );

        if (data.Rec_PcoSem === "true") {
          Rec_PCOSem.checked = true;
        }

        if (Rec_PCOSem.checked) {
          Rec_PCOSemContainer.style.display = "block";
          tbody_Rec_PCOSem.innerHTML = ""; // Clear existing rows

          const Rec_PCOSem_Data1 = data.Rec_PcoSem_Data.split("|");

          if (Rec_PCOSem_Data1.length > 0) {
            Rec_PCOSem_Data1.forEach((el) => {
              console.log(el);
              console.log(el);
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_PCOSem_Data[]";
              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_PCOSem_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);
              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_Rec_PCOSem.appendChild(tr);
              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_PCOSemContainer.style.display = "none";
          tbody_Rec_PCOSem.innerHTML = ""; // Clear existing rows
        }

        Rec_PCOSem.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_PCOSemContainer.style.display = "block";
            tbody_Rec_PCOSem.innerHTML = ""; // Clear existing rows

            const Rec_PCOSem_Data1 = data.Rec_PcoSem_Data.split("|");

            if (Rec_PCOSem_Data1.length > 0) {
              Rec_PCOSem_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_PCOSem_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Rec_PCOSem_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_Rec_PCOSem.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_Rec_PCOSem.appendChild(tr);
            }
          } else {
            Rec_PCOSemContainer.style.display = "none";
            tbody_Rec_PCOSem.innerHTML = ""; // Clear existing rows
          }
        });

        //

        // SMRCMR Start
        var Rec_SMRCMR_Submission = document.getElementById(
          "Rec_SMRCMR_Submission"
        );
        var Rec_SMRCMR_SubmissionContainer = document.getElementById(
          "Rec_SMRCMR_SubmissionContainer"
        );

        let table_Rec_SMRCMR_Submission = document.getElementById(
          "table_Rec_SMRCMR_Submission"
        );
        let tbody_Rec_SMRCMR_Submission =
          table_Rec_SMRCMR_Submission.querySelector(
            "tbody#tbody_Rec_SMRCMR_Submission"
          );

        if (data.Rec_SMRCMR_Submission === "true") {
          Rec_SMRCMR_Submission.checked = true;
        }

        if (Rec_SMRCMR_Submission.checked) {
          Rec_SMRCMR_SubmissionContainer.style.display = "block";
          tbody_Rec_SMRCMR_Submission.innerHTML = ""; // Clear existing rows

          const Rec_SMRCMR_Submission_Data1 =
            data.Rec_SMRCMR_Submission_Data.split("|");

          if (Rec_SMRCMR_Submission_Data1.length > 0) {
            Rec_SMRCMR_Submission_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_SMRCMR_Submission_Data[]";
              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_SMRCMR_Submission_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);
              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_Rec_SMRCMR_Submission.appendChild(tr);
              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_SMRCMR_SubmissionContainer.style.display = "none";
          tbody_Rec_SMRCMR_Submission.innerHTML = ""; // Clear existing rows
        }

        Rec_SMRCMR_Submission.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_SMRCMR_SubmissionContainer.style.display = "block";
            tbody_Rec_SMRCMR_Submission.innerHTML = ""; // Clear existing rows

            const Rec_SMRCMR_Submission_Data1 =
              data.Rec_SMRCMR_Submission_Data.split("|");

            if (Rec_SMRCMR_Submission_Data1.length > 0) {
              Rec_SMRCMR_Submission_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_SMRCMR_Submission_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Rec_SMRCMR_Submission_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_Rec_SMRCMR_Submission.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_Rec_SMRCMR_Submission.appendChild(tr);
            }
          } else {
            Rec_SMRCMR_SubmissionContainer.style.display = "none";
            tbody_Rec_SMRCMR_Submission.innerHTML = ""; // Clear existing rows
          }
        });

        // SMRCMR end

        // Tech Con start
        var Rec_NOMTC = document.getElementById("Rec_NOMTC");
        var Rec_NOMTCContainer = document.getElementById("Rec_NOMTCContainer");

        let table_Rec_NOMTC = document.getElementById("table_Rec_NOMTC");
        let tbody_Rec_NOMTC = table_Rec_NOMTC.querySelector(
          "tbody#tbody_Rec_NOMTC"
        );

        if (data.Rec_NOMTC === "true") {
          Rec_NOMTC.checked = true;
        }

        if (Rec_NOMTC.checked) {
          Rec_NOMTCContainer.style.display = "block";
          tbody_Rec_NOMTC.innerHTML = ""; // Clear existing rows

          const Rec_NOMTC_Data1 = data.Rec_NOMTC_Data.split("|");

          if (Rec_NOMTC_Data1.length > 0) {
            Rec_NOMTC_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_NOMTC_Data[]";
              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_NOMTC_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);
              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_Rec_NOMTC.appendChild(tr);
              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_NOMTCContainer.style.display = "none";
          tbody_Rec_NOMTC.innerHTML = ""; // Clear existing rows
        }

        // Tech con end

        Rec_NOMTC.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_NOMTCContainer.style.display = "block";
            tbody_Rec_NOMTC.innerHTML = ""; // Clear existing rows

            const Rec_NOMTC_Data1 = data.Rec_NOMTC_Data.split("|");

            if (Rec_NOMTC_Data1.length > 0) {
              Rec_NOMTC_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_NOMTC_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Rec_NOMTC_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_Rec_NOMTC.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_Rec_NOMTC.appendChild(tr);
            }
          } else {
            Rec_NOMTCContainer.style.display = "none";
            tbody_Rec_NOMTC.innerHTML = ""; // Clear existing rows
          }
        });
        //

        // NOV Start
        var Rec_NOVIssuance = document.getElementById("Rec_NOVIssuance");
        var Rec_NOVIssuanceContainer = document.getElementById(
          "Rec_NOVIssuanceContainer"
        );

        let table_Rec_NOVIssuance = document.getElementById(
          "table_Rec_NOVIssuance"
        );
        let tbody_Rec_NOVIssuance = table_Rec_NOVIssuance.querySelector(
          "tbody#tbody_Rec_NOVIssuance"
        );

        if (data.Rec_NOVIssuance === "true") {
          Rec_NOVIssuance.checked = true;
        }

        if (Rec_NOVIssuance.checked) {
          Rec_NOVIssuanceContainer.style.display = "block";
          tbody_Rec_NOVIssuance.innerHTML = ""; // Clear existing rows

          const Rec_NOVIssuance_Data1 = data.Rec_NOVIssuance_Data.split("|");

          if (Rec_NOVIssuance_Data1.length > 0) {
            Rec_NOVIssuance_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_NOVIssuance_Data[]";
              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_NOVIssuance_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);
              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_Rec_NOVIssuance.appendChild(tr);
              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_NOVIssuanceContainer.style.display = "none";
          tbody_Rec_NOVIssuance.innerHTML = ""; // Clear existing rows
        }

        Rec_NOVIssuance.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_NOVIssuanceContainer.style.display = "block";
            tbody_Rec_NOVIssuance.innerHTML = ""; // Clear existing rows

            const Rec_NOVIssuance_Data1 = data.Rec_NOVIssuance_Data.split("|");

            if (Rec_NOVIssuance_Data1.length > 0) {
              Rec_NOVIssuance_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_NOVIssuance_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Rec_NOVIssuance_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_Rec_NOVIssuance.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_Rec_NOVIssuance.appendChild(tr);
            }
          } else {
            Rec_NOVIssuanceContainer.style.display = "none";
            tbody_Rec_NOVIssuance.innerHTML = ""; // Clear existing rows
          }
        });
        //

        // Issuance 5Day CDO Start
        var Rec_Issuance5DayCDO = document.getElementById(
          "Rec_Issuance5DayCDO"
        );
        var Rec_Issuance5DayCDOContainer = document.getElementById(
          "Rec_Issuance5DayCDOContainer"
        );

        let table_Rec_Issuance5DayCDO = document.getElementById(
          "table_Rec_Issuance5DayCDO"
        );
        let tbody_Rec_Issuance5DayCDO = table_Rec_Issuance5DayCDO.querySelector(
          "tbody#tbody_Rec_Issuance5DayCDO"
        );

        if (data.Rec_Issuance5DayCDO === "true") {
          Rec_Issuance5DayCDO.checked = true;
        }

        if (Rec_Issuance5DayCDO.checked) {
          Rec_Issuance5DayCDOContainer.style.display = "block";
          tbody_Rec_Issuance5DayCDO.innerHTML = ""; // Clear existing rows

          const Rec_Issuance5DayCDO_Data1 =
            data.Rec_Issuance5DayCDO_Data.split("|");

          if (Rec_Issuance5DayCDO_Data1.length > 0) {
            Rec_Issuance5DayCDO_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_Issuance5DayCDO_Data[]";
              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_Issuance5DayCDO_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);
              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_Rec_Issuance5DayCDO.appendChild(tr);
              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_Issuance5DayCDOContainer.style.display = "none";
          tbody_Rec_Issuance5DayCDO.innerHTML = ""; // Clear existing rows
        }

        Rec_Issuance5DayCDO.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_Issuance5DayCDOContainer.style.display = "block";
            tbody_Rec_Issuance5DayCDO.innerHTML = ""; // Clear existing rows

            const Rec_Issuance5DayCDO_Data1 =
              data.Rec_Issuance5DayCDO_Data.split("|");

            if (Rec_Issuance5DayCDO_Data1.length > 0) {
              Rec_Issuance5DayCDO_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_Issuance5DayCDO_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Rec_Issuance5DayCDO_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_Rec_Issuance5DayCDO.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_Rec_Issuance5DayCDO.appendChild(tr);
            }
          } else {
            Rec_Issuance5DayCDOContainer.style.display = "none";
            tbody_Rec_Issuance5DayCDO.innerHTML = ""; // Clear existing rows
          }
        });
        //

        // Endorsement PAB Start
        var Rec_EndorsementPAB = document.getElementById("Rec_EndorsementPAB");
        var Rec_EndorsementPABContainer = document.getElementById(
          "Rec_EndorsementPABContainer"
        );

        let table_Rec_EndorsementPAB = document.getElementById(
          "table_Rec_EndorsementPAB"
        );
        let tbody_Rec_EndorsementPAB = table_Rec_EndorsementPAB.querySelector(
          "tbody#tbody_Rec_EndorsementPAB"
        );

        if (data.Rec_EndorsementPAB === "true") {
          Rec_EndorsementPAB.checked = true;
        }

        if (Rec_EndorsementPAB.checked) {
          Rec_EndorsementPABContainer.style.display = "block";
          tbody_Rec_EndorsementPAB.innerHTML = ""; // Clear existing rows

          const Rec_EndorsementPAB_Data1 =
            data.Rec_EndorsementPAB_Data.split("|");

          if (Rec_EndorsementPAB_Data1.length > 0) {
            Rec_EndorsementPAB_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "Rec_EndorsementPAB_Data[]";
              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "Rec_EndorsementPAB_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);
              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_Rec_EndorsementPAB.appendChild(tr);
              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          Rec_EndorsementPABContainer.style.display = "none";
          tbody_Rec_EndorsementPAB.innerHTML = ""; // Clear existing rows
        }

        Rec_EndorsementPAB.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            Rec_EndorsementPABContainer.style.display = "block";
            tbody_Rec_EndorsementPAB.innerHTML = ""; // Clear existing rows

            const Rec_EndorsementPAB_Data1 =
              data.Rec_EndorsementPAB_Data.split("|");

            if (Rec_EndorsementPAB_Data1.length > 0) {
              Rec_EndorsementPAB_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "Rec_EndorsementPAB_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "Rec_EndorsementPAB_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_Rec_EndorsementPAB.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_Rec_EndorsementPAB.appendChild(tr);
            }
          } else {
            Rec_EndorsementPABContainer.style.display = "none";
            tbody_Rec_EndorsementPAB.innerHTML = ""; // Clear existing rows
          }
        });
        //

        // Other Recommendations Start
        var OtherRecommendations = document.getElementById(
          "OtherRecommendations"
        );
        var OtherRecommendationsContainer = document.getElementById(
          "OtherRecommendationsContainer"
        );

        let table_OtherRecommendations = document.getElementById(
          "table_OtherRecommendations"
        );
        let tbody_OtherRecommendations =
          table_OtherRecommendations.querySelector(
            "tbody#tbody_OtherRecommendations"
          );

        if (data.OtherRecommendations === "true") {
          OtherRecommendations.checked = true;
        } else {
          OtherRecommendations.checked = false;
        }

        if (OtherRecommendations.checked) {
          OtherRecommendationsContainer.style.display = "block";
          tbody_OtherRecommendations.innerHTML = ""; // Clear existing rows

          const OtherRecommendations_Data1 =
            data.OtherRecommendations_Data.split("|");

          if (OtherRecommendations_Data1.length > 0) {
            OtherRecommendations_Data1.forEach((el) => {
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              const inputText = document.createElement("textarea");
              inputText.value = el;
              inputText.className = "form-control";
              inputText.type = "text";
              inputText.name = "OtherRecommendations_Data[]";
              const tdButton = document.createElement("td");
              const button = document.createElement("button");
              button.innerHTML = "X";
              button.type = "button";
              button.name = "OtherRecommendations_remove";
              button.className = "btn btn-danger btn-sm";
              tdButton.append(button);
              td.appendChild(inputText);
              tr.appendChild(td);
              tr.appendChild(tdButton);
              tbody_OtherRecommendations.appendChild(tr);
              button.addEventListener("click", function () {
                tr.remove();
              });
            });
          } else {
            // No rows, display as blank
            // const tr = document.createElement("tr");
            // const td = document.createElement("td");
            // td.innerHTML = ""; // Set the cell content as blank
            // tr.appendChild(td);
            // tbody_rec_confirmatorysampling.appendChild(tr);
          }
        } else {
          OtherRecommendationsContainer.style.display = "none";
          tbody_OtherRecommendations.innerHTML = "";
        }

        OtherRecommendations.addEventListener("change", function () {
          console.log("changed!");
          if (this.checked) {
            OtherRecommendationsContainer.style.display = "block";
            tbody_OtherRecommendations.innerHTML = ""; // Clear existing rows

            const OtherRecommendations_Data1 =
              data.OtherRecommendations_Data.split("|");

            if (OtherRecommendations_Data1.length > 0) {
              OtherRecommendations_Data1.forEach((el) => {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                const inputText = document.createElement("textarea");
                inputText.value = el;
                inputText.className = "form-control";
                inputText.type = "text";
                inputText.name = "OtherRecommendations_Data[]";

                const tdButton = document.createElement("td");
                const button = document.createElement("button");
                button.innerHTML = "X";
                button.type = "button";
                button.name = "OtherRecommendations_remove";
                button.className = "btn btn-danger btn-sm";
                tdButton.append(button);

                td.appendChild(inputText);
                tr.appendChild(td);
                tr.appendChild(tdButton);
                tbody_OtherRecommendations.appendChild(tr);

                button.addEventListener("click", function () {
                  tr.remove();
                });
              });
            } else {
              // No rows, display as blank
              const tr = document.createElement("tr");
              const td = document.createElement("td");
              td.innerHTML = ""; // Set the cell content as blank

              tr.appendChild(td);
              tbody_OtherRecommendations.appendChild(tr);
            }
          } else {
            OtherRecommendationsContainer.style.display = "none";
            tbody_OtherRecommendations.innerHTML = ""; // Clear existing rows
          }
        });
        //

        let BtnSecondaryInspector = document.getElementById(
          "BtnSecondaryInspector"
        );
        let DivSecondayInspectorContainer = document.getElementById(
          "DivSecondayInspectorContainer"
        );

        if (data.SecondaryInspector == "") {
          BtnSecondaryInspector.checked = false;
          DivSecondayInspectorContainer.style.display = "none";
        } else {
          BtnSecondaryInspector.checked = true;
          DivSecondayInspectorContainer.style.display = "block";
          $("#SecondaryInspector")
            .val(data.SecondaryInspector)
            .trigger("change.select2");
        }

        BtnSecondaryInspector.onchange = () => {
          if (BtnSecondaryInspector.checked) {
            DivSecondayInspectorContainer.style.display = "block";
          } else {
            DivSecondayInspectorContainer.style.display = "none";
            selectElement = document.getElementById("SecondaryInspector");
            selectElement.selectedIndex = 0;
          }
        };

        switch (data.Inspector) {
          case "JOSEPH R. AURE":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "JEROME C. SALVADOR":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "JO ANNE JOY M. DAÑAL-VILLERO":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "LEDANE JOY Y. LAURENTE":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "SHARMAINE I. SILLEZA":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "XAVIER R. LUBIANO":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "SHARMAINE RUTH A. LAUZON":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "ALMIRA O. RIPALDA":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "JANET T. POLEA":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").hide();
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "LIZA A. TAN":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").hide();
            $("#DivSectionChief").hide();
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          // N SAMAR
          case "ROWENA B. PABIA":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          // E SAMAR
          case "GINNALYN A. ESPOSA":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").show();
            $("#SelectCheckedby").val(data.Checkedby).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "ANAMARIE D. CAVAÑERO":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          // E SAMAR
          case "ROY ALEXANDER H. TABOADA":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").show();
            $("#SelectCheckedby").val(data.Checkedby).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "ARNEL L. IFE":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          // LEYTE
          case "CYRIL ANN B. BADEO":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").show();
            $("#SelectCheckedby").val(data.Checkedby).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "JOSEPHINE L. FUENTES":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          // S LEYTE
          case "ZEUS BRYAN B. LORETO":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").show();
            $("#SelectCheckedby").val(data.Checkedby).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "SWEET ADEL PRIMA":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivCheckedby").show();
            $("#SelectCheckedby").val(data.Checkedby).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          case "ALEJANDROQUE G. MACATIGUE":
            $("#Inspector").val(data.Inspector).trigger("change.select2");
            $("#DivSectionChief").show();
            $("#SelectSectionChief")
              .val(data.SectionChief)
              .trigger("change.select2");
            $("#DivDivisionChief").show();
            $("#SelectDivisionChief")
              .val(data.DivisionChief)
              .trigger("change.select2");
            $("#DivRD").show();
            $("#SelectRD").val(data.RegionalDirector).trigger;
            break;

          default:
            $("#DivCheckedby").hide();
            $("#DivSectionChief").hide();
            $("#DivDivisionChief").hide();
            $("#DivRD").hide();
            break;
        }

        $("#Inspector").on("change", function () {
          // REGION/ WAQMS
          switch ($("#Inspector").val()) {
            case "JOSEPH R. AURE":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("JANET T. POLEA")
                .trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "JEROME C. SALVADOR":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("JANET T. POLEA")
                .trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "JO ANNE JOY M. DAÑAL-VILLERO":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("JANET T. POLEA")
                .trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "LEDANE JOY Y. LAURENTE":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("JANET T. POLEA")
                .trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "SHARMAINE I. SILLEZA":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("JANET T. POLEA")
                .trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "XAVIER R. LUBIANO":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("JANET T. POLEA")
                .trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "SHARMAINE RUTH A. LAUZON":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("JANET T. POLEA")
                .trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "JANET T. POLEA":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").hide();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#SelectSectionChief").hide();
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            // REGION/ CHWMS
            case "ALMIRA O. RIPALDA":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief")
                .val("LIZA A. TAN")
                .trigger("change.select2");

              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "LIZA A. TAN":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").hide();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#SelectSectionChief").hide();
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            // Samar
            case "ROY ALEXANDER H. TABOADA":
              $("#DivCheckedby").show();
              $("#SelectCheckedby")
                .val("ARNEL L. IFE")
                .trigger("change.select2");

              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "ARNEL L. IFE":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");

              break;

            // N Samar
            case "ROWENA B. PABIA":
              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#DivRD").show();
              break;

            // E Samar
            case "GINNALYN A. ESPOSA":
              $("#DivCheckedby").show();
              $("#SelectCheckedby")
                .val("ANAMERIE D. CAVAÑERO")
                .trigger("change.select2");

              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "ANAMARIE D. CAVAÑERO":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            // S LEYTE
            case "ZEUS BRYAN B. LORETO":
              $("#DivCheckedby").show();
              $("#SelectCheckedby")
                .val("ALEJANDROQUE G. MACATIGUE")
                .trigger("change.select2");

              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "SWEET ADEL PRIMA":
              $("#DivCheckedby").show();
              $("#SelectCheckedby")
                .val("ALEJANDROQUE G. MACATIGUE")
                .trigger("change.select2");

              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "ALEJANDROQUE G. MACATIGUE":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            default:
              $("#DivCheckedby").hide();
              $("#DivSectionChief").hide();
              $("#DivDivisionChief").hide();
              $("#DivRD").hide();
              break;

            // LEYTE
            case "CYRIL ANN B. BADEO":
              $("#DivCheckedby").show();
              $("#SelectCheckedby")
                .val("JOSEPHINE L. FUENTES")
                .trigger("change.select2");

              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;

            case "JOSEPHINE L. FUENTES":
              $("#DivCheckedby").hide();
              $("#DivSectionChief").show();
              $("#SelectSectionChief").val("").trigger("change.select2");
              $("#DivDivisionChief").show();
              $("#SelectDivisionChief")
                .val("MANUEL J. SACEDA JR.")
                .trigger("change.select2");
              $("#DivRD").show();
              $("#SelectRD")
                .val("MARTIN JOSE V. DESPI")
                .trigger("change.select2");
              break;
          }
        });

        // inspectorSelect.on("change", function () {
        //   switch (inspectorSelect.val()) {
        //     // REGION

        //     case "JOSEPH R. AURE":
        //       $("#Inspector").val("JOSEPH R. AURE").trigger("change.select2");
        //       break;
        //   }
        // });
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
        // $("#select2").val([]).trigger("change");
        $(".Inspector1, .PSICCode1, .Product1").val(null).trigger("change");
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
        // $("#recordForm")[0].reset();
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
});

// Create Record others checked check
function others() {
  otherspv1 = document.getElementById("otherspv1");
  otherspv1_text = document.getElementById("otherspv1_text");
  if (otherspv1.checked == true) {
    otherspv1_text.style.display = "block";
  } else {
    otherspv1_text.style.display = "none";
  }

  var others1 = document.getElementById("others1");
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

// Add and Remove row Inserting data

$("#add1").click(function () {
  var eccid = document.getElementById("dynamic_field1");
  var rowId = eccid.querySelectorAll("tr").length - 1;
  var tbody = eccid.getElementsByTagName("tbody")[0];
  addECCCondition(tbody, rowId);

  var inputElement = document
    .getElementById(`row${rowId}`)
    .querySelector("textarea");
  inputElement.name = "ECC_Condition1[]";
  var selectElement = document
    .getElementById(`row${rowId}`)
    .querySelector("select[name='ECC_ConditionSelect[]']");
  selectElement.name = "ECC_ConditionSelect1[]";
  var textareaElement = document
    .getElementById(`row${rowId}`)
    .querySelector("textarea[name='ECC_ConditionRemarks[]']");
  textareaElement.name = "ECC_ConditionRemarks1[]";
});

$("#searchModal").on("show.bs.modal", () => {
  document.getElementById("searchForm").reset();
  var eccid = document.getElementById("dynamic_field1");
  let tbody_dynamic_field1 = document.querySelector("#dynamic_field1 tbody");
  tbody_dynamic_field1.innerHTML = "";
  // while (tbody_dynamic_field1.firstChild) {
  //   tbody_dynamic_field1.removeChild(tbody_dynamic_field1.firstChild);
  // }
});

// Add and Remove row Updating data
var i = 1;
$("#add").click(function () {
  i++;

  $("#dynamic_field").append(
    '<tr id="row1' +
      i +
      '"><td><textarea name="ECC_Condition[]" placeholder="ECC Condition" class="form-control name_list"></textarea></td><td><select class="select2" name="ECC_ConditionSelect[]" id="ECC_ConditionSelect[]"><Option value="Yes">Yes</Option><Option value="No">No</Option><Option value="Partial">Partial</Option></select></td><td><textarea class="form-control" name="ECC_ConditionRemarks[]" id="ECC_ConditionRemarks[]"></textarea></td><td><button type="button" name="remove" id="' +
      i +
      '" class="btn btn-danger btn_remove">X</button></td></tr>'
  );
});

//
exportPdf = ($recordid) => {
  var exportPdfData = new FormData();
  exportPdfData.append("action", "exportPdfData");
  exportPdfData.append("recordid", $recordid);

  fetch("../../build/php/records1.php", {
    body: exportPdfData,
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data.ProjectName);
      console.log(data.SpecificAddress);
      console.log(data.NatureofBusiness);
      console.log(data.Product);
    });
};

// $(".select2").select2({
//   minimumResultsForSearch: Infinity, // hide search box
// });

// Get references to the inspector and signatories div
const inspectorSelect1 = $("#Inspector1");
const signatoriesDiv1 = $("#DivSignatories1");
document.getElementById("DivDivisionChief1").readonly = true;
document.getElementById("DivRD1").readonly = true;
// Add change event listener to inspector select
inspectorSelect1.on("change", function () {
  // Hide all signatories divs by default
  signatoriesDiv1.find("div").hide();

  // Show the corresponding signatories div based on the selected inspector
  switch (inspectorSelect1.val()) {
    // REGION
    case "JOSEPH R. AURE":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("JANET T. POLEA").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "JEROME C. SALVADOR":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("JANET T. POLEA").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "JO ANNE JOY M. DAÑAL-VILLERO":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("JANET T. POLEA").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "LEDANE JOY Y. LAURENTE":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("JANET T. POLEA").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "SHARMAINE I. SILLEZA":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("JANET T. POLEA").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "XAVIER R. LUBIANO":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("JANET T. POLEA").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "SHARMAINE RUTH A. LAUZON":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("JANET T. POLEA").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "ALMIRA O. RIPALDA":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("LIZA A. TAN").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "JANET T. POLEA":
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "LIZA A. TAN":
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "LIZA A. TAN":
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    // PEMU LEYTE
    case "CYRIL ANN B. BADEO":
      $("#DivCheckedby1").show();
      $("#SelectCheckedby1")
        .val("JOSEPHINE L. FUENTES")
        .trigger("change.select2");
      $("#DivSectionChief1").show();
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "JOSEPHINE L. FUENTES":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").show();
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    // PEMU S. LEYTE
    case "ZEUS BRYAN B. LORETO":
      $("#DivCheckedby1").show();
      $("#SelectCheckedby1")
        .val("ALEJANDROQUE G. MACATIGUE")
        .trigger("change.select2");
      $("#DivSectionChief1").show();
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "SWEET ADEL PRIMA":
      $("#DivCheckedby1").show();
      $("#SelectCheckedby1")
        .val("ALEJANDROQUE G. MACATIGUE")
        .trigger("change.select2");
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "ALEJANDROQUE G. MACATIGUE":
      $("#DivSectionChief1").show();
      $("#SelectCheckedby1").show();
      $("#SelectSectionChief1").val("").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();

      break;

    // PEMU SAMAR
    case "ROY ALEXANDER H. TABOADA":
      $("#DivCheckedby1").show();
      $("#SelectCheckedby1").val("ARNEL L. IFE").trigger("change.select2");
      $("#DivSectionChief1").show();
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "ARNEL L. IFE":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    // PEMU E. SAMAR
    case "GINNALYN A. ESPOSA":
      $("#DivCheckedby1").show();
      $("#SelectCheckedby1")
        .val("ANAMARIE D. CAVAÑERO")
        .trigger("change.select2");
      $("#DivSectionChief1").show();
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    case "ANAMARIE D. CAVAÑERO":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;

    // PEMU N. SAMAR
    case "ROWENA B. PABIA":
      $("#DivSectionChief1").show();
      $("#SelectSectionChief1").val("").trigger("change.select2");
      $("#DivDivisionChief1").show();
      $("#DivRD1").show();
      break;
  }
});

const BtnSecondaryInspector1 = document.getElementById(
  "BtnSecondaryInspector1"
);
const DivSecondayInspector = document.getElementById("DivSecondayInspector");

BtnSecondaryInspector1.addEventListener("change", function () {
  if (BtnSecondaryInspector1.checked) {
    DivSecondayInspector.style.display = "block"; // Show the element if the button is checked
  } else {
    DivSecondayInspector.style.display = "none"; // Hide the element if the button is not checked
  }
});

function addECCCondition(tbody, numrows) {
  var tr = document.createElement("tr");
  tr.id = `row${numrows}`;
  var tdInput = document.createElement("td");
  var inputElement = document.createElement("textarea");
  inputElement.value = "";
  inputElement.className = "form-control";
  inputElement.type = "textarea";
  inputElement.name = "ECC_Condition[]";
  tdInput.append(inputElement);

  // Select
  var tdinputECCSelect = document.createElement("td");
  var inputECCSelect = document.createElement("select");
  inputECCSelect.className = "form-control select2";
  inputECCSelect.name = "ECC_ConditionSelect[]";

  var optionCompliant = document.createElement("option");
  optionCompliant.text = "Yes";
  optionCompliant.value = "Yes";
  optionCompliant.selected = true;
  inputECCSelect.add(optionCompliant);

  var optionNonCompliant = document.createElement("option");
  optionNonCompliant.text = "No";
  optionNonCompliant.value = "No";
  inputECCSelect.add(optionNonCompliant);

  var optionNA = document.createElement("option");
  optionNA.text = "N/A";
  optionNA.value = "N/A";
  inputECCSelect.add(optionNA);

  tdinputECCSelect.append(inputECCSelect);

  // remarks
  var tdEccRemarks = document.createElement("td");
  var eccRemarks = document.createElement("textarea");
  eccRemarks.className = "form-control";
  eccRemarks.name = "ECC_ConditionRemarks[]";
  eccRemarks.value = "";
  tdEccRemarks.append(eccRemarks);

  // button
  var tdButton = document.createElement("td");
  var button = document.createElement("button");
  button.innerHTML = "X";
  button.type = "button";
  button.name = "btn-eccCondition";
  button.className = "btn btn-danger btn-sm";
  button.addEventListener("click", function () {
    tr.remove();
  });
  tdButton.append(button);

  tr.append(tdInput);
  tr.append(tdinputECCSelect);
  tr.append(tdEccRemarks);
  tr.append(tdButton);

  tbody.appendChild(tr);
}

var eccAddrow = document.getElementById("eccAddrow");
eccAddrow.addEventListener("click", () => {
  var eccid = document.getElementById("dynamic_field");
  var rowId = eccid.querySelectorAll("tr").length - 1;
  var tbody = eccid.getElementsByTagName("tbody")[0];
  addECCCondition(tbody, rowId);
});
