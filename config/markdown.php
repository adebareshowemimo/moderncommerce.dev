<?php

use League\CommonMark\Extension\Table\TableExtension;
use Spatie\LaravelMarkdown\MarkdownRenderer;

return [
    'code_highlighting' => [
        'enabled' => true,
        'theme' => 'github-light',
    ],
    'add_anchors_to_headings' => true,
    'render_anchors_as_links' => false,
    'commonmark_options' => [],
    'cache_store' => null,
    'cache_duration' => null,
    'renderer_class' => MarkdownRenderer::class,
    'extensions' => [
        TableExtension::class,
    ],
    'block_renderers' => [],
    'inline_renderers' => [],
    'inline_parsers' => [],
];
