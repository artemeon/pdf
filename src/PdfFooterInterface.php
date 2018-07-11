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
 * Interface for a single pdf footer element
 *
 * @author stefan.idler@artemeon.de
 */
interface PdfFooterInterface {

    /**
     * Writes the footer for a single page.
     * Use the passed $objPdf to access the pdf.
     *
     * @param PdfTcpdf $objPdf the target pdf-object
     * @return void
     */
    public function writeFooter($objPdf);

    /**
     * If set to true, the first page is rendered without a footer row
     * @param bool $bitSkip
     * @return void
     */
    public function setBitSkipFirstPage(bool $bitSkip);

}
