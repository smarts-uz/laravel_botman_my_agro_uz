var objDiv = document.querySelector(".msger-chat");
objDiv.scrollTop = objDiv.scrollHeight;

function askClose(){
    Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        confirmButtonText: 'Cool'
      })

}
