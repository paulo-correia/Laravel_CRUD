function apagar(id){
  $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "SIM": function() {
          $( this ).dialog( "close" );
          $("#"+id).attr('onsubmit', '');
          $("#"+id).submit();
        },
        'NÃO': function() {
          $( this ).dialog( "close" );
          return false;
        }
      }
    });
}
