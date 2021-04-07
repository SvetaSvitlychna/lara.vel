<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public $posts =[
        ['title'=> "Beautiful Day",
        'content'=> "Lorem Ipsum is simply dummy text of the printing and typesetting 
        industry. Lorem Ipsum has been the industry's standard dummy text ever since 
        the 1500s, when an unknown printer took a galley of type and scrambled it to 
        make a type specimen book. It has survived not only five centuries, but also
         the leap into electronic typesetting, remaining essentially unchanged. It was 
         popularised in the 1960s with the release of Letraset sheets containing Lorem 
         Ipsum passages, and more recently with desktop 
        publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        'votes'=> 5,
        'status'=> 1,
        'category_id'=>1,
        'user_id'=>2
        ],
        ['title'=> "Summer Day",
        'content'=> "Lorem Ipsum is simply dummy text of the printing and typesetting 
        industry. Lorem Ipsum has been the industry's standard dummy text ever since 
        the 1500s, when an unknown printer took a galley of type and scrambled it to 
        make a type specimen book.",
        'votes'=> 10,
        'status'=> 1,
        'category_id'=>3,
        'user_id'=>5
        ],
        ['title'=> "Winter Day",
        'content'=> "It has survived not only five centuries, but also
         the leap into electronic typesetting, remaining essentially unchanged. It was 
         popularised in the 1960s with the release of Letraset sheets containing Lorem 
         Ipsum passages, and more recently with desktop 
        publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        'votes'=> 2,
        'status'=> 1,
        'category_id'=>5,
        'user_id'=>7
        ],
    ];
    
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement ('TRUNCATE TABLE posts');
        foreach($this->posts as $value){
            \DB::insert("INSERT INTO posts (title, content, votes, category_id, user_id, status) VALUES (?, ?, ?, ?, ?, ?)",
             [$value['title'],$value['content'],$value['votes'], $value['status'],$value['category_id'],$value['user_id'] ]);
        }
    }
}
