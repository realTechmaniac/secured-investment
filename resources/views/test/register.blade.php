@extends('test.layouts.app')



@section('content')
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First name</label>
                <input type="text" class="form-input" name="first_name" id="first_name" />
            </div>
            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" class="form-input" name="last_name" id="last_name" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group form-icon">
                <label for="username">Username</label>
                <input type="text" class="form-input" name="username" id="username" placeholder="" />
            </div>
            <div class="form-radio">
                <label for="gender">Gender</label>
                <div class="form-flex">
                    <input type="radio" name="gender" value="male" id="male" checked="checked" />
                    <label for="male">Male</label>

                    <input type="radio" name="gender" value="female" id="female" />
                    <label for="female">Female</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone number</label>
            <input type="number" class="form-input" name="phone_number" id="phone_number" />
        </div>
        <div class="form-row>
            <div class="form-group col-sm-12">
                <label for="password">Password</label>
                <input type="password" class="form-input" name="password" id="password"/>
            </div>
            <div class="form-group">
                <label for="re_password">confirm  password </label>
                <input type="password" class="form-input" name="re_password" id="re_password"/>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit" class="form-submit" value="Proceed"/>
            </div>
        </div>
@endsection