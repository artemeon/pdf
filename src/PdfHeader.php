<?php
/*
 * This file is part of the Artemeon Core - Web Application Framework.
 *
 * (c) Artemeon <www.artemeon.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Artemeon\Pdf;


/**
 * Sample implementation of a footer.
 *
 * @author stefan.idler@artemeon.de
 */
class PdfHeader implements PdfHeaderInterface
{

    private $bitSkipFirstPage = false;

    /**
     * Writes the header for a single page.
     * Use the passed $objPdf to access the pdf.
     *
     * @param PdfTcpdf $objPdf
     */
    public function writeHeader($objPdf)
    {

        if ($this->bitSkipFirstPage && $objPdf->getPage() == 1) {
            return;
        }

        $objPdf->SetY(3);

        $objPdf->SetFont('helvetica', '', 8);

        // Title
        $objPdf->MultiCell(0, 0, $objPdf->getTitle(), "B", "C");


        // Line break
        $objPdf->Ln(30);

    }

    /**
     * @return bool
     */
    public function getBitSkipFirstPage(): bool
    {
        return $this->bitSkipFirstPage;
    }

    /**
     * @param bool $bitSkip
     */
    public function setBitSkipFirstPage(bool $bitSkip)
    {
        $this->bitSkipFirstPage = $bitSkip;
    }


}
