
<!DOCTYPE html> <!-- กำหนดประเภทของเอกสาร HTML -->
<html lang="en"> <!-- เริ่มต้นเอกสาร HTML และกำหนดภาษาของเอกสาร -->
<head>
    <meta charset="UTF-8"> <!-- กำหนดการเข้ารหัสตัวอักษรเป็น UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=2.0"> <!-- ทำให้หน้าเว็บแสดงผลแบบ responsive -->
    <title>ตารางสูตรคูณ</title> <!-- ชื่อแท็บของหน้าเว็บ -->
    <style>
        /* กำหนดรูปแบบการแสดงผลของ body */
        body {
            display: flex; /* จัดองค์ประกอบภายในให้เป็น Flexbox */
            flex-direction: column; /* จัดให้องค์ประกอบเรียงจากบนลงล่าง */
            align-items: center; /* จัดให้อยู่กึ่งกลางในแนวนอน */
            justify-content: center; /* จัดให้อยู่กึ่งกลางในแนวตั้ง */
            text-align: center; /* จัดข้อความให้อยู่ตรงกลาง */
            font-family: Arial, sans-serif; /* กำหนดฟอนต์ */
            min-height: 100vh; /* กำหนดความสูงอย่างน้อยให้เต็มหน้าจอ */
            margin: 0; /* ลบระยะขอบของ body */
        }
        /* รูปแบบของ input และปุ่ม */
        input[type="text"] , button {
            width: 300px; /* กำหนดความกว้าง */
            padding: 10px; /* ระยะห่างภายใน */
            font-size: 16px; /* ขนาดตัวอักษร */
            border: 1px solid #000; /* กำหนดเส้นขอบ */
            border-radius: 5px; /* ทำให้มุมขอบมน */
            cursor: pointer; /* เปลี่ยนเคอร์เซอร์เมื่อชี้ไปที่ปุ่ม */
            background-color: rgb(212, 206, 237); /* สีพื้นหลัง */
            color: black; /* สีของตัวอักษร */
        }
        form {
            margin-bottom: 20px; /* ระยะห่างด้านล่างของฟอร์ม */
        }
        table {
            margin-top: 20px; /* ระยะห่างด้านบนของตาราง */
            border-collapse: collapse; /* ยุบเส้นขอบตารางให้เป็นเส้นเดียว */
        }
        th, td {
            padding: 10px; /* ระยะห่างภายในเซลล์ */
            border: 1px solid #000; /* เส้นขอบของเซลล์ */
        }
        h1, h2, p {
            margin: 10px 0; /* ระยะห่างด้านบนและด้านล่าง */
        }
    </style>
</head>
<body>
    <h1>ตารางสูตรคูณ</h1> <!-- หัวข้อหลักของหน้าเว็บ -->

    <!-- ฟอร์มรับค่าจากผู้ใช้ -->
    <form method="POST" action="{{ url('/mycontroller') }}"> <!-- ฟอร์มส่งข้อมูลไปยัง URL ที่กำหนด -->
        @csrf <!-- ใช้ป้องกัน CSRF (Cross-Site Request Forgery) -->
        <input type="text" id="myinput" name="myinput" placeholder="กรอกแม่สูตรคูณ:"> <!-- กล่องข้อความให้ผู้ใช้กรอกแม่สูตรคูณ -->
        <button type="submit">แสดงตารางสูตรคูณ</button> <!-- ปุ่มสำหรับส่งฟอร์ม -->
    </form>

    <!-- แสดงข้อผิดพลาด -->
    @if(isset($error)) <!-- ตรวจสอบว่ามีตัวแปร $error หรือไม่ -->
        <p style="color: red;">{{ $error }}</p> <!-- แสดงข้อความข้อผิดพลาดด้วยสีแดง -->
    @endif

    <!-- แสดงตารางสูตรคูณ -->
    @if(isset($mulTb) && count($mulTb) > 0) <!-- ตรวจสอบว่ามีตารางสูตรคูณและจำนวนข้อมูลมากกว่า 0 -->
        <h2>ตารางสูตรคูณแม่ {{ $myinput }}</h2> <!-- หัวข้อแสดงแม่สูตรคูณที่ผู้ใช้กรอก -->
        <table>
            <thead>
                <tr>
                    <th>สูตร</th> <!-- คอลัมน์หัวข้อสำหรับสูตรคูณ -->
                    <th>ผลลัพธ์</th> <!-- คอลัมน์หัวข้อสำหรับผลลัพธ์ -->
                </tr>
            </thead>
            <tbody>
                @foreach($mulTb as $num => $result) <!-- ลูปเพื่อแสดงผลตารางสูตรคูณ -->
                    <tr>
                        <td>{{ $myinput }} x {{ $num }}</td> <!-- คำนวณสูตรคูณ -->
                        <td>{{ $result }}</td> <!-- แสดงผลลัพธ์ของสูตรคูณ -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
