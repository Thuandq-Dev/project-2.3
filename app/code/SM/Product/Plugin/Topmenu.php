<?php

namespace SM\Product\Plugin;

use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\UrlInterface;

class   Topmenu
{
    /**
     * @var NodeFactory
     */
    protected $nodeFactory;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param NodeFactory $nodeFactory
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        NodeFactory $nodeFactory,
        UrlInterface $urlBuilder
    ){
        $this->nodeFactory = $nodeFactory;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @param \Magento\Theme\Block\Html\Topmenu $subject
     * @param $outermostClass
     * @param $childrenWrapClass
     * @param $limit
     * @return void
     */
    public function beforeGetHtml(\Magento\Theme\Block\Html\Topmenu $subject, $outermostClass = '', $childrenWrapClass = '', $limit = 0)
    {
        $menuNode = $this->nodeFactory->create(['data' => $this->getNodeAsArray("List Product", "list-product"),
            'idField' => 'id',
            'tree' => $subject->getMenu()->getTree(),]);
//        $menuNode->addChild($this->nodeFactory->create(['data' => $this->getNodeAsArray("MainMenu", "mnuMyMenu"),
//            'idField' => 'id',
//            'tree' => $subject->getMenu()->getTree(),]));

        $subject->getMenu()->addChild($menuNode);

    }

    /**
     * @param $name
     * @param $id
     * @return array
     */
    protected function getNodeAsArray($name, $id)
    {
        $url = $this->urlBuilder->getUrl("/").'product/index/index'; //here you can add url as per your choice of menu
        return [
            'name' => __($name),
            'id' => $id,
            'url' => $url,
            'has_active' => false,
            'is_active' => false
            ];
    }
}
