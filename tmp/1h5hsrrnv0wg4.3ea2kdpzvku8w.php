<div class="content mb-5">
    <div class="row">
        <div class="col-12 col-lg-8 mx-auto">

            <div class="alert alert-success text-center">
                <span class="badge rounded-pill text-bg-success" style="font-weight: normal"><?= (str_pad($last_invoice_number+1, $USER_SETTINGS_INVOICE_NUMBER, "0", STR_PAD_LEFT)) ?></span>
                <span class="badge rounded-pill text-bg-success" style="font-weight: normal">BIZ</span>
                <span class="badge rounded-pill text-bg-success" style="font-weight: normal"><?= ($current_date) ?></span>
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- client name -->
                    <div class="client-name-field">
                        <label for="client_name" class="form-label">client name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="client_name" name="client_name" required>
                        </div>
                        <div class="client-name-suggestion">
                            <span class="item">NUME TEST</span>
                        </div>
                    </div>
                    <!-- client address -->
                    <label for="client_address" class="form-label">client address</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="client_address" name="client_address" required>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <!-- client cui -->
                            <label for="client_cui" class="form-label">client cui</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="client_cui" name="client_cui">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <!-- client onrc -->
                            <label for="client_onrc" class="form-label">client onrc</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="client_onrc" name="client_onrc">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <!-- client mobile -->
                            <label for="client_phone" class="form-label">client phone</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="client_phone" name="client_phone">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <!-- client email -->
                            <label for="client_email" class="form-label">client email</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" id="client_email" name="client_email">
                            </div>
                        </div>
                    </div>
                    <!-- client iban -->
                    <label for="client_iban" class="form-label">client iban</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="client_iban" name="client_iban">
                    </div>
                    <!-- client bank -->
                    <label for="client_bank" class="form-label">client bank</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="client_bank" name="client_bank">
                    </div>

                    

                    

                    <div class="mt-5 pt-5"></div>
                    <!-- invoice content -->
                    <!-- invoice shipping price -->
                    <label for="invoice_shipping_price" class="form-label">shipping price</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="invoice_shipping_price" name="invoice_shipping_price">
                    </div>

                    <!-- invoice items -->
                    <div class="items-body">
                        <div class="row invoice-item-row">
                            <div class="col-12 col-lg-6">
                                <!-- item -->
                                <label for="item_name" class="form-label">item 1</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_name" name="item_name" required>
                                </div>
                            </div>
                            <div class="col-3 col-lg-2">
                                <!-- unit measurement -->
                                <label for="item_um" class="form-label">u.m.</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_um" name="item_um" placeholder="buc.">
                                </div>
                            </div>
                            <div class="col-3 col-lg-2">
                                <!-- quantity -->
                                <label for="item_qty" class="form-label">qty.</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_qty" name="item_qty" placeholder="1">
                                </div>
                            </div>
                            <div class="col-6 col-lg-2">
                                <!-- price -->
                                <label for="item_price" class="form-label">price</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_price" name="item_price">
                                </div>
                            </div>
                        </div>
                        

                        <div class="row invoice-item-row">
                            <div class="col-12 col-lg-6">
                                <!-- item -->
                                <label for="item_name" class="form-label">item 2</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_name" name="item_name">
                                </div>
                            </div>
                            <div class="col-3 col-lg-2">
                                <!-- unit measurement -->
                                <label for="item_um" class="form-label">u.m.</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_um" name="item_um" placeholder="buc.">
                                </div>
                            </div>
                            <div class="col-3 col-lg-2">
                                <!-- quantity -->
                                <label for="item_qty" class="form-label">qty.</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_qty" name="item_qty" placeholder="1">
                                </div>
                            </div>
                            <div class="col-6 col-lg-2">
                                <!-- price -->
                                <label for="item_price" class="form-label">price</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="item_price" name="item_price">
                                </div>
                            </div>
                        </div>
                        <!-- new generated item -->
                    </div>
                    <span class="btn d-block btn-outline-primary invoice-add-item-btn">+ add new item</span>

                    <span class="btn btn-success mt-4" id="submit-invoice">submit</span>


                </div>
            </div>
        </div>
    </div>
    
</div>
