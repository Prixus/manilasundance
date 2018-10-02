@if(count($errors) > 0 )
  @foreach($errors->all() as $error)
  <script>
      toastr.warning("{{$error}}",'Error',{timeOut:5000});
  </script>
  @endforeach
@endif

@if(session('status'))
<script>
    toastr.warning("{{session('status')}}",'Error',{timeOut:5000});
</script>
@endif

@if(session('good'))
<script>
    toastr.success("{{session('good')}}",'Error',{timeOut:5000});
</script>
@endif
