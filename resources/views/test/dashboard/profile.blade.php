@extends('test.layouts.dashboardApp')



@section('content')

	<div class="main-content">
		
		<div class="page-content">

			<div class="cotainer-fluid">

				<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">User Profile</h4>
                                <p class="card-title-desc">The user information displayed are as filled in the registration form and the Bank Information section is not editable</p>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                      
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Profile</span>    
                                        </a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Settings</span>    
                                        </a>
                                    </li>
                                </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane" id="home" role="tabpanel">
                        	<p class="mb-0 mt-4">
                               <img class="img-thumbnail rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-3.jpg" data-holder-rendered="true">
                            </p>
                        </div>
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <p class="mb-0 mt-4">
                               
                                <div class="row">
			                            <div class="col-lg-12">
			                                <div class="card">
			                                    <div class="card-body">
			                                     <h4 class="card-title">Personal Information</h4>
			                                      
			                                        <div class="table-responsive">
			                                            <table class="table mb-0">
			                                               
			                                                <tbody>

			                                                	<tr>
			                                                        <th scope="row">Username</th>
			                                                        <td>Samuel001</td>
			                                                    </tr>

			                                                    <tr>
			                                                        <th scope="row">First Name</th>
			                                                        <td>Samuel</td>
			                                                    </tr>
			                                                    <tr>
			                                                        <th scope="row">Last Name</th>
			                                                        <td>Adedokun</td>
			                                                        
			                                                    </tr>
			                                                    <tr>
			                                                        <th scope="row">Gender</th>
			                                                        <td>Male</td>
			                                                       
			                                                    </tr>
			                                                    <tr>
			                                                        <th scope="row">Email</th>
			                                                        <td>sammy@gmail.com</td>
			                                                       
			                                                    </tr>
			                                                    <tr>
			                                                        <th scope="row">Phone Number</th>
			                                                        <td>09066773329</td>
			                                                    </tr>
			                                                    <tr>
			                                                        <th scope="row">Password</th>
			                                                        <td>Rammy02</td>
			                                                       
			                                                    </tr>

			                                                    <tr>
			                                                        <th scope="row">Account Name</th>
			                                                        <td>Samuel Ade</td>
			                                                    </tr>
			                                                    <tr>
			                                                        <th scope="row">Account Type</th>
			                                                        <td>Savings</td>
			                                                        
			                                                    </tr>
			                                                    <tr>
			                                                        <th scope="row">Account No</th>
			                                                        <td>2090553309</td>
			                                                       
			                                                    </tr>
			                                                </tbody>
			                                            </table>
			                                        </div>
			        
			                                    </div>
			                                </div>
			                            </div>
                        			</div>

                             </p>
                      	</div>
                                  
                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <p class="mb-0">
                                        	<div class="text-center">
                                        		<h2 class="card-title">Update Profile Information</h2>
                                        	</div>
                                            <div class="col-lg-12">
                                            <div class="row">
		                            <div class="col-12">
		                                <div class="card">
		                                    <div class="card-body">
		        
		                                        <h4 class="card-title">Profile Settings</h4>
		                                        <p class="card-title-desc">User Personal Information</p>
		        
		                                        <div class="form-group row">
		                                            <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="text" value="Artisan001" id="example-text-input" >
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-search-input" class="col-md-2 col-form-label">First Name</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="text" value="Ayomide" id="example-search-input">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-email-input" class="col-md-2 col-form-label">Last Name</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="text" value="Adedokun" id="example-email-input">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-url-input" class="col-md-2 col-form-label">Gender</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="text" value="Male" id="example-url-input">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-tel-input" class="col-md-2 col-form-label">Email</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="email" value="ayo@gmail.com" id="example-tel-input">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-tel-input" class="col-md-2 col-form-label">Phone Number</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="tel" value="08066490082" id="example-tel-input">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="password" value="hunter2" id="example-password-input">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-password-input" class="col-md-2 col-form-label">Confirm Password</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="password" value="hunter2" id="example-password-input">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-password-input" class="col-md-2 col-form-label">Choose Profile Pic</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="file" value="hunter2" id="example-password-input">
		                                            </div>
		                                        </div>
		                                       	
		                                       <div class="text-center mt-5">
		                                       		<button class="btn btn-primary">Update Info</button>
		                                       </div>
		                                </div>
		                            </div> <!-- end col -->

		                            <div class="col-12">
		                                <div class="card">
		                                    <div class="card-body">
		        
		                                        <p class="card-title-desc">Bank Information</p>
		        
		                                        <div class="form-group row">
		                                            <label for="example-text-input" class="col-md-2 col-form-label">Account Name</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="text" value="Adewale Adedokun" id="example-text-input" disabled="" >
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-search-input" class="col-md-2 col-form-label">Account No</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="Number" value="2090123343" id="example-search-input" disabled="">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-email-input" class="col-md-2 col-form-label">Bank Name</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="text" value="UBA" id="example-email-input" disabled="">
		                                            </div>
		                                        </div>
		                                        <div class="form-group row">
		                                            <label for="example-url-input" class="col-md-2 col-form-label">Account Type</label>
		                                            <div class="col-md-10">
		                                                <input class="form-control" type="text" value="Savings" id="example-url-input" disabled="">
		                                            </div>
		                                        </div>
		                                        
		                                </div>
		                            </div> <!-- end col -->
                        		</div>
                        <!-- end row -->
                                		
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
    
                </div>

			</div>
			
		</div>
	</div>


@endsection