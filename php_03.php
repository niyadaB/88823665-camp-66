<!DOCTYPE html>
<html>
    <head>
        <title>Multiplication Table</title>
        <!-- นำเข้าไฟล์ CSS ของ Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- นำเข้าไฟล์ JavaScript ของ Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="mystyle.css"> 
    </head>
    <body>
        <div class="container my-5">
            <h1 class="text-center">แสดงตารางสูตรคูณ</h1>
            <form method="GET" class="my-4">
                <div class="input-group">
                    <input type="number" name="my_var" class="form-control" placeholder="ระบุแม่สูตรคูณ" required>
                    <button type="submit" class="btn btn-primary">แสดงผล</button>
                </div>
            </form>

            <?php
            // ตรวจสอบว่ามีการส่งค่า my_var และเป็นตัวเลขหรือไม่
            if (isset($_GET['my_var']) && is_numeric($_GET['my_var'])):
                // แปลงค่า my_var เป็นจำนวนเต็ม
                $my_var = intval($_GET['my_var']);
            ?>
                <h2 class="text-center">สูตรคูณแม่ <?php echo $my_var; ?></h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">การคูณ</th>
                                <th class="text-center">ผลลัพธ์</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // วนลูปเพื่อแสดงผลลัพธ์ของสูตรคูณตั้งแต่ 1 ถึง 12
                            for ($i = 1; $i <= 12; $i++):
                                // กำหนดคลาสสำหรับแถวตามความเป็นเลขคู่หรือเลขคี่
                                $row_class = ($i % 2 == 0) ? 'even-row' : 'odd-row';
                            ?>
                                <tr class="<?php echo $row_class; ?>">
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo "$i x $my_var"; ?></td>
                                    <td class="text-center"><?php echo $i * $my_var; ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            <?php
            // กรณีที่ไม่มีการส่งค่าหรือค่าที่ส่งมาไม่ใช่ตัวเลข
            elseif ($_SERVER['REQUEST_METHOD'] == 'GET'):
            ?>
                <p class="text-center text-danger">กรุณาระบุแม่สูตรคูณที่ถูกต้อง</p>
            <?php endif; ?>
        </div>
    </body>
</html>
