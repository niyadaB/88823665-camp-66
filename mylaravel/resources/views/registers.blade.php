@extends('layouts.default')

@section('content')
    <div class="register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.register-logo -->
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="register-box-msg">Register a new membership</p>
                    <form action="{{ url('/register') }}" onsubmit="return inputCheck();" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Full Name" />
                            <div class="input-group-text"><span class="bi bi-person"></span></div>
                            <div class="valid-feedback">
                                OK
                            </div>
                            <div class="invalid-feedback" id="invalid-name">
                                กรุณาระบุ name
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                            <div class="valid-feedback">
                                OK
                            </div>
                            <div class="invalid-feedback" id="invalid-email">
                                กรุณาระบุ email
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="pass" class="form-control"
                                placeholder="Password" />
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                            <div class="valid-feedback">
                                OK
                            </div>
                            <div class="invalid-feedback" id="invalid-pass">
                                กรุณาระบุ password
                            </div>
                        </div>
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input" id="mycheckbox" type="checkbox" value=""
                                        id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </form>
                    <div class="social-auth-links text-center mb-3 d-grid gap-2">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-facebook me-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-danger">
                            <i class="bi bi-google me-2"></i> Sign in using Google+
                        </a>
                    </div>
                    <!-- /.social-auth-links -->
                    <p class="mb-0">
                        <a href="login.html" class="text-center"> I already have a membership </a>
                    </p>
                </div>
                <!-- /.register-card-body -->
            </div>
        </div>
        <!-- /.register-box -->
        <!--begin::Third Party Plugin(OverlayScrollbars)-->
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
            integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
        <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
        <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
        <script src="../../../dist/js/adminlte.js"></script>
        <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
        <script>
            const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
            const Default = {
                scrollbarTheme: 'os-theme-light',
                scrollbarAutoHide: 'leave',
                scrollbarClickScroll: true,
            };
            document.addEventListener('DOMContentLoaded', function() {
                const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
                if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: {
                            theme: Default.scrollbarTheme,
                            autoHide: Default.scrollbarAutoHide,
                            clickScroll: Default.scrollbarClickScroll,
                        },
                    });
                }
            });
        </script>
        <!--end::OverlayScrollbars Configure-->
        <!--end::Script-->
    </div>
@endsection


@section('scripts')
    <script>
        function inputCheck() { // เช็ค input
            let isValid = true; // ข้อมูลถูกต้อง

            let name = $('#name'); // ชื่อจาก input
            let email = $('#email'); // อีเมลจาก input
            let pass = $('#pass'); // รหัสผ่านจาก input
            let mycheckbox = $('#mycheckbox'); // checkbox

            // ตรวจสอบว่า name ต้องไม่เป็นค่าว่าง
            if (name.val() == "") {
                name.addClass('is-invalid');
                $('#invalid-name').html("name ต้องไม่เป็นค่าว่าง");
                isValid = false;
            } else {
                name.removeClass('is-invalid');
            }

            // ตรวจสอบว่า email ต้องมี @ และ .
            if (!email.val().includes("@") || !email.val().includes(".")) {
                email.addClass('is-invalid');
                $('#invalid-email').html("email ต้องมี @ และ .");
                isValid = false;
            } else {
                email.removeClass('is-invalid');
            }

            // ตรวจสอบความถูกต้องของรหัสผ่านด้วยฟังก์ชัน validatePassword
            if (!validatePassword(pass.val())) {
                pass.addClass('is-invalid');
                isValid = false;
            } else {
                pass.removeClass('is-invalid');
            }

            // ตรวจสอบว่า checkbox ต้องถูกติ๊ก
            if (!mycheckbox.prop('checked')) {
                mycheckbox.addClass('is-invalid');
                $('#invalid-mycheckbox').html("กรุณาติ๊ก checkbox");
                isValid = false;
            } else {
                mycheckbox.removeClass('is-invalid');
            }

            return isValid; // คืนค่า true ถ้าข้อมูลถูกต้อง
        }

        function validatePassword() {
            let pass = $('#pass').val(); // รับค่าจาก input password

            // ตรวจสอบว่ารหัสผ่านไม่เป็นค่าว่าง
            if (pass === "") {
                $('#invalid-pass').html("password ต้องไม่เป็นค่าว่าง");
                return false;
            }

            // ตัวแปรเช็คเงื่อนไขการมีตัวเลข พิมพ์เล็ก และพิมพ์ใหญ่
            let hasLower = false;
            let hasUpper = false;
            let hasDigit = false;

            // ตรวจสอบแต่ละตัวอักษรในรหัสผ่าน
            for (let i = 0; i < pass.length; i++) {
                let char = pass[i];
                if (char >= 'a' && char <= 'z') { // ตรวจสอบตัวพิมพ์เล็ก
                    hasLower = true;
                } else if (char >= 'A' && char <= 'Z') { // ตรวจสอบตัวพิมพ์ใหญ่
                    hasUpper = true;
                } else if (char >= '0' && char <= '9') { // ตรวจสอบตัวเลข
                    hasDigit = true;
                }
            }

            // หากขาดเงื่อนไขใด ๆ ให้แสดงข้อความเตือน
            if (!hasLower || !hasUpper || !hasDigit) {
                $('#invalid-pass').html("password ต้องมี ตัวเลข ตัวอักษรภาษาอังกฤษพิมพ์เล็ก ตัวอักษรภาษาอังกฤษพิมพ์ใหญ่");
                return false;
            }

            $('#invalid-pass').html(""); // ล้างข้อความถ้าผ่านการตรวจสอบ
            return true;
        }
    </script>
    <script>
        console.log(myval2)
    </script>
@endsection