<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/17
 * Time: 22:15
 */

namespace Kyanag\Form\Tests;

use Doctrine\Common\Annotations\AnnotationReader;
use Kyanag\Form\App;
use Kyanag\Form\Field;
use Kyanag\Form\Interfaces\Renderable;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Class TestCase
 * @package Kyanag\Form\Tests
 */
abstract class TestCase extends PHPUnitTestCase
{

    protected $app;

    protected function setUp()
    {

    }
}