<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModal">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register.custom') }}" id="registerForm">
                    @csrf

                    <input name="register" type="hidden" value="1">

                    <div class="form-group row">
                        <label for="nameInput" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="nameInput" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailInput" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailInput" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phoneInput" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            <input id="phoneInput" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="passwordInput" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="passwordInput" type="password" class="form-control" name="password" required autocomplete="new-password">

                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (count($errors) > 0 && old('register') )
<script type="text/javascript">
    $( document ).ready(function() {
         $('#registerModal').modal('show');
    });
</script>
@endif