<?php
$kmess = 6; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
$result = mysqli_query($CVH->connect_db(), "SELECT item_template.*, cvh_sell_item.*  FROM item_template INNER JOIN cvh_sell_item ON item_template.id = cvh_sell_item.item ORDER BY cvh_sell_item.id ASC LIMIT $start, $kmess");
$tong = mysqli_num_rows(mysqli_query($CVH->connect_db(), "SELECT item_template.*, cvh_sell_item.*  FROM item_template INNER JOIN cvh_sell_item ON item_template.id = cvh_sell_item.item"));
?>
<style>
.list-group-item .info-block,
.list-group-item .additional-info {
    display: flex;
    flex-direction: column;
}

.info-block {
    flex-grow: 1;
}

.additional-info {
    flex-grow: 6;
    align-items: flex-start;
}
</style>
<div id="content" class="app-content">
    <div class="row">
        <div class="col-xl-12 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <form class="row" cvhvn="true" method="POST" action="/ajax/admin/shop/add.php"
                        href="<?php echo getCurrentURL(); ?>">
                        <div class="col-sm-12 col-md-6">
                            <div class="input-group mb-4">
                                <select class="select2 form-control custom-select col-12" name="item">
                                    <option value="">Chọn ID Vật Phẩm</option>
                                    <?php
                                        $query = $CVH->query("SELECT * FROM `item_template`");
                                        $i = 1;
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row['id']; ?> -
                                        <?php echo $row['NAME']; ?>
                                    </option>
                                    <?php }
                                        } else { ?>
                                    <option value="">Không còn dữ liệu nào</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="price" placeholder="Giá tiền">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="slot" placeholder="Số lượt mua">
                            </div>
                        </div>
                        <div class="list_row">
                            <div class="row form_gift">
                                <div class="col-sm-12 col-md-6">
                                    <div class="input-group mb-3">
                                        <select class="select2 form-control custom-select col-12" name="option_id[]">
                                            <option value="">Chọn ID Option</option>
                                            <?php
                                                $query = $CVH->query("SELECT * FROM `item_option_template`");
                                                 $i = 1;
                                                if (mysqli_num_rows($query) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query)) {
                                                        ?>
                                            <option value="<?php echo $row['id']; ?>">
                                                <?php echo $row['id']; ?> -
                                                <?php echo $row['NAME']; ?>
                                            </option>
                                            <?php }
                                                } else { ?>
                                            <option value="">Không còn dữ liệu nào</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="param_option[]"
                                            placeholder="Nhập chỉ số cần thêm">
                                        <button class="btn btn-info" onclick="addRow(this)" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="result_here"></div>
                        <div class="col-sm-12 col-md-6">
                            <button type="submit" href="<?php echo getCurrentURL(); ?>" class="btn btn-danger">Lưu
                                Lại</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="list-group">
        <?php
                $i = 1;
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $cvh_json = $row['options'];
                    $cvh_array = json_decode($cvh_json, true);
            ?>
        <div class="list-group-item list-group-item-action d-flex align-items-center text-body">
            <div class="w-50px h-50px d-flex align-items-center justify-content-center bg-body rounded p-2">
                <img src="https://cdn-icons-png.flaticon.com/128/3144/3144484.png" alt="" class="mw-100 mh-100">
            </div>
            <div class="d-flex flex-fill px-5 justify-content-between">
                <div class="info-block">
                    <div class="fw-semibold"><b><?php echo $row['NAME']; ?></b></div>
                    <?php
                        if (is_array($cvh_array)) {
                            foreach ($cvh_array as $option) {
                                $param = $option['param'];
                                $option_id = $option['id'];
                                $option_query = mysqli_query($CVH->connect_db(), "SELECT name FROM item_option_template WHERE id = '$option_id'");
                                if ($option_data = mysqli_fetch_assoc($option_query)) {
                                    $option_name = $option_data['name'];
                                    $option_display = str_replace('#', $param, $option_name);
                                    echo '<div class="small text-theme fs-10px">• <b>' . $option_display . '</b></div>';
                                } else {
                                    echo '<div class="small text-theme">• <b>(Tên không tìm thấy)</b></div>';
                                }
                            }
                        }
                        ?>
                </div>
                <div class="additional-info">
                    <div class="fw-semibold"><b>Thông tin:</b></div>
                    <div class="small text-body fs-10px">- Hành tinh: <b
                            class="text-success fs-10px"><?php echo getGender($row['gender']); ?></b></div>
                    <div class="small text-body fs-10px">- Giá tiền: <b
                            class="text-danger fs-10px"><?php echo number_format($row['price']); ?>đ</b></div>
                    <div class="small text-body fs-10px">- Đã mua: <b class="text-danger"> 15</b></div>
                    <div class="small text-body fs-10px">- Còn lại: <b
                            class="text-danger"><?php echo number_format($row['slot']); ?></b></div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input hide-checkbox" data-id="<?php echo $row['id']; ?>"
                        <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
                </div>
                <button href="javascript:void(0)" onclick="del_(<?php echo $row['id']; ?>);"
                    class="btn btn-sm btn-theme"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <?php } } else { ?>
        <div class="text-center py-5 mt-5">
            <img src="https://cdn-icons-png.flaticon.com/128/7466/7466139.png" width="50" class="img-fluid">
            <p class="pt-3"><b>Không có dữ liệu</b></p>
        </div>
        <?php } ?>
    </div>
    <div class="d-flex align-items-center justify-content-end py-5">
        <?php
                if ($tong > $kmess) {
                    echo '<center>' . $CVH->phantrang('add-shop?', $start, $tong, $kmess) . '</center>';
                }
            ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
function addRow(data) {
    if ($('.list_row .form_gift').length > 9) {
        notice("Chỉ được thêm tối đa 10 dòng", "info");
        return
    }
    $.ajax({
        url: '/ajax/admin/shop/addrow.php',
        beforeSend: function() {
            $(data).html(
                '<div class="spinner-border spinner-border-sm text-light" role="status"> <span class="visually-hidden"></span></div>'
            );
            $(data).attr('onclick', 'return false;')
        },
        success: function(res) {
            $(data).html('<i class="fa fa-plus"></i>');
            $(data).removeAttr('onclick').attr('onclick', 'addRow(this)')
            $('.list_row').append(res);
        }
    });
}

function removeChild__(code) {
    $(".form_gift[data-row=" + code + "]").remove()
}

$(document).ready(function() {
    $('.hide-checkbox').change(function() {
        var status = $(this).is(':checked') ? 1 : 0;
        var id = $(this).data('id');

        $.ajax({
            url: '/ajax/admin/shop/update_status.php',
            type: 'POST',
            data: {
                status: status,
                id: id
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {}
        });
    });
});

function del_(id) {
    Swal.fire({
        title: 'Thông Báo',
        text: 'Bạn có muốn xóa sản phẩm có ID #' + id + ' không!',
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Đồng Ý',
        denyButtonText: `Đóng`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '/ajax/admin/shop/delete.php',
                data: {
                    type: 'Del_Gift',
                    id: id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status == true) {
                        Swal.fire('Thông báo', data.message, 'success').then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire('Thông báo', 'Có lỗi xảy ra vui lòng thử lại!', 'error').then(
                            () => {});
                    }
                },

                error: function() {
                    Swal.fire('Thông Báo', 'Có lỗi xảy ra vui lòng thử lại sau!', 'error');
                }
            });
        }
    });
}
</script>