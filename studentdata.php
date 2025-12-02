<?php
// Get form data
$STUDENTNAME = $_POST['studentname'];
$BIRTHDAY = $_POST['birth_date'];
$STUDYFIELD = $_POST['study_field'];
$PHONENUMBER = $_POST['phone_number'];
$EMAIL = $_POST['email'];
$TERMS = isset($_POST['terms']) ? 'Confirmed' : 'Not Confirmed';

// Result variables
$resultType = ''; // 'success' or 'error'
$resultMessage = '';
$resultIcon = '';
$folderType = '';

// Create folders if they don't exist
$confirmedFolder = 'confirmed_students';
$unconfirmedFolder = 'unconfirmed_students';

if (!file_exists($confirmedFolder)) {
    mkdir($confirmedFolder, 0777, true);
}

if (!file_exists($unconfirmedFolder)) {
    mkdir($unconfirmedFolder, 0777, true);
}

// Determine which folder to use based on confirmation status
if ($TERMS === 'Confirmed') {
    $folder = $confirmedFolder;
    $folderType = 'confirmed';
} else {
    $folder = $unconfirmedFolder;
    $folderType = 'unconfirmed';
}

// Create filename with folder path
$filename = $folder . '/' . $STUDENTNAME . "_data.txt";

if (file_exists($filename)) {
    // File already exists - show error
    $resultType = 'error';
    $resultMessage = 'File already exists for this student in the ' . $folderType . ' folder!';
    $resultIcon = 'bi bi-exclamation-circle-fill';
} else {
    // Create and write to file
    $file = fopen($filename, "x+");

    if ($file) {
        fwrite($file, "Student Name: $STUDENTNAME\n");
        fwrite($file, "Birth Date: $BIRTHDAY\n");
        fwrite($file, "Email: $EMAIL\n");
        fwrite($file, "Study Field: $STUDYFIELD\n");
        fwrite($file, "Phone Number: $PHONENUMBER\n");
        fwrite($file, "Confirmation Status: $TERMS\n");
        fwrite($file, "Submission Date: " . date('Y-m-d H:i:s') . "\n");
        fwrite($file, "===================\n");
        fclose($file);

        // Success case - ALWAYS SUCCESS regardless of checkbox
        $resultType = 'success';
        $resultMessage = 'Your information has been saved successfully in the ' . $folderType . ' folder!';
        $resultIcon = 'bi bi-check-circle-fill';
    } else {
        // Error creating file
        $resultType = 'error';
        $resultMessage = 'Unable to create file! Please try again.';
        $resultIcon = 'bi bi-exclamation-circle-fill';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration <?php echo ucfirst($resultType); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        body {
            background: linear-gradient(135deg,
                    #0c0c0c 0%,
                    #1a1a2e 50%,
                    #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }

        .result-container {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 500px;
            width: 100%;
            animation: fadeIn 0.5s ease-in-out;
        }

        .result-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .success-icon {
            color: #28a745;
        }

        .error-icon {
            color: #dc3545;
        }

        .success-title {
            color: #28a745;
        }

        .error-title {
            color: #dc3545;
        }

        .btn-custom {
            background: linear-gradient(135deg, #58bc82 0%, #45a56b 100%);
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(88, 188, 130, 0.4);
            color: white;
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

        .file-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            text-align: left;
        }

        .file-info h6 {
            color: #495057;
            margin-bottom: 10px;
        }

        .file-info p {
            margin: 5px 0;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            margin: 10px 0;
        }

        .confirmed-badge {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .unconfirmed-badge {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
    </style>
</head>

<body>
    <div class="result-container">
        <div class="result-icon <?php echo $resultType === 'success' ? 'success-icon' : 'error-icon'; ?>">
            <i class="<?php echo $resultIcon; ?>"></i>
        </div>

        <h2 class="<?php echo $resultType === 'success' ? 'success-title' : 'error-title'; ?>">
            Registration <?php echo ucfirst($resultType); ?>!
        </h2>

        <p class="mb-4"><?php echo $resultMessage; ?></p>

        <?php if ($resultType === 'success'): ?>
            <!-- Show confirmation status badge -->
            <div class="status-badge <?php echo $folderType === 'confirmed' ? 'confirmed-badge' : 'unconfirmed-badge'; ?>">
                <i class="bi <?php echo $folderType === 'confirmed' ? 'bi-check-circle' : 'bi-exclamation-triangle'; ?>"></i>
                <?php echo $TERMS; ?>
            </div>

            <!-- Show file information for success case -->
            <div class="file-info">
                <h6><i class="bi bi-folder"></i> Storage Information:</h6>
                <p><strong>Folder:</strong> <?php echo $folder; ?>/</p>
                <p><strong>Filename:</strong> <?php echo htmlspecialchars($STUDENTNAME . "_data.txt"); ?></p>
                <p><strong>Confirmation:</strong> <?php echo $TERMS; ?></p>
                <p><strong>Submission Date:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
            </div>

            <div class="alert alert-info" role="alert">
                <p class="mb-0">You will be redirected to the registration page in <span id="countdown">5</span> seconds.</p>
            </div>
        <?php else: ?>
            <!-- Show options for error case -->
            <div class="alert alert-warning" role="alert">
                <p class="mb-0">A file with the name "<?php echo htmlspecialchars($STUDENTNAME . "_data.txt"); ?>" already exists in the <?php echo $folderType; ?> folder.</p>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="Student.html" class="btn btn-custom me-md-2">
                    <i class="bi bi-arrow-left"></i> Back to Form
                </a>
                <button onclick="location.reload()" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-clockwise"></i> Try Again
                </button>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($resultType === 'success'): ?>
        <script>
            let countdown = 5;
            const countdownElement = document.getElementById('countdown');

            const countdownInterval = setInterval(function() {
                countdown--;
                countdownElement.textContent = countdown;

                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    window.location.href = "Student.php";
                }
            }, 1000);
        </script>
    <?php endif; ?>
</body>

</html>