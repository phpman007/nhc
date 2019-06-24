@extends('frontend.theme.master')

@section('content')
		<!-- Bigbanner -->
 		 @include('frontend.homepage.banner')

          <!-- ประกาศคณะกรรมการสรรหา -->
          @include('frontend.homepage.announcement-commintee')
          
          <!-- สื่อแนะนำการสรรหา -->
          @include('frontend.homepage.recruiting-media')
          
          <!-- ข่าวเด่น / ข่าวจากสื่อ -->
          @include('frontend.homepage.news')
@endsection

@section('css')
@endsection

@section('js')
@endsection