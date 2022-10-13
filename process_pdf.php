<?php
require_once __DIR__ . '/vendor/autoload.php';

class ProcessPDF
{
    private $source_origin_pdf;
    private $source_qrcode_image;
    private $page;
    private $output_name;

    public function __construct(String $source_origin_pdf, String $source_qrcode_image, int $page = 1, string $output_name = 'newpdf.pdf')
    {
        $this->source_origin_pdf = $source_origin_pdf;
        $this->source_qrcode_image = $source_qrcode_image;
        $this->page = $page;
        $this->output_name = $output_name;
    }

    /**
     * Get the value of page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Get the value of source_origin_pdf
     */
    public function getSourceOriginPdf()
    {
        return $this->source_origin_pdf;
    }

    /**
     * Set the value of source_origin_pdf
     *
     * @return  self
     */
    public function setSourceOriginPdf($source_origin_pdf)
    {
        $this->source_origin_pdf = $source_origin_pdf;

        return $this;
    }
    /*
        DEPRECATED
        USE HANDLE() instead
    */
    public function showPDF($pdf_name) 
    {
        echo <<< HERE
    <div id="my_pdf_viewer">
        <div id="canvas_container">
            <canvas id="pdf_renderer"></canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
    </script>

    <script>
        var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        }
      
        pdfjsLib.getDocument('$pdf_name').then((pdf) => {
      
            myState.pdf = pdf;
            render();
 
        });
 
        function render() {
            myState.pdf.getPage(myState.currentPage).then((page) => {
          
                var canvas = document.getElementById("pdf_renderer");
                var ctx = canvas.getContext('2d');
      
                var viewport = page.getViewport(myState.zoom);
 
                canvas.width = viewport.width;
                canvas.height = viewport.height;
          
                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
        }
    </script>
    HERE;
    }

    public function handle()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->setSourceFile($this->source_origin_pdf); 
        $tplIdx = $mpdf->importPage($this->page);
        $mpdf->useTemplate($tplIdx, 10, 10, 200);
        $mpdf->Image($this->source_qrcode_image, 5, 5, 10, 10);
        $mpdf->Output($this->output_name, \Mpdf\Output\Destination::DOWNLOAD);
    }

    /*
    DEPRECATED
        USE HANDLE() instead
    */
    public function downloadPDF()
    {
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename=" . basename($this->output_name));
        header('Pragma: no-cache');
        readfile($this->output_name);
    }
}
