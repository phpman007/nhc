<script>
   $(window).on("scroll", function() {
         if($(window).scrollTop() > 300) {
             $("header").addClass("topfixed");
             // $(".content-form2f").addClass("btnfixed");
         } else {
             $("header").removeClass("topfixed");
             // $(".content-form2f").removeClass("btnfixed");
         }
          let contentForm2f = document.querySelector(".content-form2f")
          let percentActive = (contentForm2f.offsetHeight * 6.5) / 100
          let bottom = $('.set-form2f').position().top + $('.set-form2f').outerHeight(true)
          

          // console.log()
          // console.log('condition', $(window).scrollTop() > (contentForm2f.offsetHeight - percentActive))
           if ($(window).scrollTop() > (bottom - 270)) {
             // $(".content-form2f").addClass("btnfixed");
             $(".content-form2f").removeClass("btnfixed");
         } else {
             // $(".content-form2f").removeClass("btnfixed");
             $(".content-form2f").addClass("btnfixed");
         }
     });
   jQuery(document).ready(function($) {
     $('.active .box-step2f').on('click', function(event) {
       event.preventDefault();
       console.log(this);
       location.href = $(this).data('url')
     });
   });
  </script>