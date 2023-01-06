//INITIALIZE TOAST NOTIFICATION PLUGIN
var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  })
var year1_select = document.getElementById('year1-select')
var year2_select = document.getElementById('year2-select')
var permits_chart = document.getElementById('permits-chart').getContext('2d')
var form_dashbaord = document.getElementById('form-dashboard')
var permits_select = document.getElementById('permits-select')
var form_subtypes = document.getElementById('form-subtypes')
var category_select = document.getElementById('categories-select')
var all_check = document.getElementById('all-check')
var button_summary = document.getElementById('button-summary')
var options = []
//load years
for(var i=0; i<43; i++){
    if(i==0){
        options[i] = document.createElement('option')
        options[i].value = 1980
        options[i].text = 'Select All'
        options[i].selected = true
        year1_select.add(options[i])
    }else{
        options[i] = document.createElement('option')
        options[i].value = 2022-i
        options[i].text = 2022-i
        year1_select.add(options[i])
    } 
    if(i==0){
        options[i] = document.createElement('option')
        options[i].value = 2021
        options[i].text = 'Select All'
        options[i].selected = true
        year2_select.add(options[i])
    }else{
        options[i] = document.createElement('option')
        options[i].value = 2022-i
        options[i].text = 2022-i
        year2_select.add(options[i])
    }    
}

form_dashbaord.addEventListener('submit', function(event) {
    event.preventDefault()
    event.stopPropagation()
    if(year1_select.value != 'All' && year2_select.value != 'All'){
        if(year1_select.value > year2_select.value){
            Toast.fire({
                icon: 'error',
                title: ' Value for 1st parameter is greater than 2nd parameter'
            })
            return false
        }
    }
    //SET DATA PARAMETER
    var data = {
        'datefrom' : year1_select.value,
        'dateto' : year2_select.value,
        'permit' : permits_select.value
    }
    //CREATE AN XMLHTTPREQUEST
    var xhr = new XMLHttpRequest()
    xhr.open('POST', 'build/php/dashboard_ajax.php')
    xhr.setRequestHeader('Content-Type', 'application/json')
    xhr.onload = function() {
        var response = JSON.parse(xhr.responseText)
        var chartLabels = Object.keys(response)
        var chartData = Object.values(response)
        //GENERATE LINE CHART
        lineChart.destroy()
        lineChart = new Chart(permits_chart, {
            type: 'line',
            data:{
                labels: chartLabels,
                datasets: [{
                    label: permits_select.options[permits_select.selectedIndex].text,
                    data: chartData,
                    backgroundColor: 'rgba(0, 128, 128, 0.8)',
                    pointRadius: 5,
                    fill: false,
                    borderColor: 'rgba(0, 128, 128, 0.8)'
                }]
            },
            options: {
                title:{
                    display: true,
                    text: permits_select.options[permits_select.selectedIndex].text + ' Issued by Year',
                    fontSize: 15
                },
                legend:{
                    display: false
                },
                scales:{
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            grace: '5%'
                        }
                    }]
                }
            }
        })
    }
    xhr.send(JSON.stringify(data))
})

//load Specific Subtypes
//var firstVal = ''
var options = []
var data = {
    'message' : 'pssubtype'
}
var request = new XMLHttpRequest()
request.open('POST', 'build/php/arrays.php')
request.setRequestHeader('Content-Type', 'application/json')
request.onload = function() {
    var response = JSON.parse(request.responseText)
    // var defaultOpt = document.createElement('option')
    // defaultOpt.value = 'All'
    // defaultOpt.text = 'Select All'
    // defaultOpt.selected = true
    // category_select.add(defaultOpt)
    //obj_ptype = response
    for(var i=0; i<response[0].length; i++){
        options[i] = document.createElement('option')
        options[i].value = i
        options[i].text = response[0][i]
        category_select.add(options[i])
    }
}
request.send(JSON.stringify(data))

//initialize chart

lineChart = new Chart(permits_chart, {
    type: 'line'
})

  //LOAD PROJECTS TABLE
  $(function() {
    load_summary()
  })
  //LOAD PROJECTS TABLE FUNCTION (REUSABLE)
  function load_summary() {
    var allRec = []
    for (var x=0;x<=120;x++){
        allRec.push(x)
    }
    var filter_data = {
        'selected_categories' : allRec
    }
    // console.log(filter_data)
    dtable = $('#summary-table').DataTable({
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            var intVal = function(i){
                return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*i :
                typeof i === 'number' ?
                i : 0;
            };

            $( api.column(0).footer() ).html('TOTAL: ');
            var number_of_columns = 38
            var colTotal = []
            for(var x=1; x<=number_of_columns; x++){
                colTotal[x] = api
                .column(x)
                .data()
                .reduce(function(a,b) {
                    return intVal(a) + intVal(b);
                }, 0);
            
                $( api.column(x).footer() ).html(colTotal[x]);
            }
        },
        "destroy" : true,
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax" : 
        {
            url : "build/php/loadsummary_ajax.php",
            method : "POST",
            data : filter_data
        }
    });
  }
  var selected_categories = []
  form_subtypes.addEventListener('submit', function(event) {
      event.preventDefault()
      event.stopPropagation()
      selected_categories = []
      if(all_check.checked == true) {
        for(var i=0;i<=120;i++){
            selected_categories.push(i)
        }
      }else{
        for (var option of category_select.options) {
            if (option.selected) {
                selected_categories.push(option.value)
            }
        }
      }

      var filter_data = {
          'selected_categories' : selected_categories
      }
      dtable.destroy()
      dtable = $('#summary-table').DataTable({
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            var intVal = function(i){
                return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*i :
                typeof i === 'number' ?
                i : 0;
            };

            $( api.column(0).footer() ).html('TOTAL: ');

            var colTotal = []
            for(var x=1; x<=27; x++){
                colTotal[x] = api
                .column(x)
                .data()
                .reduce(function(a,b) {
                    return intVal(a) + intVal(b);
                }, 0);
            
                $( api.column(x).footer() ).html(colTotal[x]);
            }
        },
        "destroy" : true,
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax" : 
        {
            url : "build/php/loadsummary_ajax.php",
            method : "POST",
            data: filter_data
        }
      });
      console.log(selected_categories)
  })

  all_check.onchange = function() {
      if(all_check.checked == true){
          category_select.disabled = true
          category_select.required = false
      }else{
          category_select.disabled = false
          category_select.required = true
      }
  }

  //===================GENERATE SUMMARY REPORT
  button_summary.onclick=function() {
    if(selected_categories.length === 0){
        Toast.fire({
            icon: 'error',
            title: 'Filter data first'
        })
        return false
    }
    //================IF FILTERED DATA AVAILABLE, THEN PROCEED WITH AJAX REQUEST
    var filter_data = {
        'selected_categories' : selected_categories
    }
    var xhr = new XMLHttpRequest()
    xhr.open('POST', 'build/php/summary_export.php')
    xhr.setRequestHeader('Content-Type', 'application/json')
    xhr.onload = function() {
        var resp = JSON.parse(xhr.responseText)
        window.open(`${resp.file}`, '_blank')
    }
    xhr.send(JSON.stringify(filter_data))
  }

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
      xhr.open('POST', 'build/php/updatepass.php')
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

