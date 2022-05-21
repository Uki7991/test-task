<?php


namespace App\Services;


class CalculateFreeBlocksVolumeService
{
    public function calculate($data)
    {
        $freeVolume = $data['location']->freeBlocks()->with('room:id,temperature')
                ->where('temperature', '<', $data['temperature'] - 2)
                ->count() * 2;

        return [
            'free_volume' => $freeVolume,
            'required_number_of_blocks' => $freeVolume > $data['product_volume'] ? $data['product_volume'] : $freeVolume,
            'unused_product_volume' => $freeVolume < $data['product_volume'] ? $data['product_volume'] - $freeVolume : 0
        ];
    }
}
