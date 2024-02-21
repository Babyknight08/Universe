//INITIALIZE TOAST NOTIFICATION PLUGIN
var Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 3000
})
//LOAD EMPLOYEES TABLE
$(function() {
  load_employees()
})
//LOAD EMPLOYEES TABLE FUNCTION (REUSABLE)
function load_employees() {
  dtable = $('#employees-table').DataTable({
    "destroy" : true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "ajax" : 
    {
        url : "../../build/php/loadusers_ajax.php",
        method : "POST"
    }
  });
}
//DELETE EMPLOYEE EVENTS
  $('#modal-delete').on('show.bs.modal', function(event) {

    var cbutton = event.relatedTarget
    var cbuttonid = cbutton.getAttribute('data-id')
    var data = {
      'event_type' : 'delete',
      'id' : cbuttonid
    }

    $('#button-delete').click(function() {
      var request = new XMLHttpRequest()
      request.open('POST', '../../build/php/ajax_functions.php')
      request.setRequestHeader('Content-Type', 'application/json')
      request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success') {
          $('#modal-delete').hide()
          $('.modal-backdrop').remove()
          load_employees()
          Toast.fire({
            icon: 'success',
            title: ' User successfully removed from database!'
          }) 
        }else{
          $('#modal-delete').hide()
          $('.modal-backdrop').remove()
          Toast.fire({
            icon: 'error',
            title: response.message
          })
        }
      } 
      request.send(JSON.stringify(data))
    })

  });
  //RESET EMPLOYEE EVENTS
  $('#modal-reset').on('show.bs.modal', function(event) {

    var cbutton = event.relatedTarget
    var cbuttonid = cbutton.getAttribute('data-id')
    var data = {
      'event_type' : 'reset',
      'id' : cbuttonid
    }

    $('#button-reset').click(function() {
      var request = new XMLHttpRequest()
      request.open('POST', '../../build/php/ajax_functions.php')
      request.setRequestHeader('Content-Type', 'application/json')
      request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='success') {
          $('#modal-reset').hide()
          $('.modal-backdrop').remove()
          load_employees()
          Toast.fire({
            icon: 'success',
            title: ' Password has been reset!'
          }) 
        }else{
          $('#modal-reset').hide()
          $('.modal-backdrop').remove()
          Toast.fire({
            icon: 'error',
            title: response.message
          })
        }
      } 
      request.send(JSON.stringify(data))      
    })

  });
  //UPDATE EMPLOYEE
  $(document).on('click', '.button-update', function(event) {
    event.preventDefault()
    localStorage.setItem('dataid', $(this).data('id'))
    window.location.href='updateuser.php'
  });
