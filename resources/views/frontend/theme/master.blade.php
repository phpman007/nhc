<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>สำนักงานคณะกรรมการสุขภาพแห่งชาติ</title>

    <!-- CSS Layout -->
    <link rel="shortcut icon" href="{{asset("frontend/images/favicon.ico")}}" type="image/x-icon">
	  <link rel="icon" href="{{asset("frontend/images/favicon.ico")}}" type="image/x-icon">
    <link href="{{asset("frontend/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/global.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/css/home.css")}}" rel="stylesheet">
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
    <style media="screen">
    .box-step-progress2f ul li {
          width: 14%;
          float: left;
   }
   .fourstep .box-step-progress2f ul li {
     width: 20%;
 }
 .sixstep .box-step-progress2f ul li {
    width: 16%;
    float: left;
}
   .line-progress2f{
         left: 10%;
   }
   .bold {
         font-weight: bold;
   }
    .select2-container--default .select2-selection--single{
          height:40px;
          padding-top: 6px;
          font-size:25px;
          border-radius: 12px;
          border:1px solid #CDD4D6;
   }
          .swal2-popup{
                font-size: 2rem !important;
          }
          .swal2-styled.swal2-confirm {
                background-color: #51AAAA !important;
          }
          .input2f small, .box-checkbox2f small, .input-group small, .box-input2f small {
                color: red;
            }
            .box-checkbox2f small {
                  padding-left: 37px;
            }
            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
                  background-color: #f1f1f1;
            }
            .form-control[readonly][name="dateOfBirth"],
            .form-control[readonly][name="startDate"],
            .form-control[readonly][name="endDate"],
            .form-control[readonly][name="provinceName"],
            .form-control[readonly][name="ngoStartDate"],
            .form-control[readonly][name="districtName"],
            .form-control[readonly][name="subDistrictName"]
            {
                  background-color: #ffffff;
            }
    </style>
  </head>
  <body data-plyr="{{ asset('frontend/source_vdo_plyr/dist/demo.svg') }}">
    <a href="#" class="cd-top cd-is-visible cd-fade-out">
      <img src="{{asset("frontend/images/top.svg")}}" alt="">
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
  <link rel="stylesheet" href="{{asset("frontend/source_vdo_plyr/plyr.css")}}">
  <script type="text/javascript" src="{{ asset('frontend/js/jquery.datetimepicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-datepicker.th.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/jquery.mask.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
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
        }).then((result) => {
          if (result.value) {
                $(form)[0].submit();
          }
        })
 }
	 $(document).ready(function(){
                 $("#personalId").mask('0-0000-00000-00-0');
                 $("#tel").mask('00-000-0000')
                 $("#mobile").mask('00-0000-0000');
                 $("#date-birdth").mask('00/00/0000');


     @if($errors->has('error'))
      Swal.fire({
        type: 'error',
        title: 'ลงทะเบียน',
        text: '{!! $errors->first('error') !!}',
        confirmButtonText: 'ปิด',
        footer: '<a href="{{ url('/') }}">กลับหน้าแรก</a>'
      })
      @endif

      @if(session('success'))
      Swal.fire({
         type: 'success',
         title: 'ลงทะเบียน',
         text: 'ลงทะเบียนเรียบร้อยแล้วระบบจะส่งยืนยันไปทาง Email ภายใน 1 ชั่วโมง',
         confirmButtonText: 'ปิด',
         footer: '<a href="{{ url('/') }}">กลับหน้าแรก</a>'
      })
      @endif
      @if(session('info'))
      Swal.fire({
         type: 'success',
         title: 'ลงทะเบียน',
         text: '{{ Session::get('info') }}',
         confirmButtonText: 'ปิด',
         footer: '<a href="{{ url('/') }}">กลับหน้าแรก</a>'
      })
      @endif
     $('.bigbanner').slick({
        dots: true
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
     /*  placeholder for IE 8 & IE 9  */
		 // $('[placeholder]').focus(function() {
			//   var input = $(this);
			//   if (input.val() == input.attr('placeholder')) {
			// 	  input.val('');
			// 	   input.removeClass('placeholder');
			//   }
			// }).blur(function() {
			//    var input = $(this);
			//    if (input.val() == '' || input.val() == input.attr('placeholder')) {
			// 	input.addClass('placeholder');
			// 	input.val(input.attr('placeholder'));
			//    }
			// }).blur();
             //
			// $('[placeholder]').parents('form').submit(function() {
			//   $(this).find('[placeholder]').each(function() {
			//   var input = $(this);
			//   if (input.val() == input.attr('placeholder')) {
			// 	input.val('');
			//   }
			// })
			// });
      /* end  placeholder for IE 8 & IE 9  */

      $('.submenu_level03').slideUp('slow');
      $('.submenu_level03').hide();
      $('.submenu_level02 > li > span').click(function () {
          // .parent() selects the A tag, .next() selects the P tag
          $(this).next().slideToggle('slow');
    			$(this).parent().siblings().removeClass('open');
    			$(this).parent().toggleClass('open');
      });
      $('.submenu_level03').slideUp('slow');

    });
    $(document).on('click', '.dropdown-menu', function (e) {
        e.stopPropagation();
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
