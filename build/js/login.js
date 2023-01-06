var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
})

var form_login = document.getElementById('form-login')
form_login.addEventListener('submit', function(event) {
    event.preventDefault()
    event.stopPropagation()
    var username = document.getElementById('input-username')
    var userpass = document.getElementById('input-password')
    var data = {
        'username' : username.value,
        'userpass' : userpass.value
    } 
    var request = new XMLHttpRequest()
    request.open('POST', 'build/php/logincon.php')
    request.setRequestHeader('Content-Type', 'application/json')
    request.onload = function() {
        var response = JSON.parse(request.responseText)
        //console.log(response.message)
        if(response.message=='success') {
            window.location.href="index.php"        
        }else if(response.message=='nomatch') {
            Toast.fire({
                icon: 'error',
                title: ' Username or Password did not match!'
            })    
        }else{
            Toast.fire({
                icon: 'error',
                title: response.message
            })    
        }
    }
    request.send(JSON.stringify(data))
})


