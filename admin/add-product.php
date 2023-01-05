<?php
require_once('../layouts/header.php');
?>
<div class="container-fluid mb-30">
    <div class="col-12 px-xl-5 mb-30 left">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <form action="#">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-style-1">
                                    <label>Barcode</label>
                                    <input type="text" placeholder="barcode" class="bg-transparent">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-style-1">
                                    <label>Name</label>
                                    <input type="text" placeholder="Name" class="bg-transparent">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-6">
                                <div class="input-style-1">
                                    <label>Image</label>
                                    <input type="file" class="bg-transparent">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-style-1">
                                    <label>Price</label>
                                    <input type="number" placeholder="Price" class="bg-transparent">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-style-1">
                                    <label>Discount</label>
                                    <input type="number" placeholder="Discount" class="bg-transparent">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-6">
                                <div class="select-style-1">
                                    <label>Category</label>
                                    <div class="select-position">
                                        <select>
                                            <option value="">Select Subject</option>
                                            <option value="">Maintenances</option>
                                            <option value="">Web Services</option>
                                            <option value="">Graphic Services</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end select -->
                            </div>
                            <div class="col-6">
                                <div class="select-style-1">
                                    <label>Color</label>
                                    <div class="select-position">
                                        <select>
                                            <option value="">Select Subject</option>
                                            <option value="">Maintenances</option>
                                            <option value="">Web Services</option>
                                            <option value="">Graphic Services</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end select -->
                            </div>
                            <div class="col-6">
                                <div class="select-style-1">
                                    <label>Size</label>
                                    <div class="select-position">
                                        <select>
                                            <option value="">Select Subject</option>
                                            <option value="">Maintenances</option>
                                            <option value="">Web Services</option>
                                            <option value="">Graphic Services</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end select -->
                            </div>
                            <!-- end col -->
                            <!-- end col -->
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Decription</label>
                                    <textarea placeholder="Type here..." rows="5" class="bg-transparent"></textarea>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <button class="main-btn primary-btn btn-hover">
                                    Submit Form
                                </button>
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once('../layouts/footer.php');
    ?>