<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS Portal - Login</title>
    <link rel="manifest" href="manifest.json">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @googlefonts
    @vite('resources/css/app.css')

    <style>
        /* Scanlines overlay — not expressible purely via Tailwind utilities */
        .scanlines {
            background: repeating-linear-gradient(0deg,
                    transparent,
                    transparent 3px,
                    rgba(245, 158, 11, .025) 3px,
                    rgba(245, 158, 11, .025) 4px);
        }

        /* Warehouse image double-gradient vignette */
        .warehouse-vignette::after {
            content: '';
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to right, transparent 40%, #0F172A 100%),
                linear-gradient(to top, #0F172A 0%, rgba(0, 0, 0, .55) 60%, transparent 100%);
        }

        /* OTP number inputs — hide spin buttons */
        .otp-input::-webkit-inner-spin-button,
        .otp-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }

        .otp-input {
            -moz-appearance: textfield;
        }

        /* Amber top accent bar on right panel */
        .right-panel-accent::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #F59E0B, #B45309);
        }

        /* Bootstrap-style alert dismiss animation */
        .alert {
            animation: slideDown 0.25s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-close {
            filter: invert(1);
            opacity: .6;
        }
    </style>
</head>

<body class="font-barlow bg-slate min-h-screen flex items-stretch overflow-hidden">


    <div id="otpPage" class="hidden w-full min-h-screen items-center justify-center bg-slate" style="display:none;">
        <div class="right-panel-accent w-full max-w-[440px] bg-slate px-7 py-10 sm:px-12 sm:py-14
                    relative mx-auto flex flex-col justify-center">

            <!-- Logo -->
            <div class="flex items-center gap-3 mb-11">
                <div class="w-[42px] h-[42px] shrink-0 rounded-lg flex items-center justify-center
                            bg-gradient-to-br from-amber to-amber-dk">
                    <i class="fas fa-boxes-stacked text-slate text-lg"></i>
                </div>
                <div class="font-condensed text-xl font-bold text-snow tracking-wider leading-tight">
                    WMS Portal
                    <small class="block text-[10px] text-muted font-normal tracking-widest uppercase">
                        Compass Business Mgmt
                    </small>
                </div>
            </div>

            <div class="text-center">

                <!-- OTP icon -->
                <div class="w-[72px] h-[72px] rounded-xl flex items-center justify-center mx-auto mb-6
                            bg-gradient-to-br from-amber to-amber-dk">
                    <i class="fas fa-key text-slate text-[32px]"></i>
                </div>

                <!-- Header -->
                <div class="mb-8">
                    <h2 class="font-condensed text-[30px] font-bold text-snow tracking-tight mb-1.5">
                        Verify Your Identity
                    </h2>
                    <p class="text-muted text-sm">We've sent a 6-digit code to</p>
                    <p id="userEmail" class="text-amber font-semibold text-sm mt-1 break-all"></p>
                </div>

                <div id="alertContainer"></div>

                <form id="otpForm">

                    <!-- OTP inputs -->
                    <div class="flex gap-2.5 justify-center my-7">
                        <input type="number" class="otp-input w-[52px] h-[56px] text-center text-[22px] font-bold
                               font-condensed bg-steel border border-steel-md rounded-md text-snow outline-none
                               transition focus:border-amber focus:ring-2 focus:ring-amber/20" maxlength="1"
                            pattern="[0-9]" required>
                        <input type="number" class="otp-input w-[52px] h-[56px] text-center text-[22px] font-bold
                               font-condensed bg-steel border border-steel-md rounded-md text-snow outline-none
                               transition focus:border-amber focus:ring-2 focus:ring-amber/20" maxlength="1"
                            pattern="[0-9]" required>
                        <input type="number" class="otp-input w-[52px] h-[56px] text-center text-[22px] font-bold
                               font-condensed bg-steel border border-steel-md rounded-md text-snow outline-none
                               transition focus:border-amber focus:ring-2 focus:ring-amber/20" maxlength="1"
                            pattern="[0-9]" required>
                        <input type="number" class="otp-input w-[52px] h-[56px] text-center text-[22px] font-bold
                               font-condensed bg-steel border border-steel-md rounded-md text-snow outline-none
                               transition focus:border-amber focus:ring-2 focus:ring-amber/20" maxlength="1"
                            pattern="[0-9]" required>
                        <input type="number" class="otp-input w-[52px] h-[56px] text-center text-[22px] font-bold
                               font-condensed bg-steel border border-steel-md rounded-md text-snow outline-none
                               transition focus:border-amber focus:ring-2 focus:ring-amber/20" maxlength="1"
                            pattern="[0-9]" required>
                        <input type="number" class="otp-input w-[52px] h-[56px] text-center text-[22px] font-bold
                               font-condensed bg-steel border border-steel-md rounded-md text-snow outline-none
                               transition focus:border-amber focus:ring-2 focus:ring-amber/20" maxlength="1"
                            pattern="[0-9]" required>
                    </div>

                    <!-- Timer -->
                    <div class="text-muted text-[13px] mt-3">
                        <i class="fas fa-clock me-1"></i>Code expires in
                        <span id="countdown" class="text-amber font-semibold">05:00</span>
                    </div>

                    <!-- Verify button -->
                    <button type="submit" id="verifyBtn" class="w-full flex items-center justify-center gap-2 mt-6 py-3.5 border-0 rounded-md
                                   bg-gradient-to-br from-amber to-amber-dk text-slate font-condensed text-base
                                   font-bold tracking-widest uppercase cursor-pointer transition
                                   hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(245,158,11,0.35)]
                                   active:translate-y-0">
                        <i class="fas fa-check-circle"></i> Verify Code
                    </button>

                    <!-- Resend & Back -->
                    <div class="flex justify-center items-center gap-1.5 mt-5">
                        <span class="text-muted text-[13px]">Didn't receive the code?</span>
                        <a href="#" id="resendOtp"
                            class="text-amber text-[13px] font-medium no-underline transition hover:text-yellow-300">
                            Resend OTP
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <a href="#" id="backToLogin"
                            class="text-amber text-[13px] font-medium no-underline transition hover:text-yellow-300">
                            <i class="fas fa-arrow-left me-1"></i>Back to Login
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Alert styles (Bootstrap-like, using Tailwind) -->
    <style>
        .alert-success {
            background: rgba(34, 197, 94, .15);
            color: #4ADE80;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .alert-danger {
            background: rgba(239, 68, 68, .15);
            color: #FCA5A5;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .alert-warning {
            background: rgba(245, 158, 11, .15);
            color: #FCD34D;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .alert-info {
            background: rgba(99, 102, 241, .15);
            color: #A5B4FC;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 16px;
            font-size: 13px;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        /* ── helpers ── */
        startCountdown();

        function showOtp() {
            document.getElementById('loginPage').style.display = 'none';
            var otp = document.getElementById('otpPage');
            otp.classList.remove('hidden');
            otp.style.display = 'flex';
        }

        function showAlert(message, type, containerId) {
            containerId = containerId || 'alertContainer';
            var c = document.getElementById(containerId);
            c.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">'
                + message
                + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>'
                + '</div>';
            setTimeout(function () {
                var a = c.querySelector('.alert');
                if (a) { a.classList.remove('show'); setTimeout(function () { c.innerHTML = ''; }, 300); }
            }, 5000);
        }

        var otpInputs = document.querySelectorAll('.otp-input');
        otpInputs.forEach(function (input, index) {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '').slice(-1);
                if (this.value.length === 1 && index < otpInputs.length - 1) otpInputs[index + 1].focus();
            });
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && !this.value && index > 0) otpInputs[index - 1].focus();
            });
            input.addEventListener('paste', function (e) {
                e.preventDefault();
                var data = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
                for (var i = 0; i < data.length && index + i < otpInputs.length; i++) otpInputs[index + i].value = data[i];
                var next = Array.from(otpInputs).findIndex(function (x) { return !x.value; });
                (next !== -1 ? otpInputs[next] : otpInputs[otpInputs.length - 1]).focus();
            });
        });

        /* ── OTP submit ── */
        document.getElementById('otpForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var verifyBtn = document.getElementById('verifyBtn');
            var originalHTML = verifyBtn.innerHTML;
            var otp = '';
            otpInputs.forEach(function (i) { otp += i.value; });

            if (otp.length === 6) {
                verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Verifying…';
                verifyBtn.disabled = true;

                $.ajax({
                    type: "POST",
                    url: "/verifyOtp",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        otp: otp,
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.success === true) {
                            showAlert('✓ OTP verified successfully! Redirecting to dashboard…', 'success');
                            location.href = '/dashboard'

                        } else {
                            showAlert('❌ ' + response.message, 'danger');
                            verifyBtn.innerHTML = originalHTML;
                            verifyBtn.disabled = false;
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Status:", status); console.error("Error:", error);
                        showAlert('❌ Server error. Please try again later.', 'danger');
                        verifyBtn.innerHTML = originalHTML;
                        verifyBtn.disabled = false;
                    }
                });
            } else {
                showAlert('⚠ Please enter all 6 digits', 'warning');
            }
        });

        /* ── countdown ── */
        var countdownInterval;
        function startCountdown() {
            var timeLeft = 300;
            var el = document.getElementById('countdown');
            clearInterval(countdownInterval);
            countdownInterval = setInterval(function () {
                timeLeft--;
                var m = Math.floor(timeLeft / 60);
                var s = timeLeft % 60;
                el.textContent = String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');
                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    showAlert('⏱ Code expired. Please request a new one.', 'danger');
                }
            }, 1000);
        }

        /* ── resend OTP ── */
        document.getElementById('resendOtp').addEventListener('click', function (e) {
            e.preventDefault();
            showAlert('📧 Sending a new OTP to your email…', 'info');
            otpInputs.forEach(function (i) { i.value = ''; });
            otpInputs[0].focus();
            $.ajax({
                type: "POST",
                url: "commonfunc.php",
                data: { resendOtp: JSON.stringify({ action: 'resend_otp', email: document.getElementById('userEmail').textContent }) },
                dataType: "json",
                success: function (response) {
                    if (response.success === true) {
                        showAlert('✅ OTP resent successfully!', 'success');
                    } else {
                        showAlert('❌ ' + response.message, 'danger');
                    }
                }
            });
            startCountdown();
        });

        /* ── back to login ── */
        document.getElementById('backToLogin').addEventListener('click', function (e) {
            e.preventDefault();
            clearInterval(countdownInterval);
            showLogin();
            otpInputs.forEach(function (i) { i.value = ''; });
            document.getElementById('loginForm').reset();
        });

        /* ── PWA install ── */
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js')
                .then(function () { console.log('Service Worker registered'); })
                .catch(function (err) { console.log('SW registration failed:', err); });
        }

        var deferredPrompt;
        var installBtn = document.getElementById('installBtn');
        var installStatus = document.getElementById('installStatus');

        window.addEventListener('beforeinstallprompt', function (e) {
            e.preventDefault();
            deferredPrompt = e;
            installBtn.classList.remove('hidden');
            installStatus.textContent = 'App is ready to install';
        });

        installBtn.addEventListener('click', async function () {
            if (!deferredPrompt) return;
            deferredPrompt.prompt();
            var result = await deferredPrompt.userChoice;
            console.log('User response:', result.outcome);
            deferredPrompt = null;
            installBtn.classList.add('hidden');
            if (result.outcome === 'accepted') installStatus.textContent = '✅ App installed successfully!';
        });

        window.addEventListener('appinstalled', function () {
            console.log('PWA installed');
            installStatus.textContent = '✅ App installed successfully!';
            installBtn.classList.add('hidden');
        });
    </script>
</body>

</html>