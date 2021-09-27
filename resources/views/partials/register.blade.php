<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModal">{{ __('messages.register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register.custom') }}" id="registerForm">
                    @csrf

                    <input name="register" type="hidden" value="1">

                    <div class="form-group row">
                        <label for="nameInput" class="col-md-4 col-form-label text-md-right">{{ __('messages.name') }}</label>

                        <div class="col-md-6">
                            <input id="nameInput" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailInput" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <div class="col-md-6">
                            <input id="emailInput" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phoneInput" class="col-md-4 col-form-label text-md-right">{{ __('messages.phone') }}</label>

                        <div class="col-md-6">
                            <input id="phoneInput" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('messages.nationality') }}</label>

                        <div class="col-md-6">
                            <input id="nationality" type="text" class="form-control" name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality">

                            @if ($errors->has('nationality'))
                            <span class="text-danger">{{ $errors->first('nationality') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('messages.city') }}</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city">

                            @if ($errors->has('city'))
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('messages.passport') }}</label>

                        <div class="col-md-6">
                            <input id="passport" type="text" class="form-control" name="passport" value="{{ old('passport') }}" required autocomplete="passport">

                            @if ($errors->has('passport'))
                            <span class="text-danger">{{ $errors->first('passport') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ID" class="col-md-4 col-form-label text-md-right">{{ __('messages.id') }}</label>

                        <div class="col-md-6">
                            <input id="ID" type="text" class="form-control" name="ID" value="{{ old('ID') }}" required autocomplete="ID">

                            @if ($errors->has('ID'))
                            <span class="text-danger">{{ $errors->first('ID') }}</span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('messages.birth') }}</label>

                        <div class="col-md-6">
                            <input id="birth" type="text" class="form-control checkin_date" placeholder="MM/DD/YYYY" name="birth" value="{{ old('birth') }}" required autocomplete="birth">

                            @if ($errors->has('birth'))
                            <span class="text-danger">{{ $errors->first('ID') }}</span>
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
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.confirm') }} Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('messages.register') }}
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