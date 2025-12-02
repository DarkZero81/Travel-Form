<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel Information Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background: linear-gradient(135deg,
                    #0c0c0c 0%,
                    #2a5d3b 50%,
                    #185b2b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-form {
            max-width: 42em;
            width: 100%;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1s ease-out;
        }

        .title {
            color: white;
            background: #185b2b;
            position: relative;
            font-family: 'Lucida Sans', sans-serif;
            padding: 10px 20px;
            border-radius: 30px;
            display: inline-block;
            margin-bottom: 20px;
        }

        form {
            border: #45a56b solid 3px;
            border-radius: 10px;
            padding: 25px;
            background: white;
        }

        .form-heading {
            color: #333;
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-floating input,
        .form-floating select {
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-floating input:focus,
        .form-floating select:focus {
            border-color: #58bc82;
            box-shadow: 0 0 10px rgba(88, 188, 130, 0.4);
        }

        #label {
            color: #58bc82;
        }

        .submit {
            width: 100%;
            padding: 15px;
            background-color: #58bc82;
            color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit:hover {
            background-color: #45a56b;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(88, 188, 130, 0.3);
        }

        .submit:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            font-size: 14px;
            color: #333;
            margin-top: 20px;
        }

        .signup-link a {
            color: #58bc82;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #45a56b;
        }

        .spinner {
            --size: 30px;
            --first-block-clr: #005bba;
            --second-block-clr: #fed500;
            --clr: #111;
            width: 100px;
            height: 100px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            display: none;
        }

        .spinner::after,
        .spinner::before {
            box-sizing: border-box;
            position: absolute;
            content: "";
            width: var(--size);
            height: var(--size);
            top: 50%;
            animation: up 2.4s cubic-bezier(0, 0, 0.24, 1.21) infinite;
            left: 50%;
            background: var(--first-block-clr);
        }

        .spinner::after {
            background: var(--second-block-clr);
            top: calc(50% - var(--size));
            left: calc(50% - var(--size));
            animation: down 2.4s cubic-bezier(0, 0, 0.24, 1.21) infinite;
        }

        @keyframes down {

            0%,
            100% {
                transform: none;
            }

            25% {
                transform: translateX(100%);
            }

            50% {
                transform: translateX(100%) translateY(100%);
            }

            75% {
                transform: translateY(100%);
            }
        }

        @keyframes up {

            0%,
            100% {
                transform: none;
            }

            25% {
                transform: translateX(-100%);
            }

            50% {
                transform: translateX(-100%) translateY(-100%);
            }

            75% {
                transform: translateY(-100%);
            }
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 999;
            display: none;
        }

        .alert {
            display: none;
            margin-top: 20px;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }

        .was-validated .form-control:invalid~.invalid-feedback {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom Checkbox Styles */
        .checkbox-container {
            display: flex;
            align-items: flex-start;
            margin: 20px 0;
            padding: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        /* Hide the default checkbox */
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .custom-checkbox {
            display: block;
            position: relative;
            cursor: pointer;
            font-size: 1.5rem;
            margin-right: 15px;
            margin-top: 3px;
        }

        /* Create a custom checkbox */
        .checkmark {
            --clr: #0B6E4F;
            position: relative;
            top: 0;
            left: 0;
            height: 1.3em;
            width: 1.3em;
            background-color: #ccc;
            border-radius: 50%;
            transition: 300ms;
        }

        /* When the checkbox is checked, add a blue background */
        .custom-checkbox input:checked~.checkmark {
            background-color: var(--clr);
            border-radius: .5rem;
            animation: pulse 500ms ease-in-out;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .custom-checkbox input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .custom-checkbox .checkmark:after {
            left: 0.45em;
            top: 0.25em;
            width: 0.25em;
            height: 0.5em;
            border: solid #E0E0E2;
            border-width: 0 0.15em 0.15em 0;
            transform: rotate(45deg);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 #0B6E4F90;
                rotate: 20deg;
            }

            50% {
                rotate: -20deg;
            }

            75% {
                box-shadow: 0 0 0 10px #0B6E4F60;
            }

            100% {
                box-shadow: 0 0 0 13px #0B6E4F30;
                rotate: 0;
            }
        }

        .terms-label {
            font-size: 0.95rem;
            color: #333;
            line-height: 1.4;
        }

        .terms-label a {
            color: #58bc82;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .terms-label a:hover {
            color: #45a56b;
            text-decoration: underline;
        }

        .terms-error {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
            display: none;
        }

        .was-validated .custom-checkbox input:invalid~.terms-error {
            display: block;
        }
    </style>
</head>

<body>
    <!-- Loading Spinner -->
    <div class="overlay"></div>
    <div class="spinner"></div>

    <!-- Form -->
    <div class="container rounded-3 justify-content-center align-items-center d-flex">
        <form class="login-form needs-validation" action="studentdata.php" method="post" novalidate>
            <div class="form-heading text-center mb-4">
                <h5 class="title text-white rounded-pill animate__animated animate__bounce animate__delay-0.5s">
                    <i class="bi bi-airplane"></i> Travel to Malizia
                </h5>
            </div>

            <!-- Student Name -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="studentName" name="studentname" placeholder="Your name"
                    required>
                <label for="studentName" id="label"><i class="bi bi-person"></i> Student Name</label>
                <div class="invalid-feedback">
                    Please provide your full name.
                </div>
            </div>

            <!-- Birth Date + Phone Number -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="birthDate" name="birth_date" required />
                        <label for="birthDate" id="label">
                            <i class="bi bi-calendar"></i> Birth Date
                        </label>
                        <div class="invalid-feedback">
                            Please provide your birth date.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phoneNumber" name="phone_number"
                            placeholder="Phone Number" pattern="[0-9]{10,15}" required />
                        <label for="phoneNumber" id="label">
                            <i class="bi bi-telephone"></i> Phone Number
                        </label>
                        <div class="invalid-feedback">
                            Please provide a valid phone number (10-15 digits).
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                    required>
                <label for="email" id="label">
                    <i class="bi bi-envelope"></i> Email
                </label>
                <div class="invalid-feedback">
                    Please provide a valid email address.
                </div>
            </div>

            <!-- Study Field -->
            <div class="form-floating mb-3">
                <select class="form-select" id="studyField" name="study_field" required>
                    <option value="" selected disabled>Select your field</option>
                    <option value="IT Engineer">IT Engineer</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Lawyer">Lawyer</option>
                    <option value="Architect">Architect</option>
                    <option value="Other">Other</option>
                </select>
                <label for="studyField" id="label"><i class="bi bi-backpack"></i> Study Field</label>
                <div class="invalid-feedback">
                    Please select your study field.
                </div>
            </div>

            <!-- Terms and Conditions Checkbox -->
            <div class="checkbox-container">
                <label class="custom-checkbox">
                    <input type="checkbox" name="terms" id="termsCheckbox" />
                    <!-- تم إزالة required -->
                    <div class="checkmark"></div>
                </label>
                <div>
                    <label for="termsCheckbox" class="terms-label">
                        <i class="bi bi-check2-square"></i>
                        I agree to the
                        <a href="https://www.youtube.com/watch?v=pxw-5qfJ1dk" target="_blank">
                            Terms and Conditions of the Journey
                        </a>
                        and have the permission to travel
                    </label>
                    <!-- تم إزالة رسالة الخطأ -->
                </div>
            </div>

            <button class="submit" type="submit"><i class="bi bi-send"></i> Send Information</button>
        </form>
    </div>
    <!-- draw.io diagram -->
    <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers tags lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile&gt;\n  &lt;diagram id=\&quot;uvV0shO170rsG4JzQAj7\&quot; name=\&quot;Page-1\&quot;&gt;\n    &lt;mxGraphModel dx=\&quot;708\&quot; dy=\&quot;571\&quot; grid=\&quot;1\&quot; gridSize=\&quot;10\&quot; guides=\&quot;1\&quot; tooltips=\&quot;1\&quot; connect=\&quot;1\&quot; arrows=\&quot;1\&quot; fold=\&quot;1\&quot; page=\&quot;1\&quot; pageScale=\&quot;1\&quot; pageWidth=\&quot;850\&quot; pageHeight=\&quot;1100\&quot; math=\&quot;0\&quot; shadow=\&quot;0\&quot;&gt;\n      &lt;root&gt;\n        &lt;mxCell id=\&quot;0\&quot; /&gt;\n        &lt;mxCell id=\&quot;1\&quot; parent=\&quot;0\&quot; /&gt;\n      &lt;/root&gt;\n    &lt;/mxGraphModel&gt;\n  &lt;/diagram&gt;\n&lt;/mxfile&gt;\n&quot;}"></div>
    <script type="text/javascript" src="https://viewer.diagrams.net/js/viewer-static.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.needs-validation');
            const spinner = document.querySelector('.spinner');
            const overlay = document.querySelector('.overlay');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();

                // إزالة التحقق من checkbox - النموذج يرسل دائماً
                if (form.checkValidity()) {
                    // Show loading spinner
                    spinner.style.display = 'block';
                    overlay.style.display = 'block';

                    // Submit the form after a short delay to show the spinner
                    setTimeout(function() {
                        form.submit();
                    }, 1000);
                }

                form.classList.add('was-validated');
            });


        });
    </script>
</body>

</html>