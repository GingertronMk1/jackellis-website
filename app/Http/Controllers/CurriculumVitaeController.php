<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CurriculumVitaeController extends Controller
{
    private readonly CurriculumVitae $curriculumVitae;

    public function __construct()
    {
        $this->curriculumVitae = CurriculumVitae::query()->latest()->firstOrFail();
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
        $view = view('components.curriculum-vitae', ['cv' => $this->curriculumVitae->body])->render();
        $domPdf = new DomPDF;
        $options = $domPdf->getOptions();
        $options->setDefaultFont('sans-serif');
        $domPdf->setOptions($options);

        $appLang = str_replace('_', '-', app()->getLocale());

        $domPdf->loadHtml(<<<HTML
<html lang="{$appLang}">
    <body>
        {$view}
    </body>
</html>
HTML);
        $domPdf->setPaper('A4');
        $domPdf->render();
        $domPdf->stream("{$this->getFileName()}.pdf");
    }

    private function getFileName(): string
    {
        return sprintf('jack-ellis-%s', $this->curriculumVitae->updated_at->format('Y-m-d'));
    }
}
