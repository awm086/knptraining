<?php

namespace Ali\ProductBundle\Tests\Service;

use Ali\ProductBundle\Entity\Product;
use Ali\ProductBundle\Service\ProductSerializer;

class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testSerialize()
    {

        // $this->assertEquals(5,6);
        $router = $this->getMockBuilder(
            'Symfony\Bundle\FrameworkBundle\Routing\Router')
          ->disableOriginalConstructor()
          ->getMock();

        $router->expects($this->once())
          ->method('generate')
          ->will($this->returnValue('/fake-page'));

        $productSerializer = new ProductSerializer($router);
        $product = new Product();
        $product->setName('foo-test');
        $ret = $productSerializer->serialize($product);
        $this->assertEquals('foo-test', $ret['name']);
       // $this->assertArrayHasKey('url', $ret);
        $this->assertEquals('/fake-page', $ret['url']);
    }
}
