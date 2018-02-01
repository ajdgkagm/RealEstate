<?php

use App\Image;
use App\Property;
use App\Type;
use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    public function run()
    {
        $type1 = Type::create([
            'name' => 'Bungalow'
        ]);

        $property = Property::create([
            'caption'   => 'House1',
            'location'  => 'Tanauan City',
            'latitude'  => '14.084073',
            'longitude' => '121.149370',
            'price'     => '2000000',
            'beds'      => '4',
            'bath'      => '3',
            'sqft'      => '800',
            'sqftPrice' => '30000',
            'built'     => '2018-01-31',
        ]);

        $property->types()->attach($type1->id);

        Image::create([
            'path'        => 'public/images/property/',
            'file_name'   => 'test.png',
            'type'        => 'property',
            'position'    => 1,
            'property_id' => $property->id,
        ]);
    }
}
