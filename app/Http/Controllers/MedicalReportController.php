<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MedicalReportController extends Controller
{
    public function showForm()
    {
        return view('medical_reports.upload');
    }

    public function explain(Request $request)
    {
        $request->validate([
            'report' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'detail_level' => 'sometimes|in:simple,detailed,visual'
        ]);

        $file = $request->file('report');
        $detailLevel = $request->input('detail_level', 'detailed');

        $response = Http::timeout(60)
            ->attach(
                'file',
                file_get_contents($file),
                $file->getClientOriginalName()
            )
            ->post('http://127.0.0.1:5000/', [
                'detail_level' => $detailLevel
            ]);

        if ($response->failed()) {
            return back()
                ->withErrors(['error' => 'Failed to process report: ' . $response->body()])
                ->withInput();
        }

        return redirect()->route('results')->with([
            'original' => $response['original'] ?? '',
            'simplified' => $response['simplified'] ?? '',
            'detail_level' => $detailLevel,
            'filename' => $file->getClientOriginalName()
        ]);
    }

    public function showResults(Request $request)
    {
        if (!$request->session()->has('original')) {
            return redirect()->route('upload.form');
        }

        return view('medical_reports.result', [
            'original' => $request->session()->get('original'),
            'simplified' => $request->session()->get('simplified'),
            'detail_level' => $request->session()->get('detail_level', 'detailed'),
            'filename' => $request->session()->get('filename')
        ]);
    }

    // public function reprocess(Request $request)
    // {
    //     $request->validate([
    //         'text' => 'required|string',
    //         'detail_level' => 'required|in:simple,detailed,visual'
    //     ]);

    //     $response = Http::post('http://127.0.0.1:5000/reprocess', [
    //         'text' => $request->text,
    //         'detail_level' => $request->detail_level
    //     ]);

    //     if ($response->failed()) {
    //         return response()->json([
    //             'error' => 'Failed to reprocess text'
    //         ], 500);
    //     }

    //     return response()->json([
    //         'simplified' => $response->json()['simplified'] ?? 'No explanation returned.'
    //     ]);
    // }


    public function reprocess(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'detail_level' => 'required|in:simple,detailed,visual'
        ]);

        $response = Http::post('http://127.0.0.1:5000/reprocess', [
            'text' => $request->text,
            'detail_level' => $request->detail_level
        ]);

        return response()->json([
            'simplified' => $response->json()['simplified'] ?? 'No explanation returned.'
        ]);
    }

}
