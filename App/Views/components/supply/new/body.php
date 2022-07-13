<?php

use App\Helpers\Format;
?>
<div class="card card-bordered">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">Add Supply Information</h5>
        </div>
        <form method="POST" id="supply-form" class="gy-3">
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label" for="site-name">YJ code</label>
                        <span class="form-note">Enter supply YJ code.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="input-group">
                        <input type="number" name="yj_code" class="form-control" placeholder="1124017f2046" value="88989" required>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <span class="form-note">Specify the product name.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" name="product_name" class="form-control" required placeholder="Artovatisn Tablet 5 mg oo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Shipment status</label>
                        <span class="form-note">Select Shippment status.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <select name="shippment_status" id="" class="form-control">
                                <option value="">Shippment status</option>
                                <?php foreach (Format::shipmentStatus() as $key => $val) : ?>
                                    <option value="<?= $key ?>"><?= $val ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Correspondence status </label>
                        <span class="form-note">Enter correspondence status of product distribution.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <select name="correspondence_status" id="" class="form-control">
                                <option value="">Correspondence status</option>
                                <?php foreach (Format::distributorStatus() as $key => $val) : ?>
                                    <option value="<?= $key ?>"><?= $val ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Expected time</label>
                        <span class="form-note">Enter expected time to resolve shipping obstacle or suspension.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="expected_time" placeholder="<?= date('M Y') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 align-center">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <span class="form-note">Information material address.</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="input-group">
                        <input type="text" name="material_val" class="form-control" placeholder="Material if any" required disabled>
                        <div class="input-group-append">
                            <label for="address-file" class="input-group-text btn btn-primary" id="">Upload</lab>
                            <input type="file" accept=".pdf, .csv, .doc,.docs" class="d-none" name="material" id="address-file">
                        </div>
                    </div>
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