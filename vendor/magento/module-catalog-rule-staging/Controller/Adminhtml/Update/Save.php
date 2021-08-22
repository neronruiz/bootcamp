<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogRuleStaging\Controller\Adminhtml\Update;

use Magento\Backend\App\Action;
use Magento\Staging\Model\Entity\Update\Save as StagingUpdateSave;

/**
 * Class Save
 */
class Save extends Action
{
    /**
     * Entity request identifier
     */
    const ENTITY_IDENTIFIER = 'rule_id';

    /**
     * Entity name
     */
    const ENTITY_NAME = 'catalogrule';

    /**
     * @var StagingUpdateSave
     */
    protected $stagingUpdateSave;

    /**
     * @param Action\Context $context
     * @param StagingUpdateSave $stagingUpdateSave
     */
    public function __construct(
        Action\Context $context,
        StagingUpdateSave $stagingUpdateSave
    ) {
        $this->stagingUpdateSave = $stagingUpdateSave;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magento_Staging::staging')
        && $this->_authorization->isAllowed('Magento_CatalogRule::promo_catalog');
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return $this->stagingUpdateSave->execute(
            [
                'entityId' => $this->getRequest()->getParam(static::ENTITY_IDENTIFIER),
                'stagingData' => $this->getRequest()->getParam('staging'),
                'entityData' => $this->getRequest()->getPostValue()

            ]
        );
    }
}
