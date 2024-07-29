<?php

namespace App\Services;

class SchemaService
{
    public static function generateBlogPostSchema($title, $description, $datePublished, $author)
    {
        $schema = [
            '@context' => 'http://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $title,
            'description' => $description,
            'datePublished' => $datePublished,
            'author' => [
                '@type' => 'Organization',
                'name' => 'Evolve Xplore Hub',
            ],
            // Add more properties as needed for your specific schema.
        ];

        return json_encode($schema, JSON_PRETTY_PRINT);
    }
}
