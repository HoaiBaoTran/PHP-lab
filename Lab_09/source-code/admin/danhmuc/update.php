<div class="row">
    <div class="row">
        <h1>THÊM MỚI DANH MỤC</h1>
    </div>
    <div class="row">
        <form action="index.php?act=suadm" method="post">
            <div class="mb-3">
                Mã loại <br><input value="<?= $id ?>" class="form-control" type="text" name="maloai" readonly>
            </div>
            <div class="mb-3">
                Tên loại <br><input value="<?= $name ?>" class="form-control" type="text" name="tenloai">
            </div>
            <div class="mb-3">
                <input type="submit" value="Cập nhật" name="themmoi" class="btn btn-primary">
                <input type="reset" value="Nhập Lại" class="btn btn-primary">
                <a href="index.php?act=listdm">
                    <input type="button" value="DANH SÁCH" class="btn btn-primary">
                </a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao = ""))
                echo $thongbao;
            ?>

        </form>
    </div>
</div>