@if (session('success'))
<div class="alert alert-success col-lg-12 col-md-12 col-sm-12">
    {{ session('success') }}
</div>
@elseif (session('error'))
<div class="alert alert-danger col-lg-12 col-md-12 col-sm-12">
    {{ session('error') }}
</div>
@elseif (session('warring'))
<div class="alert alert-warning col-lg-12 col-md-12 col-sm-12">
    {{ session('warring') }}
</div>
@endif
