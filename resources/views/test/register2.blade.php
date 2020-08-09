@extends('test.layouts.app')

     @section('content')
            
            <div class="form-group">
                <div class="form-group">
                    <label for="first_name">Account Name</label>
                    <input type="text" class="form-input" name="first_name" id="first_name" />
                </div>
                <div class="form-group">
                    <label for="last_name">Account Number</label>
                    <input type="number" class="form-input" name="last_name" id="last_name" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-group form-icon">
                    <label for="username">Bank Name</label>
                    <input type="text" class="form-input" name="username" id="username" placeholder="" />
                </div>

                <div class="form-group">
                    <label for="country">Account Type</label>
                    <div class="select-list">
                        <select name="country" id="country" required>
                            <option value="US">Savings</option>
                            <option value="UK">Current</option>
                            <option value="VN">Fixed</option>
                        </select>
                    </div>
                </div>   
            </div>
            
            <div class="form-row>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="form-submit" value="submit"/>
                </div>
            </div>   
    @endsection
                        


