<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Tests\Resource;

use Doctrine\ORM\EntityManager;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ResourceServicesTest extends WebTestCase
{
    /**
     * @test
     */
    public function it_allows_to_access_resource_services_from_container(): void
    {
        $client = parent::createClient();

        $productRepository = $client->getContainer()->get('sylius.repository.product');
        $this->assertTrue($productRepository instanceof RepositoryInterface);

        $productRepository = $client->getContainer()->get('sylius.manager.customer');
        $this->assertTrue($productRepository instanceof EntityManager);

        $productRepository = $client->getContainer()->get('sylius.controller.shipping_method');
        $this->assertTrue($productRepository instanceof ResourceController);

        $productRepository = $client->getContainer()->get('sylius.factory.promotion');
        $this->assertTrue($productRepository instanceof FactoryInterface);
    }
}
