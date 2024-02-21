// const { Toast } = require("bootstrap")

var cmrstate = 'add'
var cmrupdateid
const data_handler = {
    'event_type' : '',
    'id' : 0
}

const cmr_select_year = document.getElementById('cmr-select-year')
const cmr_select_semester = document.getElementById('cmr-select-semester')
const cmr_date_submission = document.getElementById('cmr-date-submission')

load_cmr()

function load_cmr() {
    dtable = $('#cmr-table').DataTable({
        "destroy" : true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "buttons" : [
            'print'
        ],
        "ajax" : 
        {
            url : "../../build/php/loadcmr_ajax.php",
            method : "POST",
            data : { 'id' : projectid }
        }
    })
}

// FORM SUBMISSION EVENTS HANDLING
// MAINLY INSERTING AND UPDATING EXISTING CMR RECORDS
const cmr_form = document.getElementById('cmr-form')
cmr_form.addEventListener('submit', function(e) {
    e.preventDefault()
    e.stopPropagation()

    if(cmrstate == 'add') {
        var data = {
            'projectid' : projectid,
            'year' : cmr_select_year.value,
            'semester' : cmr_select_semester.value,
            'date_submission' : cmr_date_submission.value
        }
        var xhr = new XMLHttpRequest()
        xhr.open('POST', '../../build/php/cmr_add.php')
        xhr.setRequestHeader('Content-Type', 'application/json')
        xhr.onload = function() {
            var response = JSON.parse(xhr.responseText)
            if(response.message == 'success') {
                Toast.fire({
                    icon : 'success',
                    title : ' Record Added!'
                })
                cmr_form.reset()
                load_cmr()
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        }
        xhr.send(JSON.stringify(data))
        return false
    }
    if(cmrstate == 'update') {
        var data = {
            'updateid' : cmrupdateid,
            'year' : cmr_select_year.value,
            'semester' : cmr_select_semester.value,
            'date_submission' : cmr_date_submission.value
        }
        var xhr = new XMLHttpRequest()
        xhr.open('POST', '../../build/php/cmr_update.php')
        xhr.setRequestHeader('Content-Type', 'application/json')
        xhr.onload = function() {
            var response = JSON.parse(xhr.responseText)
            if(response.message == 'success') {
                Toast.fire({
                    icon : 'success',
                    title : ' Record Updated!'
                })
                cmr_form.reset()
                load_cmr()
            }else{
                Toast.fire({
                    icon : 'error',
                    title : response.message
                })
            }
        }
        xhr.send(JSON.stringify(data))
        return false
    }
})

// DELETE MODAL EVENT HANDLING
$('#modal-delete-cmr').on('show.bs.modal', function(event) {
    // console.log(event)
    var cbutton = event.relatedTarget
    var cbuttonID = cbutton.getAttribute('data-id')
    data_handler.event_type = 'delete'
    data_handler.id = cbuttonID
 })

 document.getElementById('button-delete-cmr').addEventListener('click', function() {
     var xhr = new XMLHttpRequest()
     xhr.open('POST', '../../build/php/cmrfunctions.php')
     xhr.setRequestHeader('Content-Type', 'application/json')
     xhr.onload = function() {
         var response = JSON.parse(xhr.responseText)
         if(response.message == 'success') {
            $('#modal-delete-cmr').modal('toggle')
            Toast.fire({
                icon : 'success',
                title : ' Record deleted!'
            })
            load_cmr()
            cmr_form.reset()
         }else{
             Toast.fire({
                 icon : 'error',
                 title : response.message
             })
         }
     }
     xhr.send(JSON.stringify(data_handler))
 })

//  CMR UPDATE FUNCTION
 function updateCMR(event) {
    cmrstate = 'update'
    cmrupdateid = event.getAttribute('data-id')
    var data = {
        'event_type' : 'load',
        'id' : cmrupdateid
    }
    var xhr = new XMLHttpRequest()
    xhr.open('POST', '../../build/php/cmrfunctions.php')
    xhr.setRequestHeader('Content-Type', 'application/json')
    xhr.onload = function() {
        var response = JSON.parse(xhr.responseText)
        if(response.message=='success'){
            // cmr_select_year.value = response.year
            $('#cmr-select-year').val(response.year).trigger('change')
            cmr_date_submission.value = response.date_submission
            $('#cmr-select-semester').val(response.semester).trigger('change')
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
    xhr.send(JSON.stringify(data))
 }

//  CMR FORM RESET TO DEFAULT STATE
document.getElementById('button-reset-cmr').addEventListener('click', function() {
    cmrstate = 'add'
    $('#cmr-select-year').val('2022').trigger('change')
    $('#cmr-select-semester').val('First Semester').trigger('change')
    Toast.fire({
        icon : 'warning',
        title : ' Add Mode'
    })
})


