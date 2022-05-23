<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name === 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            $item->sell_in = $item->sell_in - 1;

            if ($item->name === 'Aged Brie') {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                }
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->sell_in <= 0) {
                    $item->quality = 0;
                } elseif ($item->sell_in > 0 && $item->sell_in <= 5) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 3;
                        if ($item->quality > 50) {
                            $item->quality = 50;
                        }
                    }
                } elseif ($item->sell_in <= 10 && $item->sell_in > 5) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 2;
                        if ($item->quality > 50) {
                            $item->quality = 50;
                        }
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            } elseif ($item->name === 'Conjured Mana Cake') {
                if ($item->quality > 0) {
                    if ($item->sell_in < 0) {
                        $item->quality = $item->quality - 4;
                    } else {
                        $item->quality = $item->quality - 2;
                    }
                    if ($item->quality < 0) {
                        $item->quality = 0;
                    }
                }
            } else {
                if ($item->quality > 0) {
                    if ($item->sell_in < 0) {
                        $item->quality = $item->quality - 2;
                    } else {
                        $item->quality = $item->quality - 1;
                    }
                }
            }
        }
    }
}
