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

    private $strFooterAddon = "";

    private $bitSkipFirstPage = false;

    private $dateFormat = "m/d/Y";




    /**
     * Writes the footer for a single page.
     * Use the passed $objPdf to access the pdf.
     *
     * @param PdfTcpdf $objPdf
     * @return void
     */
    public function writeFooter($objPdf)
    {

        if ($this->bitSkipFirstPage && $objPdf->getPage() == 1) {
            return;
        }

        // Position at 1.5 cm from bottom
        $objPdf->SetY(-10);
        // Set font
        $objPdf->SetFont('helvetica', 'I', 8);
        // Page number
        $objPdf->Cell(0, 0, $objPdf->getAliasNumPage().'/'.$objPdf->getAliasNbPages(), 'T', 0, 'R');

        $objPdf->SetY(-10);

        $date = date($this->dateFormat, time());
        //date
        $objPdf->Cell(0, 0, ''.$date.$this->strFooterAddon, '0', 0, 'L');

    }

    /**
     * @param string $strFooterAddon
     * @return void
     */
    public function setStrFooterAddon($strFooterAddon)
    {
        $this->strFooterAddon = $strFooterAddon;
    }

    /**
     * @return string
     */
    public function getStrFooterAddon()
    {
        return $this->strFooterAddon;
    }

    /**
     * @return bool
     */
    public function getBitSkipFirstPage(): bool
    {
        return $this->bitSkipFirstPage;
    }

    /**
     * @param bool $bitSkipFirstPage
     */
    public function setBitSkipFirstPage(bool $bitSkipFirstPage)
    {
        $this->bitSkipFirstPage = $bitSkipFirstPage;
    }

    /**
     * @param string $dateFormat
     */
    public function setDateFormat(string $dateFormat)
    {
        $this->dateFormat = $dateFormat;
    }



}
