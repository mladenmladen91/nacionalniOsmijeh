$(document).ready(function(){
   
    
    // loading datatbles for proizvodi
    $('#proizvodi').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      'Export Excel',
                className: 'excelTest',
                titleAttr: 'Excel'
            }
        ]
    } );
    
    
    // loading datatbles for donatori
    $('#donatori').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      'Export Excel',
                className: 'excelTest',
                titleAttr: 'Excel'
            }
        ]
    } );
  
    
});

