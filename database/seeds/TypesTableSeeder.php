<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['active', 'relax', 'trekking', 'sea', 'mountain', 'art', 'cities'];

        foreach ($types as $type)
        {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($type);
            $new_type->save();
        }
    }
}
