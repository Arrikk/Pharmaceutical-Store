<div class="card card-bordered">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">Manager Details</h5>
        </div>
        <form id="register-new" class="gy-3">
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="site-name">Manufacturer approval code</label>
                        <span class="form-note">Manufacturer company approved code.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="input-group">
                        <input type="number" value=""  class="approval_code form-control" placeholder="e.g 50" required="" name="approval_code">
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <span class="form-note">Specify the pharmaceutical company name.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" value="" class="company_name form-control" required="" disabled="" name="company_name" placeholder="Pharmaceutical Company Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <span class="form-note">Enter Email.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="email" id="email" name="email" class="form-control email" placeholder="bruiz@bz.dev">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <span class="form-note">Enter Phone Number.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="number" id="phone" name="phone" class="form-control phone" placeholder="+91 323 86">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Login Id</label>
                        <span class="form-note">Enter Login ID.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" name="login" class="form-control username" placeholder="Bruiz">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <span class="form-note">Enter the new password you would like to use.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <span class="form-note">Enter password again for confirmation.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="password" class="form-control" id="c-password" placeholder="Re-Enter Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Classification</label>
                        <span class="form-note">Choose Classification.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <ul class="custom-control-group g-3 align-center flex-wrap">
                        <li>
                            <div class="custom-control custom-radio checked">
                                <input type="radio" class="authority custom-control-input" checked="" value="pharmaceutical_company" name="authority" id="reg-enable">
                                <label class="custom-control-label" for="reg-enable">Pharmaceutucal Company</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="authority custom-control-input" name="authority" value="pharmaceutical_company_manager" id="reg-disable">
                                <label class="custom-control-label" for="reg-disable">Pharmaceutical Company Manager</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row g-3">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="form-group mt-2">
                            <button id="register-btn" type="submit" class="btn btn-lg btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>