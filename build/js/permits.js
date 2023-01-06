
load_tchw()
load_pto()
load_dp()
load_pco()

pcostate = 'add'
ptostate = 'add'
dpstate = 'add'
tchwstate = 'add'

function load_tchw() {
    //load air table
    dtable = $('#tchw-table').DataTable({
        "destroy" : true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "ajax" : 
        {
            url : "../../build/php/loadpermits_ajax.php",
            method : "POST",
            data : {
                    'projectfkey' : projectfkey,
                    'loadtype' : 'tchw' }
        }
    })
}

function load_pto() {
    //load air table
    dtable = $('#pto-table').DataTable({
        "destroy" : true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "ajax" : 
        {
            url : "../../build/php/loadpermits_ajax.php",
            method : "POST",
            data : {
                    'projectfkey' : projectfkey,
                    'loadtype' : 'pto' }
        }
    })
}

function load_dp() {
    //load air table
    dtable = $('#dp-table').DataTable({
        "destroy" : true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "ajax" : 
        {
            url : "../../build/php/loadpermits_ajax.php",
            method : "POST",
            data : {
                    'projectfkey' : projectfkey,
                    'loadtype' : 'dp' }
        }
    })
}

function load_pco() {
    //load air table
    dtable = $('#pco-table').DataTable({
        "destroy" : true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "ajax" : 
        {
            url : "../../build/php/loadpermits_ajax.php",
            method : "POST",
            data : {
                    'projectfkey' : projectfkey,
                    'loadtype' : 'pco' }
        }
    })
}
//--POLLUTION CONTROL OFFICER
var pco_form = document.getElementById('pco-form')
pco_form.addEventListener('submit', function(event) {

    event.preventDefault()
    event.stopPropagation()

    var formData = new FormData()

    formData.append('event_type', 'pco')
    formData.append('pcocode', pco_code.value)
    formData.append('pcocategory', pco_category.value)
    formData.append('pconame', pco_name.value)
    formData.append('pcocontactno', pco_contactno.value)
    formData.append('pcoissuedate', pco_issuedate.value)
    formData.append('pcoexpiredate', pco_expiredate.value)
    formData.append('pcofile', pco_file.files[0])
    formData.append('foreignkey', projectfkey)

    if(pcostate=='add'){
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_add.php')
        request.onload=function(){
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' PCO Information Added!'
                })
                load_pco()
                pco_filename.innerHTML = 'No File Selected'
                pco_filesize.innerHTML = '0MB'
                $('#category-select').val('A').trigger('change')
                pco_form.reset()
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(formData)
    }else{                  //if pcostate = 'update'
        formData.append('id', pcoid)
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_update.php')
        request.onload = function() {
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' PCO Information Updated!'
                })
                load_pco()
                pco_filename.innerHTML = 'No File Selected'
                pco_filesize.innerHTML = '0MB'
                $('#category-select').val('A').trigger('change')
                pco_file.required = true
                pco_form.reset()
                pcostate='add'
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(formData)
    }

})
//--PERMIT TO OPERATE
var pto_form = document.getElementById('pto-form')
pto_form.addEventListener('submit', function(event) {

    event.preventDefault()
    event.stopPropagation()
    
    var formData = new FormData()
    formData.append('event_type', 'pto')
    formData.append('ptocode', pto_permitno.value)
    formData.append('ptoissuedate', pto_issuedate.value)
    formData.append('ptoexpiredate', pto_expiredate.value)
    formData.append('ptofile', pto_file.files[0])
    formData.append('foreignkey', projectfkey)

    if(ptostate=='add'){
        
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_add.php')
        request.onload=function(){
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' PTO Added!'
                })
                load_pto()
                pto_filename.innerHTML = 'No File Selected'
                pto_filesize.innerHTML = '0MB'
                pto_form.reset()
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.responseText
                })
            }
        }
        request.send(formData)

    }else{
        formData.append('id', ptoid)
        console.log(formData)
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_update.php')
        request.onload = function() {
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' PTO Information Updated!'
                })
                load_pco()
                pto_filename.innerHTML = 'No File Selected'
                pto_filesize.innerHTML = '0MB'
                pto_file.required = true
                pto_form.reset()
                ptostate='add'
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(formData)
    }



})
//--WASTEWATER DISCHARGE
var dp_form = document.getElementById('dp-form')
dp_form.addEventListener('submit', function(event) {

    event.preventDefault()
    event.stopPropagation()
    
    var formData = new FormData()
    formData.append('event_type', 'dp')
    formData.append('dpcode', dp_permitno.value)
    formData.append('dpissuedate', dp_issuedate.value)
    formData.append('dpexpiredate', dp_expiredate.value)
    formData.append('dpfile', dp_file.files[0])
    formData.append('foreignkey', projectfkey)

    if(dpstate=='add'){
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_add.php')
        request.onload=function(){
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' DP Added!'
                })
                load_dp()
                dp_filename.innerHTML = 'No File Selected'
                dp_filesize.innerHTML = '0MB'
                dp_form.reset()
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.responseText
                })
            }
        }
        request.send(formData)
    }else{
        formData.append('id', dpid)
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_update.php')
        request.onload = function() {
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' WWDP Information Updated!'
                })
                load_dp()
                dp_filename.innerHTML = 'No File Selected'
                dp_filesize.innerHTML = '0MB'
                dp_file.required = true
                dp_form.reset()
                dpstate='add'
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(formData)        
    }

})
//--TOXIC HAZWASTE PERMITS
var tchw_form = document.getElementById('tchw-form')
tchw_form.addEventListener('submit', function(event) {

    event.preventDefault()
    event.stopPropagation()
    
    var formData = new FormData()
    formData.append('event_type', 'tchw')
    formData.append('permittype', tchw_select.value)
    formData.append('permitno', tchw_permitno.value)
    formData.append('tchwissuedate', tchw_issuedate.value)
    formData.append('tchwexpiredate', tchw_expiredate.value)
    formData.append('tchwfile', tchw_file.files[0])
    formData.append('foreignkey', projectfkey)

    if(tchwstate=='add'){
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_add.php')
        request.onload=function(){
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' Permit Added!'
                })
                load_tchw()
                tchw_filename.innerHTML = 'No File Selected'
                tchw_filesize.innerHTML = '0MB'
                tchw_form.reset()
                $('#tchw-select').val('HWG-ID').trigger('change')
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.responseText
                })
            }
        }
        request.send(formData)
    }else{
        formData.append('id', tchwid)
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_update.php')
        request.onload = function() {
            var response = request.responseText
            if(response=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' Permit Information Updated!'
                })
                load_tchw()
                tchw_filename.innerHTML = 'No File Selected'
                tchw_filesize.innerHTML = '0MB'
                tchw_file.required = true
                tchw_form.reset()
                $('#tchw-select').val('HWG-ID').trigger('change')
                tchw_select.disabled = false
                tchwstate='add'
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(formData)    
    }

})

$('#modal-delete-permits').on('show.bs.modal', function(event) {
    var cbutton = event.relatedTarget
    var id = cbutton.getAttribute('data-id')
    var event_type = cbutton.getAttribute('data-type')
    var permit = ''
    if(event_type=='tchw'){
        permit = cbutton.getAttribute('data-permit')
    }
    var data = {
        'event_type' : event_type,
        'id' : id,
        'permit' : permit,
        'fkey' : projectfkey
    }
    $('#button-delete-permits').click(function() {
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/permits_delete.php')
        request.setRequestHeader('Content-Type', 'application/json')
        request.onload = function() {
            var response = JSON.parse(request.responseText)
            if(response.message=='success'){
                $('#button-dismiss-permits').trigger('click')
                Toast.fire({
                    icon: 'success',
                    title: ' Record Deleted!'
                })
                load_dp()
                load_pto()
                load_tchw()
                load_pco()
            }else{
                $('#button-dismiss-permits').trigger('click')
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(JSON.stringify(data))
    })
})

var reset_button_pco = document.getElementById('button-reset-pco')
reset_button_pco.addEventListener('click', function() {
    pcostate = 'add'
    //pco_form.reset()
    $('#category-select').val('A').trigger('change')
    pco_filename.innerHTML = 'No File Selected'
    pco_filesize.innerHTML = '0MB'    
    pco_file.required = true
    pco_file.value = ''
    Toast.fire({
        icon: 'warning',
        title: ' Add Mode'
    })
})

var reset_button_pto = document.getElementById('button-reset-pto')
reset_button_pto.addEventListener('click', function() {
    ptostate = 'add'
    pto_filename.innerHTML = 'No File Selected'
    pto_filesize.innerHTML = '0MB'
    pto_file.required = true
    Toast.fire({
        icon: 'warning',
        title: ' Add Mode'
    })
})

var reset_button_dp = document.getElementById('button-reset-dp')
reset_button_dp.addEventListener('click', function() {
    dpstate = 'add'
    dp_filename.innerHTML = 'No File Selected'
    dp_filesize.innerHTML = '0MB'
    dp_file.required = true
    Toast.fire({
        icon: 'warning',
        title: ' Add Mode'
    })
})

var reset_button_tchw = document.getElementById('button-reset-tchw')
reset_button_tchw.addEventListener('click', function() {
    tchwstate = 'add'
    tchw_filename.innerHTML = 'No FIle Selected'
    tchw_filesize.innerHTML = '0MB'
    tchw_file.required = true
    tchw_select.disabled = false
    $('#tchw-select').val('HWG-ID').trigger('change')
    Toast.fire({
        icon: 'warning',
        title: ' Add Mode'
    })
})

var pcoid = ''
function updatePCO(event){
    
    pco_file.required = false
    pcoid = event.getAttribute('data-id')
    var data = {
        'event_type' : 'load',
        'permit' : 'pco',
        'id' : pcoid
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/permits_load.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success'){
            Toast.fire({
                icon: 'warning',
                title: ' Edit Mode'
            })
            pcostate = 'update'
            pco_code.value = response.pcocode 
            $('#category-select').val(response.category).trigger('change')
            pco_name.value = response.pconame 
            pco_contactno.value = response.contactno
            pco_issuedate.value = response.issuedate
            pco_expiredate.value = response.expiredate
        }

    }
    request.send(JSON.stringify(data))
}

var ptoid = ''
function updatePTO(event){

    pto_file.required = false
    ptoid = event.getAttribute('data-id')
    var data = {
        'event_type' : 'load',
        'permit' : 'pto',
        'id' : ptoid
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/permits_load.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success'){
            Toast.fire({
                icon: 'warning',
                title: ' Edit Mode'
            })
            ptostate = 'update'
            pto_permitno.value = response.ptocode
            pto_issuedate.value = response.issuedate
            pto_expiredate.value = response.expiredate
        }
    }
    request.send(JSON.stringify(data))

}

var dpid = ''
function updateDP(event){

    dp_file.required = false
    dpid = event.getAttribute('data-id')
    var data = {
        'event_type' : 'load',
        'permit' : 'dp',
        'id' : dpid
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/permits_load.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success'){
            Toast.fire({
                icon: 'warning',
                title: ' Edit Mode'
            })
            dpstate = 'update'
            dp_permitno.value = response.dpcode
            dp_issuedate.value = response.issuedate
            dp_expiredate.value = response.expiredate
        }  
    }
    request.send(JSON.stringify(data))

}

var tchwid = ''
var tchwpermit = ''
function updateTCHW(event) {

    tchw_file.required = false
    tchwid = event.getAttribute('data-id')
    tchwpermit = event.getAttribute('data-permit')
    var data = {
        'event_type' : 'load',
        'permit' : 'tchw',
        'type' : tchwpermit,
        'id' : tchwid
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/permits_load.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success'){
            Toast.fire({
                icon: 'warning',
                title: ' Edit Mode'
            })
            tchwstate = 'update'
            tchw_select.disabled = true
            $('#tchw-select').val(response.type).trigger('change')
            tchw_permitno.value = response.tchwcode
            tchw_issuedate.value = response.issuedate
            tchw_expiredate.value = response.expiredate
        }
    }
    request.send(JSON.stringify(data))

}