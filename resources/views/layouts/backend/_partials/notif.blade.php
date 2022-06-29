@if (session('status'))
<div class="alert alert-primary background-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="icofont icofont-close-line-circled text-white"></i>
    </button>
    <strong>{{ session('status') }}</strong>
</div>
@endif
@if (session('error'))
    <div class="alert alert-danger background-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icofont icofont-close-line-circled text-white"></i>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
