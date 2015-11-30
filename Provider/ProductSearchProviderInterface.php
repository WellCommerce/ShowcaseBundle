<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\AppBundle\Provider;

use WellCommerce\Bundle\AppBundle\Query\SimpleQuery;

/**
 * Interface ProductSearchProviderInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ProductSearchProviderInterface
{
    /**
     * @param SimpleQuery $query
     *
     * @return ProductSearchProviderInterface
     */
    public function searchProducts(SimpleQuery $query);

    /**
     * @return array
     */
    public function getResultIdentifiers();
}
