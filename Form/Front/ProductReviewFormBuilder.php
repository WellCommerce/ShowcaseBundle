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

namespace WellCommerce\Bundle\AppBundle\Form\Front;

use WellCommerce\Bundle\CoreBundle\Form\AbstractFormBuilder;
use WellCommerce\Component\Form\Elements\FormInterface;

/**
 * Class ProductReviewFormBuilder
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductReviewFormBuilder extends AbstractFormBuilder
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormInterface $form)
    {
        $form->addChild($this->getElement('text_field', [
            'name'  => 'nick',
            'label' => $this->trans('product_review.label.nick'),
        ]));

        $form->addChild($this->getElement('hidden', [
            'name'  => 'rating',
            'label' => $this->trans('product_review.label.rating'),
        ]));

        $form->addChild($this->getElement('text_area', [
            'name'  => 'review',
            'label' => $this->trans('product_review.label.review'),
            'rows'  => 5,
            'cols'  => 10
        ]));

        $form->addFilter($this->getFilter('no_code'));
        $form->addFilter($this->getFilter('trim'));
        $form->addFilter($this->getFilter('secure'));
    }
}
