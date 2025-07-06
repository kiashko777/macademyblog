<?php

declare(strict_types=1);

namespace Juno\Theme\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PhoneNumber implements ArgumentInterface
{
    private $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getPhoneNumber(): string
    {
        return $this->scopeConfig->getValue('general/store_information/phone');
    }
}
