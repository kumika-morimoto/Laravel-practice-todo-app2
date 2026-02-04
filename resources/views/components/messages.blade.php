@if(session('success'))
<p class="massage-success">{{session('success')}}</p>
@endif
@if(session('comment'))
<p class="massage-comment">{{session('comment')}}</p>
@endif 

@if(session('error'))
<p class="massage-error">{{session('error')}}</p>
@endif

@if($errors->any())
<ul class="error-list">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif