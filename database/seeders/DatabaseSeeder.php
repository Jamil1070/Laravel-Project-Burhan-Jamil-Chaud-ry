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
       

          //ADMIN
          User::create([
            'id' => '7',
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'admin123',// login admin
            'is_admin' => true,
        ]);

        //USERS(logins)
       
        User::create([
            'id' => '1',
            'name' => 'Alex',
            'username' => 'alex_gear',
            'dateofbirth' => '1991-05-12',
            'email' => 'alex.gear@example.com',
            'password' => 'guest123', 
            'aboutme' => 'Adventure seeker with a passion for custom cars.',
            'photo_path'=> 'photos/user1.jpg',
        ]);

        User::create([
            'id' => '2',
            'name' => 'Sofia',
            'username' => 'sofia_repair',
            'dateofbirth' => '1996-11-23',
            'email' => 'sofia.repair@example.com',
            'password' => 'guest123', // Keeping the existing password
            'aboutme' => 'Automotive technician who loves restoring old classics.',
            'photo_path'=> 'photos/user2.jpg',
        ]);

        User::create([
            'id' => '3',
            'name' => 'Liam',
            'username' => 'liam_pilot',
            'dateofbirth' => '1989-07-16',
            'email' => 'liam.pilot@example.com',
            'password' => 'guest123', 
            'aboutme' => 'Flying enthusiast who enjoys speed and precision.',
            'photo_path'=>'photos/user3.jpg',
        ]);

        User::create([
            'id' => '4',
            'name' => 'Emma',
            'username' => 'emma_auto',
            'dateofbirth' => '1995-03-08',
            'email' => 'emma.auto@example.com',
            'password' => 'guest123', 
            'aboutme' => 'Car lover with a knack for mechanical innovations.',
            'photo_path'=>'photos/user4.jpg',
        ]);

        User::create([
            'id' => '5',
            'name' => 'Noah',
            'username' => 'noah_drives',
            'dateofbirth' => '1998-10-05',
            'email' => 'noah.drives@example.com',
            'password' => 'guest123', 
            'aboutme' => 'Driving enthusiast with a passion for motorsports.',
        ]);

        User::create([
            'id' => '6',
            'name' => 'Olivia',
            'username' => 'olivia_4x4',
            'dateofbirth' => '1983-06-22',
            'email' => 'olivia.4x4@example.com',
            'password' => 'guest123', 
            'aboutme' => 'Off-road adventurer who loves exploring rugged terrains.',
            'photo_path'=> 'photos/user6.jpg',
        ]);

        //POSTS

        Post::create([
            'id' => '1',
            'title' => 'New Innovations in Autonomous Vehicles',
            'message' => 'A breakthrough in autonomous driving technology has been revealed. The new system uses advanced AI to navigate complex urban environments with ease. Initial models start at $70,000.',
            'user_id' => '3', // Updated user_id
            'photo_path' => 'photos/post1.jpg', // Unchanged
            'created_at' => Carbon::parse('2024-08-20 13:00:00'),
        ]);

        Post::create([
            'id' => '2',
            'title' => 'Electric Motorcycles Taking Over the Market',
            'message' => 'Electric motorcycles are becoming increasingly popular, offering impressive performance and eco-friendly features. The latest models boast a range of 300km and start at $15,000.',
            'user_id' => '6', // Updated user_id
            'photo_path' => 'photos/post2.jpg', // Unchanged
            'created_at' => Carbon::parse('2023-11-01 10:00:00'),
        ]);

        Post::create([
            'id' => '3',
            'title' => 'Upcoming Auto Show Highlights',
            'message' => 'The auto show this year will feature an array of new models, including electric SUVs and high-performance sports cars. Expect exciting reveals and hands-on demonstrations.',
            'user_id' => '2', // Updated user_id
            'photo_path' => 'photos/post3.jpg', // Unchanged
            'created_at' => Carbon::parse('2024-01-10 16:00:00'),
        ]);

        Post::create([
            'id' => '4',
            'title' => 'New Trends in Car Customization',
            'message' => 'Explore the latest trends in car customization, from unique paint jobs to advanced tuning options. Car enthusiasts are pushing the boundaries of personalization with these new innovations.',
            'user_id' => '5', // Updated user_id
            'photo_path' => 'photos/post4.jpg', // Unchanged
            'created_at' => Carbon::parse('2023-12-05 19:30:00'),
        ]);
        

        //QUESTIONS

        Question::create([
            'id' => '1',
            'title' => 'Best Practices for Engine Swaps',
            'message' => 'Hey everyone! I’m considering swapping the engine in my classic car and wanted to get some advice on the best practices. Any recommendations on how to approach this project?',
            'user_id' => '4',
            'photo_path' => 'photos/question1.jpg',
            'created_at' => Carbon::parse('2024-08-19 10:00:00'),
        ]);
        
        Question::create([
            'id' => '2',
            'title' => 'Tips for DIY Brake Maintenance',
            'message' => 'Hi folks! I’m planning to do some brake maintenance on my vehicle this weekend. Can anyone share tips or common pitfalls to watch out for during this DIY project?',
            'user_id' => '1',
            'photo_path' => 'photos/question2.jpg',
            'created_at' => Carbon::parse('2024-08-19 12:00:00'),
        ]);
        
        Question::create([
            'id' => '3',
            'title' => 'Best Car for Track Days',
            'message' => 'What are your thoughts on the best cars for track days? I’m looking for something that handles well and is fun to drive. Any suggestions?',
            'user_id' => '3',
            'created_at' => Carbon::parse('2024-08-19 14:00:00'),
        ]);
        
        Question::create([
            'id' => '4',
            'title' => 'How to Choose the Right Suspension Setup',
            'message' => 'I’m considering upgrading my car’s suspension and would love some advice on how to choose the right setup. What factors should I consider for both street and track use?',
            'user_id' => '2',
            'created_at' => Carbon::parse('2024-08-19 16:00:00'),
        ]);

        //OPINIONS

        Opinion::create([
            'id' => '1',
            'message' => 'Make sure to use a torque wrench when tightening the brake components. It’s crucial to avoid over-tightening, which can cause issues.',
            'user_id' => '3',
            'question_id' => '2',
            'created_at' => Carbon::parse('2023-07-07 19:21:00'),
        ]);
        
        Opinion::create([
            'id' => '2',
            'message' => 'I recommend using high-temperature brake grease for the caliper pins. It will help prevent any squeaking noises later on.',
            'user_id' => '5',
            'question_id' => '2',
            'created_at' => Carbon::parse('2023-07-07 19:38:00'),
        ]);
        
        Opinion::create([
            'id' => '3',
            'message' => 'When bleeding the brakes, start with the wheel furthest from the master cylinder. It’s a small thing, but it makes the process smoother.',
            'user_id' => '4',
            'question_id' => '2',
            'created_at' => Carbon::parse('2023-06-12 19:50:00'),
        ]);
        
        Opinion::create([
            'id' => '4',
            'message' => 'For an engine swap, always double-check your wiring harness compatibility. It’s a common oversight that can lead to headaches.',
            'user_id' => '4',
            'question_id' => '1',
            'created_at' => Carbon::parse('2023-07-07 19:51:00'),
        ]);
        
        Opinion::create([
            'id' => '5',
            'message' => 'I’d suggest planning for a custom exhaust system if you go with a 2JZ swap. The stock one often doesn’t align perfectly.',
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
            'id' => '3',
            'post_id' => '1',
            'user_id' => '3',
        ]);

        Like::create([
            'id' => '2',
            'post_id' => '1',
            'user_id' => '2',
        ]);


        Like::create([
            'id' => '4',
            'post_id' => '1',
            'user_id' => '4',
        ]);

        

        Like::create([
            'id' => '5',
            'post_id' => '1',
            'user_id' => '5',
        ]);

        Like::create([
            'id' => '6',
            'post_id' => '1',
            'user_id' => '6',
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
            'id' => '2',
            'opinion_id' => '4',
            'user_id' => '4',
        ]);

        Agree::create([
            'id' => '1',
            'opinion_id' => '3',
            'user_id' => '3',
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
            'name' => 'ENGINE TUNING',
            'created_at' => Carbon::parse('2024-08-07 19:08:00'),
        ]);
        
        FAQCategory::create([
            'id' => '2',
            'name' => 'PERFORMANCE UPGRADES',
            'created_at' => Carbon::parse('2023-06-07 19:12:00'),
        ]);
        
        FAQCategory::create([
            'id' => '3',
            'name' => 'SUSPENSION & HANDLING',
            'created_at' => Carbon::parse('2022-07-07 19:01:00'),
        ]);


        //FAQQUESTIONS
        FAQQuestion::create([
            'id' => '1',
            'f_a_q_categorie_id' => '2',
            'question' => 'What is the best car for daily commuting?',
            'answer' => 'The best car for daily commuting is one that balances fuel efficiency, comfort, and reliability. Popular options include compact sedans and hybrid vehicles, which offer great gas mileage and easy maneuverability in traffic.',
            'created_at' => Carbon::parse('2024-07-07 19:15:00'),
        ]);
        
        FAQQuestion::create([
            'id' => '2',
            'f_a_q_categorie_id' => '1',
            'question' => 'How do I know when my brakes need replacing?',
            'answer' => 'You should replace your brakes if you hear squealing or grinding noises, feel vibrations when braking, or notice longer stopping distances. Regular brake inspections every 20,000 kilometers are also recommended.',
            'created_at' => Carbon::parse('2022-07-07 19:14:00'),
        ]);
        
        FAQQuestion::create([
            'id' => '3',
            'f_a_q_categorie_id' => '2',
            'question' => 'What should I consider before installing aftermarket parts?',
            'answer' => 'Before installing aftermarket parts, consider how they will affect your vehicle’s performance, warranty, and resale value. Always choose reputable brands and consult a professional if unsure about compatibility.',
            'created_at' => Carbon::parse('2022-07-07 19:21:00'),
        ]);
        
        FAQQuestion::create([
            'id' => '4',
            'f_a_q_categorie_id' => '1',
            'question' => 'What are the signs of a failing suspension?',
            'answer' => 'Signs of a failing suspension include a rough ride, unusual tire wear, nose-diving during braking, and fluid leaks near the shock absorbers. Have your suspension checked if you notice these symptoms.',
            'created_at' => Carbon::parse('2023-07-03 19:24:00'),
        ]);
        
        FAQQuestion::create([
            'id' => '5',
            'f_a_q_categorie_id' => '1',
            'question' => 'How often should I replace my car’s air filter?',
            'answer' => 'You should replace your car’s air filter every 20,000 to 30,000 kilometers, or more frequently if you drive in dusty conditions. A clean air filter helps maintain engine performance and fuel efficiency.',
            'created_at' => Carbon::parse('2024-07-03 19:28:00'),
        ]);
        
        FAQQuestion::create([
            'id' => '6',
            'f_a_q_categorie_id' => '2',
            'question' => 'What are the benefits of using synthetic oil?',
            'answer' => 'Synthetic oil offers better protection at extreme temperatures, reduces engine wear, and provides longer intervals between oil changes. It’s especially beneficial for high-performance and turbocharged engines.',
            'created_at' => Carbon::parse('2024-07-07 19:37:00'),
        ]);
        











    }
}
