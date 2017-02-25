<?php
/**
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ShowcaseBundle\Tests\DependencyInjection;

use WellCommerce\Bundle\CoreBundle\Test\DependencyInjection\AbstractExtensionTestCase;

/**
 * Class ShowcaseExtensionTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ShowcaseExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @return array
     */
    public function getRequiredServices(): array
    {
        return [
            'services' => [
                [
                    'showcase.layout_box.configurator',
                    'showcase.box.controller',
                ],
            ],
        ];
    }
}
