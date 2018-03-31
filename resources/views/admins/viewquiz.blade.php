@extends('admin-home')
@section('setup')

<!--********************************************-->
<!-- quiz section -->
<div id="whatcanwedo" class="container ">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="section-box" >
<table class="table">
    
    
    @if($quizzes->count())
    <thead>
      
    @foreach($quizzes as $quiz)
   <tr>
        @if (Auth::guard("admin_user")->user())
        <th>{{$quiz->name}}</th>  
        <th><a class="links-a" href="/admin_home/quiz/{{$quiz->id}}/edit">Edit</a></th> 
        @endif

   </tr>      
     @endforeach 

    </thead>
     @endif
   
  </table>
  <!--next and previous page buttons-->
<ul class="pager">
  <li><a href="{{$quizzes->previousPageUrl()}}">Previous</a></li>
  <li><a href="{{$quizzes->nextPageUrl()}}">Next</a></li>
</ul>

</div>
</div>


</div>
</div>

<!--********************************************-->

<script>
//fade in elements with scrolling
    function hidemeplease(){
        $('.hideme').each( function(i){

            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            /* If the object is completely visible in the window, fade it in */
            if( bottom_of_window > (bottom_of_object) ){

                    $(this).animate({'opacity':'1'},500);

            }

        });
    }

    $(document).ready(function() {
    hidemeplease();

        $(window).scroll( function(){

        hidemeplease()

    });
    $('#menuButton').click(function() {
    $('#navMenu').toggle('slow/400/fast');

    });
});
</script>
@endsection