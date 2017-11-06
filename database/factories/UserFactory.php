<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    $category_ids = \App\Category::pluck('id')->toArray();
    return [
        'title' => $faker->name,
        'author_id'=> 1,
        'category_id' => $faker->randomElement($category_ids),
        'seo_title' => $faker->title('mail'),
        'excerpt' => $faker->paragraph,
        'body' => $faker->paragraph,
        'image'=>$faker->imageUrl(),
        'slug' => $faker->slug,
        'meta_description'=>$faker->title,
        'meta_keywords'=>$faker->name
    ];
});

$factory->define(App\Course::class, function (Faker $faker) {
    $category_ids = \App\Category::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'category_id' => $faker->randomElement($category_ids),
        'body' => $faker->paragraph,
        'image'=>$faker->imageUrl(),
        'slug' => $faker->slug,
        'status' => 'published',
        'meta_description'=>$faker->paragraph,
        'meta_keywords'=>$faker->name
    ];
});

$factory->define(App\Lesson::class, function (Faker $faker) {
    $course_ids = \App\Course::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'course_id' => $faker->randomElement($course_ids),
        'body' => $faker->paragraph,
        'image'=>$faker->imageUrl(),
        'slug' => $faker->slug,
        'status' => 'published',
        'meta_description'=>$faker->paragraph,
        'meta_keywords'=>$faker->name,
        'video' => $faker->imageUrl()
    ];
});

$factory->define(\App\Comment::class,function (Faker $faker){
    $postIds = \App\Post::pluck('id')->toArray();
    $userIds = \App\User::pluck('id')->toArray();
    return [
        'body'     => $faker->paragraph,
        'user_id'  => $faker->randomElement($userIds),
        'target_id' => $faker->randomElement($postIds),
        'target_type'=>'post'
    ];
});
