<?php

namespace App\Services;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\Table\TableExtension;

class MarkdownParser
{
    protected CommonMarkConverter $converter;

    public function __construct()
    {
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new AttributesExtension());
        $environment->addExtension(new TableExtension());

        $this->converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ], $environment);
    }

    public function parse(string $markdown): string
    {
        $html = $this->converter->convert($markdown);

        // Apply Tailwind CSS styles
        return $this->applyTailwindStyles($html);
    }

    protected function applyTailwindStyles(string $html): string
    {
        $styles = [
            'h1' => 'text-4xl font-bold mb-4',
            'h2' => 'text-3xl font-bold mb-3',
            'h3' => 'text-2xl font-bold mb-2',
            'p' => 'text-base mb-4',
            'ul' => 'list-disc pl-5 mb-4',
            'ol' => 'list-decimal pl-5 mb-4',
            'li' => 'mb-1',
            'a' => 'text-blue-500 underline',
            'img' => 'max-w-full h-auto',
            'strong' => 'font-bold',
            'table' => 'min-w-full divide-y divide-gray-200',
            'thead' => 'bg-gray-50',
            'th' => 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider',
            'tbody' => 'bg-white divide-y divide-gray-200',
            'td' => 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900',
        ];

        foreach ($styles as $tag => $class) {
            $html = preg_replace(
                "/(<{$tag}[^>]*>)/i",
                "$1<span class=\"{$class}\">",
                $html
            );
            $html = preg_replace(
                "/(<\/{$tag}>)/i",
                "</span>$1",
                $html
            );
        }

        return $html;
    }
}
