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
class PdfFooter implements PdfFooterInterface
{
    private string $strFooterAddon = '';

    private bool $bitSkipFirstPage = false;

    private string $dateFormat = 'm/d/Y';

    /**
     * Writes the footer for a single page.
     * Use the passed $objPdf to access the pdf.
     */
    public function writeFooter(PdfTcpdf $objPdf): void
    {
        if ($this->bitSkipFirstPage && $objPdf->getPage() == 1) {
            return;
        }

        // Position at 1.5 cm from bottom
        $objPdf->SetY(-10);
        // Set font
        $objPdf->SetFont('helvetica', 'I', 8);
        // Page number
        $objPdf->Cell(0, 0, $objPdf->getAliasNumPage() . '/' . $objPdf->getAliasNbPages(), 'T', 0, 'R');

        $objPdf->SetY(-10);

        $date = date($this->dateFormat, time());
        // date
        $objPdf->Cell(0, 0, '' . $date . $this->strFooterAddon, '0', 0, 'L');
    }

    public function setStrFooterAddon(string $strFooterAddon): void
    {
        $this->strFooterAddon = $strFooterAddon;
    }

    public function getStrFooterAddon(): string
    {
        return $this->strFooterAddon;
    }

    public function getBitSkipFirstPage(): bool
    {
        return $this->bitSkipFirstPage;
    }

    public function setBitSkipFirstPage(bool $bitSkip): void
    {
        $this->bitSkipFirstPage = $bitSkip;
    }

    public function setDateFormat(string $dateFormat): void
    {
        $this->dateFormat = $dateFormat;
    }
}
