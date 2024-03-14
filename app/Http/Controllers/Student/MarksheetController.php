<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Marksheet;
use App\Models\MarksheetDetail;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Redirect;
use Dompdf\Options;

class MarksheetController extends Controller
{
    public function create()
    {
        $marksheet  =  new Marksheet();
        $marksheet_detail  =  new MarksheetDetail();
        return view('marksheet.create', compact('marksheet', 'marksheet_detail'));
    }

    public function store(Request $request)
    {
        $request->merge(['created_by' => auth()->user()->id]);
        $requestData =  $request->all();
        $marksheet_detail  =  $request->all()['marksheet_detail'];
        unset($requestData['marksheet_detail']);

        $marksheet  =  Marksheet::create($requestData);

        foreach ($marksheet_detail as $detail) {
            MarksheetDetail::create([
                'marksheet_id' => $marksheet->id,
                'subject_name' => $detail['subject_name'],
                'full_marks' => $detail['full_marks'],
                'pass_marks' => $detail['pass_marks'],
                'marks_obtained' => $detail['marks_obtained'],
            ]);
        };
        $response  = [
            'status' => 'sucess'
        ];
        return response()->json($response);
    }

    public function index(Request $request)
    {
        $marksheets = Marksheet::orderBy('id', 'asc')->get();
        return view('marksheet.index', compact('marksheets'));
    }

    public function generate_marksheet(Request $request, Marksheet $marksheet)
    {
        $marksheet_detail  =  $marksheet->MarksheetDetails()->get();

        // print_r($marksheet_detail -> all());
        $total_marks  =  0;
        $total_obtained  =  0;
        foreach ($marksheet_detail -> all() as $detail) {
            $total_marks  += $detail -> full_marks;
            $total_obtained  += $detail -> marks_obtained;
        }
        $percentage = round(( $total_obtained * 100 ) / $total_marks, 2); 

        // print_r($total_marks);
        // print_r($total_marks);

        $htmlContent = view('marksheet.marksheet', compact('marksheet', 'percentage'));

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($htmlContent);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        // Output PDF to browser
        return response($dompdf->output(), 200)->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="document.pdf"');
    }

    public function delete_marksheet(Request $request, Marksheet $marksheet)
    {
        $marksheet->delete();
        return Redirect::route('marksheet.all')->with('status', 'marksheet-deleted');

    }
}
