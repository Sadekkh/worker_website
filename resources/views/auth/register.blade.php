@extends('layouts.main')

@section('content')
    <style>
        .radiobox {
            display: none;
        }
    </style>
    <div class="container">
        <center>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">تسجيل جديد</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">الإم واللقب</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">رقم بطاقة
                                        التعريف</label>

                                    <div class="col-md-6">
                                        <input id="cin" type="number" class="form-control " name="cin" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">رقم الهاتف</label>

                                    <div class="col-md-6">
                                        <input type="number" class="form-control " name="mnumber" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end">الموقع</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control " name="location" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end"></label>

                                    <div class="col-md-6">
                                        <select id="dropdown" name="type">

                                            <option disable select>نوع المستخدم</option>
                                            <option value="1">فلاح</option>
                                            <option value="2">عامل</option>
                                            <option value="3">ناقل</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end"></label>

                                    <div class="col-md-6">

                                        <select id="worker" class="radiobox" name="insurance">
                                            <option disable select>هل تريد التسجيل في منظومة التأمين </option>

                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="" class="col-md-4 col-form-label text-md-end"></label>
                                        <select id="workerin" class="radiobox" name="insur_type">

                                            <option disable select>إختر الصندوق المناسب</option>

                                            <option value="1">cnss</option>
                                            <option value="2">لcnrps</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-form-label text-md-end"></label>

                                    <div class="col-md-6">
                                        <div id="transporterv" class="radiobox">
                                            <label for="transp_mat" value="الرقم المنجمي للسيارة" />الرقم المنجمي
                                            <input id="transp_mat" type="text" name="transp_mat" />
                                            <label for="transp_place" value="سعة السيارة" />سعة السيارة
                                            <input id="transp_place" type="number" name="transp_place" />
                                        </div>

                                    </div>
                                </div>



                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $("#dropdown").change(function() {
            var value = $(this).children("option:selected").val();
            $(".radiobox").hide();

            if (value == 2) {
                $("#worker").show();
                $("#transporterv").hide();

            } else if (value == 3) {
                $("#transporterv").show();
                $("#worker").hide();

            }
        });
        $("#worker").change(function() {
            var value = $(this).children("option:selected").val();
            $(".radioBox").hide();

            if (value == 1)
                $("#workerin").show();


        });
    </script>
@endsection
