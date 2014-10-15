$(".show-modal-confirm").click(function(){
        $('#myModal').modal();
        url= $(this).attr('data-url');
        $("#delete_ref").attr('href', url);
  });