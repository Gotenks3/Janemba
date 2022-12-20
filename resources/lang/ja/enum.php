<?php

use App\Enums\ProductState;

return [
    ProductState::class => [
        ProductState::New => '新品',
        ProductState::VeryGood => 'とても綺麗',
        ProductState::Good => '綺麗',
        ProductState::Normal => '普通',
        ProductState::Bad => '少し汚れている',
        ProductState::VeryBad => '汚れている',
    ],
]; 