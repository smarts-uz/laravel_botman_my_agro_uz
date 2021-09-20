var objDiv = document.querySelector(".msger-chat");
objDiv.scrollTop = objDiv.scrollHeight;
$(document).ready(function () {

    $("input[type='radio']").click(function () {
        var sim = $("input[type='radio']:checked").val();
        //alert(sim);
        if (sim < 3) {
            $('.myratings').css('color', 'red');
            $(".myratings").text(sim);
        } else {
            $('.myratings').css('color', 'green');
            $(".myratings").text(sim);
        }
    });
});

function askClose() {
    Swal.fire({
        title: 'Do you want to close the ?',
        icon: 'question',
        showCancelButton: true,
        denyButtonText: 'Yes',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Rate()
        }
    })

}

function Rate() {
    Swal.fire({
        title: '<strong>Expertni baholang</strong>',
        icon: 'info',
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="rate"><input type="radio" id="star1" name="rate" value="1" /> <label for="star1" title="text">1 star</label><input type="radio" id="star2" name="rate" value="2" /> <label for="star2" title="text">2 stars</label> <input type="radio" id="star3" name="rate" value="3" /> <label for="star3" title="text">3 stars</label>  <input type="radio" id="star4" name="rate" value="4" /> <label for="star4" title="text">4 stars</label> <input type="radio" id="star5" name="rate" value="5" /> <label for="star5" title="text">5 stars</label></i>',
        confirmButtonAriaLabel: 'Thumbs up, great!'
        
      })
}
