@extends('layouts.app')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script>
    function getMessage(deger) {
        $.ajax({
            type:'POST',
            url:'/getarticle',
            data:{id : deger, '_token': "{{ csrf_token() }}"},
            success:function(data) {
                $("#msg").html(data.msg);
            }
        });
    }
</script>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Homepage') }}
                    <select name="language" onchange="getMessage(this.value)">
                        <option value="">Dil Seçiniz</option>
                        @foreach($lang as $l)
                            <option value="{{ $l->id }}">{{$l->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="msg">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
