<?php

namespace GildedRose;

final class NormalItem implements QualityUpdatable
{
    public function __construct(readonly private Item $item)
    {
    }

    public function updateQuality(): void
    {
        $quality = $this->item->quality;

        if ($this->item->sell_in >= 1) {
            $quality -= 1;
        } else {
            $quality -= 2;
        }

        if ($quality < 0) {
            $quality = 0;
        }

        $this->item->quality = $quality;
        $this->item->sell_in -= 1;
    }
}