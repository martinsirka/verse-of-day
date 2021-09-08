@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li class="text-danger my-1">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif