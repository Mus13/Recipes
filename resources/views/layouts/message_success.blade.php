@if (!session()->get('success_message_displayed'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ __('Logged in!') }}</strong> {{ Auth::user()->name.  __(' you have logged in succesfully!') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
{{session()->put('success_message_displayed',true)}}
@endif