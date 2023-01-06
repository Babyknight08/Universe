//--DECLARE TOXIC CHEMICALS
var tchw_select = document.getElementById('tchw-select')
var tchw_permitno = document.getElementById('tchwcode-input')
var tchw_issuedate = document.getElementById('tchwissue-date')
var tchw_expiredate = document.getElementById('tchwexpire-date')
var tchw_file = document.getElementById('tchw-file')
var tchw_filename = document.getElementById('tchwattachment-name')
var tchw_filesize = document.getElementById('tchwattachment-size')
//--DECLARE PERMIT TO OPERATE
var pto_permitno = document.getElementById('ptocode-input')
var pto_issuedate = document.getElementById('ptoissue-date')
var pto_expiredate = document.getElementById('ptoexpire-date')
var pto_file = document.getElementById('pto-file')
var pto_filename = document.getElementById('ptoattachment-name')
var pto_filesize = document.getElementById('ptoattachment-size')
//--DECLARE DISCHARGE PERMIT
var dp_permitno = document.getElementById('dpcode-input')
var dp_issuedate = document.getElementById('dpissue-date')
var dp_expiredate = document.getElementById('dpexpire-date')
var dp_file = document.getElementById('dp-file')
var dp_filename = document.getElementById('dpattachment-name')
var dp_filesize = document.getElementById('dpattachment-size')
//--PCO
var pco_code = document.getElementById('pcocode-input')
var pco_category = document.getElementById('category-select')
var pco_name = document.getElementById('pconame-input')
var pco_contactno = document.getElementById('contactno-input')
var pco_issuedate = document.getElementById('pcoissue-date')
var pco_expiredate = document.getElementById('pcoexpire-date')
var pco_file = document.getElementById('pco-file')
var pco_filename = document.getElementById('pcoattachment-name')
var pco_filesize = document.getElementById('pcoattachment-size')

//--Auto adjust expiration dates for PTT and SQI
tchw_issuedate.onchange = function() {
    switch(tchw_select.value){
        case 'PTT' :
            var newdate = new Date(tchw_issuedate.value)
            tchw_expiredate.value = new Date(newdate.setMonth(newdate.getMonth() + 6)).toLocaleDateString('en-CA')
            break
        case 'SQI' :
            var newdate = new Date(tchw_issuedate.value)
            tchw_expiredate.value = new Date(newdate.setMonth(newdate.getMonth() + 12)).toLocaleDateString('en-CA')
            break    
    }    
}

//--File Uploaders Change Event
tchw_file.addEventListener('change', function() {
    if(tchw_file.value.length==0){
        tchw_filename.innerHTML = 'No File Selected'
        tchw_filesize.innerHTML = '0MB'
    }else{
        if (tchw_file.files[0].type!=='application/pdf') {
            tchw_filename.innerHTML = 'Please Upload a PDF File!'
            tchw_filesize.innerHTML = '0MB'
            tchw_file.value=''
          }else{
            tchw_filename.innerHTML = tchw_file.files[0].name
            tchw_filesize.innerHTML = (tchw_file.files[0].size / (1024*1024)).toFixed(2) + 'MB'
          }
    }
})

pto_file.addEventListener('change', function() {
    if(pto_file.value.length==0){
        pto_filename.innerHTML = 'No File Selected'
        pto_filesize.innerHTML = '0MB'
    }else{
        if (pto_file.files[0].type!=='application/pdf') {
            pto_filename.innerHTML = 'Please Upload a PDF File!'
            pto_filesize.innerHTML = '0MB'
            pto_file.value=''
          }else{
            pto_filename.innerHTML = pto_file.files[0].name
            pto_filesize.innerHTML = (pto_file.files[0].size / (1024*1024)).toFixed(2) + 'MB'
          }
    }
})

dp_file.addEventListener('change', function() {
    if(dp_file.value.length==0){
        pto_filename.innerHTML = 'No File Selected'
        pto_filesize.innerHTML = '0MB'
    }else{
        if (dp_file.files[0].type!=='application/pdf') {
            dp_filename.innerHTML = 'Please Upload a PDF File!'
            dp_filesize.innerHTML = '0MB'
            dp_file.value=''
          }else{
            dp_filename.innerHTML = dp_file.files[0].name
            dp_filesize.innerHTML = (dp_file.files[0].size / (1024*1024)).toFixed(2) + 'MB'
          }
    }
})

pco_file.addEventListener('change', function() {
    if(pco_file.value.length==0){
        pco_filename.innerHTML = 'No File Selected'
        pco_filesize.innerHTML = '0MB'
    }else{
        if (pco_file.files[0].type!=='application/pdf') {
            pco_filename.innerHTML = 'Please Upload a PDF File!'
            pco_filesize.innerHTML = '0MB'
            pco_file.value=''
          }else{
            pco_filename.innerHTML = pco_file.files[0].name
            pco_filesize.innerHTML = (pco_file.files[0].size / (1024*1024)).toFixed(2) + 'MB'
          }
    }
})
//--File Uploaders Change Event

