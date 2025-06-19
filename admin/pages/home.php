<div id="content" class="app-content">
    <div class="row">

        <div class="col-xl-12">
            <div class="row">

                <div class="col-sm-4 mb-3">
                    <div class="card mb-3 flex-1">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Tổng Tài Khoản</h5>
                                    <div>Tài khoản đã đăng ký</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1"><?php echo fNumber($CVH->count('account')); ?> tài khoản</h3>
                                </div>
                                <div
                                    class="w-50px h-50px bg-primary bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-user fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4 mb-3">
                    <div class="card mb-3 flex-1">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Tổng nhân vật</h5>
                                    <div>Người dùng đã tạo nhân vật</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1"><?php echo fNumber($CVH->count('player')); ?> nhân vật</h3>
                                </div>
                                <div
                                    class="w-50px h-50px bg-success bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-address-card fa-lg text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="card mb-3 flex-1">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Tổng doanh thu</h5>
                                    <div>Tổng doanh thu nạp thẻ</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1"><?php echo number_format($CVH->tongdoanhthu()); ?>đ</h3>
                                </div>
                                <div
                                    class="w-50px h-50px bg-success bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-dollar fa-lg text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-3">
                    <div class="card mb-3 flex-1">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Đã kích hoạt</h5>
                                    <div>Người dùng đã kích hoạt</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1"><?php echo fNumber($CVH->count('account', 'active = 1')); ?> tài
                                    khoản</h3>
                                </div>
                                <div
                                    class="w-50px h-50px bg-success bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-check-circle fa-lg text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="card mb-3 flex-1">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Tài khoản hôm nay</h5>
                                    <div>Tài khoản đăng ký hôm nay</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1"><?php echo fNumber($CVH->TKhomnay()); ?> tài khoản</h3>
                                </div>
                                <div
                                    class="w-50px h-50px bg-success bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-user-plus fa-lg text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-3">
                    <div class="card mb-3 flex-1">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Doanh thu hôm nay</h5>
                                    <div>Doanh thu ngày hôm nay</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1"><?php echo number_format($CVH->DThomnay()); ?>đ</h3>
                                </div>
                                <div
                                    class="w-50px h-50px bg-success bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-info-circle fa-lg text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>