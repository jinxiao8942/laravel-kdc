<?php

class ContentTableSeeder extends DatabaseSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content')->delete();

        Content::create(array('body' => 'first sentence', 'type' => 'homepage'));
        Content::create(array('body' => 'second sentence', 'type' => 'homepage'));
        Content::create(array('body' => 'third sentence', 'type' => 'homepage'));
        Content::create(array('body' => 'forth sentence', 'type' => 'homepage'));
    }

}
