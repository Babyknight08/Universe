var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
})
var lastname = document.getElementById('lastname-input')
var firstname = document.getElementById('firstname-input')
var middlename = document.getElementById('middlename-input')
var extension = document.getElementById('extension-input')
var division = document.getElementById('division-select')
var section = document.getElementById('section-select')
var usertype = document.getElementById('usertype-select')
var hiddenid = document.getElementById('hidden-id')
document.addEventListener('DOMContentLoaded', function() {
    var data = {
        'event_type' : 'load',
        'id' : localStorage.getItem('dataid')
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/ajax_functions.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=="success"){
            hiddenid.value = response.id
            lastname.value = response.lastname
            firstname.value = response.firstname
            middlename.value = response.middlename
            extension.value = response.extension
            division.value = response.division
            section.value = response.section
            usertype.value = response.usertype
            $("#division-select").val(response.division).trigger('change');
            $("#section-select").val(response.section).trigger('change');
        }else{
            Toast.fire({
                icon: 'error',
                title: response.message
            }) 
        }
    }
    request.send(JSON.stringify(data))
})

var updateform = document.getElementById('updateuser-form')
updateform.addEventListener('submit', function(event) {
    event.preventDefault()
    event.stopPropagation()
    var username = firstname.value.substring(0, 1) + middlename.value.substring(0, 1) + lastname.value
    var data = {
        'event_type' : 'update',
        'id' : hiddenid.value,
        'lastname' : lastname.value,
        'firstname' : firstname.value,
        'middlename' : middlename.value,
        'extension' : extension.value,
        'division' : division.value,
        'section' : section.value,
        'usertype' : usertype.value,
        'username' : username.toLowerCase()
    }
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/ajax_functions.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=="duplicate") {
            Toast.fire({
                icon: 'error',
                title: ' Employee already exists in the database!'
            }) 
        }else if(response.message=="success") {
            $('#button-dummy').trigger('click');
        }else{
            Toast.fire({
                icon: 'error',
                title: response.message
            })             
        }
    }
    request.send(JSON.stringify(data))
})