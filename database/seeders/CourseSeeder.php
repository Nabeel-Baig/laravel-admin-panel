<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'BASIC EDITING ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/homeSection04CardImg01.jpg'
            ];
        }
        Course::insert($courses);

        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'DIGITAL CINEMA ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/homeSection04CardImg02.jpg'
            ];
        }
        Course::insert($courses);

        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'Mobile Video Production ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/homeSection04CardImg03.jpg'
            ];
        }
        Course::insert($courses);

        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'Social Media Basics ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/homeSection04CardImg04.jpg'
            ];
        }
        Course::insert($courses);

        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'Crypto Basics ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/homeSection04CardImg05.jpg'
            ];
        }
        Course::insert($courses);

        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'Marketing Basics ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/homeSection04CardImg06.jpg'
            ];
        }
        Course::insert($courses);

        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'Acting Basics ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/classesPageImg07.webp'
            ];
        }
        Course::insert($courses);

        $courses = [];
        for ($i = 1; $i < 9; $i++) {
            $courses[] = [
                'category_id' => [1,2,3,4][array_rand([1,2,3,4])],
                'name' => 'Still Photography ' . $i,
                'description' => "The video production course is designed to teach you about post-production workflow, technical standards, and various editing styles and theories. This course also covers Windows Movie Maker, Final Cut Pro X, Adobe Premiere Pro, iMovie Studio, Avid Media Composer, Soundtrack Pro, and After Effects. We'll cover the following topics: - Getting Started with Video Editing - Grey Area Principles - Editing Styles - Lights, Action! Action! Action! - Composition Rules-Using Scopes-Using the Timeline-Organising Content - Colour Theory & Stylising Techniques - Audio Editing & Mixing-Microphones-Levels",
                'image' => '/assets/uploads/courses/classesPageImg08.webp'
            ];
        }
        Course::insert($courses);
    }
}
