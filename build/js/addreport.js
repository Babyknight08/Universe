$(document).ready(function () {
  $("#btn_genInfo").click(function () {
    var error_rcn = "";
    var error_email = "";
    var filter =
      /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    // var checked = $("[name='laws[]']:checked").length > 0;
    // if (!checked) {
    //   alert("Please check at least one Law");
    //   return false;
    // }

    if ($.trim($("#doi").val()).length == 0) {
      error_doi = "Input Required";
      $("#error_doi").text(error_doi);
      $("#doi").addClass("has-error");
    } else {
      error_doi = "";
      $("#error_doi").text(error_doi);
      $("#doi").removeClass("has-error");
    }

    if ($.trim($("#noe").val()).length == 0) {
      error_noe = "Input Required";
      $("#error_noe").text(error_noe);
      $("#noe").addClass("has-error");
    } else {
      error_noe = "";
      $("#error_noe").text(error_noe);
      $("#noe").removeClass("has-error");
    }

    if ($.trim($("#address").val()).length == 0) {
      error_address = "Input Required";
      $("#error_address").text(error_address);
      $("#address").addClass("has-error");
    } else {
      error_address = "";
      $("#error_address").text(error_address);
      $("#address").removeClass("has-error");
    }

    if ($.trim($("#geo_c").val()).length == 0) {
      error_geo_c = "Input Required";
      $("#error_geo_c").text(error_geo_c);
      $("#geo_c").addClass("has-error");
    } else {
      error_geo_c = "";
      $("#error_geo_c").text(error_geo_c);
      $("#geo_c").removeClass("has-error");
    }

    if ($.trim($("#nob").val()).length == 0) {
      error_nob = "Input Required";
      $("#error_nob").text(error_nob);
      $("#nob").addClass("has-error");
    } else {
      error_nob = "";
      $("#error_nob").text(error_nob);
      $("#nob").removeClass("has-error");
    }

    if ($.trim($("#psic").val()).length == 0) {
      error_psic = "Input Required";
      $("#error_psic").text(error_psic);
      $("#psic").addClass("has-error");
    } else {
      error_psic = "";
      $("#error_psic").text(error_psic);
      $("#psic").removeClass("has-error");
    }

    if ($.trim($("#year_est").val()).length == 0) {
      error_year_est = "Input Required";
      $("#error_year_est").text(error_year_est);
      $("#year_est").addClass("has-error");
    } else {
      error_year_est = "";
      $("#error_year_est").text(error_year_est);
      $("#year_est").removeClass("has-error");
    }

    if ($.trim($("#product").val()).length == 0) {
      error_product = "Input Required";
      $("#error_product").text(error_product);
      $("#product").addClass("has-error");
    } else {
      error_product = "";
      $("#error_product").text(error_product);
      $("#product").removeClass("has-error");
    }

    if ($.trim($("#ohd").val()).length == 0) {
      error_ohd = "Input Required";
      $("#error_ohd").text(error_ohd);
      $("#ohd").addClass("has-error");
    } else {
      error_ohd = "";
      $("#error_ohd").text(error_ohd);
      $("#ohd").removeClass("has-error");
    }

    if ($.trim($("#odw").val()).length == 0) {
      error_odw = "Input Required";
      $("#error_odw").text(error_odw);
      $("#odw").addClass("has-error");
    } else {
      error_odw = "";
      $("#error_odw").text(error_odw);
      $("#odw").removeClass("has-error");
    }

    if ($.trim($("#ody").val()).length == 0) {
      error_ody = "Input Required";
      $("#error_ody").text(error_ody);
      $("#ody").addClass("has-error");
    } else {
      error_ody = "";
      $("#error_ody").text(error_ody);
      $("#ody").removeClass("has-error");
    }

    if ($.trim($("#pl").val()).length == 0) {
      error_pl = "Input Required";
      $("#error_pl").text(error_pl);
      $("#pl").addClass("has-error");
    } else {
      error_pl = "";
      $("#error_pl").text(error_pl);
      $("#pl").removeClass("has-error");
    }

    if ($.trim($("#pr").val()).length == 0) {
      error_pr = "Input Required";
      $("#error_pr").text(error_pr);
      $("#pr").addClass("has-error");
    } else {
      error_pr = "";
      $("#error_pr").text(error_pr);
      $("#pr").removeClass("has-error");
    }

    if ($.trim($("#apr").val()).length == 0) {
      error_apr = "Input Required";
      $("#error_apr").text(error_apr);
      $("#apr").addClass("has-error");
    } else {
      error_apr = "";
      $("#error_apr").text(error_apr);
      $("#apr").removeClass("has-error");
    }

    if ($.trim($("#nomh").val()).length == 0) {
      error_nomh = "Input Required";
      $("#error_nomh").text(error_nomh);
      $("#nomh").addClass("has-error");
    } else {
      error_nomh = "";
      $("#error_nomh").text(error_nomh);
      $("#nomh").removeClass("has-error");
    }

    if ($.trim($("#npco").val()).length == 0) {
      error_npco = "Input Required";
      $("#error_npco").text(error_npco);
      $("#npco").addClass("has-error");
    } else {
      error_npco = "";
      $("#error_npco").text(error_npco);
      $("#npco").removeClass("has-error");
    }

    if ($.trim($("#pf").val()).length == 0) {
      error_pf = "Input Required";
      $("#error_pf").text(error_pf);
      $("#pf").addClass("has-error");
    } else {
      error_pf = "";
      $("#error_pf").text(error_pf);
      $("#pf").removeClass("has-error");
    }

    if ($.trim($("#pa").val()).length == 0) {
      error_pa = "Input Required";
      $("#error_pa").text(error_pa);
      $("#pa").addClass("has-error");
    } else {
      error_pa = "";
      $("#error_pa").text(error_pa);
      $("#pa").removeClass("has-error");
    }

    if ($.trim($("#doef").val()).length == 0) {
      error_doef = "Input Required";
      $("#error_doef").text(error_doef);
      $("#doef").addClass("has-error");
    } else {
      error_doef = "";
      $("#error_doef").text(error_doef);
      $("#doef").removeClass("has-error");
    }

    if ($.trim($("#email").val()).length == 0) {
      error_email = "Email is required";
      $("#error_email").text(error_email);
      $("#email").addClass("has-error");
    } else {
      if (!filter.test($("#email").val())) {
        error_email = "Invalid Email";
        $("#error_email").text(error_email);
        $("#email").addClass("has-error");
      } else {
        error_email = "";
        $("#error_email").text(error_email);
        $("#email").removeClass("has-error");
      }
    }

    if (
      error_rcn != "" ||
      error_doi != "" ||
      error_noe != "" ||
      error_address != "" ||
      error_geo_c != "" ||
      error_nob != "" ||
      error_psic != "" ||
      error_year_est != "" ||
      error_product != "" ||
      error_ohd != "" ||
      error_odw != "" ||
      error_ody != "" ||
      error_pl != "" ||
      error_pr != "" ||
      error_apr != "" ||
      error_nomh != "" ||
      error_npco != "" ||
      error_pf != "" ||
      error_pa != "" ||
      error_doef != "" ||
      error_email != ""
    ) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Please input all fields!",
      });
      // return false;
    } else {
      $("#list_genInfo").removeClass("active active_tab1");
      $("#list_genInfo").removeAttr("href data-toggle");
      $("#genInfo").removeClass("active");
      $("#list_genInfo").addClass("inactive_tab1");
      $("#list_purposeVerif").removeClass("inactive_tab1");
      $("#list_purposeVerif").addClass("active_tab1 active");
      $("#list_purposeVerif").attr("href", "#purposeVerif");
      $("#list_purposeVerif").attr("data-toggle", "tab");
      $("#purposeVerif").addClass("active in");
    }
  });

  $("#previous_btn_purposeVerif").click(function () {
    $("#list_purposeVerif").removeClass("active active_tab1");
    $("#list_purposeVerif").removeAttr("href data-toggle");
    $("#purposeVerif").removeClass("active in");
    $("#list_purposeVerif").addClass("inactive_tab1");
    $("#list_genInfo").removeClass("inactive_tab1");
    $("#list_genInfo").addClass("active_tab1 active");
    $("#list_genInfo").attr("href", "#genInfo");
    $("#list_genInfo").attr("data-toggle", "tab");
    $("#genInfo").addClass("active in");
  });
  //  End First Page Empty Validation

  $("#btn_purposeVerif").click(function () {
    var error_first_name = "";
    var error_last_name = "";

    if ($.trim($("#first_name").val()).length == 0) {
      error_first_name = "First Name is required";
      $("#error_first_name").text(error_first_name);
      $("#first_name").addClass("has-error");
    } else {
      error_first_name = "";
      $("#error_first_name").text(error_first_name);
      $("#first_name").removeClass("has-error");
    }

    if ($.trim($("#doi").val()).length == 0) {
      error_doi = "Input Required";
      $("#error_doi").text(error_doi);
      $("#doi").addClass("has-error");
    } else {
      error_doi = "";
      $("#error_doi").text(error_doi);
      $("#doi").removeClass("has-error");
    }

    // if ($.trim($("#last_name").val()).length == 0) {
    //   error_last_name = "Last Name is required";
    //   $("#error_last_name").text(error_last_name);
    //   $("#last_name").addClass("has-error");
    // } else {
    //   error_last_name = "";
    //   $("#error_last_name").text(error_last_name);
    //   $("#last_name").removeClass("has-error");
    // }

    if (error_first_name != "" || error_last_name != "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Please input all fields!",
      });
      // return false;
    } else {
      $("#list_purposeVerif").removeClass("active active_tab1");
      $("#list_purposeVerif").removeAttr("href data-toggle");
      $("#purposeVerif").removeClass("active");
      $("#list_purposeVerif").addClass("inactive_tab1");
      $("#list_compliantStatus").removeClass("inactive_tab1");
      $("#list_compliantStatus").addClass("active_tab1 active");
      $("#list_compliantStatus").attr("href", "#compliantStatus");
      $("#list_compliantStatus").attr("data-toggle", "tab");
      $("#compliantStatus").addClass("active in");
    }
  });

  $("#previous_btn_compliantStatus").click(function () {
    $("#list_compliantStatus").removeClass("active active_tab1");
    $("#list_compliantStatus").removeAttr("href data-toggle");
    $("#compliantStatus").removeClass("active in");
    $("#list_compliantStatus").addClass("inactive_tab1");
    $("#list_purposeVerif").removeClass("inactive_tab1");
    $("#list_purposeVerif").addClass("active_tab1 active");
    $("#list_purposeVerif").attr("href", "#purposeVerif");
    $("#list_purposeVerif").attr("data-toggle", "tab");
    $("#purposeVerif").addClass("active in");
  });

  $("#btn_compliantStatus").click(function () {
    var error_address1 = "";
    // var error_mobile_no = "";
    // var mobile_validation = /^\d{10}$/;
    if ($.trim($("#address1").val()).length == 0) {
      error_address1 = "Address is required";
      $("#error_address1").text(error_address);
      $("#address1").addClass("has-error");
    } else {
      error_address1 = "";
      $("#error_address1").text(error_address1);
      $("#address1").removeClass("has-error");
    }

    if ($.trim($("#mobile_no").val()).length == 0) {
      error_mobile_no = "Mobile Number is required";
      $("#error_mobile_no").text(error_mobile_no);
      $("#mobile_no").addClass("has-error");
      // } else {
      //   if (!mobile_validation.test($("#mobile_no").val())) {
      //     error_mobile_no = "Invalid Mobile Number";
      //     $("#error_mobile_no").text(error_mobile_no);
      //     $("#mobile_no").addClass("has-error");
      //   } else {
      //     error_mobile_no = "";
      //     $("#error_mobile_no").text(error_mobile_no);
      //     $("#mobile_no").removeClass("has-error");
      //   }
    }
    if (
      error_address1 != ""
      // || error_mobile_no != ""
    ) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Please input all fields!",
      });
      // return false;
    } else {
      $("#btn_compliantStatus").attr("disabled", "disabled");
      $(document).css("cursor", "prgress");
      $("#register_form").submit();
    }
  });
});
