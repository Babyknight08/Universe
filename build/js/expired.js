load_projects()

function load_projects() {
    dtable = $('#expired-pto').DataTable({
      "destroy" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "order" : [[4, 'desc']],
      "ajax" : 
      {
          url : "../../build/php/loadexpired.php",
          method : "POST",
          data: {
              'type' : 'pto'
          }
      }
    });

    dtb = $('#expired-wwdp').DataTable({
        "destroy" : true,
        "paging" : true,
        "lengthChange" : true,
        "searching" : true,
        "ordering" : true,
        "info" : true,
        "autoWidth" : true,
        "responsive" : true,
        "order" : [[4, 'desc']],
        "ajax" : 
        {
            url : "../../build/php/loadexpired.php",
            method : "POST",
            data : {
                'type' : 'wwdp'
            }
        }
    })

    dtb2 = $('#expired-pco').DataTable({
        "destroy" : true,
        "paging" : true,
        "lengthChange" : true,
        "searching" : true,
        "ordering" : true,
        "info" : true,
        "autoWidth" : true,
        "responsive" : true,
        "order" : [[4, 'desc']],
        "ajax" : 
        {
            url : "../../build/php/loadexpired.php",
            method : "POST",
            data : {
                'type' : 'pco'
            }
        }
    })

    dtb3 = $('#expired-ods').DataTable({
        "destroy" : true,
        "paging" : true,
        "lengthChange" : true,
        "searching" : true,
        "ordering" : true,
        "info" : true,
        "autoWidth" : true,
        "responsive" : true,
        "order" : [[4, 'desc']],
        "ajax" : 
        {
            url : "../../build/php/loadexpired.php",
            method : "POST",
            data : {
                'type' : 'ods'
            }
        }        
    })

    dtb4 = $('#expired-ptt').DataTable({
        "destroy" : true,
        "paging" : true,
        "lengthChange" : true,
        "searching" : true,
        "ordering" : true,
        "info" : true,
        "autoWidth" : true,
        "responsive" : true,
        "order" : [[4, 'desc']],
        "ajax" : 
        {
            url : "../../build/php/loadexpired.php",
            method : "POST",
            data : {
                'type' : 'ptt'
            }
        }        
    })
}