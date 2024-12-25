<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even and Odd Numbers</title>
    <!-- นำเข้าไฟล์ CSS ของ Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- นำเข้าไฟล์ JavaScript ของ Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="mystyle.css"> 
    <style>
        /* กำหนดสีพื้นหลังสำหรับส่วนหัวของตาราง */
       
        /* กำหนดสีพื้นหลังสำหรับแถวที่มีเลขคี่ */
        tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* สีเทาอ่อน */
        }
        /* กำหนดสีพื้นหลังสำหรับแถวที่มีเลขคู่ */
        tbody tr:nth-child(even) {
            background-color: #ffffff; /* สีขาว */
        }
        /* กำหนดสีพื้นหลังเมื่อโฮเวอร์ที่แถว */
        tbody tr:hover {
            background-color: #ddd; /* สีเทาเข้มขึ้นเมื่อโฮเวอร์ */
        }
        /* กรอบฟอร์ม */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-container .btn {
            margin-top: 30px;
        }
        .form-container .col-md-2.text-center {
            display: flex;
            align-items: flex-end; 
            justify-content: center; /* จัดปุ่มให้อยู่ตรงกลาง */
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h1 class="text-center my-4">แสดงข้อมูลเลขคู่-เลขคี่</h1>
        <!-- ฟอร์มรับค่าตัวเลขเริ่มต้นและสิ้นสุด -->
        <form method="GET" class="my-4">
            <div class="row g-3">
                <div class="col-md-5 col-sm-12">
                    <label for="start" class="form-label">ตัวเลขเริ่มต้น (start)</label>
                    <input type="number" name="start" id="start" class="form-control" placeholder="ระบุตัวเลขเริ่มต้น" required>
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="end" class="form-label">ตัวเลขสิ้นสุด (end)</label>
                    <input type="number" name="end" id="end" class="form-control" placeholder="ระบุตัวเลขสิ้นสุด" required>
                </div>
                <div class="col-md-2 col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary w-100">แสดงผล</button>
                </div>
            </div>
        </form>

        <?php 
        // ตรวจสอบว่ามีการส่งค่าตัวเลขเริ่มต้นและสิ้นสุด และเป็นตัวเลขหรือไม่
        if (isset($_GET['start'], $_GET['end']) && is_numeric($_GET['start']) && is_numeric($_GET['end'])): 
            $start = intval($_GET['start']);
            $end = intval($_GET['end']);
            // ตรวจสอบว่าค่าเริ่มต้นน้อยกว่าหรือเท่ากับค่าสิ้นสุด
            if ($start <= $end): 
        ?>
            <h2 class="text-center">แสดงข้อมูลเลขคู่-เลขคี่จาก <?php echo htmlspecialchars($start); ?> ถึง <?php echo htmlspecialchars($end); ?></h2>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ตัวเลข</th>
                        <th scope="col">เลขคู่-เลขคี่</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // วนลูปแสดงตัวเลขและตรวจสอบว่าเป็นเลขคู่หรือเลขคี่
                    for ($i = $start; $i <= $end; $i++): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($i); ?></td>
                            <td>
                                <?php 
                                // ตรวจสอบว่าเป็นเลขคู่หรือเลขคี่
                                if ($i % 2 == 0) {
                                    echo "เลขคู่";
                                } else {
                                    echo "เลขคี่";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-danger">กรุณาระบุค่าเริ่มต้นให้น้อยกว่าหรือเท่ากับค่าจบ</p>
        <?php endif; endif; ?>
    </div>
</body>
</html>
