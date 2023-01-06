  //===================UPDATE USER PASSWORD
  var oldpass = document.getElementById('oldpass-input')
  var newpass = document.getElementById('newpass-input')
  var confpass = document.getElementById('confirmpass-input')
  var userid = document.getElementById('user-id')
  var updatepass_form = document.getElementById('updatepass-form')
  updatepass_form.addEventListener('submit', function(event) {
      event.preventDefault()
      event.stopPropagation()
      if(newpass.value != confpass.value) {
          Toast.fire({
              icon: 'error',
              title: 'New password fields did not match!'
          })
          newpass.select()
          return false
      }
      var data = {
        'userid' : userid.value,
        'oldpass' : oldpass.value,
        'newpass' : newpass.value,
        'confpass' : confpass.value
      }
      var xhr = new XMLHttpRequest()
      xhr.open('POST', '../../build/php/updatepass.php')
      xhr.setRequestHeader('Content-Type', 'application/json')
      xhr.onload = function(){
        var response = JSON.parse(xhr.responseText)
        if(response.message == 'nomatch') {
            Toast.fire({
                icon: 'error',
                title: 'Current password incorrect!'
            })
            oldpass.select()
            return false
        }else{
            Toast.fire({
                icon: 'success',
                title: 'Password updated!'
            })
            updatepass_form.reset()
            return false
        }
      }
      xhr.send(JSON.stringify(data))
  })
