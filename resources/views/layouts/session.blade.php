
@if (\Session::has('success'))
<div class="row">
    <div class="col-md-6 offset-2">
<div class="alert alert-success alert-dismissible fade show">
    {!! \Session::get('success') !!}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
</button>

</div>
</div>
</div>
@endif

@if (\Session::has('warning'))
<div class="row">
    <div class="col-md-6 offset-2">
<div class="alert alert-warning alert-dismissible fade show">
{!! \Session::get('warning') !!}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
</button>

</div>
</div>
</div>
@endif

@if ($errors->any())
<div class="row">
    <div class="col-md-6 offset-2">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
</div>
</div>
@endif