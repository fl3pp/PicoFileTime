<?php

use PicoFileTime\Plugin;
use PicoFileTime\FileSystemWrapper;
use PHPUnit\Framework\TestCase;

class FormIntegrationTest extends TestCase {
    
    public function test_getCreationDate_getFileLastWrite_ReturnsNull() {
        $fs = $this->createMock(FileSystemWrapper::class);
        $fs->method('getFileLastWrite')
           ->willReturn(null)
           ->with('C:\testpage\content\test.md');
        $testee = new Plugin(array('content_dir' => 'C:\testpage\content\\', 'content_ext' => '.md'), $fs);

        $result = $testee->getCreationDate('test');

        $this->assertSame(null, $result);
    }

    public function test_getCreationDate_getFileLastWriteSucceeds_ReturnsTime() {
        $fs = $this->createMock(FileSystemWrapper::class);
        $fs->method('getFileLastWrite')
           ->willReturn(strtotime('2018-01-01'))
           ->with('C:\testpage\content\test.md');
        $testee = new Plugin(array('content_dir' => 'C:\testpage\content\\', 'content_ext' => '.md'), $fs);

        $result = $testee->getCreationDate('test');

        $this->assertSame('2018-01-01', $result);
    }

    public function test_getCreationDate_WithUrl_ReturnsTime() {
        $fs = $this->createMock(FileSystemWrapper::class);
        $fs->method('getFileLastWrite')
           ->willReturn(strtotime('2018-01-01'))
           ->with('C:\testpage\content\test.md');
        $testee = new Plugin(array('content_dir' => 'C:\testpage\content\\', 'content_ext' => '.md'), $fs);

        $result = $testee->getCreationDate('test/');

        $this->assertSame('2018-01-01', $result);
    }

    public function test_getCreationDate_ContentDirNoExt_ReturnsTime() {
        $fs = $this->createMock(FileSystemWrapper::class);
        $fs->method('getFileLastWrite')
           ->willReturn(strtotime('2018-01-01'))
           ->with('C:\testpage\content/test.md');
        $testee = new Plugin(array('content_dir' => 'C:\testpage\content', 'content_ext' => '.md'), $fs);

        $result = $testee->getCreationDate('test');

        $this->assertSame('2018-01-01', $result);
    }

    public function test_getCreationDate_SubDir_ReturnsTime() {
        $fs = $this->createMock(FileSystemWrapper::class);
        $fs->method('getFileLastWrite')
           ->willReturn(strtotime('2018-01-01'))
           ->with('C:\testpage\content\pages/new/test.md');
        $testee = new Plugin(array('content_dir' => 'C:\testpage\content\\', 'content_ext' => '.md'), $fs);

        $result = $testee->getCreationDate('pages/new/test');

        $this->assertSame('2018-01-01', $result);
    }
    
}