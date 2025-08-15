<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Blade;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CurriculumVitaeController extends Controller
{
    private readonly CurriculumVitae $curriculumVitae;

    public function __construct()
    {
        $this->curriculumVitae = CurriculumVitae::query()->orderByDesc('curriculum_vitaes.updated_at')->firstOrFail();
    }

    /**
     * Handle the incoming request.
     */
    public function show(Request $request)
    {
        return view('curriculumvitae.show', [
            'cv' => Markdown::parse($this->curriculumVitae->body),
        ]);
    }

    public function downloadMarkdown(): StreamedResponse
    {
        $cv = CurriculumVitae::query()->latest()->firstOrFail();

        return response()
            ->streamDownload(
                function () {
                    echo $this->curriculumVitae->body;
                },
                "{$this->getFileName()}.md"
            );
    }

    public function downloadPdf(): mixed
    {
        $innerView = view('components.curriculum-vitae', ['cv' => $this->curriculumVitae->body])->render();
        $view = Blade::render('<x-pdf-layout>'.$innerView.'</x-pdf-layout>');
        $domPdf = new DomPDF;
        $options = $domPdf->getOptions();
        $options->setDefaultFont('sans-serif');
        $domPdf->setOptions($options);

        $domPdf->loadHtml($view);
        $domPdf->setPaper('A4');
        $domPdf->render();
        $domPdf->stream("{$this->getFileName()}.pdf");
    }

    private function getFileName(): string
    {
        return sprintf('jack-ellis-%s', $this->curriculumVitae->updated_at->format('Y-m-d'));
    }
}
