<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

    <!-- all CSS link is here -->
    
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body>

        @include('layout.header')
        <main>
        @yield('content')
        </main>

        @include('layout.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/app.js')}}"></script>

 
<script>
Echo.channel('post.created')
    .listen('PostCreated', (e) => {
     alert( e.post.title + 'has been just published');
         
});
</script>


  @if(Session::has('messege'))
  <script>
  var type= "{{Session::get('alert-type','info')}}";
  switch(type){
    case 'info':
    toastr.info("{{ Session::get('messege')}}");
    break;
    case 'success':
    toastr.success("{{ Session::get('messege')}}");
    break;
    case 'warning':
    toastr.warning("{{ Session::get('messege')}}");
    break;
    case 'error':
    toastr.error("{{ Session::get('messege')}}");
    break;
  }
  </script>
  @endif

  <script>
 $(document).on("click","#delete",function(e){
  e.preventDefault();
  var link= $(this).attr("href");
  swal({
      title: 'are you want to delete?',
      text: "you won't be able to revert this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if(willDelete){
        window.location.href =link;
      }else{
        sawl("safe data!");
      }
    });
 }); 
</script>
  

</body>

</html>
