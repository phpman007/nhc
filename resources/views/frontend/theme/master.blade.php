<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>คณะกรรมการสุขภาพแห่งชาติ</title>
    <meta name="keywords" content="คณะกรรมการสุขภาพแห่งชาติ">
    <meta name="description" content="คณะกรรมการสุขภาพแห่งชาติ">
    <!-- CSS Layout -->
    <link rel="shortcut icon" href="{{asset("frontend/images/favicon.ico")}}" type="image/x-icon">
	  <link rel="icon" href="{{asset("frontend/images/favicon.ico")}}" type="image/x-icon">
    <link href="{{asset("frontend/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/global.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/home.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/insitepage.css")}}" rel="stylesheet">
    <link href="{{asset("css/select2.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/fonts/font.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/responsive.css")}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset("frontend/js/jquery.min.js")}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset("frontend/js/bootstrap.min.js")}}"></script>
    @yield('css')

  </head>
  <body >
    <a href="#" class="cd-top cd-is-visible cd-fade-out">
      <img src="{{asset("frontend/images/top.png")}}" alt="">
    </a>
    @include('frontend.partials.header')
      <div class="popup_topsearch2f">
        <div class="modal fade" id="myModal_topsarch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="">search</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="" placeholder="search">
                      <div class="input-group-addon"><img src="{{asset("frontend/images/search-gray.svg")}}" alt=""></div>
                    </div>
                  </div>
              </div><!--end modal-body-->
            </div>
          </div>
        </div>
      </div><!--end popup_topsearch2f-->

    <article>
      <div id="wrapper2f">
          @yield("content")

      </div><!--end wrapper2f-->
    </article>

          @include('frontend.partials.footer')
  </body>

  <!-- source slick -->
  <link rel="stylesheet" href="{{asset("frontend/source_slickslide/slick.css")}}" media="screen" />
  <script type="text/javascript" src="{{asset("frontend/source_slickslide/slick.js")}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css" integrity="sha256-JHRpjLIhLC03YGajXw6DoTtjpo64HQbY5Zu6+iiwRIc=" crossorigin="anonymous" />
  <!-- source source_bxslider -->
  <link rel="stylesheet" href="{{asset("frontend/source_bxslider/jquery.bxslider.css")}}"/>
  <script type="text/javascript" src="{{asset("frontend/source_bxslider/jquery.bxslider.min.js")}}"></script>
  <!--source play vdo-->
  <script src="{{asset("frontend/source_vdo_plyr/plyr.js")}}"></script>
  <script src="{{asset("frontend/source_vdo_plyr/plyr _demo.js")}}"></script>
  <link rel="stylesheet" href="{{asset("frontend/source_vdo_plyr/plyr.css")}}">
  <script type="text/javascript" src="{{ asset('frontend/js/jquery.datetimepicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-datepicker.th.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/jquery.mask.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/scrollfix.js') }}"></script>
    <link href="{{ asset("frontend/css/jquery.datetimepicker.css") }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js" integrity="sha256-FmcrRIeUicq2hy0eo5tD5h2Iv76IBfc3A51x8r9xeIY=" crossorigin="anonymous"></script>
  @yield('js')
  <script type="text/javascript">
  var date_element;
    $(document).ready(function() {
          $('.select2').select2();
      date_element=  $(".date-picker").datepicker({
            format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',
                thaiyear: true
        });
    });
 </script>

<script>
$(document).ready(function() {
    function toggleNavbarMethod() {
        if ($(window).width() > 991) {
            $('.navbar .dropdown').on('mouseover', function(){
                $('.dropdown-toggle', this).trigger('click');
            }).on('mouseout', function(){
                $('.dropdown-toggle', this).trigger('click').blur();
            });
        }
        else {
            $('.navbar .dropdown').off('mouseover').off('mouseout');
        }
    }
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
});
</script>
  <script>
  function alertConfirmForm(form, message) {
        $(form)[0].submit();
        return false;
        Swal.fire({
          title: 'ระบบแจ้งเตือน',
          text: message,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ตกลง'
    }).then(function(result) {
          if (result.value) {
                $(form)[0].submit();
          }
        })
 }
	 $(document).ready(function(){
                 $("#personalId").mask('0-0000-00000-00-0');
                 // $("#tel").mask('00-000-0000')
                 // $("#mobile").mask('0000000000');
                 $("#date-birdth").mask('00/00/0000');
                 $("[name='ngoZipCode']").mask('00000');
                 $("[name='zipCode']").mask('00000');

      $(".confirmed-alert").on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: 'ระบบแจ้งเตือน',
            text: "ระบบจะไม่ทำการบันทึกข้อมูลและจะกลับไปยังหน้าแรก",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง'
	}).then(function (result) {
            if (result.value) {
                  location.href = url;
            }
          })
      });

     @if($errors->has('error'))
      Swal.fire({
        type: 'error',
        title: 'ลงทะเบียน',
        text: '{!! $errors->first('error') !!}',
        confirmButtonText: 'ปิด',
        footer: '<a href="{{ url('/') }}">กลับหน้าแรก</a>'
      })
      @endif


      @if(session('info'))
      Swal.fire({
         type: 'info',
         title: 'แจ้งเตือน',
         html: '{!! Session::get('info') !!}',
         confirmButtonText: 'ปิด'
         // ,footer: '<a href="{{ url('/') }}">กลับหน้าแรก</a>'
      })
      @endif
     $('.bigbanner').slick({
        dots: true,
	  autoplay : true,
  		autoplaySpeed: 7000,
     });

     // browser window scroll (in pixels) after which the "back to top" link is shown
     var offset = 300,
      //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
      offset_opacity = 1200,
      //duration of the top scrolling animation (in ms)
      scroll_top_duration = 700,
      //grab the "back to top" link
      $back_to_top = $('.cd-top');

     $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
          $back_to_top.addClass('cd-fade-out');
        }
      });

      //smooth scroll to top
      $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
          scrollTop: 0 ,
          }, scroll_top_duration
        );
      });

      // js scroll button submit
     // $('.btn-center2f').scrollFix({
     //      side: 'bottom'
     //  });


    });


  </script>
  <script>
  $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()
  });
  $.ajaxSetup({
  async: false
  });
   $(window).on("scroll", function() {
         if($(window).scrollTop() > 100) {
             $("header").addClass("topfixed");
         } else {
             $("header").removeClass("topfixed");
         }
     });
 </script>
</html>
