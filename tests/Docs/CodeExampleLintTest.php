<?php
namespace CallFire;

use PHPUnit_Framework_TestCase as TestCase;

use RegexIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class CodeExampleLintTest extends TestCase
{
    /**
     * @dataProvider provideDocumentationFiles
     */
    public function testPhpCodeBlocks($file, $contents)
    {
        preg_match_all('#```php(.*)```#Us', $contents, $codeBlocks);
        
        $tempFile = tempnam(sys_get_temp_dir(), 'codeblock_');
        
        foreach($codeBlocks[1] as $codeBlock) {
            file_put_contents($tempFile, $codeBlock);
            
            unset($output);
            exec("php -l {$tempFile}", $output, $result);
            
            $this->assertEquals(0, $result, $codeBlock.PHP_EOL.implode(PHP_EOL, $output));
        }
    }

    public function provideDocumentationFiles()
    {
        $data = array();
        
        $iterator = new RegexIterator(
            new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator(__DIR__.'/../../docs')
            )
        , '#.*\.md$#');
        
        foreach($iterator as $file) {
            $data[] = array(
                $file,
                file_get_contents($file),
            );
        }
        
        return $data;
    }
}
