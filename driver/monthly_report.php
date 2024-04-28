<?php
require_once('tcpdf/tcpdf.php');
include 'config.php';

// Start the session
session_start();

$driver_email = $_SESSION['email'];

// Fetch d_id from the database using the driver's email
$sql_driver = "SELECT d_id FROM driver WHERE email = '$driver_email'";
$result_driver = $con->query($sql_driver);
$row_driver = $result_driver->fetch_assoc();
$driver_id = $row_driver['d_id'];

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Booking Report');
$pdf->SetSubject('Booking Report');
$pdf->SetKeywords('TCPDF, PDF, booking, report');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Get current month and year
$current_month = date('m');
$current_year = date('Y');

// Fetch data for the previous month
$previous_month = $current_month - 1;
$previous_month_year = $current_year;
if ($previous_month == 0) {
    $previous_month = 12;
    $previous_month_year = $current_year - 1;
}

// Calculate the first and last day of the previous month
$first_day_of_previous_month = date('Y-m-01', strtotime("$previous_month_year-$previous_month-01"));
$last_day_of_previous_month = date('Y-m-t', strtotime("$previous_month_year-$previous_month-01"));

// Fetch data from the database for the specific driver and previous month
$sql = "SELECT * FROM bookings WHERE d_id = '$driver_id' AND booking_date BETWEEN '$first_day_of_previous_month' AND '$last_day_of_previous_month'";
$result = $con->query($sql);

// Initialize totals
$total_bookings = $total_cancelled = $total_completed = $total_earnings = 0;

// Calculate total cancelled, completed bookings, and earnings
while ($row = $result->fetch_assoc()) {
    $total_bookings++;
    if ($row['status'] == 'cancelled') {
        $total_cancelled++;
    } elseif ($row['status'] == 'completed') {
        $total_completed++;
        $total_earnings += $row['earnings'];
    }
}

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Output the report for the previous month
$html = '<h1>Booking Report - ' . date('F Y', strtotime("$previous_month_year-$previous_month-01")) . '</h1>';
$html .= '<p>Total Bookings: ' . $total_bookings . '</p>';
$html .= '<p>Total Cancelled: ' . $total_cancelled . '</p>';
$html .= '<p>Total Completed: ' . $total_completed . '</p>';
$html .= '<p>Total Earnings: LKR' . $total_earnings . '</p>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document for the previous month
ob_end_clean(); // Clear any previously generated PDF output
$pdf->Output("booking_report_" . date('F_Y', strtotime("$previous_month_year-$previous_month-01")) . ".pdf", 'D');

// Close connection
$con->close();
?>
