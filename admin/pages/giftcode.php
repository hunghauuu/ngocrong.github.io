<?php
$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
$result = mysqli_query($CVH->connect_db(), "SELECT * FROM `cvh_giftcode` ORDER BY `time` DESC LIMIT $start, $kmess");
$tong = mysqli_num_rows(mysqli_query($CVH->connect_db(), "SELECT * FROM `cvh_giftcode`"));
?>
<div id="content" class="app-content">
    <div class="row">
        <div class="col-xl-12 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <form class="row" cvhvn="true" method="POST" action="/ajax/admin/giftcode/addgift.php"
                        href="<?php echo getCurrentURL(); ?>">
                        <div class="col-sm-12 col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="code" placeholder="Mã code">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="count" placeholder="Số lượt nhập">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="hsd">
                            </div>
                        </div>
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
                        <div class="col-sm-12 col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="soluong" placeholder="Số lượng vật phẩm">
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
            </div> </div>
            </div>
            <div class="accordion-item mb-3 shadow-none border rounded-top mt-3">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button fs-4 fw-semibold px-3 py-6 lh-base border-0 rounded-top collapsed"
                        type="button" data-bs-toggle="collapse" data-bs-target="#dscode" aria-expanded="false"
                        aria-controls="dscode"> Danh Sách Giftcode </button>
                </h2>
                <div id="dscode" class="accordion-collapse collapse show"
                    aria-labelledby="flush-headingOne" data-bs-parent="#dscode" style="">
                    <div class="accordion-body px-3 fw-normal">
                        <div class="table-responsive">
                            <table class="table search-table align-middle text-nowrap">
                                <thead class="header-item">
                                    <tr>
                                        <th>ID</th>
                                        <th>MÃ</th>
                                        <th>LƯỢT</th>
                                        <th>STATUS</th>
                                        <th>HSD</th>
                                        <th>TIME</th>
                                    </tr>
                                </thead>
                                <tbody id="result">
                                    <?php
                                        $i = 1;
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                    <tr class="search-items">
                                        <td>
                                            <span>
                                                <?php echo $i++; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span>
                                                <?php echo $row["code"]; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span id="text">
                                                <?php echo ($row["luot"]); ?>
                                            </span>
                                            <div class="col-4" id="input" style="display:none;">
                                                <input type="number" class="form-control form-control-sm" name="addLSD"
                                                    id="addLSD" data-id="<?php echo $row['id']; ?>">
                                            </div>
                                            <script>
                                            var textElement = document.getElementById("text");
                                            var inputContainer = document.getElementById("input");
                                            textElement.addEventListener("click", function() {
                                                textElement.hidden = true;
                                                inputContainer.style.display = "block";
                                            });

                                            $(document).ready(function() {
                                                $("#addLSD").on('change', function() {
                                                    var number = $(this).val();
                                                    var id = $(this).data("id");
                                                    if (number != '') {
                                                        $.ajax({
                                                            url: '/ajax/admin/giftcode/edit.php',
                                                            method: 'POST',
                                                            data: {
                                                                type: "Add",
                                                                id: id,
                                                                number: number
                                                            },
                                                            success: function(data) {
                                                                if (data.status) {
                                                                    notice(data.message,
                                                                        'success');
                                                                    window.location
                                                                .reload();
                                                                } else {
                                                                    notice(data.message,
                                                                        'error');
                                                                }
                                                            }
                                                        });
                                                    }
                                                });
                                            });
                                            </script>
                                        </td>
                                        <td>
                                            <span>
                                                <?php echo ($row['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span>
                                                <?php echo ($row['hsd']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span>
                                                <?php echo $CVH->time_ago($row['time']); ?>
                                            </span>
                                        </td>
                                        <td>
                                        <div class="action-btn">
                                                    <a href="javascript:void(0)"
                                                        onclick="del_(<?php echo $row['id']; ?>);"
                                                        class="btn btn-sm btn-danger ms-2">
                                                        <i class="fa fa-trash fs-5"></i>
                                                    </a>
                                                </div>
                                        </td>
                                    </tr>
                                    <?php }
                                        } else { ?>
                                    <tr class="text-center">
                                        <td colspan='7'>
                                            <img src="https://cdn-icons-png.flaticon.com/128/7466/7466139.png"
                                                width="50" class="img-fluid">
                                            <p class="pt-3"><b>Không có dữ liệu</b></p>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                            if ($tong > $kmess) {
                                echo '<center>' . $CVH->phantrang('giftcode?', $start, $tong, $kmess) . '</center>';
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
<script>
function addRow(data) {
    if ($('.list_row .form_gift').length > 9) {
        notice("Chỉ được thêm tối đa 10 dòng", "info");
        return
    }
    $.ajax({
        url: '/ajax/admin/giftcode/addrow.php',
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

function del_(id) {
    Swal.fire({
        title: 'Thông Báo',
        text: 'Bạn có muốn xóa giftcode có ID #' + id + ' không!',
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Đồng Ý',
        denyButtonText: `Đóng`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '/ajax/admin/giftcode/delete.php',
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