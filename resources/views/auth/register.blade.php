@extends('Master_layout.login_app')

@section('content')

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <h3>Sign Up</h3>
        <p class="hint">
            Enter your personal details below:
        </p>
        <div class="form-group">
            <input id="name" type="text"  placeholder="Name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        </div>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Student id</label>
                <input id=""   type="text" minlength="9" maxlength="9" placeholder="Student id" class="form-control"  @error('student_id') is-invalid @enderror name="student_id" value="{{ old('student_id') }}" required autocomplete="student_id">

                @error('student_id')
                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Phone</label>
                <input id="phone" type="text" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                @error('phone')
                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                @enderror
            </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">password</label>
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        </div>
        <div class="form-group">


            <input id="password-confirm" placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

        </div>
            <div class="form-group">
                <label>Register as :</label>
                <select class="form-control" name="role">
                    <option value="Student">Student</option>
                    <option value="Faculty">Faculty</option>
                </select>
                <label>Personal picture:</label>

                <input type="file"  name="image">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        <div class="form-actions">
            <button type="button" id="register-back-btn" class="btn btn-default">Back</button>
            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>


@endsection
