<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ali
 * Date: 4/15/14
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Ali\ProductBundle\Service;
use Ali\ProductBundle\Entity\Product;

Class ProductSerializer
{
    private $router;
    function __construct($router)
    {
        $this->router = $router;
    }


    /**
     * @param Product $product
     * @return array
     */
    public function serialize(Product $product) {
        $url = $this->router->generate("product_view", array(
                'id' => $product->getId(),
            ));
        return array(
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'url' => $url,
        );

    }
}