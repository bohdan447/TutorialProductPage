<?php

namespace Perspective\TutorialProductPage\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Perspective\TutorialProductPage\ViewModel\Custom as CustomViewModel;

class Custom extends Template
{
    protected $viewModel;

    public function __construct(
        Context $context,
        CustomViewModel $viewModel,
        array $data = []
    ) {
        $this->viewModel = $viewModel;
        parent::__construct($context, $data);
    }

    public function getViewModel()
    {
        return $this->viewModel;
    }
}
