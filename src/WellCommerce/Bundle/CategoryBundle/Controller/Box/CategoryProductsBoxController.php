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

namespace WellCommerce\Bundle\CategoryBundle\Controller\Box;

use WellCommerce\Bundle\CoreBundle\Controller\Box\AbstractBoxController;
use WellCommerce\Bundle\CoreBundle\Controller\Box\BoxControllerInterface;
use WellCommerce\Bundle\LayoutBundle\Collection\LayoutBoxSettingsCollection;
use WellCommerce\Bundle\ProductBundle\Conditions\ProductLayeredNavigationConditions;

/**
 * Class CategoryProductsBoxController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CategoryProductsBoxController extends AbstractBoxController implements BoxControllerInterface
{
    /**
     * @var \WellCommerce\Bundle\CategoryBundle\Manager\Front\CategoryManager
     */
    protected $manager;

    /**
     * {@inheritdoc}
     */
    public function indexAction(LayoutBoxSettingsCollection $boxSettings)
    {
        $dataset       = $this->get('product.dataset.front');
        $requestHelper = $this->manager->getRequestHelper();
        $limit         = $requestHelper->getAttributesBagParam('limit', $boxSettings->getParam('per_page', 12));
        $offset        = $requestHelper->getAttributesBagParam('page', $limit);
        $conditions    = $this->manager->getCurrentCategoryConditions();
        $conditions    = $this->get('product_layered_navigation.helper')->addLayeredNavigationConditions($conditions);

        $products = $dataset->getResult('array', [
            'limit'      => $limit,
            'offset'     => ($offset * $limit) - $limit,
            'order_by'   => $requestHelper->getAttributesBagParam('orderBy', 'name'),
            'order_dir'  => $requestHelper->getAttributesBagParam('orderDir', 'asc'),
            'conditions' => $conditions,
        ]);

        return $this->displayTemplate('index', [
            'dataset' => $products,
        ]);
    }
}
