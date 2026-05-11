<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TrainingProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Trainer
        User::create([
            'name' => 'John Trainer',
            'email' => 'trainer@example.com',
            'password' => Hash::make('password'),
            'role' => 'trainer',
        ]);

        // Employee (default)
        User::create([
            'name' => 'Jane Employee',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
        ]);

        // Your personal account (employee)
        User::create([
            'name' => 'Aarav',
            'email' => 'aaravrajput7301@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
        ]);

        // Training Programs
        $trainings = [
            ['title' => 'Employee Onboarding Program', 'category' => 'HR', 'description' => 'A comprehensive onboarding program designed to help new employees integrate smoothly into the organization, understand company culture, policies, and their role responsibilities.', 'duration' => 8, 'status' => 'upcoming'],
            ['title' => 'Workplace Ethics & Conduct', 'category' => 'Compliance', 'description' => 'Covers the fundamental principles of ethical behavior in the workplace, including professional standards, code of conduct, and how to handle ethical dilemmas.', 'duration' => 4, 'status' => 'ongoing'],
            ['title' => 'Cybersecurity Awareness', 'category' => 'IT & Security', 'description' => 'Equips employees with the knowledge to identify cyber threats, practice safe online behaviors, and protect company data from phishing, malware, and other attacks.', 'duration' => 6, 'status' => 'upcoming'],
            ['title' => 'Communication Skills', 'category' => 'Soft Skills', 'description' => 'Develops verbal, written, and non-verbal communication skills to help employees communicate effectively with colleagues, clients, and management.', 'duration' => 10, 'status' => 'upcoming'],
            ['title' => 'Leadership Development', 'category' => 'Leadership', 'description' => 'Learn how to lead effectively in a corporate environment. This program covers strategic thinking, team motivation, delegation, and decision-making.', 'duration' => 15, 'status' => 'upcoming'],
            ['title' => 'Time Management', 'category' => 'Soft Skills', 'description' => 'Practical strategies and tools for prioritizing tasks, managing workloads, eliminating procrastination, and achieving peak personal productivity.', 'duration' => 6, 'status' => 'ongoing'],
            ['title' => 'Project Management Fundamentals', 'category' => 'Management', 'description' => 'An introduction to project management methodologies including Agile, Scrum, and Waterfall, covering planning, execution, risk management, and delivery.', 'duration' => 20, 'status' => 'upcoming'],
            ['title' => 'Laravel Framework Development', 'category' => 'Technical', 'description' => 'Comprehensive guide to advanced Laravel topics including Eloquent ORM, API development, Queues, Events, and building scalable enterprise-grade web applications.', 'duration' => 40, 'status' => 'upcoming'],
            ['title' => 'Data Privacy & Security Compliance', 'category' => 'Compliance', 'description' => 'Covers data protection laws, GDPR compliance, and best practices for handling sensitive personal and organizational data responsibly.', 'duration' => 8, 'status' => 'upcoming'],
            ['title' => 'Team Management', 'category' => 'Management', 'description' => 'Equips managers and team leads with skills to build, manage, and motivate high-performing teams, including conflict resolution and performance review techniques.', 'duration' => 12, 'status' => 'upcoming'],
            ['title' => 'Conflict Resolution', 'category' => 'Soft Skills', 'description' => 'Teaches practical techniques for identifying, managing, and resolving workplace conflicts in a constructive manner that preserves relationships and team morale.', 'duration' => 6, 'status' => 'ongoing'],
            ['title' => 'Presentation Skills', 'category' => 'Soft Skills', 'description' => 'Helps employees deliver compelling, structured, and confident presentations to diverse audiences, including tips on slide design and handling Q&A sessions.', 'duration' => 8, 'status' => 'upcoming'],
            ['title' => 'Workplace Safety Training', 'category' => 'Compliance', 'description' => 'Ensures all employees understand workplace safety protocols, hazard identification, emergency procedures, and their responsibilities under occupational health and safety laws.', 'duration' => 6, 'status' => 'upcoming'],
            ['title' => 'Secure Coding Practices', 'category' => 'Technical', 'description' => 'Teaches developers how to write secure code, identify common vulnerabilities like SQL injection and XSS, and apply security best practices throughout the SDLC.', 'duration' => 24, 'status' => 'upcoming'],
            ['title' => 'Stress Management', 'category' => 'Wellness', 'description' => 'Practical techniques for managing stress, building resilience, maintaining work-life balance, and fostering mental well-being in a demanding work environment.', 'duration' => 4, 'status' => 'ongoing'],
        ];

        foreach ($trainings as $training) {
            TrainingProgram::create([
                'title'        => $training['title'],
                'description'  => $training['description'],
                'category'     => $training['category'],
                'trainer_name' => 'John Trainer',
                'duration'     => $training['duration'],
                'capacity'     => 30,
                'start_date'   => now()->addDays(rand(3, 20)),
                'end_date'     => now()->addDays(rand(21, 40)),
                'location'     => 'Online',
                'status'       => $training['status'],
            ]);
        }
    }
}

