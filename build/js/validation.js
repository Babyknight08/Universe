// $("#PSICCode1").change(function () {
//   var selectvalue = this.value;
//   if (selectvalue == "") {
//     $("#Product1").html(`
//         <option value="Null">--Select Product--</option>
//         <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>
//         <option value="Mining of Coal and Lignite">Mining of Coal and Lignite</option>
//         <option value="Extraction of Crude and Petroleum and Natural Gas, and Support Activities">Extraction of Crude and Petroleum and Natural Gas, and Support Activities</option>
//         <option value="Mining of Iron Ores">Mining of Iron Ores</option>
//         <option value="Mining of Precious Metal Ores">Mining of Precious Metal Ores</option>`);
//   }
//   if (selectvalue == "014") {
//     $("#Product1").html(`
//         <option value="Animal Production">Animal Production</option>`);
//   }
//   if (selectvalue == "032") {
//     $("#Product1").html(`
//         <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>`);
//   }
//   if (selectvalue == "05") {
//     $("#Product1").html(`
//         <option value="Mining of Coal and Lignite">Mining of Coal and Lignite</option>`);
//   }
//   if (selectvalue == "06") {
//     $("#Product1").html(`
//         <option value="Extraction of Crude and Petroleum and Natural Gas, and Support Activities">Extraction of Crude and Petroleum and Natural Gas, and Support Activities</option>`);
//   }
//   if (selectvalue == "07100") {
//     $("#Product1").html(`
//         <option value="Mining of Iron Ores">Mining of Iron Ores</option>`);
//   }
//   if (selectvalue == "0722") {
//     $("#Product1").html(`
//         <option value="Mining of Precious Metal Ores">Mining of Precious Metal Ores</option>`);
//   }
// });

// //update value
// $("#Product1").change(function () {
//   var selectvalue = this.value;
//   if (selectvalue == "") {
//     $("#PSICCode1").html(`
//     <option value="Null">--Select PSIC Code--</option>
//     <option value="014">014</option>
//     <option value="032">032</option>
//     <option value="05">05</option>
//     <option value="06">06</option>
//     <option value="07100">07100</option>
//     <option value="0722">0722</option>`);
//   }
//   if (selectvalue == "Animal Production") {
//     $("#PSICCode1").html(`
//         <option value="014">014</option>`);
//   }
//   if (selectvalue == "Aquaculture (Excluding Fish Pens)") {
//     $("#PSICCode1").html(`
//         <option value="032">032</option>`);
//   }
//   if (selectvalue == "Mining of Coal and Lignite") {
//     $("#PSICCode1").html(`
//         <option value="05">05</option>`);
//   }
//   if (
//     selectvalue ==
//     "Extraction of Crude and Petroleum and Natural Gas, and Support Activities"
//   ) {
//     $("#PSICCode1").html(`
//         <option value="06">06</option>`);
//   }
//   if (selectvalue == "Mining of Iron Ores") {
//     $("#PSICCode1").html(`
//         <option value="07100">07100</option>`);
//   }
//   if (selectvalue == "Mining of Precious Metal Ores") {
//     $("#PSICCode1").html(`
//         <option value="0722">0722</option>`);
//   }
// });

// Insert Form
$("#PSICCode1").change(function () {
  var selectvalue = this.value;
  switch (selectvalue) {
    case "014":
      $("#Product1").html(`
        <option value="Animal Production">Animal Production</option>`);
      break;

    case "032":
      $("#Product1").html(`
          <option value="Aquaculture (excluding fish pens)">Aquaculture (excluding fish pens)</option>`);
      break;

    case "05":
      $("#Product1").html(
        `<option value="Mining of coal and lignite">Mining of coal and lignite</option>`
      );
      break;

    case "06":
      $("#Product1").html(
        `<option value="Extraction of crude petroleum and natural gas, and support activities">Extraction of crude petroleum and natural gas, and support activities</option>`
      );
      break;

    case "07100":
      $("#Product1").html(
        `<option value="Mining of iron ores">Mining of iron ores</option>`
      );
      break;

    case "0722":
      $("#Product1").html(
        `<option value="Mining of precious metal ores - gold, silver, platinum">Mining of precious metal ores - gold, silver, platinum</option>`
      );
      break;

    case "07291":
      $("#Product1").html(
        `<option value="Copper ore mining">Copper ore mining</option>`
      );
      break;

    case "07292":
      $("#Product1").html(
        `<option value="Chromite ore mining">Chromite ore mining</option>`
      );
      break;

    case "07293":
      $("#Product1").html(
        `<option value="Manganese ore mining">Manganese ore mining</option>`
      );
      break;

    case "07294":
      $("#Product1").html(
        `<option value="Nickel ore mining">Nickel ore mining</option>`
      );
      break;

    case "08913":
      $("#Product1").html(
        `<option value="Pyrite mining">Pyrite mining</option>`
      );
      break;

    case "08914":
      $("#Product1").html(
        `<option value="Rock phosphate mining">Rock phosphate mining</option>`
      );
      break;

    case "10110":
      $("#Product1").html(
        `<option value="Slaughtering and meat packing">Slaughtering and meat packing</option>`
      );
      break;

    case "10120":
      $("#Product1").html(
        `<option value="Production processing and preserving of meat and meat products">Production processing and preserving of meat and meat products</option>`
      );
      break;

    case "1020":
      $("#Product1").html(
        `<option value="Processing and preserving of fish, crustaceans and mollusks (except carrageenan)">Processing and preserving of fish, crustaceans and mollusks (except carrageenan)</option>`
      );
      break;

    case "10205":
      $("#Product1").html(
        `<option value="Processing of seaweeds; manufacture of agar-agar or carrageenan">Processing of seaweeds; manufacture of agar-agar or carrageenan</option>`
      );
      break;

    case "1030":
      $("#Product1").html(
        `<option value="Processing and preserving of fruits and vegetables">Processing and preserving of fruits and vegetables</option>`
      );
      break;

    case "104":
      $("#Product1").html(
        `<option value="Manufacture of vegetable and animal oils and fats">Manufacture of vegetable and animal oils and fats</option>`
      );
      break;

    case "105":
      $("#Product1").html(
        `<option value="Manufacture of dairy products">Manufacture of dairy products</option>`
      );
      break;

    case "106":
      $("#Product1").html(
        `<option value="Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)">Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)</option>`
      );
      break;

    case "10610":
      $("#Product1").html(
        `<option value="Rice/ corn milling">Rice/ corn milling</option>`
      );
      break;

    case "10621":
      $("#Product1").html(
        `<option value="Cassava flour milling">Cassava flour milling</option>`
      );
      break;

    case "107":
      $("#Product1").html(
        `<option value="Manufacture of other food products (except sugar)">Manufacture of other food products (except sugar)</option>`
      );
      break;

    case "1072":
      $("#Product1").html(
        `<option value="Manufacture of sugar - milling and refining">Manufacture of sugar - milling and refining</option>`
      );
      break;

    case "10800":
      $("#Product1").html(
        `<option value="Manufacture of prepared animal feeds">Manufacture of prepared animal feeds</option>`
      );
      break;

    case "11":
      $("#Product1").html(
        `<option value="Manufacture of beverages">Manufacture of beverages</option>`
      );
      break;

    case "12":
      $("#Product1").html(
        `<option value="Manufacture of tobacco products">Manufacture of tobacco products</option>`
      );
      break;

    case "13":
      $("#Product1").html(
        `<option value="Manufacture of textiles">Manufacture of textiles</option>`
      );
      break;

    case "14":
      $("#Product1").html(
        `<option value="Tanning and dressing of leather">Tanning and dressing of leather</option>`
      );
      break;

    case "1621":
      $("#Product1").html(
        `<option value="Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens">Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens</option>`
      );
      break;

    case "17012":
      $("#Product1").html(
        `<option value="Pulp milling including manufacture of pulp, paper, and paperboard">Pulp milling including manufacture of pulp, paper, and paperboard</option>`
      );
      break;

    case "17013":
      $("#Product1").html(
        `<option value="Paper and paperboard milling">Paper and paperboard milling</option>`
      );
      break;

    case "18110":
      $("#Product1").html(`<option value="Printing">Printing</option>`);
      break;

    case "19100":
      $("#Product1").html(
        `<option value="Manufacture of coke oven products">Manufacture of coke oven products</option>`
      );
      break;

    case "19200":
      $("#Product1").html(
        `<option value="Manufacture of refined petroleum products">Manufacture of refined petroleum products</option>`
      );
      break;

    case "19900":
      $("#Product1").html(
        `<option value="Manufacture of other fuel products (biodiesel)">Manufacture of other fuel products (biodiesel)</option>`
      );
      break;

    case "20111":
      $("#Product1").html(
        `<option value="Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)">Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)</option>`
      );
      break;

    case "20114":
      $("#Product1").html(
        `<option value="Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)">Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)</option>`
      );
      break;

    case "20112":
      $("#Product1").html(
        `<option value="Manufacture of industrial (compressed/ liquefied) gases">Manufacture of industrial (compressed/ liquefied) gases</option>`
      );
      break;

    case "20113":
      $("#Product1").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20116":
      $("#Product1").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20117":
      $("#Product1").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20119":
      $("#Product1").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20115":
      $("#Product1").html(
        `<option value="Manufacture of alcohol except ethyl alcohol">Manufacture of alcohol except ethyl alcohol</option>`
      );
      break;

    case "20120":
      $("#Product1").html(
        `<option value="Manufacture of fertilizers and nitrogen compounds">Manufacture of fertilizers and nitrogen compounds</option>`
      );
      break;
    case "2013":
      $("#Product1").html(
        `<option value="Manufacturing of plastics and synthetic rubber in primary forms">Manufacturing of plastics and synthetic rubber in primary forms</option>`
      );
      break;
    case "20210":
      $("#Product1").html(
        `<option value="Manufacture of pesticides and other agro-chemical products">Manufacture of pesticides and other agro-chemical products</option>`
      );
      break;
    case "2022":
      $("#Product1").html(
        `<option value="Manufacture of paints, ink, varnishes and similar coating materials">Manufacture of paints, ink, varnishes and similar coating materials</option>`
      );
      break;

    case "20293":
      $("#Product1").html(
        `<option value="Manufacture of paints, ink, varnishes and similar coating materials">Manufacture of paints, ink, varnishes and similar coating materials</option>`
      );
      break;

    case "2023":
      $("#Product1").html(
        `<option value="Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations">Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations</option>`
      );
      break;
    case "20294":
      $("#Product1").html(
        `<option value="Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives">Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives</option>`
      );
      break;
    case "20299":
      $("#Product1").html(
        `<option value="Manufacture of miscellaneous chemical products, not elsewhere classified">Manufacture of miscellaneous chemical products, not elsewhere classified</option>`
      );
      break;
    case "2030":
      $("#Product1").html(
        `<option value="Manufacture of man-made fibers (except glass fibers)">Manufacture of man-made fibers (except glass fibers)</option>`
      );
      break;
    case "21001":
      $("#Product1").html(
        ` <option value="Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma">Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma</option>`
      );
      break;

    case "2310":
      $("#Product1").html(
        `<option value="Manufacture of glass and glass products">Manufacture of glass and glass products</option>`
      );
      break;
    case "239":
      $("#Product1").html(
        `<option value="Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)">Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)</option>`
      );
      break;
    case "23940":
      $("#Product1").html(
        `<option value="Manufacture of cement">Manufacture of cement</option>`
      );
      break;

    case "241":
      $("#Product1").html(
        `<option value="Manufacture of iron and steel">Manufacture of iron and steel</option>`
      );
      break;

    case "2431":
      $("#Product1").html(
        `<option value="Manufacture of iron and steel">Manufacture of iron and steel</option>`
      );
      break;

    case "24210":
      $("#Product1").html(
        `<option value="Manufacture of precious metals">Manufacture of precious metals</option>`
      );
      break;

    case "24220":
      $("#Product1").html(
        `<option value="Non-ferrous smelting and refining, except precious metals">Non-ferrous smelting and refining, except precious metals</option>`
      );
      break;

    case "24230":
      $("#Product1").html(
        `<option value="Non-ferrous rolling, drawing and extrusion mills">Non-ferrous rolling, drawing and extrusion mills</option>`
      );
      break;

    case "24240":
      $("#Product1").html(
        `<option value="Manufacture of pipe fittings of non-ferrous metal">Manufacture of pipe fittings of non-ferrous metal</option>`
      );
      break;

    case "24290":
      $("#Product1").html(
        `<option value="Manufacture of basic precious and non-ferrous metal, not elsewhere classified">Manufacture of basic precious and non-ferrous metal, not elsewhere classified</option>`
      );
      break;

    case "2431":
      $("#Product1").html(
        `<option value="Casting/ foundry of iron and steel">Casting/ foundry of iron and steel</option>`
      );
      break;

    case "2432":
      $("#Product1").html(
        `<option value="Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys">Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys</option>`
      );
      break;

    case "25920":
      $("#Product1").html(
        `<option value="Treatment, coating and machining of metals">Treatment, coating and machining of metals</option>`
      );
      break;

    case "261":
      $("#Product1").html(
        `<option value="Manufacture of electronic components">Manufacture of electronic components</option>`
      );
      break;

    case "2720":
      $("#Product1").html(
        `<option value="Manufacture of batteries and accumulators">Manufacture of batteries and accumulators</option>`
      );
      break;
    case "35100":
      $("#Product1").html(
        `<option value="Electric power generation (except transmission and distribution): coal, natural">gas; oil (petroleum); geothermal; hydro; biomass;</option>`
      );
      break;

    case "35200":
      $("#Product1").html(
        `<option value="Manufacture of gas; distribution of gaseous fuels through mains">Manufacture of gas; distribution of gaseous fuels through mains</option>`
      );
      break;
    case "35300":
      $("#Product1").html(
        `<option value="Air conditioning supply and production of ice (except steam production)">Air conditioning supply and production of ice (except steam production)</option>`
      );
      break;

    case "35300":
      $("#Product1").html(
        `<option value="Manufacture of electronic components">Manufacture of electronic components</option>`
      );
      break;
    case "36000":
      $("#Product1").html(
        `<option value="Water collection, treatment and supply (except those intended to prevent pollution)">Water collection, treatment and supply (except those intended to prevent pollution)</option>`
      );
      break;

    case "37000":
      $("#Product1").html(
        `<option value="Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)">Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)</option>`
      );
      break;

    case "38210":
      $("#Product1").html(
        `<option value="Treatment and disposal of non-hazardous waste">Treatment and disposal of non-hazardous waste</option>`
      );
      break;

    case "38220":
      $("#Product1").html(
        `<option value="Treatment and disposal of hazardous waste">Treatment and disposal of hazardous waste</option>`
      );
      break;

    case "39000":
      $("#Product1").html(
        `<option value="Remediation activities and other waste management services">Remediation activities and other waste management services</option>`
      );
      break;

    case "452":
      $("#Product1").html(
        `<option value="Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)">Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)</option>`
      );
      break;

    case "454":
      $("#Product1").html(
        `<option value="Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)">Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)</option>`
      );
      break;

    case "47300":
      $("#Product1").html(
        `<option value="Wholesale and retail sale of automotive fuels">Wholesale and retail sale of automotive fuels</option>`
      );
      break;

    case "4661":
      $("#Product1").html(
        `<option value="Wholesale and retail sale of automotive fuels">Wholesale and retail sale of automotive fuels</option>`
      );
      break;

    case "52104":
      $("#Product1").html(`<option value="Cold Storage">Cold Storage</option>`);
      break;

    case "55":
      $("#Product1").html(
        `<option value="Hotels, motels, resorts, dormitories, and other accommodation services">Hotels, motels, resorts, dormitories, and other accommodation services</option>`
      );
      break;

    case "56":
      $("#Product1").html(
        `<option value="Restaurants, food chains, bars and other food/ beverage services">Restaurants, food chains, bars and other food/ beverage services</option>`
      );
      break;

    case "681":
      $("#Product1").html(
        `<option value="Real Estate activities with own or leased property">Real Estate activities with own or leased property</option>`
      );
      break;

    case "71200":
      $("#Product1").html(
        `<option value="Technical Testing and analysis">Technical Testing and analysis</option>`
      );
      break;

    case "7210":
      $("#Product1").html(
        `<option value="Research and experimental development and natural sciences and engineering">Research and experimental development and natural sciences and engineering</option>`
      );
      break;

    case "75":
      $("#Product1").html(
        `<option value="Veterinary activities">Veterinary activities</option>`
      );
      break;

    case "85":
      $("#Product1").html(
        `<option value="Public and private education (including support activities)">Public and private education (including support activities)</option>`
      );
      break;

    case "86":
      $("#Product1").html(
        `<option value="Hospitals, clinics, nursing homes and other human health and residential care activities">Hospitals, clinics, nursing homes and other human health and residential care activities</option>`
      );
      break;

    case "87":
      $("#Product1").html(
        `<option value="Hospitals, clinics, nursing homes and other human health and residential care activities">Hospitals, clinics, nursing homes and other human health and residential care activities</option>`
      );
      break;

    case "86900":
      $("#Product1").html(
        `<option value="Other human health activities- medical laboratories inside and outside of medical facilities">Other human health activities- medical laboratories inside and outside of medical facilities</option>`
      );
      break;

    case "96210":
      $("#Product1").html(
        `<option value="Washing and dry cleaning of textile and fur products">Washing and dry cleaning of textile and fur products</option>`
      );
      break;

    case "96300":
      $("#Product1").html(
        `<option value="Funeral and related activities">Funeral and related activities</option>`
      );
      break;

    default:
    case "":
      $("#Product1").html(`
          <option value="">--Select Product--</option>
          <option value="Animal Production">Animal Production</option>
          <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>
          <option value="Mining of Coal and Lignite">Mining of Coal and Lignite</option>
          <option value="Extraction of Crude and Petroleum and Natural Gas, and Support Activities">Extraction of Crude and Petroleum and Natural Gas, and Support Activities</option>
          <option value="Mining of Iron Ores">Mining of Iron Ores</option>
          <option value="Mining of Precious Metal Ores">Mining of Precious Metal Ores</option>
          <option value="Gold Ore Mining">Gold Ore Mining</option>
          <option value="Silver Ore Mining">Silver Ore Mining</option>
          <option value="Platinum Ore Mining">Platinum Ore Mining</option>
          <option value="Copper One Mining">Copper One Mining</option>
          <option value="Chromite Ore Mining">Chromite Ore Mining</option>
          <option value="Manganese Mining">Manganese Mining</option>
          <option value="Nickel Ore Mining">Nickel Ore Mining</option>
          <option value="Pyrite Mining">Pyrite Mining</option>
          <option value="Rock Phosphate Mining">Rock Phosphate Mining</option>
          <option value="Slaughtering and Meat Packing">Slaughtering and Meat Packing</option>
          <option value="Production Processing and Preserving of Meat and Meat Products">Production Processing and Preserving of Meat and Meat Products</option>
          <option value="Processing and Preserving of Fish, Crustaceans and Mollusks(Except Carrageenan)">Processing and Preserving of Fish, Crustaceans and Mollusks(Except Carrageenan)</option>
          <option value="Processing of Seaweeds; Manufacture of Agar-Agar of Carrageenan">Processing of Seaweeds; Manufacture of Agar-Agar of Carrageenan</option>
          <option value="Manufacure of Animal Oils and Fats">Manufacure of Animal Oils and Fats</option>
          <option value="Manufacture of Dairy Products">Manufacture of Dairy Products</option>
          <option value="Manufacture of Grain Mill Products, Starches and Starch Products (Except Rice, Corn, and Cassava Flour Milling">Manufacture of Grain Mill Products, Starches and Starch Products (Except Rice, Corn, and Cassava Flour Milling</option>
          <option value="Rice/Corn Milling">Rice/Corn Milling</option>
          <option value="Manufacture of Other Food Products(Except Sugar)">Manufacture of Other Food Products(Except Sugar)</option>
          <option value="Manufacture of Sugar">Manufacture of Sugar</option>
          <option value="Sugar Milling">Sugar Milling</option>
          <option value="Manufacture of Prepared Animal Feeds">Manufacture of Prepared Animal Feeds</option>
          <option value="Manufacture of Beverages">Manufacture of Beverages</option>
          <option value="Manufacture of Tobacco Products">Manufacture of Tobacco Products</option>
          <option value="Manufacture of Textile">Manufacture of Textile</option>
          <option value="Manufacture of Wearing Apparel">Manufacture of Wearing Apparel</option>
          <option value="Tanning and Dressing of Leather">Tanning and Dressing of Leather</option>
          <option value="Manufacture of Veener Sheets; Manufacture of Plywood, Laminated Board, Particle Board and Other Panels and Board; Wooden Window and Screens">Manufacture of Veener Sheets; Manufacture of Plywood, Laminated Board, Particle Board and Other Panels and Board; Wooden Window and Screens</option>
          <option value="Pulp Mining Including Manufacture of Pulp, Paper and Paperboard">Pulp Mining Including Manufacture of Pulp, Paper and Paperboard</option>
          <option value="Paper and Paperboard Milling">Paper and Paperboard Milling</option>
          <option value="Printing">Printing</option>
          <option value="Manufacture of Coke Oven Products">Manufacture of Coke Oven Products</option>
          <option value="Manufacture of Refined Petroleum Products">Manufacture of Refined Petroleum Products</option>
          <option value="Manufacture of Other Fuel Products(Biodiesel)">Manufacture of Other Fuel Products(Biodiesel)</option>
          <option value="Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel">application; Blending of ethanol for antiseptic and solvent (denatured)</option>
          <option value="Manufacture of industrial (compressed/ liquefied) gases">Manufacture of industrial (compressed/ liquefied) gases</option>
          <option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>
          <option value="Manufacture of alcohol except ethyl alcohol">Manufacture of alcohol except ethyl alcohol</option>
          <option value="Manufacture of fertilizers and nitrogen compounds">Manufacture of fertilizers and nitrogen compounds</option>
          <option value="Manufacturing of plastics and synthetic rubber in primary forms">Manufacturing of plastics and synthetic rubber in primary forms</option>
          <option value="Manufacture of pesticides and other agro-chemical products">Manufacture of pesticides and other agro-chemical products</option>
          <option value="Manufacture of paints, ink, varnishes and similar coating materials">Manufacture of paints, ink, varnishes and similar coating materials</option>
          <option value="Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations.">Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations.</option>
          <option value="Manufacture of glues and adhesives; synthetic glues and adhesives; animal/ plant derived glues and adhesives">Manufacture of glues and adhesives; synthetic glues and adhesives; animal/ plant derived glues and adhesives</option>
          <option value="Manufacture of miscellaneous chemical products, not elsewhere classified">Manufacture of miscellaneous chemical products, not elsewhere classified</option>
          <option value="Manufacture of man-made fibers (except glass fibers)">Manufacture of man-made fibers (except glass fibers)</option>
          <option value="Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma">Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma</option>
          <option value="Manufacture of glass and glass products">Manufacture of glass and glass products</option>
          <option value="Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)">Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)</option>
          <option value="Manufacture of cement">Manufacture of cement</option>
          <option value="Manufacture of iron and steel">Manufacture of iron and steel</option>
          <option value="Manufacture of precious metals">Manufacture of precious metals</option>
          <option value="Non-ferrous smelting and refining, except precious metals">Non-ferrous smelting and refining, except precious metals</option>
          <option value="Non-ferrous rolling, drawing and extrusion mills">Non-ferrous rolling, drawing and extrusion mills</option>
          <option value="Manufacture of pipe fittings of non-ferrous metal">Manufacture of pipe fittings of non-ferrous metal</option>
          <option value="Manufacture of basic precious and non-ferrous metal, not elsewhere classified">Manufacture of basic precious and non-ferrous metal, not elsewhere classified</option>
          <option value="Casting/ foundry of iron and steel">Casting/ foundry of iron and steel</option>
          <option value="Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys">Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys</option>
          <option value="Treatment, coating and machining of metals">Treatment, coating and machining of metals</option>
          <option value="Manufacture of electronic components">Manufacture of electronic components</option>
          <option value="Manufacture of batteries and accumulators">Manufacture of batteries and accumulators</option>
          <option value="Electric power generation (except transmission and distribution): coal, natural gas; oil (petroleum); geothermal; hydro; biomass;">Electric power generation (except transmission and distribution): coal, natural gas; oil (petroleum); geothermal; hydro; biomass;</option>
          <option value="Manufacture of gas; distribution of gaseous fuels through mains">Manufacture of gas; distribution of gaseous fuels through mains</option>
          <option value="Air conditioning supply and production of ice (except steam production)">Air conditioning supply and production of ice (except steam production)</option>
          <option value="Water collection, treatment and supply (except those intended to prevent pollution)">Water collection, treatment and supply (except those intended to prevent pollution)</option>
          <option value="Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)">Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)</option>
          <option value="Treatment and disposal of non-hazardous waste">Treatment and disposal of non-hazardous waste</option>
          <option value="Treatment and disposal of hazardous waste">Treatment and disposal of hazardous waste</option>
          <option value="Remediation activities and other waste management services">Remediation activities and other waste management services</option>
          <option value="Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)">Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)</option>
          <option value="Wholesale and retail sale of automotive fuels">Wholesale and retail sale of automotive fuels</option>
          <option value="Cold Storage">Cold Storage</option>
          <option value="Hotels, motels, resorts, dormitories, and other accommodation services">Hotels, motels, resorts, dormitories, and other accommodation services</option>
          <option value="Restaurants, food chains, bars and other food/ beverage services">Restaurants, food chains, bars and other food/ beverage services</option>
          <option value="Real Estate activities with own or leased property">Real Estate activities with own or leased property</option>
          <option value="Technical Testing and analysis">Technical Testing and analysis</option>
          <option value="Research and experimental development and natural sciences and engineering">Research and experimental development and natural sciences and engineering</option>
          <option value="Veterinary activities">Veterinary activities</option>
          <option value="Public and private education (including support activities)">Public and private education (including support activities)</option>
          <option value="Hospitals, clinics, nursing homes and other human health and residential care activities">Hospitals, clinics, nursing homes and other human health and residential care activities</option>
          <option value="Other human health activities- medical laboratories inside and outside of medical facilities">Other human health activities- medical laboratories inside and outside of medical facilities</option>
          <option value="Washing and dry cleaning of textile and fur products">Washing and dry cleaning of textile and fur products</option>
          <option value="Funeral and related activities">Funeral and related activities</option>

        `);
      break;
  }
});

$("#Product1").change(function () {
  var selectvalue = this.value;
  switch (selectvalue) {
    case "Animal Production":
      $("#PSICCode1").html(`
        <option value="014">014</option>
      `);
      break;
    case "Aquaculture (excluding fish pens)":
      $("#PSICCode1").html(`
        <option value="032">032</option>
      `);
      break;
    case "Mining of coal and lignite":
      $("#PSICCode1").html(`
        <option value="05">05</option>
      `);
      break;
    case "Extraction of crude petroleum and natural gas, and support activities":
      $("#PSICCode1").html(`
        <option value="06">06</option>
      `);
      break;
    case "Mining of iron ores":
      $("#PSICCode1").html(`
        <option value="07100">07100</option>
      `);
      break;

    case "Mining of precious metal ores - gold, silver, platinum":
      $("#PSICCode1").html(`
          <option value="0722">0722</option>
        `);
      break;

    case "Copper ore mining":
      $("#PSICCode1").html(`
          <option value="07291">07291</option>
        `);
      break;

    case "Chromite ore mining":
      $("#PSICCode1").html(`
          <option value="07292">07292</option>
        `);
      break;

    case "Manganese ore mining":
      $("#PSICCode1").html(`
          <option value="07293">07293</option>
        `);
      break;

    case "Nickel ore mining":
      $("#PSICCode1").html(`
          <option value="07294">07294</option>
        `);
      break;

    case "Pyrite mining":
      $("#PSICCode1").html(`
          <option value="08913">08913</option>
        `);
      break;

    case "Rock phosphate mining":
      $("#PSICCode1").html(`
          <option value="08914">08914</option>
        `);
      break;

    case "Slaughtering and meat packing":
      $("#PSICCode1").html(`
          <option value="10110">10110</option>
        `);
      break;

    case "Production processing and preserving of meat and meat products":
      $("#PSICCode1").html(`
          <option value="10120">10120</option>
        `);
      break;

    case "Processing and preserving of fish, crustaceans and mollusks (except carrageenan)":
      $("#PSICCode1").html(`
          <option value="1020">1020</option>
        `);
      break;

    case "Processing of seaweeds; manufacture of agar-agar or carrageenan":
      $("#PSICCode1").html(`
          <option value="10205">10205</option>
        `);
      break;

    case "Processing and preserving of fruits and vegetables":
      $("#PSICCode1").html(`
          <option value="1030">1030</option>
        `);
      break;

    case "Manufacture of vegetable and animal oils and fats":
      $("#PSICCode1").html(`
          <option value="104">104</option>
        `);
      break;

    case "Manufacture of dairy products":
      $("#PSICCode1").html(`
            <option value="105">105</option>
          `);
      break;

    case "Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)":
      $("#PSICCode1").html(`
        <option value="106">106</option>
      `);
      break;

    case "Rice/ corn milling":
      $("#PSICCode1").html(`
        <option value="10610">10610</option>
      `);
      break;

    case "Cassava flour milling":
      $("#PSICCode1").html(`
        <option value="10621">10621</option>
      `);
      break;

    case "Manufacture of other food products (except sugar)":
      $("#PSICCode1").html(`
        <option value="107">107</option>
      `);
      break;

    case "Manufacture of sugar - milling and refining":
      $("#PSICCode1").html(`
        <option value="1072">1072</option>
      `);
      break;

    case "Manufacture of prepared animal feeds":
      $("#PSICCode1").html(`
        <option value="10800">10800</option>
      `);
      break;

    case "Manufacture of beverages":
      $("#PSICCode1").html(`
        <option value="11">11</option>
      `);
      break;

    case "Manufacture of tobacco products":
      $("#PSICCode1").html(`
        <option value="12">12</option>
      `);
      break;

    case "Manufacture of textiles":
      $("#PSICCode1").html(`
          <option value="13">13</option>
        `);
      break;

    case "Tanning and dressing of leather":
      $("#PSICCode1").html(`
          <option value="14">14</option>
        `);
      break;

    case "Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens":
      $("#PSICCode1").html(`
          <option value="1621">1621</option>
        `);
      break;

    case "Pulp milling including manufacture of pulp, paper, and paperboard":
      $("#PSICCode1").html(`
            <option value="17012">17012</option>
          `);
      break;

    case "Paper and paperboard milling":
      $("#PSICCode1").html(`
            <option value="17013">17013</option>
          `);
      break;

    case "Printing":
      $("#PSICCode1").html(`
            <option value="18110">18110</option>
          `);
      break;

    case "Manufacture of coke oven products":
      $("#PSICCode1").html(`
            <option value="19100">19100</option>
          `);
      break;

    case "Manufacture of refined petroleum products":
      $("#PSICCode1").html(`
            <option value="19200">19200</option>
          `);
      break;

    case "Manufacture of other fuel products (biodiesel)":
      $("#PSICCode1").html(`
              <option value="19900">19900</option>
            `);
      break;

    case "Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)":
      $("#PSICCode1").html(`
              <option value="20111">20111</option>
              <option value="20114">20114</option>
            `);
      break;

    case "Manufacture of industrial (compressed/ liquefied) gases":
      $("#PSICCode1").html(`
            <option value="20112">20112</option>
          `);
      break;

    case "Manufacture of inorganic, organic and other basic chemicals":
      $("#PSICCode1").html(`
            <option value="20113">20113</option>
            <option value="20116">20116</option>
            <option value="20117">20117</option>
            <option value="20119">20119</option>
          `);
      break;

    case "Manufacture of alcohol except ethyl alcohol":
      $("#PSICCode1").html(`
            <option value="20115">20115</option>
          `);
      break;

    case "Manufacture of fertilizers and nitrogen compounds":
      $("#PSICCode1").html(`
              <option value="20120">20120</option>
            `);
      break;

    case "Manufacturing of plastics and synthetic rubber in primary forms":
      $("#PSICCode1").html(`
              <option value="2013">2013</option>
            `);
      break;

    case "Manufacture of pesticides and other agro-chemical products":
      $("#PSICCode1").html(`
              <option value="20210">20210</option>
            `);
      break;

    case "Manufacture of paints, ink, varnishes and similar coating materials":
      $("#PSICCode1").html(`
              <option value="2022">2022</option>
              <option value="20293">20293</option>
            `);
      break;

    case "Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations":
      $("#PSICCode1").html(`
                <option value="2023">2023</option>
              `);
      break;

    case "Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives":
      $("#PSICCode1").html(`
              <option value="20294">20294</option>
            `);
      break;

    case "Manufacture of miscellaneous chemical products, not elsewhere classified":
      $("#PSICCode1").html(`
              <option value="20299">20299</option>
            `);
      break;

    case "Manufacture of man-made fibers (except glass fibers)":
      $("#PSICCode1").html(`
              <option value="2030">2030</option>
            `);
      break;

    case "Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma":
      $("#PSICCode1").html(`
              <option value="21001">21001</option>
            `);
      break;

    case "Manufacture of glass and glass products":
      $("#PSICCode1").html(`
                <option value="2310">2310</option>
              `);
      break;

    case "Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)":
      $("#PSICCode1").html(`
                <option value="239">239</option>
              `);
      break;

    case "Manufacture of cement":
      $("#PSICCode1").html(`
                <option value="23940">23940</option>
              `);
      break;

    case "Manufacture of iron and steel":
      $("#PSICCode1").html(`
                <option value="241">241</option>
                <option value="2431">2431</option>
              `);
      break;

    case "Manufacture of precious metals":
      $("#PSICCode1").html(`
                  <option value="24210">24210</option>
                `);
      break;

    case "Non-ferrous smelting and refining, except precious metals":
      $("#PSICCode1").html(`
                  <option value="24220">24220</option>
                `);
      break;

    case "Non-ferrous rolling, drawing and extrusion mills":
      $("#PSICCode1").html(`
                  <option value="24230">24230</option>
                `);
      break;

    case "Manufacture of pipe fittings of non-ferrous metal":
      $("#PSICCode1").html(`
                  <option value="24240">24240</option>
                `);
      break;

    case "Manufacture of basic precious and non-ferrous metal, not elsewhere classified":
      $("#PSICCode1").html(`
                  <option value="24290">24290</option>
                `);
      break;

    case "Casting/ foundry of iron and steel":
      $("#PSICCode1").html(`
                  <option value="2431">2431</option>
                `);
      break;

    case "Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys":
      $("#PSICCode1").html(`
                  <option value="2432">2432</option>
                `);
      break;

    case "Treatment, coating and machining of metals":
      $("#PSICCode1").html(`
                  <option value="25920">25920</option>
                `);
      break;

    case "Manufacture of electronic components":
      $("#PSICCode1").html(`
                  <option value="261">261</option>
                `);
      break;

    case "Manufacture of batteries and accumulators":
      $("#PSICCode1").html(`
                  <option value="2720">2720</option>
                `);
      break;

    case "Electric power generation (except transmission and distribution): coal, natural":
      $("#PSICCode1").html(`
                  <option value="35100">35100</option>
                `);
      break;

    case "Manufacture of gas; distribution of gaseous fuels through mains":
      $("#PSICCode1").html(`
                  <option value="35200">35200</option>
                `);
      break;

    case "Air conditioning supply and production of ice (except steam production)":
      $("#PSICCode1").html(`
                    <option value="35300">35300</option>
                  `);
      break;

    case "Water collection, treatment and supply (except those intended to prevent pollution)":
      $("#PSICCode1").html(`
                    <option value="36000">36000</option>
                  `);
      break;

    case "Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)":
      $("#PSICCode1").html(`
                  <option value="37000">37000</option>
                `);
      break;

    case "Treatment and disposal of non-hazardous waste":
      $("#PSICCode1").html(`
                  <option value="38210">38210</option>
                `);
      break;

    case "Treatment and disposal of hazardous waste":
      $("#PSICCode1").html(`
                  <option value="38220">38220</option>
                `);
      break;

    case "Remediation activities and other waste management services":
      $("#PSICCode1").html(`
                  <option value="39000">39000</option>
                `);
      break;

    case "Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)":
      $("#PSICCode1").html(`
                    <option value="452">452</option>
                    <option value="454">454</option>
                  `);
      break;

    case "Wholesale and retail sale of automotive fuels":
      $("#PSICCode1").html(`
                    <option value="47300">47300</option>
                    <option value="4661">4661</option>
                  `);
      break;

    case "Cold Storage":
      $("#PSICCode1").html(`
                    <option value="52104">52104</option>
                  `);
      break;

    case "Hotels, motels, resorts, dormitories, and other accommodation services":
      $("#PSICCode1").html(`
                    <option value="55">55</option>
                  `);
      break;

    case "Restaurants, food chains, bars and other food/ beverage services":
      $("#PSICCode1").html(`
                    <option value="56">56</option>
                  `);
      break;

    case "Real Estate activities with own or leased property":
      $("#PSICCode1").html(`
                    <option value="681">681</option>
                  `);
      break;

    case "Technical Testing and analysis":
      $("#PSICCode1").html(`
                    <option value="71200">71200</option>
                  `);
      break;
    //
    case "Research and experimental development and natural sciences and engineering":
      $("#PSICCode1").html(`
                      <option value="7210">7210</option>
                    `);
      break;

    case "Veterinary activities":
      $("#PSICCode1").html(`
                      <option value="75">75</option>
                    `);
      break;

    case "Public and private education (including support activities)":
      $("#PSICCode1").html(`
                      <option value="85">85</option>
                    `);
      break;

    case "Hospitals, clinics, nursing homes and other human health and residential care activities":
      $("#PSICCode1").html(`
                        <option value="86">86</option>
                        <option value="87">87</option>
                      `);
      break;

    case "Other human health activities- medical laboratories inside and outside of medical facilities":
      $("#PSICCode1").html(`
                        <option value="86900">86900</option>
                      `);
      break;

    case "Washing and dry cleaning of textile and fur products":
      $("#PSICCode1").html(`
                        <option value="96210">96210</option>
                      `);
      break;

    case "Funeral and related activities":
      $("#PSICCode1").html(`
                          <option value="96300">96300</option>
                        `);
      break;

    default:
    case "":
      $("#PSICCode1").html(`
      <option value="">--Select PSIC Code--</option>
      <option value="014">014</option>
      <option value="032">032</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07100">07100</option>
      <option value="0722">0722</option>
      <option value="07291">07291</option>
      <option value="07292">07292</option>
      <option value="07293">07293</option>
      <option value="07294">07294</option>
      <option value="08913">08913</option>
      <option value="08914">08914</option>
      <option value="10110">10110</option>
      <option value="10120">10120</option>
      <option value="1020">1020</option>
      <option value="10205">10205</option>
      <option value="1030">1030</option>
      <option value="104">104</option>
      <option value="105">105</option>
      <option value="106">106</option>
      <option value="10610">10610</option>
      <option value="10621">10621</option>
      <option value="107">107</option>
      <option value="1072">1072</option>
      <option value="10800">10800</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="1621">1621</option>
      <option value="17012">17012</option>
      <option value="17013">17013</option>
      <option value="18110">18110</option>
      <option value="19100">19100</option>
      <option value="19200">19200</option>
      <option value="19900">19900</option>
      <option value="20111">20111</option>
      <option value="20114">20114</option>
      <option value="20112">20112</option>
      <option value="20113">20113</option>
      <option value="20116">20116</option>
      <option value="20117">20117</option>
      <option value="20119">20119</option>
      <option value="20115">20115</option>
      <option value="20120">20120</option>
      <option value="2013">2013</option>
      <option value="20210">20210</option>
      <option value="2022">2022</option>
      <option value="20293">20293</option>
      <option value="2023">2023</option>
      <option value="20294">20294</option>
      <option value="20299">20299</option>
      <option value="2030">2030</option>
      <option value="21001">21001</option>
      <option value="2310">2310</option>
      <option value="239">239</option>
      <option value="23940">23940</option>
      <option value="241">241</option>
      <option value="2431">2431</option>
      <option value="24210">24210</option>
      <option value="24220">24220</option>
      <option value="24230">24230</option>
      <option value="24240">24240</option>
      <option value="24290">24290</option>
      <option value="2431">2431</option>
      <option value="2432">2432</option>
      <option value="25920">25920</option>
      <option value="261">261</option>
      <option value="2720">2720</option>
      <option value="35100">35100</option>
      <option value="35200">35200</option>
      <option value="35300">35300</option>
      <option value="36000">36000</option>
      <option value="37000">37000</option>
      <option value="38210">38210</option>
      <option value="38220">38220</option>
      <option value="39000">39000</option>
      <option value="452">452</option>
      <option value="454">454</option>
      <option value="47300">47300</option>
      <option value="4661">4661</option>
      <option value="52104">52104</option>
      <option value="55">55</option>
      <option value="56">56</option>
      <option value="681">681</option>
      <option value="71200">71200</option>
      <option value="7210">7210</option>
      <option value="75">75</option>
      <option value="85">85</option>
      <option value="86">86</option>
      <option value="87">87</option>
      <option value="86900">86900</option>
      <option value="96210">96210</option>
      <option value="96300">96300</option>
                          `);
      break;
  }
});

// Insert Form
$("#PSICCode").change(function () {
  var selectvalue = this.value;
  switch (selectvalue) {
    case "014":
      $("#Product").html(`
        <option value="Animal Production">Animal Production</option>`);
      break;

    case "032":
      $("#Product").html(`
          <option value="Aquaculture (excluding fish pens)">Aquaculture (excluding fish pens)</option>`);
      break;

    case "05":
      $("#Product").html(
        `<option value="Mining of coal and lignite">Mining of coal and lignite</option>`
      );
      break;

    case "06":
      $("#Product").html(
        `<option value="Extraction of crude petroleum and natural gas, and support activities">Extraction of crude petroleum and natural gas, and support activities</option>`
      );
      break;

    case "07100":
      $("#Product").html(
        `<option value="Mining of iron ores">Mining of iron ores</option>`
      );
      break;

    case "0722":
      $("#Product").html(
        `<option value="Mining of precious metal ores - gold, silver, platinum">Mining of precious metal ores - gold, silver, platinum</option>`
      );
      break;

    case "07291":
      $("#Product").html(
        `<option value="Copper ore mining">Copper ore mining</option>`
      );
      break;

    case "07292":
      $("#Product").html(
        `<option value="Chromite ore mining">Chromite ore mining</option>`
      );
      break;

    case "07293":
      $("#Product").html(
        `<option value="Manganese ore mining">Manganese ore mining</option>`
      );
      break;

    case "07294":
      $("#Product").html(
        `<option value="Nickel ore mining">Nickel ore mining</option>`
      );
      break;

    case "08913":
      $("#Product").html(
        `<option value="Pyrite mining">Pyrite mining</option>`
      );
      break;

    case "08914":
      $("#Product").html(
        `<option value="Rock phosphate mining">Rock phosphate mining</option>`
      );
      break;

    case "10110":
      $("#Product").html(
        `<option value="Slaughtering and meat packing">Slaughtering and meat packing</option>`
      );
      break;

    case "10120":
      $("#Product").html(
        `<option value="Production processing and preserving of meat and meat products">Production processing and preserving of meat and meat products</option>`
      );
      break;

    case "1020":
      $("#Product").html(
        `<option value="Processing and preserving of fish, crustaceans and mollusks (except carrageenan)">Processing and preserving of fish, crustaceans and mollusks (except carrageenan)</option>`
      );
      break;

    case "10205":
      $("#Product").html(
        `<option value="Processing of seaweeds; manufacture of agar-agar or carrageenan">Processing of seaweeds; manufacture of agar-agar or carrageenan</option>`
      );
      break;

    case "1030":
      $("#Product").html(
        `<option value="Processing and preserving of fruits and vegetables">Processing and preserving of fruits and vegetables</option>`
      );
      break;

    case "104":
      $("#Product").html(
        `<option value="Manufacture of vegetable and animal oils and fats">Manufacture of vegetable and animal oils and fats</option>`
      );
      break;

    case "105":
      $("#Product").html(
        `<option value="Manufacture of dairy products">Manufacture of dairy products</option>`
      );
      break;

    case "106":
      $("#Product").html(
        `<option value="Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)">Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)</option>`
      );
      break;

    case "10610":
      $("#Product").html(
        `<option value="Rice/ corn milling">Rice/ corn milling</option>`
      );
      break;

    case "10621":
      $("#Product").html(
        `<option value="Cassava flour milling">Cassava flour milling</option>`
      );
      break;

    case "107":
      $("#Product").html(
        `<option value="Manufacture of other food products (except sugar)">Manufacture of other food products (except sugar)</option>`
      );
      break;

    case "1072":
      $("#Product").html(
        `<option value="Manufacture of sugar - milling and refining">Manufacture of sugar - milling and refining</option>`
      );
      break;

    case "10800":
      $("#Product").html(
        `<option value="Manufacture of prepared animal feeds">Manufacture of prepared animal feeds</option>`
      );
      break;

    case "11":
      $("#Product").html(
        `<option value="Manufacture of beverages">Manufacture of beverages</option>`
      );
      break;

    case "12":
      $("#Product").html(
        `<option value="Manufacture of tobacco products">Manufacture of tobacco products</option>`
      );
      break;

    case "13":
      $("#Product").html(
        `<option value="Manufacture of textiles">Manufacture of textiles</option>`
      );
      break;

    case "14":
      $("#Product").html(
        `<option value="Tanning and dressing of leather">Tanning and dressing of leather</option>`
      );
      break;

    case "1621":
      $("#Product").html(
        `<option value="Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens">Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens</option>`
      );
      break;

    case "17012":
      $("#Product").html(
        `<option value="Pulp milling including manufacture of pulp, paper, and paperboard">Pulp milling including manufacture of pulp, paper, and paperboard</option>`
      );
      break;

    case "17013":
      $("#Product").html(
        `<option value="Paper and paperboard milling">Paper and paperboard milling</option>`
      );
      break;

    case "18110":
      $("#Product").html(`<option value="Printing">Printing</option>`);
      break;

    case "19100":
      $("#Product").html(
        `<option value="Manufacture of coke oven products">Manufacture of coke oven products</option>`
      );
      break;

    case "19200":
      $("#Product").html(
        `<option value="Manufacture of refined petroleum products">Manufacture of refined petroleum products</option>`
      );
      break;

    case "19900":
      $("#Product").html(
        `<option value="Manufacture of other fuel products (biodiesel)">Manufacture of other fuel products (biodiesel)</option>`
      );
      break;

    case "20111":
      $("#Product").html(
        `<option value="Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)">Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)</option>`
      );
      break;

    case "20114":
      $("#Product").html(
        `<option value="Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)">Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)</option>`
      );
      break;

    case "20112":
      $("#Product").html(
        `<option value="Manufacture of industrial (compressed/ liquefied) gases">Manufacture of industrial (compressed/ liquefied) gases</option>`
      );
      break;

    case "20113":
      $("#Product").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20116":
      $("#Product").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20117":
      $("#Product").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20119":
      $("#Product").html(
        `<option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>`
      );
      break;

    case "20115":
      $("#Product").html(
        `<option value="Manufacture of alcohol except ethyl alcohol">Manufacture of alcohol except ethyl alcohol</option>`
      );
      break;

    case "20120":
      $("#Product").html(
        `<option value="Manufacture of fertilizers and nitrogen compounds">Manufacture of fertilizers and nitrogen compounds</option>`
      );
      break;
    case "2013":
      $("#Product").html(
        `<option value="Manufacturing of plastics and synthetic rubber in primary forms">Manufacturing of plastics and synthetic rubber in primary forms</option>`
      );
      break;
    case "20210":
      $("#Product").html(
        `<option value="Manufacture of pesticides and other agro-chemical products">Manufacture of pesticides and other agro-chemical products</option>`
      );
      break;
    case "2022":
      $("#Product").html(
        `<option value="Manufacture of paints, ink, varnishes and similar coating materials">Manufacture of paints, ink, varnishes and similar coating materials</option>`
      );
      break;

    case "20293":
      $("#Product").html(
        `<option value="Manufacture of paints, ink, varnishes and similar coating materials">Manufacture of paints, ink, varnishes and similar coating materials</option>`
      );
      break;

    case "2023":
      $("#Product").html(
        `<option value="Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations">Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations</option>`
      );
      break;
    case "20294":
      $("#Product").html(
        `<option value="Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives">Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives</option>`
      );
      break;
    case "20299":
      $("#Product").html(
        `<option value="Manufacture of miscellaneous chemical products, not elsewhere classified">Manufacture of miscellaneous chemical products, not elsewhere classified</option>`
      );
      break;
    case "2030":
      $("#Product").html(
        `<option value="Manufacture of man-made fibers (except glass fibers)">Manufacture of man-made fibers (except glass fibers)</option>`
      );
      break;
    case "21001":
      $("#Product").html(
        ` <option value="Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma">Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma</option>`
      );
      break;

    case "2310":
      $("#Product").html(
        `<option value="Manufacture of glass and glass products">Manufacture of glass and glass products</option>`
      );
      break;
    case "239":
      $("#Product").html(
        `<option value="Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)">Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)</option>`
      );
      break;
    case "23940":
      $("#Product").html(
        `<option value="Manufacture of cement">Manufacture of cement</option>`
      );
      break;

    case "241":
      $("#Product").html(
        `<option value="Manufacture of iron and steel">Manufacture of iron and steel</option>`
      );
      break;

    case "2431":
      $("#Product").html(
        `<option value="Manufacture of iron and steel">Manufacture of iron and steel</option>`
      );
      break;

    case "24210":
      $("#Product").html(
        `<option value="Manufacture of precious metals">Manufacture of precious metals</option>`
      );
      break;

    case "24220":
      $("#Product").html(
        `<option value="Non-ferrous smelting and refining, except precious metals">Non-ferrous smelting and refining, except precious metals</option>`
      );
      break;

    case "24230":
      $("#Product").html(
        `<option value="Non-ferrous rolling, drawing and extrusion mills">Non-ferrous rolling, drawing and extrusion mills</option>`
      );
      break;

    case "24240":
      $("#Product").html(
        `<option value="Manufacture of pipe fittings of non-ferrous metal">Manufacture of pipe fittings of non-ferrous metal</option>`
      );
      break;

    case "24290":
      $("#Product").html(
        `<option value="Manufacture of basic precious and non-ferrous metal, not elsewhere classified">Manufacture of basic precious and non-ferrous metal, not elsewhere classified</option>`
      );
      break;

    case "2431":
      $("#Product").html(
        `<option value="Casting/ foundry of iron and steel">Casting/ foundry of iron and steel</option>`
      );
      break;

    case "2432":
      $("#Product").html(
        `<option value="Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys">Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys</option>`
      );
      break;

    case "25920":
      $("#Product").html(
        `<option value="Treatment, coating and machining of metals">Treatment, coating and machining of metals</option>`
      );
      break;

    case "261":
      $("#Product").html(
        `<option value="Manufacture of electronic components">Manufacture of electronic components</option>`
      );
      break;

    case "2720":
      $("#Product").html(
        `<option value="Manufacture of batteries and accumulators">Manufacture of batteries and accumulators</option>`
      );
      break;
    case "35100":
      $("#Product").html(
        `<option value="Electric power generation (except transmission and distribution): coal, natural">gas; oil (petroleum); geothermal; hydro; biomass;</option>`
      );
      break;

    case "35200":
      $("#Product").html(
        `<option value="Manufacture of gas; distribution of gaseous fuels through mains">Manufacture of gas; distribution of gaseous fuels through mains</option>`
      );
      break;
    case "35300":
      $("#Product").html(
        `<option value="Air conditioning supply and production of ice (except steam production)">Air conditioning supply and production of ice (except steam production)</option>`
      );
      break;

    case "35300":
      $("#Product").html(
        `<option value="Manufacture of electronic components">Manufacture of electronic components</option>`
      );
      break;
    case "36000":
      $("#Product").html(
        `<option value="Water collection, treatment and supply (except those intended to prevent pollution)">Water collection, treatment and supply (except those intended to prevent pollution)</option>`
      );
      break;

    case "37000":
      $("#Product").html(
        `<option value="Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)">Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)</option>`
      );
      break;

    case "38210":
      $("#Product").html(
        `<option value="Treatment and disposal of non-hazardous waste">Treatment and disposal of non-hazardous waste</option>`
      );
      break;

    case "38220":
      $("#Product").html(
        `<option value="Treatment and disposal of hazardous waste">Treatment and disposal of hazardous waste</option>`
      );
      break;

    case "39000":
      $("#Product").html(
        `<option value="Remediation activities and other waste management services">Remediation activities and other waste management services</option>`
      );
      break;

    case "452":
      $("#Product").html(
        `<option value="Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)">Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)</option>`
      );
      break;

    case "454":
      $("#Product").html(
        `<option value="Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)">Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)</option>`
      );
      break;

    case "47300":
      $("#Product").html(
        `<option value="Wholesale and retail sale of automotive fuels">Wholesale and retail sale of automotive fuels</option>`
      );
      break;

    case "4661":
      $("#Product").html(
        `<option value="Wholesale and retail sale of automotive fuels">Wholesale and retail sale of automotive fuels</option>`
      );
      break;

    case "52104":
      $("#Product").html(`<option value="Cold Storage">Cold Storage</option>`);
      break;

    case "55":
      $("#Product").html(
        `<option value="Hotels, motels, resorts, dormitories, and other accommodation services">Hotels, motels, resorts, dormitories, and other accommodation services</option>`
      );
      break;

    case "56":
      $("#Product").html(
        `<option value="Restaurants, food chains, bars and other food/ beverage services">Restaurants, food chains, bars and other food/ beverage services</option>`
      );
      break;

    case "681":
      $("#Product").html(
        `<option value="Real Estate activities with own or leased property">Real Estate activities with own or leased property</option>`
      );
      break;

    case "71200":
      $("#Product").html(
        `<option value="Technical Testing and analysis">Technical Testing and analysis</option>`
      );
      break;

    case "7210":
      $("#Product").html(
        `<option value="Research and experimental development and natural sciences and engineering">Research and experimental development and natural sciences and engineering</option>`
      );
      break;

    case "75":
      $("#Product").html(
        `<option value="Veterinary activities">Veterinary activities</option>`
      );
      break;

    case "85":
      $("#Product").html(
        `<option value="Public and private education (including support activities)">Public and private education (including support activities)</option>`
      );
      break;

    case "86":
      $("#Product").html(
        `<option value="Hospitals, clinics, nursing homes and other human health and residential care activities">Hospitals, clinics, nursing homes and other human health and residential care activities</option>`
      );
      break;

    case "87":
      $("#Product").html(
        `<option value="Hospitals, clinics, nursing homes and other human health and residential care activities">Hospitals, clinics, nursing homes and other human health and residential care activities</option>`
      );
      break;

    case "86900":
      $("#Product").html(
        `<option value="Other human health activities- medical laboratories inside and outside of medical facilities">Other human health activities- medical laboratories inside and outside of medical facilities</option>`
      );
      break;

    case "96210":
      $("#Product").html(
        `<option value="Washing and dry cleaning of textile and fur products">Washing and dry cleaning of textile and fur products</option>`
      );
      break;

    case "96300":
      $("#Product").html(
        `<option value="Funeral and related activities">Funeral and related activities</option>`
      );
      break;

    default:
    case "":
      $("#Product").html(`
          <option value="">--Select Product--</option>
          <option value="Animal Production">Animal Production</option>
          <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>
          <option value="Mining of Coal and Lignite">Mining of Coal and Lignite</option>
          <option value="Extraction of Crude and Petroleum and Natural Gas, and Support Activities">Extraction of Crude and Petroleum and Natural Gas, and Support Activities</option>
          <option value="Mining of Iron Ores">Mining of Iron Ores</option>
          <option value="Mining of Precious Metal Ores">Mining of Precious Metal Ores</option>
          <option value="Gold Ore Mining">Gold Ore Mining</option>
          <option value="Silver Ore Mining">Silver Ore Mining</option>
          <option value="Platinum Ore Mining">Platinum Ore Mining</option>
          <option value="Copper One Mining">Copper One Mining</option>
          <option value="Chromite Ore Mining">Chromite Ore Mining</option>
          <option value="Manganese Mining">Manganese Mining</option>
          <option value="Nickel Ore Mining">Nickel Ore Mining</option>
          <option value="Pyrite Mining">Pyrite Mining</option>
          <option value="Rock Phosphate Mining">Rock Phosphate Mining</option>
          <option value="Slaughtering and Meat Packing">Slaughtering and Meat Packing</option>
          <option value="Production Processing and Preserving of Meat and Meat Products">Production Processing and Preserving of Meat and Meat Products</option>
          <option value="Processing and Preserving of Fish, Crustaceans and Mollusks(Except Carrageenan)">Processing and Preserving of Fish, Crustaceans and Mollusks(Except Carrageenan)</option>
          <option value="Processing of Seaweeds; Manufacture of Agar-Agar of Carrageenan">Processing of Seaweeds; Manufacture of Agar-Agar of Carrageenan</option>
          <option value="Manufacure of Animal Oils and Fats">Manufacure of Animal Oils and Fats</option>
          <option value="Manufacture of Dairy Products">Manufacture of Dairy Products</option>
          <option value="Manufacture of Grain Mill Products, Starches and Starch Products (Except Rice, Corn, and Cassava Flour Milling">Manufacture of Grain Mill Products, Starches and Starch Products (Except Rice, Corn, and Cassava Flour Milling</option>
          <option value="Rice/Corn Milling">Rice/Corn Milling</option>
          <option value="Manufacture of Other Food Products(Except Sugar)">Manufacture of Other Food Products(Except Sugar)</option>
          <option value="Manufacture of Sugar">Manufacture of Sugar</option>
          <option value="Sugar Milling">Sugar Milling</option>
          <option value="Manufacture of Prepared Animal Feeds">Manufacture of Prepared Animal Feeds</option>
          <option value="Manufacture of Beverages">Manufacture of Beverages</option>
          <option value="Manufacture of Tobacco Products">Manufacture of Tobacco Products</option>
          <option value="Manufacture of Textile">Manufacture of Textile</option>
          <option value="Manufacture of Wearing Apparel">Manufacture of Wearing Apparel</option>
          <option value="Tanning and Dressing of Leather">Tanning and Dressing of Leather</option>
          <option value="Manufacture of Veener Sheets; Manufacture of Plywood, Laminated Board, Particle Board and Other Panels and Board; Wooden Window and Screens">Manufacture of Veener Sheets; Manufacture of Plywood, Laminated Board, Particle Board and Other Panels and Board; Wooden Window and Screens</option>
          <option value="Pulp Mining Including Manufacture of Pulp, Paper and Paperboard">Pulp Mining Including Manufacture of Pulp, Paper and Paperboard</option>
          <option value="Paper and Paperboard Milling">Paper and Paperboard Milling</option>
          <option value="Printing">Printing</option>
          <option value="Manufacture of Coke Oven Products">Manufacture of Coke Oven Products</option>
          <option value="Manufacture of Refined Petroleum Products">Manufacture of Refined Petroleum Products</option>
          <option value="Manufacture of Other Fuel Products(Biodiesel)">Manufacture of Other Fuel Products(Biodiesel)</option>
          <option value="Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel">application; Blending of ethanol for antiseptic and solvent (denatured)</option>
          <option value="Manufacture of industrial (compressed/ liquefied) gases">Manufacture of industrial (compressed/ liquefied) gases</option>
          <option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>
          <option value="Manufacture of alcohol except ethyl alcohol">Manufacture of alcohol except ethyl alcohol</option>
          <option value="Manufacture of fertilizers and nitrogen compounds">Manufacture of fertilizers and nitrogen compounds</option>
          <option value="Manufacturing of plastics and synthetic rubber in primary forms">Manufacturing of plastics and synthetic rubber in primary forms</option>
          <option value="Manufacture of pesticides and other agro-chemical products">Manufacture of pesticides and other agro-chemical products</option>
          <option value="Manufacture of paints, ink, varnishes and similar coating materials">Manufacture of paints, ink, varnishes and similar coating materials</option>
          <option value="Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations.">Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations.</option>
          <option value="Manufacture of glues and adhesives; synthetic glues and adhesives; animal/ plant derived glues and adhesives">Manufacture of glues and adhesives; synthetic glues and adhesives; animal/ plant derived glues and adhesives</option>
          <option value="Manufacture of miscellaneous chemical products, not elsewhere classified">Manufacture of miscellaneous chemical products, not elsewhere classified</option>
          <option value="Manufacture of man-made fibers (except glass fibers)">Manufacture of man-made fibers (except glass fibers)</option>
          <option value="Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma">Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma</option>
          <option value="Manufacture of glass and glass products">Manufacture of glass and glass products</option>
          <option value="Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)">Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)</option>
          <option value="Manufacture of cement">Manufacture of cement</option>
          <option value="Manufacture of iron and steel">Manufacture of iron and steel</option>
          <option value="Manufacture of precious metals">Manufacture of precious metals</option>
          <option value="Non-ferrous smelting and refining, except precious metals">Non-ferrous smelting and refining, except precious metals</option>
          <option value="Non-ferrous rolling, drawing and extrusion mills">Non-ferrous rolling, drawing and extrusion mills</option>
          <option value="Manufacture of pipe fittings of non-ferrous metal">Manufacture of pipe fittings of non-ferrous metal</option>
          <option value="Manufacture of basic precious and non-ferrous metal, not elsewhere classified">Manufacture of basic precious and non-ferrous metal, not elsewhere classified</option>
          <option value="Casting/ foundry of iron and steel">Casting/ foundry of iron and steel</option>
          <option value="Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys">Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys</option>
          <option value="Treatment, coating and machining of metals">Treatment, coating and machining of metals</option>
          <option value="Manufacture of electronic components">Manufacture of electronic components</option>
          <option value="Manufacture of batteries and accumulators">Manufacture of batteries and accumulators</option>
          <option value="Electric power generation (except transmission and distribution): coal, natural gas; oil (petroleum); geothermal; hydro; biomass;">Electric power generation (except transmission and distribution): coal, natural gas; oil (petroleum); geothermal; hydro; biomass;</option>
          <option value="Manufacture of gas; distribution of gaseous fuels through mains">Manufacture of gas; distribution of gaseous fuels through mains</option>
          <option value="Air conditioning supply and production of ice (except steam production)">Air conditioning supply and production of ice (except steam production)</option>
          <option value="Water collection, treatment and supply (except those intended to prevent pollution)">Water collection, treatment and supply (except those intended to prevent pollution)</option>
          <option value="Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)">Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)</option>
          <option value="Treatment and disposal of non-hazardous waste">Treatment and disposal of non-hazardous waste</option>
          <option value="Treatment and disposal of hazardous waste">Treatment and disposal of hazardous waste</option>
          <option value="Remediation activities and other waste management services">Remediation activities and other waste management services</option>
          <option value="Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)">Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)</option>
          <option value="Wholesale and retail sale of automotive fuels">Wholesale and retail sale of automotive fuels</option>
          <option value="Cold Storage">Cold Storage</option>
          <option value="Hotels, motels, resorts, dormitories, and other accommodation services">Hotels, motels, resorts, dormitories, and other accommodation services</option>
          <option value="Restaurants, food chains, bars and other food/ beverage services">Restaurants, food chains, bars and other food/ beverage services</option>
          <option value="Real Estate activities with own or leased property">Real Estate activities with own or leased property</option>
          <option value="Technical Testing and analysis">Technical Testing and analysis</option>
          <option value="Research and experimental development and natural sciences and engineering">Research and experimental development and natural sciences and engineering</option>
          <option value="Veterinary activities">Veterinary activities</option>
          <option value="Public and private education (including support activities)">Public and private education (including support activities)</option>
          <option value="Hospitals, clinics, nursing homes and other human health and residential care activities">Hospitals, clinics, nursing homes and other human health and residential care activities</option>
          <option value="Other human health activities- medical laboratories inside and outside of medical facilities">Other human health activities- medical laboratories inside and outside of medical facilities</option>
          <option value="Washing and dry cleaning of textile and fur products">Washing and dry cleaning of textile and fur products</option>
          <option value="Funeral and related activities">Funeral and related activities</option>

        `);
      break;
  }
});

$("#Product").change(function () {
  var selectvalue = this.value;
  switch (selectvalue) {
    case "Animal Production":
      $("#PSICCode").html(`
        <option value="014">014</option>
      `);
      break;
    case "Aquaculture (excluding fish pens)":
      $("#PSICCode").html(`
        <option value="032">032</option>
      `);
      break;
    case "Mining of coal and lignite":
      $("#PSICCode").html(`
        <option value="05">05</option>
      `);
      break;
    case "Extraction of crude petroleum and natural gas, and support activities":
      $("#PSICCode").html(`
        <option value="06">06</option>
      `);
      break;
    case "Mining of iron ores":
      $("#PSICCode").html(`
        <option value="07100">07100</option>
      `);
      break;

    case "Mining of precious metal ores - gold, silver, platinum":
      $("#PSICCode").html(`
          <option value="0722">0722</option>
        `);
      break;

    case "Copper ore mining":
      $("#PSICCode").html(`
          <option value="07291">07291</option>
        `);
      break;

    case "Chromite ore mining":
      $("#PSICCode").html(`
          <option value="07292">07292</option>
        `);
      break;

    case "Manganese ore mining":
      $("#PSICCode").html(`
          <option value="07293">07293</option>
        `);
      break;

    case "Nickel ore mining":
      $("#PSICCode").html(`
          <option value="07294">07294</option>
        `);
      break;

    case "Pyrite mining":
      $("#PSICCode").html(`
          <option value="08913">08913</option>
        `);
      break;

    case "Rock phosphate mining":
      $("#PSICCode").html(`
          <option value="08914">08914</option>
        `);
      break;

    case "Slaughtering and meat packing":
      $("#PSICCode").html(`
          <option value="10110">10110</option>
        `);
      break;

    case "Production processing and preserving of meat and meat products":
      $("#PSICCode").html(`
          <option value="10120">10120</option>
        `);
      break;

    case "Processing and preserving of fish, crustaceans and mollusks (except carrageenan)":
      $("#PSICCode").html(`
          <option value="1020">1020</option>
        `);
      break;

    case "Processing of seaweeds; manufacture of agar-agar or carrageenan":
      $("#PSICCode").html(`
          <option value="10205">10205</option>
        `);
      break;

    case "Processing and preserving of fruits and vegetables":
      $("#PSICCode").html(`
          <option value="1030">1030</option>
        `);
      break;

    case "Manufacture of vegetable and animal oils and fats":
      $("#PSICCode").html(`
          <option value="104">104</option>
        `);
      break;

    case "Manufacture of dairy products":
      $("#PSICCode").html(`
            <option value="105">105</option>
          `);
      break;

    case "Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)":
      $("#PSICCode").html(`
        <option value="106">106</option>
      `);
      break;

    case "Rice/ corn milling":
      $("#PSICCode").html(`
        <option value="10610">10610</option>
      `);
      break;

    case "Cassava flour milling":
      $("#PSICCode").html(`
        <option value="10621">10621</option>
      `);
      break;

    case "Manufacture of other food products (except sugar)":
      $("#PSICCode").html(`
        <option value="107">107</option>
      `);
      break;

    case "Manufacture of sugar - milling and refining":
      $("#PSICCode").html(`
        <option value="1072">1072</option>
      `);
      break;

    case "Manufacture of prepared animal feeds":
      $("#PSICCode").html(`
        <option value="10800">10800</option>
      `);
      break;

    case "Manufacture of beverages":
      $("#PSICCode").html(`
        <option value="11">11</option>
      `);
      break;

    case "Manufacture of tobacco products":
      $("#PSICCode").html(`
        <option value="12">12</option>
      `);
      break;

    case "Manufacture of textiles":
      $("#PSICCode").html(`
          <option value="13">13</option>
        `);
      break;

    case "Tanning and dressing of leather":
      $("#PSICCode").html(`
          <option value="14">14</option>
        `);
      break;

    case "Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens":
      $("#PSICCode").html(`
          <option value="1621">1621</option>
        `);
      break;

    case "Pulp milling including manufacture of pulp, paper, and paperboard":
      $("#PSICCode").html(`
            <option value="17012">17012</option>
          `);
      break;

    case "Paper and paperboard milling":
      $("#PSICCode").html(`
            <option value="17013">17013</option>
          `);
      break;

    case "Printing":
      $("#PSICCode").html(`
            <option value="18110">18110</option>
          `);
      break;

    case "Manufacture of coke oven products":
      $("#PSICCode").html(`
            <option value="19100">19100</option>
          `);
      break;

    case "Manufacture of refined petroleum products":
      $("#PSICCode").html(`
            <option value="19200">19200</option>
          `);
      break;

    case "Manufacture of other fuel products (biodiesel)":
      $("#PSICCode").html(`
              <option value="19900">19900</option>
            `);
      break;

    case "Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)":
      $("#PSICCode").html(`
              <option value="20111">20111</option>
              <option value="20114">20114</option>
            `);
      break;

    case "Manufacture of industrial (compressed/ liquefied) gases":
      $("#PSICCode").html(`
            <option value="20112">20112</option>
          `);
      break;

    case "Manufacture of inorganic, organic and other basic chemicals":
      $("#PSICCode").html(`
            <option value="20113">20113</option>
            <option value="20116">20116</option>
            <option value="20117">20117</option>
            <option value="20119">20119</option>
          `);
      break;

    case "Manufacture of alcohol except ethyl alcohol":
      $("#PSICCode").html(`
            <option value="20115">20115</option>
          `);
      break;

    case "Manufacture of fertilizers and nitrogen compounds":
      $("#PSICCode").html(`
              <option value="20120">20120</option>
            `);
      break;

    case "Manufacturing of plastics and synthetic rubber in primary forms":
      $("#PSICCode").html(`
              <option value="2013">2013</option>
            `);
      break;

    case "Manufacture of pesticides and other agro-chemical products":
      $("#PSICCode").html(`
              <option value="20210">20210</option>
            `);
      break;

    case "Manufacture of paints, ink, varnishes and similar coating materials":
      $("#PSICCode").html(`
              <option value="2022">2022</option>
              <option value="20293">20293</option>
            `);
      break;

    case "Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations":
      $("#PSICCode").html(`
                <option value="2023">2023</option>
              `);
      break;

    case "Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives":
      $("#PSICCode").html(`
              <option value="20294">20294</option>
            `);
      break;

    case "Manufacture of miscellaneous chemical products, not elsewhere classified":
      $("#PSICCode").html(`
              <option value="20299">20299</option>
            `);
      break;

    case "Manufacture of man-made fibers (except glass fibers)":
      $("#PSICCode").html(`
              <option value="2030">2030</option>
            `);
      break;

    case "Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma":
      $("#PSICCode").html(`
              <option value="21001">21001</option>
            `);
      break;

    case "Manufacture of glass and glass products":
      $("#PSICCode").html(`
                <option value="2310">2310</option>
              `);
      break;

    case "Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)":
      $("#PSICCode").html(`
                <option value="239">239</option>
              `);
      break;

    case "Manufacture of cement":
      $("#PSICCode").html(`
                <option value="23940">23940</option>
              `);
      break;

    case "Manufacture of iron and steel":
      $("#PSICCode").html(`
                <option value="241">241</option>
                <option value="2431">2431</option>
              `);
      break;

    case "Manufacture of precious metals":
      $("#PSICCode").html(`
                  <option value="24210">24210</option>
                `);
      break;

    case "Non-ferrous smelting and refining, except precious metals":
      $("#PSICCode").html(`
                  <option value="24220">24220</option>
                `);
      break;

    case "Non-ferrous rolling, drawing and extrusion mills":
      $("#PSICCode").html(`
                  <option value="24230">24230</option>
                `);
      break;

    case "Manufacture of pipe fittings of non-ferrous metal":
      $("#PSICCode").html(`
                  <option value="24240">24240</option>
                `);
      break;

    case "Manufacture of basic precious and non-ferrous metal, not elsewhere classified":
      $("#PSICCode").html(`
                  <option value="24290">24290</option>
                `);
      break;

    case "Casting/ foundry of iron and steel":
      $("#PSICCode").html(`
                  <option value="2431">2431</option>
                `);
      break;

    case "Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys":
      $("#PSICCode").html(`
                  <option value="2432">2432</option>
                `);
      break;

    case "Treatment, coating and machining of metals":
      $("#PSICCode").html(`
                  <option value="25920">25920</option>
                `);
      break;

    case "Manufacture of electronic components":
      $("#PSICCode").html(`
                  <option value="261">261</option>
                `);
      break;

    case "Manufacture of batteries and accumulators":
      $("#PSICCode").html(`
                  <option value="2720">2720</option>
                `);
      break;

    case "Electric power generation (except transmission and distribution): coal, natural":
      $("#PSICCode").html(`
                  <option value="35100">35100</option>
                `);
      break;

    case "Manufacture of gas; distribution of gaseous fuels through mains":
      $("#PSICCode").html(`
                  <option value="35200">35200</option>
                `);
      break;

    case "Air conditioning supply and production of ice (except steam production)":
      $("#PSICCode").html(`
                    <option value="35300">35300</option>
                  `);
      break;

    case "Water collection, treatment and supply (except those intended to prevent pollution)":
      $("#PSICCode").html(`
                    <option value="36000">36000</option>
                  `);
      break;

    case "Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)":
      $("#PSICCode").html(`
                  <option value="37000">37000</option>
                `);
      break;

    case "Treatment and disposal of non-hazardous waste":
      $("#PSICCode").html(`
                  <option value="38210">38210</option>
                `);
      break;

    case "Treatment and disposal of hazardous waste":
      $("#PSICCode").html(`
                  <option value="38220">38220</option>
                `);
      break;

    case "Remediation activities and other waste management services":
      $("#PSICCode").html(`
                  <option value="39000">39000</option>
                `);
      break;

    case "Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)":
      $("#PSICCode").html(`
                    <option value="452">452</option>
                    <option value="454">454</option>
                  `);
      break;

    case "Wholesale and retail sale of automotive fuels":
      $("#PSICCode").html(`
                    <option value="47300">47300</option>
                    <option value="4661">4661</option>
                  `);
      break;

    case "Cold Storage":
      $("#PSICCode").html(`
                    <option value="52104">52104</option>
                  `);
      break;

    case "Hotels, motels, resorts, dormitories, and other accommodation services":
      $("#PSICCode").html(`
                    <option value="55">55</option>
                  `);
      break;

    case "Restaurants, food chains, bars and other food/ beverage services":
      $("#PSICCode").html(`
                    <option value="56">56</option>
                  `);
      break;

    case "Real Estate activities with own or leased property":
      $("#PSICCode").html(`
                    <option value="681">681</option>
                  `);
      break;

    case "Technical Testing and analysis":
      $("#PSICCode").html(`
                    <option value="71200">71200</option>
                  `);
      break;
    //
    case "Research and experimental development and natural sciences and engineering":
      $("#PSICCode").html(`
                      <option value="7210">7210</option>
                    `);
      break;

    case "Veterinary activities":
      $("#PSICCode").html(`
                      <option value="75">75</option>
                    `);
      break;

    case "Public and private education (including support activities)":
      $("#PSICCode").html(`
                      <option value="85">85</option>
                    `);
      break;

    case "Hospitals, clinics, nursing homes and other human health and residential care activities":
      $("#PSICCode").html(`
                        <option value="86">86</option>
                        <option value="87">87</option>
                      `);
      break;

    case "Other human health activities- medical laboratories inside and outside of medical facilities":
      $("#PSICCode").html(`
                        <option value="86900">86900</option>
                      `);
      break;

    case "Washing and dry cleaning of textile and fur products":
      $("#PSICCode").html(`
                        <option value="96210">96210</option>
                      `);
      break;

    case "Funeral and related activities":
      $("#PSICCode").html(`
                          <option value="96300">96300</option>
                        `);
      break;

    default:
    case "":
      $("#PSICCode").html(`
      <option value="">--Select PSIC Code--</option>
      <option value="014">014</option>
      <option value="032">032</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07100">07100</option>
      <option value="0722">0722</option>
      <option value="07291">07291</option>
      <option value="07292">07292</option>
      <option value="07293">07293</option>
      <option value="07294">07294</option>
      <option value="08913">08913</option>
      <option value="08914">08914</option>
      <option value="10110">10110</option>
      <option value="10120">10120</option>
      <option value="1020">1020</option>
      <option value="10205">10205</option>
      <option value="1030">1030</option>
      <option value="104">104</option>
      <option value="105">105</option>
      <option value="106">106</option>
      <option value="10610">10610</option>
      <option value="10621">10621</option>
      <option value="107">107</option>
      <option value="1072">1072</option>
      <option value="10800">10800</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="1621">1621</option>
      <option value="17012">17012</option>
      <option value="17013">17013</option>
      <option value="18110">18110</option>
      <option value="19100">19100</option>
      <option value="19200">19200</option>
      <option value="19900">19900</option>
      <option value="20111">20111</option>
      <option value="20114">20114</option>
      <option value="20112">20112</option>
      <option value="20113">20113</option>
      <option value="20116">20116</option>
      <option value="20117">20117</option>
      <option value="20119">20119</option>
      <option value="20115">20115</option>
      <option value="20120">20120</option>
      <option value="2013">2013</option>
      <option value="20210">20210</option>
      <option value="2022">2022</option>
      <option value="20293">20293</option>
      <option value="2023">2023</option>
      <option value="20294">20294</option>
      <option value="20299">20299</option>
      <option value="2030">2030</option>
      <option value="21001">21001</option>
      <option value="2310">2310</option>
      <option value="239">239</option>
      <option value="23940">23940</option>
      <option value="241">241</option>
      <option value="2431">2431</option>
      <option value="24210">24210</option>
      <option value="24220">24220</option>
      <option value="24230">24230</option>
      <option value="24240">24240</option>
      <option value="24290">24290</option>
      <option value="2431">2431</option>
      <option value="2432">2432</option>
      <option value="25920">25920</option>
      <option value="261">261</option>
      <option value="2720">2720</option>
      <option value="35100">35100</option>
      <option value="35200">35200</option>
      <option value="35300">35300</option>
      <option value="36000">36000</option>
      <option value="37000">37000</option>
      <option value="38210">38210</option>
      <option value="38220">38220</option>
      <option value="39000">39000</option>
      <option value="452">452</option>
      <option value="454">454</option>
      <option value="47300">47300</option>
      <option value="4661">4661</option>
      <option value="52104">52104</option>
      <option value="55">55</option>
      <option value="56">56</option>
      <option value="681">681</option>
      <option value="71200">71200</option>
      <option value="7210">7210</option>
      <option value="75">75</option>
      <option value="85">85</option>
      <option value="86">86</option>
      <option value="87">87</option>
      <option value="86900">86900</option>
      <option value="96210">96210</option>
      <option value="96300">96300</option>
                          `);
      break;
  }
});
