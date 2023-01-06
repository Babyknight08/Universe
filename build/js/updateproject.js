var peiss = document.getElementById('peiss-select')
var referenceno = document.getElementById('referenceno-input')
var status_select = document.getElementById('status-select')
var approved_date = document.getElementById('approved-date')
var region = document.getElementById('region-input')
var psiccode = document.getElementById('psic-input')
var projectname = document.getElementById('projectname-input')
var proponent = document.getElementById('proponent-input')
var projecttype = document.getElementById('ptype-select')
var projectsubtype = document.getElementById('psubtype-select')
var projectspecifictype = document.getElementById('pstype-select')
var projectspecificsubtype = document.getElementById('pssubtype-select')
var address = document.getElementById('address-input')
var municipality = document.getElementById('city-input')
var province = document.getElementById('province-select')
var latitude = document.getElementById('latitude-input')
var longitude = document.getElementById('longitude-input')

var obj_ptype = [{
    0 : "Heavy and other processing/manufacturing industries",
    1 : "Resource Extractive",
    2 : "Infrastructure Projects",
    3 : "Golf course and other tourism projects",
    4 : "All other projects not listed in Groups I, II, III and IV"
}]
var obj_stype = [{
    0 : "Other Processing/Manufacturing Industries",
    1 : "Fishery Projects - Dikes For/And Fishpond Development Projects",
    2 : "Mining and Quarrying Projects",
    3 : "Buildings including Housing, Storage Facilities and Other Structures",
    4 : "Chemical Industries",
    5 : "Power Plants",
    6 : "Agriculture, Food and related Industries",
    7 : "Roads and Bridges",
    8 : "Other Transport Facilities",
    9 : "Reclamation and other land restoration projects",
    10 : "Telecommunication Projects",
    11 : "Major Power Plants",
    12 : "Petroleum and Petrochemical Industries (This category includes hydrocarbon products such as LNG/CNG, etc.)",
    13 : "Other Power Plants",
    14 : "Resorts and other tourism/leisure projects",
    15 : "Agriculture Industry",
    16 : "Dams, Water Supply and Flood Control Project",
    17 : "Forestry Projects",
    18 : "Waste Management Projects",
    19 : "Manufacture of Other Products eg. Packaging Materials",
    20 : "Minor Roads and Bridges",
    21 : "NULL",
    22 : "Smelting Plants",
    23 : "Pipeline and similar Projects"
}]
var obj_pstype = [{
    0 : "Pulp and Paper Industries",
    1 : "Fishery/Aquaculture Projects using fresh or brackish water including pearl farm and similar activities",
    2 : "Mineral Processing Projects - Batching and crushing plant; sand & gravel washing - Non mobile or to be operated >= 1 year",
    3 : "All office and residential building such as motels, condominiums, schools, etc. including storage facilities with no hazardous or toxic materials",
    4 : "Manufacture of agri-chemicals, industrial chemicals and other substances not in the PCL or CCO",
    5 : "Waste-to-energy – power projects",
    6 : "Institutional and other structures with laboratory facilities",
    7 : "Shipbuilding, boatbuilding and other marine vessel manufacturing/fabrication (including ship breaking and salvaging)",
    8 : "Other types of food (and other food by-products, additives, etc.) processing industries",
    9 : "Bridges and viaducts (including elevated roads), rehabilitation and/or improvement - With >= 50% increase in capacity (or in terms of length/width)",
    10 : "Bridges and viaducts (including elevated roads), new construction",
    11 : "Roads, widening, rehabilitation and/or improvement with no critica slope - With <= 50% increase in capacity (or in terms of length/width)",
    12 : "Sea port, causeways, and harbors(including RO-RO facilities) - Without reclamation",
    13 : "Reclamation and other land restoration projects",
    14 : "Telecommunication Projects",
    15 : "Cemetery, memorial park and similar projects",
    16 : "Commercial, [Business centers with residential units (mixed use), malls, supermarkets, public markets]",
    17 : "Coconut Processing Plants (including production of other coconut-based products)",
    18 : "Food preservation (e.g. drying, freezing) and similar methods aside from canning",
    19 : "Storage facilities for toxic or hazardous materials, substances or products(including those for those in PCL)",
    20 : "Geothermal Facilities",
    21 : "LPG/LNG/CNG/similar product storage and refilling",
    22 : "Substations/switchyard",
    23 : "Animal products processing (fish/meat processing, canning, slaughterhouses, etc) including other marine products, crabmeat etc.)",
    24 : "Columbarium and similar projects (including funeral parlor and crematorium)",
    25 : "Other Thermal Power Plants (eg. diesel, bunker, coal, etc.)",
    26 : "Airports",
    27 : "Roads, widening, rehabilitation and/or improvement with no critica slope - With > 50% increase in capacity (or in terms of length/width)",
    28 : "Resorts and other tourism/leisure projects",
    29 : "Agricultural plantation - Animal feed mill",
    30 : "DAMS (including those for irrigation, flood control, water source and hydropower projects)including run-of-river type",
    31 : "Agricultural processing including rice, corn, vegetables, fruits and other agricultural products.",
    32 : "Community Based Forest Resources Utilization (CBFRU); Integrated Forest Management Agreement (IFMA) projects; Timber License Agreement (TLA); Private land timber utilization (PLTU); Other Forestry Projects; Forestry project co-managed with DENR",
    33 : "Fuel cell",
    34 : "Storage of petroleum, petrochemical or related products (including blending)",
    35 : "Refilling station projects/gasoline station projects",
    36 : "Livestock Animal Industries",
    37 : "Extraction of Non-metallic Minerals such as Limestone /shale/silica/clay/placer and other non-metal minerals/ores < 20 Hectares",
    38 : "Hydropower facilities - Without tunneling project",
    39 : "Hydropower facilities - With tunneling project",
    40 : "Ice plant/processing",
    41 : "Industrial Parks (horizontal development)in flat areas",
    42 : "Water supply projects (without dam) - Levels III (Distribution system only)",
    43 : "Sea port, causeways, and harbors(including RO-RO facilities) - With reclamation",
    44 : "Subdivision and other housing projects in flat areas",
    45 : "Materials Receiving and Recovery Facilities (for paper, plastics and other materials) - With composting facilities",
    46 : "Metal-based products(including semiconductor/electronics industries)",
    47 : "Extraction of Non-metallic Minerals such as Aggregates(sand, stone, gravel including dredging with/intended for recovery/use of materials)",
    48 : "Extraction of metallic ores/minerals (on shore) with area < 25 hectares",
    49 : "Extraction of Metallic Minerals such as Limestone /shale/silica/clay/placer and other metal minerals/ores < 25 Hectares",
    50 : "Coal Mining",
    51 : "Mineral Processing Projects - Non-metallic mineral processing plants",
    52 : "NULL",
    53 : "Power Transmission Line",
    54 : "Land transport terminal (for buses, jeepneys and other modes of transportation) - With service facilities",
    55 : "Renewable energy projects such as ocean, solar, wind, tidal power except waste-to-energy and biogas projects",
    56 : "Rice/corn mill",
    57 : "Roads, new construction",
    58 : "Roads, widening, rehabilitation and/or improvement with critical slope",
    59 : "Roads, new construction, widening (including RO-RO facilities)",
    60 : "Extraction of Commercial Sand and Gravel without processing and within riverbed or floodplain <5 hectares",
    61 : "Sanitary landfill for domestic wastes only - Category 1 Disposal Facilities",
    62 : "Landfill for industrial and other wastes",
    63 : "Mineral Processing Projects - Metallic Mineral or Ore Processing",
    64 : "Smelting Plants",
    65 : "Domestic wastewater treatment facility (including septage treatment facility)",
    66 : "Subdivision and other housing projects in areas with critical slopes",
    67 : "Submarine pipelines/cables",
    68 : "Sugar Mills",
    69 : "Wood Processing Projects"
}]
var obj_psstype = [{
    0 : "ABACA PROCESSING PLANT",
    1 : "AQUACULTURE",
    2 : "ASPHALT & CONCRETE BATCHING PLANT",
    3 : "ASPHALT & CRUSHING PLANT",
    4 : "ASPHALT BATCHING PLANT",
    5 : "BANK",
    6 : "BIO-ETHANOL PROCESSINGPLANT",
    7 : "BIOMASS POWER PLANT",
    8 : "BIRTHING CLINIC",
    9 : "BOATBUILDING",
    10 : "BOTTLING PLANT",
    11 : "BRIDGE",
    12 : "CAUSEWAY PROJECT",
    13 : "CELLSITE",
    14 : "CEMETERY",
    15 : "CLINIC",
    16 : "COCKPIT ARENA",
    17 : "COCONUT PROCESSING",
    18 : "COLD STORAGE",
    19 : "COMMERCIAL BUILDING",
    20 : "CONCRETE BATCHING & CRUSHING PLANT",
    21 : "CONCRETE BATCHING PLANT",
    22 : "CONDOMINIUM",
    23 : "CONSOLIDATED AS ECC-CO-1310-0033",
    24 : "CONSOLIDATED AS ECC-CO-1507-0021",
    25 : "CONSOLIDATED AS ECC-CO-1507-0022",
    26 : "CONSOLIDATED AS ECC-CO-1507-0023",
    27 : "CONSOLIDATED AS ECC-R08-1310-0033",
    28 : "CONVENTION CENTER",
    29 : "CONVERTER STATION",
    30 : "CRABMEAT PROCESSING PLANT",
    31 : "CREMATORIUM",
    32 : "CRUSHING PLANT",
    33 : "DIESEL POWER PLANT",
    34 : "DOMESTIC AIRPORT",
    35 : "DRAINAGE",
    36 : "DRESSING PLANT",
    37 : "ECOPARK",
    38 : "FEEDMILL",
    39 : "FERTILIZER MANUFACTURING",
    40 : "FISH PORT",
    41 : "FISHPOND",
    42 : "FLOOD CONTROL",
    43 : "FOOD PROCESSING",
    44 : "FOREST RESOURCE PROJECT",
    45 : "FUEL CELL",
    46 : "FUEL DEPOT",
    47 : "FUNERAL PARLOR",
    48 : "GASOLINE STATION",
    49 : "GEOTHERMAL POWER PLANT",
    50 : "Gorvernment Office",
    51 : "GROCERY STORE",
    52 : "HATCHERY",
    53 : "HOSPITAL",
    54 : "HOTEL",
    55 : "HYDRATED LIME",
    56 : "HYDROPOWER PLANT",
    57 : "ICE PLANT",
    58 : "INDUSTRIAL PARK",
    59 : "IRRIGATION SYSTEM",
    60 : "JUNKSHOP",
    61 : "LABORATORY",
    62 : "LAND DEVELOPMENT",
    63 : "LPG REFILLING",
    64 : "MAGNETITE PROCESSING PLANT",
    65 : "MALL",
    66 : "MARKET",
    67 : "MATERIAL RECOVERY FACILITY",
    68 : "METAL MANUFACTURING",
    69 : "MINING",
    70 : "MOUNTAIN QUARRY",
    71 : "MULTI PURPOSE BUILDING",
    72 : "MULTI-FUEL POWER PLANT",
    73 : "OFFICE BUILDING",
    74 : "OTHER LIVESTOCK (Buffalo)",
    75 : "OXYGEN REFILLING",
    76 : "PENSION HOUSE",
    77 : "PIGGERY",
    78 : "PIGGERY & POULTRY",
    79 : "PORT",
    80 : "POULTRY",
    81 : "POULTRY & FISHPOND",
    82 : "POWER TRANSMISSION LINE",
    83 : "PUBLIC MARKET",
    84 : "PUBLIC MARKET & TERMINAL",
    85 : "QUARRY (SAND)",
    86 : "RECLAMATION",
    87 : "RENEWABLE ENERGY (WIND)",
    88 : "REPEATER",
    89 : "RESORT",
    90 : "RESTAURANT & LODGING HOUSE",
    91 : "RESTAURANT/FASTFOOD",
    92 : "RHU CLINIC / NOT COVERED",
    93 : "RICEMILL",
    94 : "ROAD",
    95 : "SAG EXTRACTION",
    96 : "SANITARY LANDFILL",
    97 : "SCHOOL BUILDING",
    98 : "SCHOOL LABORATORY BUILDING",
    99 : "SCREENING PLANT",
    100 : "SEAWALL",
    101 : "SERVICE CENTER",
    102 : "SHOWROOM",
    103 : "SLAG PROCESSING PLANT",
    104 : "SLAUGHTERHOUSE",
    105 : "SMELTING PLANT",
    106 : "SOLAR POWER PLANT",
    107 : "SPORTS COMPLEX",
    108 : "STORAGE FACILITY",
    109 : "STORAGE FACILITY (HAZARDOUS)",
    110 : "STP LGU",
    111 : "SUBDIVISION",
    112 : "SUBMARINE CABLE",
    113 : "SUBSTATION",
    114 : "SUGAR MILL",
    115 : "TERMINAL",
    116 : "TSD",
    117 : "WAREHOUSE BUILDING",
    118 : "WATER PUMP STATION",
    119 : "WATER SYSTEM",
    120 : "WOOD PROCESSING PLANT"
}]
// console.log(obj_ptype[0][0])
// console.log(htmlBody)
var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
})

document.addEventListener('DOMContentLoaded', function() {
    var option = []
    for(var x=0; x<5; x++){
        option[x] = document.createElement('option')
        option[x].value = x
        option[x].text = obj_ptype[0][x]
        projecttype.add(option[x])
    }
//================================================================
projecttype.onchange=function() {
    var firstVal = ''
    var options = []
    var indexArray = []
    var typeval = projecttype.value
    switch(typeval){
        case '0':
            projectsubtype.innerHTML=''
            indexArray = [0,4,6,12,19,22]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_stype[0][indexArray[i]]
                projectsubtype.add(options[i])
            }
            break
        case '1':
            projectsubtype.innerHTML=''
            indexArray = [1,2,15,17]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_stype[0][indexArray[i]]
                projectsubtype.add(options[i])
            }
            break    
        case '2':
            projectsubtype.innerHTML=''
            indexArray = [3,5,7,8,9,10,13,16,18,23]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_stype[0][indexArray[i]]
                projectsubtype.add(options[i])
            }
            break
        case '3':
            firstVal = 14
            projectsubtype.innerHTML=''
            options[0] = document.createElement('option')
            options[0].value = 14
            options[0].text = obj_stype[0][14]
            projectsubtype.add(options[0])
            break
        case '4':
            firstVal = 21
            projectsubtype.innerHTML=''
            options[0] = document.createElement('option')
            options[0].value = 21
            options[0].text = obj_stype[0][21]
            projectsubtype.add(options[0])
            break
    }
    $("#psubtype-select").val(firstVal).trigger('change')
}

projectsubtype.onchange=function() {
    var firstVal = ''
    var options = []
    var indexArray = []
    var typeval = projectsubtype.value
    switch(typeval) {
        case '0':
            projectspecifictype.innerHTML=''
            indexArray = [0,7]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '1':
            projectspecifictype.innerHTML=''
            indexArray = [1]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '2':
            projectspecifictype.innerHTML=''
            indexArray = [50,60,49,48,47,37,2,63,51]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '3':
            projectspecifictype.innerHTML=''
            indexArray = [3,15,24,16,41,6,19,66,44]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '4':
            projectspecifictype.innerHTML=''
            indexArray = [4]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '5':
            projectspecifictype.innerHTML=''
            indexArray = [33,20,38,39,25,53,55,22,5]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '6':
            projectspecifictype.innerHTML=''
            indexArray = [31,23,17,18,40,8,56,68]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '7':
            projectspecifictype.innerHTML=''
            indexArray = [9,10,57,58,11,27]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '8':
            projectspecifictype.innerHTML=''
            indexArray = [12,26,54,43]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '9':
            projectspecifictype.innerHTML=''
            indexArray = [13]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '10':
            projectspecifictype.innerHTML=''
            indexArray = [14]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '12':
            projectspecifictype.innerHTML=''
            indexArray = [21,35,34]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '13':
            projectspecifictype.innerHTML=''
            indexArray = [22]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '14':
            projectspecifictype.innerHTML=''
            indexArray = [28]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '15':
            projectspecifictype.innerHTML=''
            indexArray = [29]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '16':
            projectspecifictype.innerHTML=''
            indexArray = [30,42]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '17':
            projectspecifictype.innerHTML=''
            indexArray = [32,36,69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '18':
            projectspecifictype.innerHTML=''
            indexArray = [65,62,45,61]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '19':
            projectspecifictype.innerHTML=''
            indexArray = [46]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '21':
            projectspecifictype.innerHTML=''
            indexArray = [52]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '22':
            projectspecifictype.innerHTML=''
            indexArray = [64]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
        case '23':
            projectspecifictype.innerHTML=''
            indexArray = [67]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_pstype[0][indexArray[i]]
                projectspecifictype.add(options[i])
            }
            break
    }
    $("#pstype-select").val(firstVal).trigger('change')
}

projectspecifictype.onchange=function() {
    var firstVal = ''
    var options = []
    var indexArray = []
    var typeval = projectspecifictype.value
    switch(typeval){
        case '0':
            projectspecificsubtype.innerHTML=''
            indexArray = [0]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '1':
            projectspecificsubtype.innerHTML=''
            indexArray = [1]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '2':
            projectspecificsubtype.innerHTML=''
            indexArray = [2,3,4,20,21,32,64,69,95]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '3':
            projectspecificsubtype.innerHTML=''
            indexArray = [5,22,54,62,73,76,97,98,107,108,117]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '4':
            projectspecificsubtype.innerHTML=''
            indexArray = [6,39]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '5':
            projectspecificsubtype.innerHTML=''
            indexArray = [7,72]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '6':
            projectspecificsubtype.innerHTML=''
            indexArray = [8,15,53,92]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '7':
            projectspecificsubtype.innerHTML=''
            indexArray = [9]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '8':
            projectspecificsubtype.innerHTML=''
            indexArray = [10,43]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '9':
            projectspecificsubtype.innerHTML=''
            indexArray = [11]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '10':
            projectspecificsubtype.innerHTML=''
            indexArray = [11]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '11':
            projectspecificsubtype.innerHTML=''
            indexArray = [94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '12':
            projectspecificsubtype.innerHTML=''
            indexArray = [12]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '13':
            projectspecificsubtype.innerHTML=''
            indexArray = [12,79,86]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '14':
            projectspecificsubtype.innerHTML=''
            indexArray = [13]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '15':
            projectspecificsubtype.innerHTML=''
            indexArray = [14]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '16':
            projectspecificsubtype.innerHTML=''
            indexArray = [16,19,28,50,51,62,65,66,71,83,90,91,117]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '17':
            projectspecificsubtype.innerHTML=''
            indexArray = [17]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '18':
            projectspecificsubtype.innerHTML=''
            indexArray = [18]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '19':
            projectspecificsubtype.innerHTML=''
            indexArray = [60,61,101,102,109]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '20':
            projectspecificsubtype.innerHTML=''
            indexArray = [49]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '21':
            projectspecificsubtype.innerHTML=''
            indexArray = [27,63,75]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '22':
            projectspecificsubtype.innerHTML=''
            if(projectsubtype.value=='5'){
                indexArray = [29,88]
            }else if(projectsubtype.value=='13'){
                indexArray = [113]
            }
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '23':
            projectspecificsubtype.innerHTML=''
            indexArray = [30, 36, 104]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '24':
            projectspecificsubtype.innerHTML=''
            indexArray = [31,47]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '25':
            projectspecificsubtype.innerHTML=''
            indexArray = [33]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '26':
            projectspecificsubtype.innerHTML=''
            indexArray = [34]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '27':
            projectspecificsubtype.innerHTML=''
            indexArray = [35,94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '28':
            projectspecificsubtype.innerHTML=''
            indexArray = [37,89]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '29':
            projectspecificsubtype.innerHTML=''
            indexArray = [38,41]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '30':
            projectspecificsubtype.innerHTML=''
            indexArray = [42,59,118]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '31':
            projectspecificsubtype.innerHTML=''
            indexArray = [43, 117]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '32':
            projectspecificsubtype.innerHTML=''
            indexArray = [44]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '33':
            projectspecificsubtype.innerHTML=''
            indexArray = [45]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '34':
            projectspecificsubtype.innerHTML=''
            indexArray = [46]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '35':
            projectspecificsubtype.innerHTML=''
            indexArray = [48]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '36':
            projectspecificsubtype.innerHTML=''
            indexArray = [52,74,77,78,80,81]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '37':
            projectspecificsubtype.innerHTML=''
            indexArray = [55,69,70,85,99]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '38':
            projectspecificsubtype.innerHTML=''
            indexArray = [56]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '39':
            projectspecificsubtype.innerHTML=''
            indexArray = [56]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '40':
            projectspecificsubtype.innerHTML=''
            indexArray = [57]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '41':
            projectspecificsubtype.innerHTML=''
            indexArray = [58,62]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '42':
            projectspecificsubtype.innerHTML=''
            indexArray = [59,119]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '43':
            projectspecificsubtype.innerHTML=''
            indexArray = [62,40,79]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '44':
            projectspecificsubtype.innerHTML=''
            indexArray = [62,111]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '45':
            projectspecificsubtype.innerHTML=''
            indexArray = [67,96]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '46':
            projectspecificsubtype.innerHTML=''
            indexArray = [69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '47':
            projectspecificsubtype.innerHTML=''
            indexArray = [69,94,95]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '48':
            projectspecificsubtype.innerHTML=''
            indexArray = [69,70]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '49':
            projectspecificsubtype.innerHTML=''
            indexArray = [69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '50':
            projectspecificsubtype.innerHTML=''
            indexArray = [69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '51':
            projectspecificsubtype.innerHTML=''
            indexArray = [70]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '52':
            projectspecificsubtype.innerHTML=''
            indexArray = [100]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '53':
            projectspecificsubtype.innerHTML=''
            indexArray = [82]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '54':
            projectspecificsubtype.innerHTML=''
            indexArray = [84,115]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '55':
            projectspecificsubtype.innerHTML=''
            indexArray = [87,106]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '56':
            projectspecificsubtype.innerHTML=''
            indexArray = [93]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '57':
            projectspecificsubtype.innerHTML=''
            indexArray = [94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '58':
            projectspecificsubtype.innerHTML=''
            indexArray = [94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '60':
            projectspecificsubtype.innerHTML=''
            indexArray = [95]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '61':
            projectspecificsubtype.innerHTML=''
            indexArray = [96,110]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '62':
            projectspecificsubtype.innerHTML=''
            indexArray = [96,116]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '63':
            projectspecificsubtype.innerHTML=''
            indexArray = [103]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '64':
            projectspecificsubtype.innerHTML=''
            indexArray = [105]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '65':
            projectspecificsubtype.innerHTML=''
            indexArray = [110]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '66':
            projectspecificsubtype.innerHTML=''
            indexArray = [111]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '67':
            projectspecificsubtype.innerHTML=''
            indexArray = [112]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '68':
            projectspecificsubtype.innerHTML=''
            indexArray = [68]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
        case '69':
            projectspecificsubtype.innerHTML=''
            indexArray = [120]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = obj_psstype[0][indexArray[i]]
                projectspecificsubtype.add(options[i])
            }            
            break
    }
    //$("#pssubtype-select").val(firstVal).trigger('change')
}
})

var cmrcheck = document.getElementById('cmr-check')
peiss.onchange=function() {
    if(peiss.value!='ECC'){
        status_select.disabled=true
        cmrcheck.checked=false
        $("#status-select").val('0').trigger('change')
    }else{
        status_select.disabled=false
        cmrcheck.checked=true
    }
}
cmrcheck.onclick=function(e) {
    if(peiss.value!='ECC'){
        e.preventDefault()
    }
}

var tchwcheck = document.getElementById('tchw-check')
var ptocheck = document.getElementById('pto-check')
var dpcheck = document.getElementById('dp-check')

var newproject_form = document.getElementById('updateproject-form')
newproject_form.addEventListener('submit', function(event) {
    event.preventDefault()
    event.stopPropagation()
    var data = new FormData()
    //--BASIC INFO
    data.append('projectid', projectid)
    data.append('peiss', peiss.value)
    data.append('referenceno', referenceno.value)
    data.append('status', status_select.value)
    data.append('dateapproved', approved_date.value)
    data.append('region', region.value)
    data.append('psiccode', psiccode.value)
    data.append('projectname', projectname.value)
    data.append('proponent', proponent.value)
    data.append('projecttype', projecttype.value)
    data.append('projectsubtype', projectsubtype.value)
    data.append('projectstype', projectspecifictype.value)
    data.append('projectssubtype', projectspecificsubtype.value)
    data.append('address', address.value)
    data.append('municipality', municipality.value)
    data.append('province', province.value)
    data.append('latitude', latitude.value)
    data.append('longitude', longitude.value)
    data.append('tchwcheck', tchwcheck.checked)
    data.append('ptocheck', ptocheck.checked)
    data.append('dpcheck', dpcheck.checked)
    data.append('cmrcheck', cmrcheck.checked)

    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/updateproject_ajax.php')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='duplicate') {
            Toast.fire({
                icon: 'error',
                title: ' Reference Number already in use!'
            }) 
        }else{
            $('#modal-prompt').modal('show')
            newproject_form.reset()
            $("#ptype-select").val('0').trigger('change')
        }
    }
    request.send(data)
})

var projectid = localStorage.getItem('projectid')
document.addEventListener('DOMContentLoaded', function() {
    var data = {
        'id' : projectid,
        'event_type' : 'load' 
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/project_functions.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message == 'success'){
            
            $('#status-select').val(response.eccstatus).trigger('change')
            referenceno.value = response.referenceno
            approved_date.value = response.dateapproved
            psiccode.value = response.psiccode
            projectname.value = response.projectname
            proponent.value = response.proponent
            $('#ptype-select').val(response.projecttype).trigger('change')
            $('#psubtype-select').val(response.projectsubtype).trigger('change')
            $('#pstype-select').val(response.projectspecifictype).trigger('change')
            $('#pssubtype-select').val(response.projectspecificsubtype).trigger('change')
            address.value = response.specificaddress
            municipality.value = response.municipality
            $('#province-select').val(response.province).trigger('change')
            latitude.value = response.latitude
            longitude.value = response.longitude
            if(response.hazwaste=='true'){
                tchwcheck.checked = true
            }else{
                tchwcheck.checked = false
            }
            if(response.pto=='true'){
                ptocheck.checked = true
            }else{
                ptocheck.checked = false
            }
            if(response.dp=='true'){
                dpcheck.checked = true
            }else{
                dpcheck.checked = false
            }
            $('#peiss-select').val(response.peiss).trigger('change')
        }
    }
    request.send(JSON.stringify(data))
})

var button_prompt = document.getElementById('button-prompt')
button_prompt.addEventListener('click', function() {
    window.location.href='projectlist.php'
})

// ===========================================================
// UPDATED 02/08/2022 MAPS
// DYNAMIC ARRAY FOR STORING LATITUDE AND LONGITUDE PROPERTIES
var dynamic_address = {
    'latitude' : 11.26888368831821,
    'longitude' : 124.93714892889646,
    'address' : '',
    'municipality' : '',
    'province' : ''
}
// INITIALIZE GOOGLE MAPS API
var map, marker
function initMap (){
    // console.log('POTA KA')
    var location = new google.maps.LatLng(11.26888368831821, 124.93714892889646)
    var mapProperty = {
        center : location,
        zoom : 18,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('map'), mapProperty)
    marker = new google.maps.Marker({
        map : map,
        draggable : true,
        animation : google.maps.Animation.DROP,
        position : location,
        icon : 'map-marker-emb-green.png'
    })

    // EVENTS FOR DRAGGING MAP MARKER
    google.maps.event.addListener(marker, 'dragend', function() {
        map.setCenter(marker.getPosition())
        geocodePosition(marker.getPosition())
        dynamic_address.latitude = marker.getPosition().lat()
        dynamic_address.longitude = marker.getPosition().lng()
        document.getElementById('map-latlng').innerHTML = dynamic_address.latitude + ', ' + dynamic_address.longitude 
        // console.log(dynamic_address)
    })

}

$('#modal-map').on('shown.bs.modal', function() {
    if(latitude.value == '' || longitude.value == '') {
        var latlng = new google.maps.LatLng(11.247917851318483, 125.00610047604228)
    }else{
        var latlng = new google.maps.LatLng(Number(latitude.value), Number(longitude.value))
    }
    marker.setPosition(latlng)
    map.setCenter(marker.getPosition())
    geocodePosition(marker.getPosition())
    dynamic_address.latitude = marker.getPosition().lat()
    dynamic_address.longitude = marker.getPosition().lng()
    document.getElementById('map-latlng').innerHTML = dynamic_address.latitude + ', ' + dynamic_address.longitude
    // GEOLOCATION API, NOT PART OF GOOGLE MAPS API
    // if(navigator.geolocation) {
    //     navigator.geolocation.getCurrentPosition(function (position) {
    //         pos = {
    //             lat : position.coords.latitude,
    //             lng : position.coords.longitude
    //         }
    //         dynamic_address.latitude = position.coords.latitude
    //         dynamic_address.longitude = position.coords.longitude
    //         document.getElementById('map-latlng').innerHTML = dynamic_address.latitude + ', ' + dynamic_address.longitude

    //         marker.setPosition(pos)

    //         map.setCenter(marker.getPosition())
    //         geocodePosition(marker.getPosition())
    //     })
    // }
})

// USING GEOCODING API
function geocodePosition(pos) {
    // console.log(pos)
    geocoder = new google.maps.Geocoder()
    geocoder.geocode({
        latLng : pos
    },
        function (res, state) {
            // console.log(res)
            if(state == google.maps.GeocoderStatus.OK) {
                // dynamic_address.address = res[0].address_components[0].longname + ', ' + res[0].address_components[1].longname + ', ' + 
                // document.getElementById('map-place').innerHTML = res[0].formatted_address
                // console.log(res)
                if(res[1]) {
                    var prov = null, city = null, cityAlt = null, brgy = null, street = null
                    var c, lc, component
                    for (var r = 0, r1 = res.length; r < r1; r += 1) {
                        var result = res[r]
                        if(!city && result.types[0] === 'locality') {
                            for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
                                component = result.address_components[c];
                                if (component.types[0] === 'locality') {
                                    city = component.long_name;
                                    break
                                }
                            }
                        }
                        else if (!city && !cityAlt && result.types[0] === 'administrative_area_level_1') {
                            for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
                                component = result.address_components[c];
                                if (component.types[0] === 'administrative_area_level_1') {
                                    cityAlt = component.long_name;
                                    break;
                                }
                            }
                        }
                        else if (!prov && result.types[0] === 'administrative_area_level_2') {
                            prov = result.address_components[0].long_name;
                            // countryCode = result.address_components[0].short_name;
                        }
                        else if (!brgy && result.types[0] === 'neighborhood') {
                            brgy = result.address_components[0].long_name
                            // console.log(Object.keys(result.address_components[1]).length)
                            for (x = 0; x < Object.keys(result.address_components[1]).length-1; x++) {
                                if(result.address_components[1].types[x] === 'sublocality') {
                                    brgy = brgy + ", " + result.address_components[1].long_name
                                    break;
                                }
                                // console.log(result.address_components[1].types)
                            }
                        }
                        else if (!street && result.types[0] === 'administrative_area_level_5') {
                            street = result.address_components[0].long_name
                            for (x = 0; x < Object.keys(result.address_components[1]).length-1; x++) {
                                if(result.address_components[1].types[x] === 'sublocality') {
                                    street = street + ", " + result.address_components[1].long_name
                                    break;
                                }
                                // console.log(result.address_components[1].types)
                            }
                        }
                        if (city && prov) {
                            break;
                        }
                    }

                    var map_place = document.getElementById('map-place')
                    map_place.innerHTML = ''
                    if(brgy === null) {
                        map_place.innerHTML += street + ", " + city + ", " + prov
                        dynamic_address.address = street
                        dynamic_address.municipality = city
                        dynamic_address.province = prov
                    }else{
                        map_place.innerHTML += brgy + ", " + city + ", " + prov
                        dynamic_address.address = brgy
                        dynamic_address.municipality = city
                        dynamic_address.province = prov
                    }
                    // console.log("City: " + city + ", City2: " + cityAlt + ", Province: " + province + ", Brgy: " + brgy + ", Street: " + street)
                }
            }else{
                document.getElementById('map-place').innerHTML = '<span class="text-danger">Failed to determine location address!</span>'
            }
        })
}

// CONFIRM GEOCOORDINATES BUTTON PRESSED/CLICKED
var button_coords_confirm = document.getElementById('button-map-confirm')
button_coords_confirm.addEventListener('click', function() {
    // console.log(dynamic_latlng)
    latitude.value = dynamic_address.latitude
    longitude.value = dynamic_address.longitude
    address.value = dynamic_address.address
    municipality.value = dynamic_address.municipality
    province.value = dynamic_address.province
    $("#province-select").val(dynamic_address.province).trigger('change')
    $('#modal-map').modal('toggle')
})