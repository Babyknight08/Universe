var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
})

var newuserform = document.getElementById('newuser-form')
newuserform.addEventListener('submit', function(event) {
    event.preventDefault()
    event.stopPropagation()
    var lastname = document.getElementById('lastname-input')
    var firstname = document.getElementById('firstname-input')
    var middlename = document.getElementById('middlename-input')
    var extension = document.getElementById('extension-input')
    var division = document.getElementById('division-select')
    var section = document.getElementById('section-select')
    var usertype = document.getElementById('usertype-select')
    var username = firstname.value.substring(0, 1) + middlename.value.substring(0, 1) + lastname.value //substr(strtolower($firstname),0,1) . substr(strtolower($middlename),0,1) . utf8_encode(strtolower($lastname))
    var data = {
        'lastname' : lastname.value,
        'firstname' : firstname.value,
        'middlename' : middlename.value,
        'extension' : extension.value,
        'division' : division.options[division.selectedIndex].value,
        'section' : section.options[section.selectedIndex].value,
        'usertype' : usertype.options[usertype.selectedIndex].value,
        'username' : username.toLowerCase()
    }
    console.log(data)
    var request = new XMLHttpRequest()
    request.open('POST', '../../build/php/newuser_ajax.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        if(response.message=='duplicate') {
            Toast.fire({
                icon: 'error',
                title: ' Employee already exists in the database!'
            }) 
        }else{
            Toast.fire({
                icon: 'success',
                title: ' Employee successfully added!'
            })
            newuserform.reset()
            $("#division-select").val('0').trigger('change');
            $("#section-select").val('0').trigger('change');
        }
    }   
    request.send(JSON.stringify(data))
})