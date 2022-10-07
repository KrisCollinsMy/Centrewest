document.querySelectorAll('a[href^="#"]').forEach(anchor => {
   anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
         behavior: 'smooth'
      });
   });
});


window.onscroll = function () {
   scrollFunction()
};

function scrollFunction() {
   if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      document.getElementById("navbar").style.padding = "0px 0";
      document.getElementById("navbar").style.backgroundColor = "#ededed";
   } else {
      document.getElementById("navbar").style.padding = "5px 0";
      document.getElementById("navbar").style.backgroundColor = "#ededed";
   }
}

// on preview show iframe
$('#myModalPrev').on('show.bs.modal', function (e) {
   var idVideo = $(e.relatedTarget).data('id');
   $('#myModalPrev .modal-body').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' + idVideo + '?autoplay=false" frameborder="0" allowfullscreen></iframe>');
});
//on close remove
$('#myModalPrev').on('hidden.bs.modal', function () {
   $('#myModalPrev .modal-body').empty();
});

$('.owl-carousel').owlCarousel({
   loop: true,
   margin: 10,
   nav: true,
   navText: ["<img src='assets/left-arrow.png'>", "<img src='assets/right-arrow.png'>"],
   responsive: {
      0: {
         items: 1
      },
      600: {
         items: 1
      },
      1000: {
         items: 1
      }
   }
});


$('input').click(function () {
   $(this).prev('label').addClass('focused');
   $(this).prev('label').css({
      "font-size": "11px",
      "color": "#4a4a4a"
   });
});

$('input').blur(function () {
   var inputValue = $(this).val();
   if (inputValue == "") {
      $(this).prev('label').removeClass('focused');
      $(this).prev('label').css({
         "font-size": "1.2em",
         "color": "#000"
      });
   } else {
      $(this).addClass('filled');
   }
});