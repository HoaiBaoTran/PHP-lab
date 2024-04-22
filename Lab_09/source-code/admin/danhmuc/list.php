<div class"row">
    <div class="row text-primary text-center">
        <h1>DANH SÁCH CÁC DANH MỤC</h1>
    </div>
    <div>
        <div>
            <table class="table">
                <tr>
                    <th> </th>
                    <th>Mã Loại </th>
                    <th>Tên Loại</th>
                    <th> </th>
                </tr>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    // update/detele
                    $suadm = "index.php?act=suadm&id=" . $id;
                    $xoadm = "index.php?act=xoadm&id=" . $id;
                    echo '<tr>
                        <td><input type="checkbox" name="" id="">  </td>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td><a href="' . $suadm . '" ><input type="button" value="Sửa" name="" id=""> </a>
                        <a href="' . $xoadm . '"><input type="button" value="Xóa" name="" id=""> </a></td>
                    </tr>';
                }
                ?>

            </table>
        </div>
    </div>
</div>