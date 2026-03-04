<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@portfolio.com')],
            [
                'name'     => 'Admin',
                'email'    => env('ADMIN_EMAIL', 'admin@portfolio.com'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password123')),
            ]
        );

        // Default settings
        $defaults = [
            'name'             => 'John Doe',
            'subtitle'         => 'Frontend Developer',
            'title'            => 'Frontend Development',
            'experience_years' => '2+ years',
            'education'        => "B.Sc. Bachelors Degree\nM.Sc. Masters Degree",
            'about_text'       => 'I am a passionate frontend developer with a love for building beautiful, responsive user interfaces. I enjoy solving complex problems and turning ideas into elegant digital experiences.',
            'email'            => 'john@example.com',
            'linkedin_url'     => 'https://linkedin.com/',
            'github_url'       => 'https://github.com/',
            'resume_url'       => '',
        ];

        foreach ($defaults as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }

        // Skill Categories & Skills
        $skillData = [
            'Frontend Development' => [
                ['HTML',        'Experienced'],
                ['CSS',         'Experienced'],
                ['SASS',        'Intermediate'],
                ['JavaScript',  'Basic'],
                ['TypeScript',  'Basic'],
                ['Material UI', 'Intermediate'],
            ],
            'Backend Development' => [
                ['PHP',         'Intermediate'],
                ['Laravel',     'Intermediate'],
                ['Node.js',     'Intermediate'],
                ['Express.js',  'Basic'],
                ['PostgreSQL',  'Basic'],
                ['Git',         'Intermediate'],
            ],
        ];

        foreach ($skillData as $categoryName => $skills) {
            $category = SkillCategory::firstOrCreate(
                ['name' => $categoryName],
                ['sort_order' => SkillCategory::count()]
            );

            foreach ($skills as [$skillName, $level]) {
                Skill::firstOrCreate(
                    ['skill_category_id' => $category->id, 'name' => $skillName],
                    ['level' => $level, 'sort_order' => Skill::where('skill_category_id', $category->id)->count()]
                );
            }
        }

        // Sample Projects
        $projects = [
            [
                'title'       => 'Project One',
                'description' => 'A full-stack web application built with React and Node.js.',
                'github_url'  => 'https://github.com/',
                'live_url'    => 'https://github.com/',
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Project Two',
                'description' => 'Mobile-responsive e-commerce platform with payment integration.',
                'github_url'  => 'https://github.com/',
                'live_url'    => 'https://github.com/',
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Project Three',
                'description' => 'RESTful API service with authentication and real-time features.',
                'github_url'  => 'https://github.com/',
                'live_url'    => 'https://github.com/',
                'sort_order'  => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(['title' => $project['title']], $project);
        }
    }
}
