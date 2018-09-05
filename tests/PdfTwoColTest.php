<?php
/*
 * This file is part of the Artemeon Core - Web Application Framework.
 *
 * (c) Artemeon <www.artemeon.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Artemeon\Pdf\Tests;

use Artemeon\Pdf\Pdf;
use PHPUnit\Framework\TestCase;

class PdfTwoColTest extends TestCase
{

    public function test()
    {

        //test code
        $strFile = "testTwoColPdf.pdf";

        $objPdf = new Pdf();
        $objPdf->setStrTitle("Kajona Test PDF ");
        $objPdf->setStrSubject("Testing the pdf classes");


        $objPdf->setBitFooter(false);
        $objPdf->setBitHeader(false);

        $objPdf->addPage(Pdf::$PAGE_ORIENTATION_PORTRAIT);
        $objPdf->addCell("", 0, 100);
        $objPdf->addCell("Sample PDF", 0, 0, array(false, false, false, false), Pdf::$TEXT_ALIGN_CENTER);
        $objPdf->setFont("helvetica", 8, Pdf::$FONT_STYLE_ITALIC);
        $objPdf->addCell("powered by Kajona & TCPDF", 0, 0, array(false, false, false, false), Pdf::$TEXT_ALIGN_CENTER);
        $objPdf->setFont("helvetica", 12, Pdf::$FONT_STYLE_REGULAR);




        $objPdf->addPage(Pdf::$PAGE_ORIENTATION_LANDSCAPE);
        $objPdf->setBitHeader(true);
        $objPdf->setBitFooter(true);

        $objPdf->addBookmark("multicolumn");

        $objPdf->setNumberOfColumns(2);
        $objPdf->selectColumn();

        for ($i = 1; $i <= 30; $i++) {

            $objPdf->addCell("Content {$i} in Column");
            $objPdf->addParagraph("This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text");

        }



        $objPdf->addTableOfContents("Inhalt", 2, Pdf::$PAGE_ORIENTATION_PORTRAIT);

        $objPdf->savePdf(__dir__.DIRECTORY_SEPARATOR.$strFile);
        $this->assertFileExists(__dir__.DIRECTORY_SEPARATOR.$strFile);
    }

}

