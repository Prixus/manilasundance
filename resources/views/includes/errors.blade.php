@if(count($errors) > 0 )
  @foreach($errors->all() as $error)
  <script>
      toastr.warning("{{$error}}",'Error',{timeOut:5000});
  </script>
  @endforeach
@endif
