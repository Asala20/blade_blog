<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title'=>'Pets and Humans',
            'user_id'=>'1',
            'just_for_me' =>'0',
            'content' => 'Pets are more than just animals that we keep in our homes. They are companions, friends, and family members that bring joy and happiness to our lives. Whether you are a dog person, a cat person, or prefer other types of pets, there are many benefits to having a pet in your life.
            One of the most significant benefits of having a pet is the companionship they provide. Pets are always there for us, no matter what. They are loyal and loving, and they never judge us. They are always happy to see us, and they are always ready to cuddle up with us when we need comfort. Pets can help us feel less lonely, especially if we live alone or are going through a difficult time.
            Pets can also help us stay active and healthy. Dogs, for example, need to be walked regularly, which means that their owners need to get outside and exercise too. This can be especially beneficial for older adults who may not get enough physical activity otherwise. Pets can also help reduce stress and anxiety, which can have a positive impact on our overall health and well-being.          
            In addition to the physical and emotional benefits, pets can also teach us important life skills. For example, taking care of a pet requires responsibility, patience, and compassion. Children who grow up with pets often learn these skills at a young age, which can help them become more responsible and empathetic adults.  
            Pets can also be great for socialization. Walking a dog or taking a pet to the park can be a great way to meet new people and make friends. Pets can also be a great conversation starter, which can be especially helpful for people who are shy or have social anxiety.',
        ]);

        Post::create([
            'title'=>'The Benefits of Studying Abroad',
            'user_id' => '1',
            'just_for_me' =>'0',
            'content' => 'Studying abroad is an exciting opportunity that can provide many benefits. It allows students to experience new cultures, learn new languages, and gain a global perspective. Studying abroad can also help students develop independence, adaptability, and problem-solving skills. It can enhance their resumes and make them more competitive in the job market. Additionally studying abroad can be a life-changing experience that can lead to personal growth and self-discovery. While studying abroad can be challenging, it is a worthwhile investment in ones education and future. Overall, studying abroad is an opportunity that should not be missed.'        
        ]);


        Post::create([
            'title' => 'The Pros and Cons of Playing Computer Games',
            'just_for_me' => '0',
            'user_id' => '1',
            'content' => 'Computer games have become a popular form of entertainment for people of all ages. While there are many benefits to playing computer games, there are also some drawbacks that should be considered.
            One of the main benefits of playing computer games is that they can improve cognitive skills such as problem-solving, decision-making, and spatial awareness. They can also improve hand-eye coordination and reaction time. Additionally, computer games can provide a sense of accomplishment and boost self-esteem.
            However, there are also some negative aspects to playing computer games. Excessive gaming can lead to addiction, which can have negative effects on mental health and social relationships. It can also lead to a sedentary lifestyle, which can contribute to obesity and other health problems.
            Another concern is the content of some computer games, which can be violent or inappropriate for certain age groups. Parents should monitor their childrens gaming habits and ensure that they are playing age-appropriate games.
            In conclusion, playing computer games can be a fun and beneficial activity, but it is important to balance gaming with other activities and monitor the content and amount of time spent gaming. By doing so, individuals can enjoy the benefits of gaming while avoiding the negative effects.',
        ]);
    }
}
