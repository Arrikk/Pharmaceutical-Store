<?php

use Core\View;

 $user = extract((array) $user) ?>
<div class="nk-block nk-block-lg">
    <div class="card">
        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#personal-info"><em class="icon ni ni-user-circle-fill"></em><span>Managers</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile-overview"><em class="icon ni ni-user-add"></em><span> New Addition</span></a>
            </li>
            <li class="nav-item nav-item-trigger">
                <a href="#" class="btn btn-icon btn-trigger"><em class="icon ni ni-edit"></em></a>
            </li>
        </ul>
        <div class="card-inner">
            <div class="tab-content">   
                <div class="tab-pane active" id="personal-info">
                    <div class="nk-block">
                        <?php View::component('managers/table') ?>
                    </div><!-- .nk-block -->
                </div><!-- tab pane -->
                <div class="tab-pane" id="profile-overview">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Add New Manager</h5>
                            </div>
                            <form method="POST" id="register-form" class="gy-3">
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="site-name">Manufacturer approval code</label>
                                            <span class="form-note">Manufacturer company approved code.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="input-group">
                                            <input type="number" value="<?= $approvalCode ?? '' ?>" class="form-control" placeholder="Account Login" required disabled>
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
                                                <input type="text" value="<?= $companyName ?? '' ?>" class="form-control" required disabled placeholder="Pharmaceutical Company Name">
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
                                                <input type="text" class="form-control" id="loginId" placeholder="Bruiz">
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
                                                <input type="password" class="form-control" id="password" placeholder="New Password">
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
                                                    <input type="radio" class="authority custom-control-input" checked value="<?= COMPANY ?>" name="authority" id="reg-enable">
                                                    <label class="custom-control-label" for="reg-enable">Pharmaceutucal Company</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="authority custom-control-input" name="authority" value="<?= MANAGER ?>" id="reg-disable">
                                                    <label class="custom-control-label" for="reg-disable">Pharmaceutical Company Manager</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <button id="register" type="submit" class="btn btn-lg btn-primary">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--tab content-->
            </div>
            <!--card inner-->
        </div>
        <!--card-->
    </div>