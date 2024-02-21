var data = {}

const filter_opt = document.getElementById('filter_opt')

document.getElementById('form-test').addEventListener('submit', function(e) {
    e.preventDefault()
    var y2018=[], y2019=[], y2020=[], y2021=[], y2022=[]
    for (var option of filter_opt.options) {
      if (option.selected) {
        if (option.value==1) y2018.push("First Semester")
        if (option.value==2) y2018.push("Second Semester")
        if (option.value==3) y2019.push("First Semester")
        if (option.value==4) y2019.push("Second Semester")
        if (option.value==5) y2020.push("First Semester")
        if (option.value==6) y2020.push("Second Semester")
        if (option.value==7) y2021.push("First Semester")
        if (option.value==8) y2021.push("Second Semester")
        if (option.value==9) y2022.push("First Semester")
        if (option.value==10) y2022.push("Second Semester")
      }
    }
    data['y2018'] = y2018
    data['y2019'] = y2019
    data['y2020'] = y2020
    data['y2021'] = y2021
    data['y2022'] = y2022
    const xhr = new XMLHttpRequest()
    xhr.open('POST', '../php/test.php')
    xhr.setRequestHeader('Content-Type', 'application/json')
    xhr.onload=function() {
        var resp = JSON.parse(xhr.responseText)
        console.log(resp)
    }
    xhr.send(JSON.stringify(data))
    // console.log(y2018 + '|' + y2019 + '|' + y2020 + '|' + y2021 + '|' + y2022)
})



// console.log(arr)
