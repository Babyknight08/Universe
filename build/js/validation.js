$("#PSICCode1").change(function () {
  var selectvalue = this.value;
  if (selectvalue == "") {
    $("#Product1").html(`
        <option value="Null">--Select Product--</option>
        <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>
        <option value="Mining of Coal and Lignite">Mining of Coal and Lignite</option>
        <option value="Extraction of Crude and Petroleum and Natural Gas, and Support Activities">Extraction of Crude and Petroleum and Natural Gas, and Support Activities</option>
        <option value="Mining of Iron Ores">Mining of Iron Ores</option>
        <option value="Mining of Precious Metal Ores">Mining of Precious Metal Ores</option>`);
  }
  if (selectvalue == "014") {
    $("#Product1").html(`
        <option value="Animal Production">Animal Production</option>`);
  }
  if (selectvalue == "032") {
    $("#Product1").html(`
        <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>`);
  }
  if (selectvalue == "05") {
    $("#Product1").html(`
        <option value="Mining of Coal and Lignite">Mining of Coal and Lignite</option>`);
  }
  if (selectvalue == "06") {
    $("#Product1").html(`
        <option value="Extraction of Crude and Petroleum and Natural Gas, and Support Activities">Extraction of Crude and Petroleum and Natural Gas, and Support Activities</option>`);
  }
  if (selectvalue == "07100") {
    $("#Product1").html(`
        <option value="Mining of Iron Ores">Mining of Iron Ores</option>`);
  }
  if (selectvalue == "0722") {
    $("#Product1").html(`
        <option value="Mining of Precious Metal Ores">Mining of Precious Metal Ores</option>`);
  }
});

//update value
$("#Product1").change(function () {
  var selectvalue = this.value;
  if (selectvalue == "") {
    $("#PSICCode1").html(`
    <option value="Null">--Select PSIC Code--</option>
    <option value="014">014</option>
    <option value="032">032</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07100">07100</option>
    <option value="0722">0722</option>`);
  }
  if (selectvalue == "Animal Production") {
    $("#PSICCode1").html(`
        <option value="014">014</option>`);
  }
  if (selectvalue == "Aquaculture (Excluding Fish Pens)") {
    $("#PSICCode1").html(`
        <option value="032">032</option>`);
  }
  if (selectvalue == "Mining of Coal and Lignite") {
    $("#PSICCode1").html(`
        <option value="05">05</option>`);
  }
  if (
    selectvalue ==
    "Extraction of Crude and Petroleum and Natural Gas, and Support Activities"
  ) {
    $("#PSICCode1").html(`
        <option value="06">06</option>`);
  }
  if (selectvalue == "Mining of Iron Ores") {
    $("#PSICCode1").html(`
        <option value="07100">07100</option>`);
  }
  if (selectvalue == "Mining of Precious Metal Ores") {
    $("#PSICCode1").html(`
        <option value="0722">0722</option>`);
  }
});
