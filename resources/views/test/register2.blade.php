@extends('test.layouts.app')

@section('content')
     <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    
                    <h2 class="title">User Registration Form</h2>

                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Account Name</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Account No</label>
                                    <input class="input--style-4" type="number" name="last_name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Bank Name</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                             <div class="col-2">
                                <div class="input-group ">
                                    <label class="label">Account Type</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Savings
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Current
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-t-5">Fixed
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center p-t-15">
                            <button class="btn btn--radius-2 btn--blue justify-content-center" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection