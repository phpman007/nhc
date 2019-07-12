<script>
   $(window).on("scroll", function() {
         if($(window).scrollTop() > 300) {
             $("header").addClass("topfixed");
         } else {
             $("header").removeClass("topfixed");
         }
          let contentForm2f = document.querySelector(".content-form2f")
          let percentActive = (contentForm2f.offsetHeight * 6.5) / 100
          let bottom = $('.set-form2f').position().top + $('.set-form2f').outerHeight(true)
          
     });
   jQuery(document).ready(function($) {
     $('.active .box-step2f').on('click', function(event) {
       event.preventDefault();
       if (typeof($(this).data('url')) != "undefined")
          location.href = $(this).data('url')
     });
   });
  </script>