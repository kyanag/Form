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
use League\Container\Container;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Psr\Container\ContainerInterface;

/**
 * Class TestCase
 * @package Kyanag\FormBuilder\Tests
 */
abstract class TestCase extends PHPUnitTestCase
{

    /** @var Container */
    protected $container;

    protected function setUp()
    {
        require_once "functions.php";

        //pass
    }
}