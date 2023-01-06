const mapForm = document.getElementById('form-mapfilter')
const mapFilter = document.getElementById('map-filter')
const containerProject = document.getElementById('ptype-container')
const containerPermit = document.getElementById('permit-container')
const labelTotalFirms = document.getElementById('label-totalfirms')
// ------------------------------------------------------------
const chkPtype = document.getElementById('ptype-check')
const chkPSubtype = document.getElementById('pstype-check')
const chkPSpecificType = document.getElementById('psstype-check')
const chkPSSubtype = document.getElementById('pssubtype-check')
// ------------------------------------------------------------
const selectPtype = document.getElementById('filter-ptype')
const selectPSubtype = document.getElementById('filter-pstype')
const selectPSpecificType = document.getElementById('filter-psstype')
const selectPSSubtype = document.getElementById('filter-pssubtype')
// ------------------------------------------------------------
const chkPeiss = document.getElementById('peiss-check')
const chkPermit = document.getElementById('permits-check')
const dtFrom = document.getElementById('filter-from')
const dtTo = document.getElementById('filter-to')
// ------------------------------------------------------------
const selectPeiss = document.getElementById('filter-peiss')
const selectPermit = document.getElementById('filter-permits')
// BLANK OBJECTS
let objPType = {}, objSType = {}, objPSType = {}, objPSSType = {}
const objFilter = {
    'afilter' : mapFilter.value
}

mapFilter.onchange = function() {
    if(this.value=="firm"){
        containerPermit.style.display = "none"
        containerProject.style.display = "none"
        objFilter.afilter = this.value
    }else if(this.value=="project"){
        containerProject.style.display = "block"
        containerPermit.style.display = "none"
        objFilter.afilter = this.value
    }else if(this.value=="permit"){
        containerProject.style.display = "none"
        containerPermit.style.display = "block"
        objFilter.afilter = this.value
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var pArray = [selectPtype, selectPSubtype, selectPSpecificType, selectPSSubtype]
    // var objArray = [objPType, objSType, objPSType, objPSSType]
    var projArray = ['projecttype', 'psubtype', 'psstype', 'pssubtype']
    for (var x=0; x<4; x++) {
        loadProjects(projArray[x], pArray[x], x)
    }

})

// CHECKBOX PEISS
chkPeiss.onchange = function() {
    if(chkPeiss.checked==true){
        selectPeiss.disabled = true
    }else{
        selectPeiss.disabled = false
    }
}
// CHECKBOX PERMIT
chkPermit.onchange = function() {
    if(chkPermit.checked==true){
        selectPermit.disabled = true
        dtFrom.disabled = true
        dtTo.disabled = true
    }else{
        selectPermit.disabled = false
        dtFrom.disabled = false
        dtTo.disabled = false
    }
}
// CHECKBOX PROJECT TYPE
chkPtype.onchange = function() {
    if(chkPtype.checked==true){
        selectPtype.disabled = true
    }else{
        selectPtype.disabled = false
    }
}
// CHECKBOX PROJECT SUBTYPE
chkPSubtype.onchange = function() {
    if(chkPSubtype.checked==true){
        selectPSubtype.disabled = true
    }else{
        selectPSubtype.disabled = false
    }
}
// CHECKBOX PROJECT SPECIFIC TYPE
chkPSpecificType.onchange = function() {
    if(chkPSpecificType.checked==true){
        selectPSpecificType.disabled = true
    }else{
        selectPSpecificType.disabled = false
    }
}
// CHECKBOX PROJECT SPECIFIC SUBTYPE
chkPSSubtype.onchange = function() {
    if(chkPSSubtype.checked==true){
        selectPSSubtype.disabled = true
    }else{
        selectPSSubtype.disabled = false
    }
}
// LOAD PROJECT TYPES
function loadProjects(data, parentSelect, index) {
    var options = []
    var sendData = {}
    sendData.message = data
    var request = new XMLHttpRequest()
    request.open('POST', 'build/php/arrays.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if (index == 0) {
            objPType = response
        }else if(index == 1) {
            objSType = response
        }else if(index == 2) {
            objPSType = response
        }else if(index == 3) {
            objPSSType = response
        }
        // console.log(objArray[index])
        for(var i=0; i<response[0].length; i++){
            options[i] = document.createElement('option')
            options[i].value = i
            options[i].text = response[0][i]
            parentSelect.add(options[i])
        }
    }
    request.send(JSON.stringify(sendData))
}
// ON CHANGE 
selectPtype.onchange=function() {
    // console.log(objSType)
    var firstVal = ''
    var options = []
    var indexArray = []
    var typeval = selectPtype.value
    switch(typeval){
        case '0':
            selectPSubtype.innerHTML=''
            indexArray = [0,4,6,12,19,22]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objSType[0][indexArray[i]]
                selectPSubtype.add(options[i])
            }
            break
        case '1':
            selectPSubtype.innerHTML=''
            indexArray = [1,2,15,17]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objSType[0][indexArray[i]]
                selectPSubtype.add(options[i])
            }
            break    
        case '2':
            selectPSubtype.innerHTML=''
            indexArray = [3,5,7,8,9,10,13,16,18,23]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objSType[0][indexArray[i]]
                selectPSubtype.add(options[i])
            }
            break
        case '3':
            firstVal = 14
            selectPSubtype.innerHTML=''
            options[0] = document.createElement('option')
            options[0].value = 14
            options[0].text = objSType[0][14]
            selectPSubtype.add(options[0])
            break
        case '4':
            firstVal = 21
            selectPSubtype.innerHTML=''
            options[0] = document.createElement('option')
            options[0].value = 21
            options[0].text = objSType[0][21]
            selectPSubtype.add(options[0])
            break
    }
    // $("#psubtype-select").val(firstVal).trigger('change')
    selectPSubtype.value = firstVal
    selectPSubtype.dispatchEvent(new Event('change'))
}

selectPSubtype.onchange=function() {
    var firstVal = ''
    var options = []
    var indexArray = []
    var typeval = selectPSubtype.value
    switch(typeval) {
        case '0':
            selectPSpecificType.innerHTML=''
            indexArray = [0,7]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '1':
            selectPSpecificType.innerHTML=''
            indexArray = [1]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '2':
            selectPSpecificType.innerHTML=''
            indexArray = [50,60,49,48,47,37,2,63,51]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '3':
            selectPSpecificType.innerHTML=''
            indexArray = [3,15,24,16,41,6,19,66,44]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '4':
            selectPSpecificType.innerHTML=''
            indexArray = [4]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '5':
            selectPSpecificType.innerHTML=''
            indexArray = [33,20,38,39,25,53,55,22,5]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '6':
            selectPSpecificType.innerHTML=''
            indexArray = [31,23,17,18,40,8,56,68]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '7':
            selectPSpecificType.innerHTML=''
            indexArray = [9,10,57,58,11,27]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '8':
            selectPSpecificType.innerHTML=''
            indexArray = [12,26,54,43]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '9':
            selectPSpecificType.innerHTML=''
            indexArray = [13]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '10':
            selectPSpecificType.innerHTML=''
            indexArray = [14]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '12':
            selectPSpecificType.innerHTML=''
            indexArray = [21,35,34]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '13':
            selectPSpecificType.innerHTML=''
            indexArray = [22]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '14':
            selectPSpecificType.innerHTML=''
            indexArray = [28]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '15':
            selectPSpecificType.innerHTML=''
            indexArray = [29]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '16':
            selectPSpecificType.innerHTML=''
            indexArray = [30,42]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '17':
            selectPSpecificType.innerHTML=''
            indexArray = [32,36,69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '18':
            selectPSpecificType.innerHTML=''
            indexArray = [65,62,45,61]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '19':
            selectPSpecificType.innerHTML=''
            indexArray = [46]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '21':
            selectPSpecificType.innerHTML=''
            indexArray = [52]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '22':
            selectPSpecificType.innerHTML=''
            indexArray = [64]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
        case '23':
            selectPSpecificType.innerHTML=''
            indexArray = [67]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSType[0][indexArray[i]]
                selectPSpecificType.add(options[i])
            }
            break
    }
    // $("#pstype-select").val(firstVal).trigger('change')
    selectPSpecificType.value = firstVal
    selectPSpecificType.dispatchEvent(new Event('change'))
}

selectPSpecificType.onchange=function() {
    var firstVal = ''
    var options = []
    var indexArray = []
    var typeval = selectPSpecificType.value
    switch(typeval){
        case '0':
            selectPSSubtype.innerHTML=''
            indexArray = [0]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '1':
            selectPSSubtype.innerHTML=''
            indexArray = [1]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '2':
            selectPSSubtype.innerHTML=''
            indexArray = [2,3,4,20,21,32,64,69,95]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '3':
            selectPSSubtype.innerHTML=''
            indexArray = [5,22,54,62,73,76,97,98,107,108,117]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '4':
            selectPSSubtype.innerHTML=''
            indexArray = [6,39]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '5':
            selectPSSubtype.innerHTML=''
            indexArray = [7,72]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '6':
            selectPSSubtype.innerHTML=''
            indexArray = [8,15,53,92]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '7':
            selectPSSubtype.innerHTML=''
            indexArray = [9]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '8':
            selectPSSubtype.innerHTML=''
            indexArray = [10,43]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '9':
            selectPSSubtype.innerHTML=''
            indexArray = [11]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '10':
            selectPSSubtype.innerHTML=''
            indexArray = [11]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '11':
            selectPSSubtype.innerHTML=''
            indexArray = [94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '12':
            selectPSSubtype.innerHTML=''
            indexArray = [12]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '13':
            selectPSSubtype.innerHTML=''
            indexArray = [12,79,86]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '14':
            selectPSSubtype.innerHTML=''
            indexArray = [13]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '15':
            selectPSSubtype.innerHTML=''
            indexArray = [14]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '16':
            selectPSSubtype.innerHTML=''
            indexArray = [16,19,28,50,51,62,65,66,71,83,90,91,117]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '17':
            selectPSSubtype.innerHTML=''
            indexArray = [17]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '16':
            selectPSSubtype.innerHTML=''
            indexArray = [16,19,28,50,51,62,65,66,71,83,90,91,117]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '17':
            selectPSSubtype.innerHTML=''
            indexArray = [17]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '18':
            selectPSSubtype.innerHTML=''
            indexArray = [18]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '19':
            selectPSSubtype.innerHTML=''
            indexArray = [60,61,101,102,109]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '20':
            selectPSSubtype.innerHTML=''
            indexArray = [49]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '21':
            selectPSSubtype.innerHTML=''
            indexArray = [27,63,75]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '22':
            selectPSSubtype.innerHTML=''
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
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '23':
            selectPSSubtype.innerHTML=''
            indexArray = [30, 36, 104]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '24':
            selectPSSubtype.innerHTML=''
            indexArray = [31,47]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '25':
            selectPSSubtype.innerHTML=''
            indexArray = [33]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '26':
            selectPSSubtype.innerHTML=''
            indexArray = [34]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '27':
            selectPSSubtype.innerHTML=''
            indexArray = [35,94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '28':
            selectPSSubtype.innerHTML=''
            indexArray = [37,89]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '29':
            selectPSSubtype.innerHTML=''
            indexArray = [38,41]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '30':
            selectPSSubtype.innerHTML=''
            indexArray = [42,59,118]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '31':
            selectPSSubtype.innerHTML=''
            indexArray = [43, 117]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '32':
            selectPSSubtype.innerHTML=''
            indexArray = [44]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '33':
            selectPSSubtype.innerHTML=''
            indexArray = [45]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '34':
            selectPSSubtype.innerHTML=''
            indexArray = [46]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '35':
            selectPSSubtype.innerHTML=''
            indexArray = [48]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '36':
            selectPSSubtype.innerHTML=''
            indexArray = [52,74,77,78,80,81]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '37':
            selectPSSubtype.innerHTML=''
            indexArray = [55,69,70,85,99]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '38':
            selectPSSubtype.innerHTML=''
            indexArray = [56]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '39':
            selectPSSubtype.innerHTML=''
            indexArray = [56]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '40':
            selectPSSubtype.innerHTML=''
            indexArray = [57]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '41':
            selectPSSubtype.innerHTML=''
            indexArray = [58,62]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '42':
            selectPSSubtype.innerHTML=''
            indexArray = [59,119]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '43':
            selectPSSubtype.innerHTML=''
            indexArray = [62,40,79]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '44':
            selectPSSubtype.innerHTML=''
            indexArray = [62,111]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '45':
            selectPSSubtype.innerHTML=''
            indexArray = [67,96]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '46':
            selectPSSubtype.innerHTML=''
            indexArray = [69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '47':
            selectPSSubtype.innerHTML=''
            indexArray = [69,94,95]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '48':
            selectPSSubtype.innerHTML=''
            indexArray = [69,70]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '49':
            selectPSSubtype.innerHTML=''
            indexArray = [69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '50':
            selectPSSubtype.innerHTML=''
            indexArray = [69]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '51':
            selectPSSubtype.innerHTML=''
            indexArray = [70]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '52':
            selectPSSubtype.innerHTML=''
            indexArray = [100]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '53':
            selectPSSubtype.innerHTML=''
            indexArray = [82]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '54':
            selectPSSubtype.innerHTML=''
            indexArray = [84,115]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '55':
            selectPSSubtype.innerHTML=''
            indexArray = [87,106]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '56':
            selectPSSubtype.innerHTML=''
            indexArray = [93]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '57':
            selectPSSubtype.innerHTML=''
            indexArray = [94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '58':
            selectPSSubtype.innerHTML=''
            indexArray = [94]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '60':
            selectPSSubtype.innerHTML=''
            indexArray = [95]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '61':
            selectPSSubtype.innerHTML=''
            indexArray = [96,110]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '62':
            selectPSSubtype.innerHTML=''
            indexArray = [96,116]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '63':
            selectPSSubtype.innerHTML=''
            indexArray = [103]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '64':
            selectPSSubtype.innerHTML=''
            indexArray = [105]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '65':
            selectPSSubtype.innerHTML=''
            indexArray = [110]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '66':
            selectPSSubtype.innerHTML=''
            indexArray = [111]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '67':
            selectPSSubtype.innerHTML=''
            indexArray = [112]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '68':
            selectPSSubtype.innerHTML=''
            indexArray = [68]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
        case '69':
            selectPSSubtype.innerHTML=''
            indexArray = [120]
            for(var i=0; i<indexArray.length; i++) {
                if(i==0){
                    firstVal = indexArray[i]
                }
                options[i] = document.createElement('option')
                options[i].value = indexArray[i]
                options[i].text = objPSSType[0][indexArray[i]]
                selectPSSubtype.add(options[i])
            }            
            break
    }
    //$("#pssubtype-select").val(firstVal).trigger('change')
}
// LOAD PROJECT TYPES

//   MAP DASHBOARD
var map, marker
var markers = []
let infoWindow
const mapIcon = {}

function initMap() {
    // INITIALIZE THE MAP
    mapIcon.url = 'mapicon.png'
    mapIcon.scaledSize = new google.maps.Size(15, 15)
    var location = new google.maps.LatLng(11.26888368831821, 124.93714892889646)
    var mapProperty = {
        center : location,
        zoom : 8,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }
    map = new google.maps.Map(document.getElementById('dashmap'), mapProperty)
    // FETCH DATA TO POPULATE MAP
    let data = {
        'type' : 'firm'
    }
    setMarkers(data)
}

// initialize map markers
function setMarkers(data) {
    // delete existing map markers before loading in new ones
    deleteMarkers()
    infoWindow = new google.maps.InfoWindow({})
    map.setCenter(new google.maps.LatLng(11.26888368831821, 124.93714892889646))    // DEFAULT GEOLOCATION FOR REGION VIII
    map.setZoom(8)
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'build/php/maploader.php')
    xhr.setRequestHeader('Content-Type', 'application/json')
    xhr.onload = function() {
        let response = JSON.parse(xhr.responseText)
        labelTotalFirms.textContent = response.data.length
        console.log(response.counters)
        var chartData = [
            response.counters[0],
            response.counters[1],
            response.counters[2],
            response.counters[3],
            response.counters[4]
        ]
        updateChart(myChart, chartData)
        for (var x=0; x<response.data.length; x++) {
            marker = new google.maps.Marker({
                map : map,
                position : new google.maps.LatLng(response.data[x][1], response.data[x][2]),
                icon : mapIcon
            })
            // stores the marker to the markers array
            markers.push(marker)
            // console.log(response.data[x][11])
            // adds a click event to each marker on the map
            google.maps.event.addListener(marker, 'click', (function(marker, x) {
                return function () {
                    var textContent = '<table class="table table-striped">' +
                                        '<tr>' +
                                        '<td><b>PROJECT NAME:</b></td>' +
                                        '<td>' + response.data[x][0] + '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td><b>PROPONENT:</b></td>' +
                                        '<td>' + response.data[x][6] + '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td><b>PROJECT ADDRESS:</b></td>' +
                                        '<td>' + response.data[x][3] + ' ' + response.data[x][4] + ', ' + response.data[x][5] + '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td><b>PROJECT SPECIFIC TYPE:</b></td>' +
                                        '<td>' + response.data[x][9] + '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td><b>GEOCOORDINATES:</b></td>' +
                                        '<td class="text-primary">' + response.data[x][1] + ', ' + response.data[x][2] + '</td>' +
                                        '</tr>' +
                                        '</table>'
                    infoWindow.setContent(textContent)
                    infoWindow.open(map, marker)
                }
            })(marker, x))
        }
        // set map
        setMapOnAll(map)
    }   
    xhr.send(JSON.stringify(data))
}

// ON FILTER SUBMIT BUTTON EVENTS
mapForm.addEventListener('submit', function(e) {
    e.preventDefault()
    if(objFilter.afilter=='firm') {
        var obj = {
            'type' : objFilter.afilter
        }
        setMarkers(obj)
    }else if(objFilter.afilter=='permit') {
        var obj = {
            'type' : objFilter.afilter,
            'check_peiss' : chkPeiss.checked,
            'select_peiss' : selectPeiss.value,
            'check_permit' : chkPermit.checked,
            'select_permit' : selectPermit.value,
            'date_from' : dtFrom.value,
            'date_to' : dtTo.value
        }
        setMarkers(obj)
    }else if(objFilter.afilter=='project') {
        var obj = {
            'type' : objFilter.afilter,
            'check_ptype' : chkPtype.checked,
            'projecttype' : selectPtype.value,
            'check_psubtype' : chkPSubtype.checked,
            'psubtype' : selectPSubtype.value,
            'check_psstype' : chkPSpecificType.checked,
            'psstype' : selectPSpecificType.value,
            'check_pssubtype' : chkPSSubtype.checked,
            'pssubtype' : selectPSSubtype.value
        }
        setMarkers(obj)
        // console.log(obj)
    }
})

// create the setMapOnAll function
function setMapOnAll(map) {
    // loop thru each marker on markers array
    for (var i=0; i< markers.length; i++) {
        markers[i].setMap(map)
    }
}

// deletes all markers on map
function deleteMarkers() {
    setMapOnAll(null)
    markers = []    //clears array
}

// doughnut chart
const chartdata = {
    labels: [
        'NON-APPLICABLE',
        'OPERATIONAL',
        'NON-OPERATIONAL',
        'RELIEVED',
        'CANCELLED'
    ],
    datasets: [{
      label: [
        'UNIVERSE'
      ],
      data: [300, 50, 100, 10, 96],
      backgroundColor: [
        'rgb(178, 34, 34)',
        'rgb(0, 255, 0)',
        'rgb(255, 215, 0)',
        'rgb(0, 255, 255)',
        'rgb(112, 128, 144)'
      ],
      hoverOffset: 4
    }]
}

const config = {
    type: 'doughnut',
    data: chartdata,
    options: {
        maintainAspectRatio: true,
        legend: {
            display: true,
            position: 'right'
        }
    }
}

const myChart = new Chart(
    document.getElementById('myChart'),
    config
)

function updateChart(chart, newdata) {
    // console.log(data)
    // chart.data.datasets.forEach((dataset) => {
    //     dataset.data.pop()
    // })
    console.log(chart.options)
    for(x=0; x<=4; x++) {
        chart.data.datasets[0].data[x] = newdata[x]
    }
    
    // console.log(chart.data.datasets[0].data)
    // chart.data.datasets.forEach((dataset) => {
    //     dataset.data.push(data)
    //     // console.log(dataset.data)
    //     // dataset.data.pop()
    // })
    chart.update()
}