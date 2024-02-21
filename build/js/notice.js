//INITIALIZE TOAST NOTIFICATION PLUGIN
var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  })

var projectid;
var projectfkey;

var formstate = 'add'
var counter = 0
var reset_button = document.getElementById('button-reset')
var notice_form = document.getElementById('notice-form')
var eia_check = document.getElementById('eia-check')
var eia_commit = document.getElementById('eia-commitment-input')
var eia_comply = document.getElementById('eia-compliance-input')
var water_check = document.getElementById('water-check')
var water_commit = document.getElementById('water-commitment-input')
var water_comply = document.getElementById('water-compliance-input')
var air_check = document.getElementById('air-check')
var air_commit = document.getElementById('air-commitment-input')
var air_comply = document.getElementById('air-compliance-input')
var toxic_check = document.getElementById('toxic-check')
var toxic_commit = document.getElementById('toxic-commitment-input')
var toxic_comply = document.getElementById('toxic-compliance-input')
eia_check.onchange = function() {
    if(eia_check.checked == true) {
        counter+=1
        eia_commit.disabled=false
        eia_comply.disabled=false
    }else{
        counter-=1
        eia_commit.disabled=true
        eia_comply.disabled=true
        eia_commit.value=1
        eia_comply.value=1
    }
}
water_check.onchange = function() {
    if(water_check.checked == true) {
        counter+=1
        water_commit.disabled=false
        water_comply.disabled=false
    }else{
        counter-=1
        water_commit.disabled=true
        water_comply.disabled=true
        water_commit.value=1
        water_comply.value=1
    }
}
air_check.onchange = function() {
    if(air_check.checked == true) {
        counter+=1
        air_commit.disabled=false
        air_comply.disabled=false
    }else{
        counter-=1
        air_commit.disabled=true
        air_comply.disabled=true
        air_commit.value=1
        air_comply.value=1
    }
}
toxic_check.onchange = function() {
    if(toxic_check.checked == true) {
        counter+=1
        toxic_commit.disabled=false
        toxic_comply.disabled=false
    }else{
        counter-=1
        toxic_commit.disabled=true
        toxic_comply.disabled=true
        toxic_commit.value=1
        toxic_comply.value=1
    }
}

var notice_select = document.getElementById('notice-select')
var issuance_date = document.getElementById('issuance-date')
var span_name = document.getElementById('attachment-name')
var span_size = document.getElementById('attachment-size')
var nov_file = document.getElementById('nov-file')

nov_file.addEventListener('change', function() {
    if(nov_file.value.length==0){
        span_name.innerHTML = 'No File Selected'
        span_size.innerHTML = '0MB'
    }else{
        if (nov_file.files[0].type!=='application/pdf') {
            span_name.innerHTML = 'Please Upload a PDF File!'
            span_size.innerHTML = '0MB'
            nov_file.value=''
          }else{
            span_name.innerHTML = nov_file.files[0].name
            span_size.innerHTML = (nov_file.files[0].size / (1024*1024)).toFixed(2) + 'MB'
          }
    }
})

notice_form.addEventListener('submit', function(event) {
    event.preventDefault()
    event.stopPropagation()

    if(counter==0) {
        Toast.fire({
            icon: 'error',
            title: ' Please select at least (1) law!'
        })
        return false
    }

    if(eia_comply.value > eia_commit.value){
        Toast.fire({
            icon: 'error',
            title: ' Compliance cannot be greater than commitment'
        })
        return false
    }else if(water_comply.value > water_commit.value){
        Toast.fire({
            icon: 'error',
            title: ' Compliance cannot be greater than commitment'
        })
        return false    
    }else if(air_comply.value > air_comply.value){
        Toast.fire({
            icon: 'error',
            title: ' Compliance cannot be greater than commitment'
        })
        return false    
    }else if(toxic_comply.value > toxic_commit.value){
        Toast.fire({
            icon: 'error',
            title: ' Compliance cannot be greater than commitment'
        })
        return false    
    }

    var data = new FormData()
    data.append('notice', notice_select.value)
    data.append('issuancedate', issuance_date.value)
    data.append('eiacheck', eia_check.checked)
    data.append('watercheck', water_check.checked)
    data.append('aircheck', air_check.checked)
    data.append('toxiccheck', toxic_check.checked)
    data.append('eiacommit', eia_commit.value)
    data.append('eiacomply', eia_comply.value)
    data.append('watercommit', water_commit.value)
    data.append('watercomply', water_comply.value)
    data.append('aircommit', air_commit.value)
    data.append('aircomply', air_comply.value)
    data.append('toxiccommit', toxic_commit.value)
    data.append('toxiccomply', toxic_comply.value)
    data.append('noticefile', nov_file.files[0])
    data.append('projectid', projectid)

    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/notice.php')
    request.onload = function() {
        Toast.fire({
            icon: 'success',
            title: ' SUCCESS!'
        })
        span_name.innerHTML = 'No File Selected!'
        span_size.innerHTML = '0MB'
        nov_file.value=''
        notice_form.reset()
        eia_check.dispatchEvent(new Event('change'))
        water_check.dispatchEvent(new Event('change'))
        air_check.dispatchEvent(new Event('change'))
        toxic_check.dispatchEvent(new Event('change'))
        load_notices()
    }
    request.send(data)
})

  //LOAD PROJECTS TABLE
    projectid = localStorage.getItem('projectid')
    projectfkey = localStorage.getItem('projectfkey')
    load_notices()
    load_cdos()

  //LOAD NOTICES & CDOS TABLE FUNCTION (REUSABLE)
  function load_notices() {
    dtable = $('#notice-table').DataTable({
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
          url : "../../build/php/loadnotices_ajax.php",
          method : "POST",
          data : { 'id' : projectid }
      }
    });
  }

  function load_cdos() {
    dtable = $('#cdo-table').DataTable({
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
          url : "../../build/php/loadcdo_ajax.php",
          method : "POST",
          data : { 'id' : projectid }
      }
    });
  }

  $('#modal-delete-nov').on('show.bs.modal', function(event) {
      
    var cbutton = event.relatedTarget
    var cbuttonID = cbutton.getAttribute('data-id')
    var data = {
        'event_type' : 'delete',
        'id' : cbuttonID
    }

    $('#button-delete-nov').click(function() {
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/novfunctions.php')
        request.setRequestHeader('Content-Type', 'application/json')
        request.onload = function() {
            var response = JSON.parse(request.responseText)
            if(response.message=='success'){
                $('#button-dismiss-nov').trigger('click')
                Toast.fire({
                    icon: 'success',
                    title: ' Record deleted!'
                })
                load_notices()
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(JSON.stringify(data))
    })

  })

  var novupdateid = ''
  $('#modal-update-nov').on('show.bs.modal', function(event) {

    var cbutton = event.relatedTarget
    novupdateid = cbutton.getAttribute('data-id')
    var law = cbutton.getAttribute('data-law')
    var commitment = cbutton.getAttribute('data-commitment')
    var compliance = cbutton.getAttribute('data-compliance')

    document.getElementById('commitment-input').value = commitment
    document.getElementById('compliance-input').value = compliance
    document.getElementById('label-law').innerHTML=law

  })
  $('#button-update-nov').click(function() {
    var commitment_input = document.getElementById('commitment-input')
    var compliance_input = document.getElementById('compliance-input')
    var data_ajax = {
        'event_type' : 'update',
        'id' : novupdateid,
        'commitment' : commitment_input.value,
        'compliance' : compliance_input.value
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/novfunctions.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success'){
            $('#button-dismiss-notice').trigger('click')
            Toast.fire({
                icon: 'success',
                title: ' Record updated!'
            })
            load_notices()
            return false;
        }else{
            Toast.fire({
                icon: 'error',
                title: response.message
            })
        }
    }
    request.send(JSON.stringify(data_ajax))
})

//=======================================================================
var cdo_file = document.getElementById('cdo-file')
var span_name_cdo = document.getElementById('attachment-name-cdo')
var span_size_cdo = document.getElementById('attachment-size-cdo')
var cdo_form = document.getElementById('cdo-form')

cdo_file.addEventListener('change', function() {
    if(cdo_file.value.length==0){
        span_name_cdo.innerHTML = 'No File Selected'
        span_size_cdo.innerHTML = '0MB'
    }else{
        if (cdo_file.files[0].type!=='application/pdf') {
            span_name_cdo.innerHTML = 'Please Upload a PDF File!'
            span_size_cdo.innerHTML = '0MB'
            cdo_file.value=''
          }else{
            span_name_cdo.innerHTML = cdo_file.files[0].name
            span_size_cdo.innerHTML = (cdo_file.files[0].size / (1024*1024)).toFixed(2) + 'MB'
          }
    }
})

cdo_form.addEventListener('submit', function(event) {
    event.preventDefault()
    event.stopPropagation()
    
    var issuance_date = document.getElementById('issuance-date-cdo')

    if(formstate=='add'){
        var data = new FormData()
        data.append('projectid', projectid)
        data.append('cdofile', cdo_file.files[0])
        data.append('issuancedate', issuance_date.value)
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/cdo.php')
        request.onload = function() {
            Toast.fire({
                icon: 'success',
                title: ' SUCCESS!'
            })
            span_name_cdo.innerHTML = 'No File Selected!'
            span_size_cdo.innerHTML = '0MB'
            cdo_file.value=''
            cdo_form.reset()
            load_cdos()
        }
        request.send(data)                
    }else if(formstate=='update'){
        var formdata = new FormData()
        formdata.append('id', cdoupdateid)
        formdata.append('issuancedate', issuance_date.value)
        formdata.append('cdofile', cdo_file.files[0])
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/cdoupdate.php')
        request.onload = function() {
            if(request.responseText=='success'){
                Toast.fire({
                    icon: 'success',
                    title: ' Update Success!'
                })
                formstate = 'add'
                span_name_cdo.innerHTML = 'No File Selected'
                span_size_cdo.innerHTML = '0MB'    
                cdo_file.required = true
                cdo_form.reset()
                load_cdos()
            }
        }
        request.send(formdata)
    }
})

$('#modal-delete-cdo').on('show.bs.modal', function(event) {
    var cbutton = event.relatedTarget
    var cbuttonID = cbutton.getAttribute('data-id')
    var data = {
        'event_type' : 'delete',
        'id' : cbuttonID
    }
    $('#button-delete-cdo').click(function() {
        var request = new XMLHttpRequest()
        request.open('POST', '../../build/php/cdofunctions.php')
        request.setRequestHeader('Content-Type', 'application/json')
        request.onload = function() {
            var response = JSON.parse(request.responseText)
            if(response.message=='success'){
                $('#button-dismiss-cdo').trigger('click')
                Toast.fire({
                    icon: 'success',
                    title: ' Record deleted!'
                })
                load_cdos()
                cdo_form.reset()
                span_name_cdo.innerHTML = 'No File Selected'
                span_size_cdo.innerHTML = '0MB'
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        request.send(JSON.stringify(data))
    })
})

var cdoupdateid=''
function updateEvent(event){
    formstate = 'update'
    cdo_file.required = false
    cdoupdateid = event.getAttribute('data-id')
    var data = {
        'event_type' : 'load',
        'id' : cdoupdateid
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/cdofunctions.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success'){
            document.getElementById('issuance-date-cdo').value = response.issuancedate
            Toast.fire({
                icon: 'warning',
                title: ' Edit Mode'
            })
        }else{
            Toast.fire({
                icon: 'error',
                title: response.message
            })
        }

    }
    request.send(JSON.stringify(data))
}

reset_button.addEventListener('click', function() {
    formstate = 'add'
    span_name_cdo.innerHTML = 'No File Selected'
    span_size_cdo.innerHTML = '0MB'    
    cdo_file.required = true
    Toast.fire({
        icon: 'warning',
        title: ' Add Mode'
    })
})