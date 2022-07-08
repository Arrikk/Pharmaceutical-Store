<?php $user = extract((array) $other) ?>
<div class="nk-block nk-block-lg">
    <div class="card">
        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#personal-info"><em class="icon ni ni-user-circle-fill"></em><span>Account information</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile-overview"><em class="icon ni ni-account-setting-fill"></em><span>Update</span></a>
            </li>
            <li class="nav-item nav-item-trigger">
                <a href="#" class="btn btn-icon btn-trigger"><em class="icon ni ni-edit"></em></a>
            </li>
        </ul>
        <div class="card-inner">
            <div class="tab-content">
                <div class="tab-pane active" id="personal-info">
                    <div class="nk-block">
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Manufacturing and marketing approval code</span>
                                    <span class="profile-ud-value"><?= $approvalCode ?? '' ?></span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Pharmaceutical company name</span>
                                    <span class="profile-ud-value"><?= $companyName ?? '' ?></span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Login Id</span>
                                    <span class="profile-ud-value"> <?= $username ?? '' ?> </span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Password</span>
                                    <span class="profile-ud-value">********</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Classification</span>
                                    <span class="profile-ud-value"><?php
                                                                    if ($isAdmin) echo ADMINISTRATOR;
                                                                    if ($isManager) echo MANAGER;
                                                                    if ($isCompany) echo COMPANY;
                                                                    ?></span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Email Address</span>
                                    <span class="profile-ud-value">info@softnio.com</span>
                                </div>
                            </div>
                        </div><!-- .profile-ud-list -->
                    </div><!-- .nk-block -->
                </div><!-- tab pane -->
                <div class="tab-pane" id="profile-overview">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Login Setting</h5>
                            </div>
                            <div class="gy-3">
                                <input type="hidden" value="<?= $id ?? '' ?>" id="__login">
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="site-name">Login Id</label>
                                            <span class="form-note">Specify your login id.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="input-group">
                                            <input type="text" value="<?= $username ?? '' ?>" class="form-control" placeholder="Account Login" required id="login-id">
                                            <div class="input-group-append">
                                                <span class="input-group-text btn btn-primary" id="update-login">Update</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-head mt-3">
                                    <h5 class="card-title">Password Management</h5>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">Old Password</label>
                                            <span class="form-note">Specify the current password of your account.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="old-password" placeholder="****">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <span class="form-note">Enter the new password you would like to use.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="new-password" placeholder="New Password">
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
                                                <input type="password" class="form-control" id="confirm-password" placeholder="Re-Enter Password">
                                            </div>
                                        </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-7 offset-lg-5">
                                        <div class="form-group mt-2">
                                            <button id="update-password" type="submit" class="btn btn-lg btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--tab content-->
        </div>
        <!--card inner-->
    </div>
    <!--card-->
</div>