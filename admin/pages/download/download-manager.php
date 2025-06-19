<div id="content" class="app-content">
    <div class="row">
        <div class="col-xl-12 mb-3">

            <div class="card">
                <div class="card-body">
                    <form class="form pt-3" cvhvn="true" method="POST" action="/ajax/admin/download/add.php"
                        href="<?php echo getCurrentURL(); ?>">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Phụ Đề</label>
                            <div class="col-md-5">
                                <input class="form-control" type="text" name="text" placeholder="Phụ Đề">
                            </div>
                            <div class="col-md-5">
                                <input class="form-control" type="text" name="url" placeholder="Link của tiêu đề">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-search-input" class="col-md-2 col-form-label">Navbar</label>
                            <div class="col-md-10">
                                <div class="small text-inverse text-opacity-50 mb-2"><b class="fw-bold">Chọn trạng thái
                                        hiển thị</b>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="type" type="radio" value="download">
                                        <label class="form-check-label">Download</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="type" type="radio" value="social">
                                        <label class="form-check-label">Social</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Link Tải</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="link"
                                    placeholder="Nhập đường dẫn hoặc đường link">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="avatar" class="col-md-2 col-form-label">Ảnh đại diện <button type="button"
                                    class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#upAVT">UP
                                    IMG</button></label>
                            <div class="col-md-10">
                                <?php
                                $folderPath = $_SERVER['DOCUMENT_ROOT'] . '/images/'; 
                                if (is_dir($folderPath)) {
                                    $files = scandir($folderPath);
                                    foreach ($files as $file) {
                                        if ($file !== '.' && $file !== '..' && is_file($folderPath . '/' . $file)) {
                                            $fileName = pathinfo($file, PATHINFO_FILENAME);
                                            $filePath = '/images/' . $file;
                                            echo '<div class="form-check cvh-check form-check-inline">
                                                    <input class="form-check-input cvh-check" type="radio" name="image" id="image_' . htmlspecialchars($fileName) . '" value="' . htmlspecialchars($filePath) . '">
                                                    <label class="form-check-label cvh-check" for="image_' . htmlspecialchars($fileName) . '">
                                                        <img src="' . htmlspecialchars($filePath) . '" class="cvh-img" alt="Image ' . htmlspecialchars($fileName) . '"> 
                                                    </label>
                                                  </div>';
                                        }
                                    }
                                } else {
                                    echo '<p>Không có ảnh đại diện nào</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" href="<?php echo getCurrentURL(); ?>">Lưu
                                Lại</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
               $current_data = $CVH->get_row("SELECT download FROM cvh_setting WHERE id = 1");
               $current_download = !empty($current_data) ? json_decode($current_data['download'], true) : [];
             ?>
            <div class="card card-body mt-2">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            <?php
                                if (!empty($current_download)) {
                                  foreach ($current_download as $item) {
                                $id = $item['id']; 
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($id); ?></td>
                                <td>
                                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Image" width="50">
                                </td>
                                <td>
                                    <a
                                        href="<?php echo htmlspecialchars($item['link']); ?>"><?php echo htmlspecialchars($item['link']); ?></a>
                                </td>
                                <td>
                                    <span><?php echo htmlspecialchars($item['description']['text']); ?></span>
                                </td>
                                <td>
                                    <div class="action-btn">
                                        <a href="javascript:void(0)" onclick="del_(<?php echo $id; ?>);"
                                            class="btn btn-sm btn-danger ms-2">
                                            <i class="fa fa-trash-alt fs-5"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } } else { ?>
                            <tr class="text-center">
                                <td colspan='5'>
                                    <img src="https://cdn-icons-png.flaticon.com/128/7466/7466139.png" width="50"
                                        class="img-fluid">
                                    <p class="pt-3"><b>Không có dữ liệu</b></p>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="upAVT" tabindex="-1" aria-labelledby="upAVTLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upAVTLabel">Tải lên ảnh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="avatar-upload text-center">
                    <input type="file" id="avatarUpload" accept="image/*" name="avatar" style="display: none;"
                        onchange="previewImage(event)">
                    <label for="avatarUpload" class="avatar-label">Chọn ảnh cần tải lên</label>
                    <div class="text-center py-3">
                        <div id="previewContainer" class="preview-container"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="uploadAvatar()">Tải lên</button>
            </div>
        </div>
    </div>
</div>
<script>
function previewImage(event) {
    const previewContainer = document.getElementById('previewContainer');
    previewContainer.innerHTML = '';

    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}

function uploadAvatar() {
    const fileInput = document.getElementById('avatarUpload');
    const file = fileInput.files[0];
    if (!file) {
        alert("Vui lòng chọn ảnh đại diện!");
        return;
    }
    const formData = new FormData();
    formData.append('avatar', file);

    fetch('/ajax/admin/download/upavt.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Tải lên thành công! File: ' + data.fileName);
                $('#upAVT').modal('hide');
            } else {
                alert('Tải lên thất bại: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra trong quá trình tải lên!');
        });
}



function del_(id) {
    Swal.fire({
        title: 'Thông Báo',
        text: 'Bạn có muốn xóa link tải có ID #' + id + ' không!',
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Đồng Ý',
        denyButtonText: `Đóng`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '/ajax/admin/download/delete.php',
                data: {
                    type: 'Del_Post',
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