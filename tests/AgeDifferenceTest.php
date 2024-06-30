<?php
use PHPUnit\Framework\TestCase;

class AgeDifferenceTest extends TestCase
{
    public function testAgeDifferenceCalculation()
    {
        $_POST['string1'] = 'Daniel';
        $_POST['string2'] = 'David';

        ob_start();
        include 'process.php';
        $output = ob_get_clean();

        // Perform assertions
        $this->assertStringContainsString('String 1: <strong>Daniel</strong>', $output);
        $this->assertStringContainsString('String 2: <strong>David</strong>', $output);
        $this->assertStringContainsString('The age difference between <strong>Daniel</strong> and <strong>David</strong> is', $output);
    }
}

