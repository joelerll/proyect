<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserType::class);
        $this->command->info('UserTypes table seeded!');
        $this->call(Users::class);
        $this->command->info('User table seeded!');
        $this->call(Courses::class);
        $this->command->info('Courses table seeded!');
        $this->call(CoursesUsers::class);
        $this->command->info('CoursesUsers table seeded!');
        $this->call(Questions::class);
        $this->command->info('Questions table seeded!');
        $this->call(Answers::class);
        $this->command->info('Answers table seeded!');
        $this->call(Scores::class);
        $this->command->info('Scores table seeded!');
        $this->call(UserExtraInfo::class);
        $this->command->info('UserExtraInfo table seeded!');
        $this->call(UserBankInfo::class);
        $this->command->info('UserBankInfo table seeded!');
        $this->call(Interest::class);
        $this->command->info('Interest table seeded!');
        $this->call(InterestUser::class);
        $this->command->info('InterestUser table seeded!');
        $this->call(CourseInterest::class);
        $this->command->info('CourseInterest table seeded!');
        $this->call(ContentCourse::class);
        $this->command->info('ContentCourse table seeded!');
        $this->call(Content::class);
        $this->command->info('Content table seeded!');
        $this->call(Video::class);
        $this->command->info('Video table seeded!');
        $this->call(Document::class);
        $this->command->info('Document table seeded!');
        $this->call(Testimonies::class);
        $this->command->info('Testimonies table seeded!');
        $this->call(WhyUse::class);
        $this->command->info('WhyUse table seeded!');
    }
}
