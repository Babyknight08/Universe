var project_class = document.getElementById('project-class')

document.addEventListener('DOMContentLoaded', function() {
    var xhr = new XMLHttpRequest()
    xhr.open('GET', '../../build/php/load_projectclasses.php', true)
    xhr.onload = function(){
        var resp = xhr.responseText
        // console.log(resp)
        project_class.innerHTML = resp
    }
    xhr.send()
})