@extends('layout.master')
@section('content')
    <div class="navbar" style="background-color: #999">
        <div class="container py-auto d-flex justify-content-center align-items-center">
            <img src="https://simpleprogrammer.com/wp-content/uploads/2020/03/Flash-Sale-Banner-e1585334330304.png" alt="" class="img-fluid" width="150">
            <span class="px-3"><i class="fa-solid fa-clock"></i> Kết Thúc Trong:</span>
            <span>12:00:00</span>
        </div>
    </div>
    <div class="container">
        <div class="fs-banner mb-3">
            <img src="https://thumbs.dreamstime.com/b/flash-sale-discount-banner-template-promotion-194494313.jpg" alt="" class="img-fluid">
        </div>
        <div class="fs-type d-flex justify-content-center align-items-center flex-wrap text-bg-danger">
            <span class="p-4">PC Gaming</span>
            <span class="p-4">Laptop</span>
            <span class="p-4">Phụ Kiện</span>
            <span class="p-4">Ghế Gaming</span>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>

                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>
                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>
                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>
                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>
                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>
                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>
                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-3">
                <div class="card text-dark">
                    <div class="border border-2 rounded">
                        <router-link to="/Detail/5">
                            <img class="card-img-top img-fluid" src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png">
                        </router-link>
                        <router-link to="/Detail/5" class="text-dark">
                            <div class="card-body">BỘ PC HOTGEAR 1 / INTEL I3 10100F / DDR4 8GB / SSD 120GB</div>
                        </router-link>
                        <div class="card-text p-3 d-flex justify-content-between align-items-center">
                            <div class="prod-price">
                                <small><del>7,690,000₫</del></small><br>
                                <span class="text-danger">5,690,000₫</span>
                            </div>
                            <div class="prod-action fs-3">
                                <!-- <i class="fa-brands fa-gratipay"></i> -->
                                <i class="fa-solid fa-heart px-2"></i>
                                <i class="fa-solid fa-cart-plus px-2"></i>
                            </div>
                        </div>
                        <div class="sold-count pb-3 mx-2">
                            <div class="progress" style="height: 24px;">
                                <div class="progress-bar progress-bar-striped bg-warning position-relative"
                                     role="progressbar"
                                     aria-label="Example with label"
                                     style="width: 25%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                                <span class="ps-2 ps-md-3 ps-xl-5 ms-lg-5 fs-6 text-primary position-absolute">Đã bán: 1048</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mb-5" style="margin-left: 50%">Tải Thêm</button>
    </div>
@endsection
