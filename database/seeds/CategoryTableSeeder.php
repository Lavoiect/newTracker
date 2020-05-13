<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $upcoming = new Category();
        $upcoming->name = 'Upcoming';
        $upcoming->slug = 'upcoming';
        $upcoming->save();

        $active = new Category();
        $active->name = 'Active';
        $active->slug = 'Slug';
        $active->save();

        $complete = new Category();
        $complete->name = 'Complete';
        $complete->slug = 'complete';
        $complete->save();
    }
}
