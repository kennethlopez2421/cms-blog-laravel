<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
            'name' => 'John Kenneth Lopez',
            'email' => 'johnkennethlopez@gmail.com',
            'password' => Hash::make('password')

        ]);

        $author2 = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('password')

        ]);

        $category1 = Category::create([
            'name' => 'News',


        ]);

        $category2 = Category::create([
            'name' => 'Design',


        ]);

        $category3 = Category::create([
            'name' => 'Partnership',


        ]);

        $category4 = Category::create([
            'name' => 'Offers',


        ]);


        $post1 = $author1->posts()->create([
           'title' => 'We relocated our office to a new designed garage',
            'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'content' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
            
        ]);

        $post2 = $author1->posts()->create([
            'title' => 'New published books to read by a product designer',
             'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
             'content' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ',
             'category_id' => $category2->id,
             'image' => 'posts/3.png'
         ]);

         $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
             'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
             'content' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ',
             'category_id' => $category3->id,
             'image' => 'posts/4.jpg'
         ]);

         $post4 = $author1->posts()->create([
            'title' => 'This is why its time to ditch dress codes at work',
             'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
             'content' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. ',
             'category_id' => $category4->id,
             'image' => 'posts/2.png'
         ]);

         $tag1 = Tag::create([
            'name' => 'Job',

        ]);
        $tag2 = Tag::create([
            'name' => 'Customer',


        ]);
        $tag3= Tag::create([
            'name' => 'Laravel',


        ]);

        $post1->tags()->attach([
            $tag1->id,
            $tag2->id,
            $tag3->id
        ]);
        $post2->tags()->attach([
            $tag1->id,
            $tag2->id,
        ]);
        $post3->tags()->attach([
            $tag1->id,
            $tag3->id
        ]);
        $post4->tags()->attach([
            $tag1->id,
            $tag2->id,
            $tag3->id
        ]);




         
    }
}
