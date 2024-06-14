<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\AdminSeeder;
use Illuminate\Database\UsersTableSeeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Question;
use App\Models\Opinion;
use App\Models\Like;
use App\Models\Agree;
use App\Models\Disagree;

use App\Models\FAQCategory;
use App\Models\FAQQuestion;
use Illuminate\Support\Carbon;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(UsersTableSeeder::class);
        // $this->call(AdminSeeder::class);



          //ADMIN
          User::create([
            'id' => '7',
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
            'is_admin' => true,
        ]);
        //USERS

        User::create([
            'id' => '1',
            'name' => 'Mateo',
            'username' => 'mateo1723',
            'dateofbirth' => '1990-01-01',
            'email' => 'mateo@gmail.com',
            'password' => 'Password!321',
            'aboutme' => 'I love drifting cars!!.',
            'photo_path'=> 'photos/user1.jpg',
        ]);

        User::create([
            'id' => '2',
            'name' => 'Lucía',
            'username' => 'lucia456',
            'dateofbirth' => '1995-05-10',
            'email' => 'lucia@gmail.com',
            'password' => 'Password!321',
            'aboutme' => 'I am a mecanic that loves learning new things.',
            'photo_path'=> 'photos/user2.jpg',
        ]);

        User::create([
            'id' => '3',
            'name' => 'Charly',
            'username' => 'charly',
            'dateofbirth' => '1988-09-20',
            'email' => 'carlos@gmail.com',
            'password' => 'Password!321',
            'aboutme' => 'I am a professional pilot, I love meeting new people',
            'photo_path'=>'photos/user3.jpg',
        ]);
        User::create([
            'id' => '4',
            'name' => 'Jony',
            'username' => 'jonymet',
            'dateofbirth' => '1994-07-01',
            'email' => 'jony@gmail.com',
            'password' => 'Password!321',
            'aboutme' => 'Retired mecanic',
            'photo_path'=>'photos/user4.jpg',
        ]);

        User::create([
            'id' => '5',
            'name' => 'Karl',
            'username' => 'Karl3',
            'dateofbirth' => '1997-05-24',
            'email' => 'karl@gmail.com',
            'password' => 'Password!321',
            'aboutme' => 'Hey guys! I have a beautiful E30 and I love cars ',
        ]);

        User::create([
            'id' => '6',
            'name' => 'Rose',
            'username' => 'rosie',
            'dateofbirth' => '1978-09-02',
            'email' => 'rosie25@gmail.com',
            'password' => 'Password!321',
            'aboutme' => '4X4 LOVER!!!',
            'photo_path'=> 'photos/user6.jpg',
        ]);

        //POSTS

        Post::create([
            'id' => '1',
            'title' => 'Test Post',
            'message' => 'Students of Toronto have made a new car with three wheels. It reaches 80km/h. They sell it 5.000$',
            'user_id' => '6',
            'photo_path' => 'photos/post1.jpg',
            'created_at' => Carbon::parse('2024-06-13 10:35:00'),
        ]);

        Post::create([
            'id' => '2',
            'title' => 'The fastest car of the world',
            'message' => 'Buggati Chiron has been choosen as the fastest car in the world. It reaches 360km/h. It has really special wheels, normals wheels could not afford that speed. The price of the tyres is about 20.000€ all of them.',
            'user_id' => '3',
            'photo_path' => 'photos/post2.jpg',
            'created_at' => Carbon::parse('2021-03-01 07:35:00'),
        ]);

        Post::create([
            'id' => '3',
            'title' => '4x4 car event this saturday 24',
            'message' => 'For all the lovers of 4x4, this saturday there will be a special event in Kortijk. It is completely free and everybody is welcome!!',
            'user_id' => '4',
            'photo_path' => 'photos/post3.jpg',
            'created_at' => Carbon::parse('2021-06-17 17:35:00'),
        ]);

        Post::create([
            'id' => '4',
            'title' => 'Is this the lowest quad ever???',
            'message' => 'This quad is 15cm lowered. It has about 12.000€ in modifications. It is a Yamaha Raptor 700R with the engine changed. The engine it has is a Duccati 1000cm^3',
            'user_id' => '1',
            'photo_path' => 'photos/post4.jpg',
            'created_at' => Carbon::parse('2019-01-07 19:21:00'),
        ]);
        

        //QUESTIONS

        Question::create([
            'id' => '1',
            'title' => 'Is it better Rb26 or 2jz engine?',
            'message' => 'Hello guys!! I just bought an old supra mk3 and I would like to ask about what engine do you guys think that its better. They are simillar price but I do not really know which one to choose... ',
            'user_id' => '4',
            'photo_path' => 'photos/question1.jpg',
            'created_at' => Carbon::parse('2021-07-07 19:21:00'),
        ]);
        Question::create([
            'id' => '2',
            'title' => 'I broke my clutch I need help to fix it',
            'message' => 'Hello everyone! The other day i broke my clutch. I need to know how to repair it please, I have no money to bring it to a garage.',
            'user_id' => '1',
            'photo_path' => 'photos/question2.jpg',
            'created_at' => Carbon::parse('2021-04-07 11:21:00'),
        ]);
        Question::create([
            'id' => '3',
            'title' => 'RALLY vs DAKAR',
            'message' => 'What do you guys preffer??? ',
            'user_id' => '3',
            'created_at' => Carbon::parse('2011-07-07 19:21:00'),
        ]);

        //OPINIONS

        Opinion::create([
            'id' => '1',
            'message' => 'Bro you will need a lot of keys and also this special key for the clutch ',
            'user_id' => '3',
            'question_id' => '2',
            'created_at' => Carbon::parse('2023-07-07 19:21:00'),
        ]);

        Opinion::create([
            'id' => '2',
            'message' => 'This youtuber explains how you can change your clutch. Its not an Opel Corsa but you can make it the same way. I hope you have luck, keep us updated!! ',
            'user_id' => '5',
            'question_id' => '2',
            'created_at' => Carbon::parse('2023-07-07 19:38:00'),
        ]);

        Opinion::create([
            'id' => '3',
            'message' => 'Good luck bro!! ',
            'user_id' => '4',
            'question_id' => '2',
            'created_at' => Carbon::parse('2023-06-12 19:50:00'),
        ]);

        Opinion::create([
            'id' => '4',
            'message' => '2JZ bro . STUTUTUTUTUTTUU!! ',
            'user_id' => '4',
            'question_id' => '1',
            'created_at' => Carbon::parse('2023-07-07 19:51:00'),
        ]);

        Opinion::create([
            'id' => '5',
            'message' => '2JZ FOR SURE!! 2JZ OF SUPRA NEVER DIES.',
            'user_id' => '6',
            'question_id' => '1',
            'created_at' => Carbon::parse('2023-07-07 19:08:00'),
        ]);

        //LIKES

        Like::create([
            'id' => '1',
            'post_id' => '1',
            'user_id' => '1',
        ]);

        Like::create([
            'id' => '2',
            'post_id' => '1',
            'user_id' => '2',
        ]);

        Like::create([
            'id' => '3',
            'post_id' => '1',
            'user_id' => '3',
        ]);

        Like::create([
            'id' => '4',
            'post_id' => '1',
            'user_id' => '4',
        ]);

        Like::create([
            'id' => '5',
            'post_id' => '2',
            'user_id' => '1',
        ]);

        Like::create([
            'id' => '6',
            'post_id' => '3',
            'user_id' => '2',
        ]);

        Like::create([
            'id' => '7',
            'post_id' => '3',
            'user_id' => '3',
        ]);

        Like::create([
            'id' => '8',
            'post_id' => '4',
            'user_id' => '4',
        ]);

        //AGREES

        Agree::create([
            'id' => '1',
            'opinion_id' => '3',
            'user_id' => '3',
        ]);

        Agree::create([
            'id' => '2',
            'opinion_id' => '4',
            'user_id' => '4',
        ]);

        Agree::create([
            'id' => '3',
            'opinion_id' => '3',
            'user_id' => '2',
        ]);

        Agree::create([
            'id' => '4',
            'opinion_id' => '1',
            'user_id' => '6',
        ]);

        //DISAGREES

        Disagree::create([
            'id' => '1',
            'opinion_id' => '3',
            'user_id' => '1',
        ]);

        // FAQCATEGORIES

        FAQCategory::create([
            'id' => '1',
            'name' => 'MECANICS',
            'created_at' => Carbon::parse('2023-07-07 19:08:00'),
        ]);

        FAQCategory::create([
            'id' => '2',
            'name' => 'CURIOSITY',
            'created_at' => Carbon::parse('2023-07-07 19:12:00'),
        ]);

        FAQCategory::create([
            'id' => '3',
            'name' => 'STANCE CARS',
            'created_at' => Carbon::parse('2023-07-07 19:01:00'),
        ]);


        //FAQQUESTIONS

        FAQQuestion::create([
            'id' => '1',
            'f_a_q_categorie_id' => '2',
            'question' => 'What is the best car for long trips?',
            'answer' => 'The best car for long trips depends on your needs and preferences. Some of the most popular cars for long trips are high-end sedans and SUVs that offer comfort, space, and advanced safety features.',
            'created_at' => Carbon::parse('2023-07-07 19:15:00'),
        ]);

        FAQQuestion::create([
            'id' => '2',
            'f_a_q_categorie_id' => '1',
            'question' => 'When should I get an oil change?',
            'answer' => 'The timing for an oil change should follow the recommendations of your cars manufacturer. Generally, its recommended to change the oil every 5,000 to 7,500 kilometers or every 6 months.',
            'created_at' => Carbon::parse('2023-07-07 19:14:00'),
        ]);

        FAQQuestion::create([
            'id' => '3',
            'f_a_q_categorie_id' => '2',
            'question' => 'What are the key factors to consider when buying a used car?',
            'answer' => 'When buying a used car, its important to consider the following factors: History of maintenance and repairs for the car, Mileage of the car, Overall condition of the car, including body, interiors, and mechanical system.',
            'created_at' => Carbon::parse('2023-07-07 19:21:00'),
        ]);

        FAQQuestion::create([
            'id' => '4',
            'f_a_q_categorie_id' => '1',
            'question' => 'How often should I rotate my tires?',
            'answer' => 'Tire rotation is an important maintenance task to ensure even tire wear and extend the lifespan of your tires. Its generally recommended to rotate your tires every 6,000 to 8,000 kilometers or every 6 months.',
            'created_at' => Carbon::parse('2023-07-07 19:24:00'),
        ]);

        FAQQuestion::create([
            'id' => '5',
            'f_a_q_categorie_id' => '1',
            'question' => 'What is the difference between all-wheel drive (AWD) and four-wheel drive (4WD)?',
            'answer' => 'AWD is typically found in cars and crossovers and provides power to all four wheels automatically, based on the road conditions. 4WD is commonly found in trucks and SUVs and is designed for off-road and rugged driving conditions.',
            'created_at' => Carbon::parse('2023-07-07 19:28:00'),
        ]);

        FAQQuestion::create([
            'id' => '6',
            'f_a_q_categorie_id' => '2',
            'question' => 'How can I improve my cars fuel efficiency?',
            'answer' => 'To improve your cars fuel efficiency, you can follow these tips: Maintain proper tire pressure; Reduce excess weight in the car; Avoid aggressive driving, including rapid acceleration and hard braking; Use the air conditioning sparingly.',
            'created_at' => Carbon::parse('2023-07-07 19:37:00'),
        ]);











    }
}
