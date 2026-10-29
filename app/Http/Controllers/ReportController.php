<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ReportController;
use App;
use Auth;
use App\Models\Payment;

class ReportController extends Controller{
    public function report($pid)
{
    $payment = Payment::with(['enrollment.student', 'enrollment.batch'])->find($pid);

    if (!$payment) {
        return abort(404, "Payment not found");
    }

    $pdf = App::make('dompdf.wrapper');

    $print = "<div style='margin:20px; padding:20px;'>";
    $print .= "<h1 align='center'> Payment Receipt </h1>";
    $print .= "<hr/>";

    $print .= "<p> Receipt No: <b> {$pid} </b> </p>";
    $print .= "<p> Date: <b> {$payment->paid_date} </b> </p>";

    // Kiểm tra enrollment và student có tồn tại không
    if ($payment->enrollment && $payment->enrollment->student) {
        $print .= "<p> Enrollment No: <b> {$payment->enrollment->enroll_no} </b> </p>";
        $print .= "<p> Student Name: <b> {$payment->enrollment->student->name} </b> </p>";
    } else {
        $print .= "<p style='color:red;'> No enrollment/student data found! </p>";
    }

    $print .= "<hr/>";
    $print .= "<table style='width: 100%; border-collapse: collapse;' border='1'>";
    
    $print .= "<tr>";
    $print .= "<th>Description</th>";
    $print .= "<th>Amount</th>";
    $print .= "</tr>";

    if ($payment->enrollment && $payment->enrollment->batch) {
        $print .= "<tr>";
        $print .= "<td><h3> {$payment->enrollment->batch->name} </h3></td>";
        $print .= "<td><h3> {$payment->amount} </h3></td>";
        $print .= "</tr>";
    } else {
        $print .= "<tr><td colspan='2' style='color:red;'> No batch data found! </td></tr>";
    }

    $print .= "</table>";
    $print .= "<hr/>";

    $print .= "<span> Printed By: <b>" . Auth::user()->name . "</b> </span><br/>";
    $print .= "<span> Printed Date: <b>" . date('Y-m-d') . "</b> </span>";

    $print .= "</div>";

    $pdf->loadHTML($print);
    return $pdf->stream();
}

    
}
?>