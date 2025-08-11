<?php
/** Inline SVG icons helper */
if (!function_exists('guardeons_get_icon_svg')) {
function guardeons_get_icon_svg($slug, $classes = '') {
    $icons = [
        'shield' => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="'.esc_attr($classes).'"><path d="M12 2l8 3v6c0 5.25-3.4 10.02-8 11-4.6-.98-8-5.75-8-11V5l8-3z"/></svg>',
        'code' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="'.esc_attr($classes).'" aria-hidden="true"><path d="M9 18l-6-6 6-6"/><path d="M15 6l6 6-6 6"/></svg>',
        'seo' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="'.esc_attr($classes).'" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.35-4.35"/></svg>',
        'server' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="'.esc_attr($classes).'" aria-hidden="true"><rect x="3" y="4" width="18" height="6" rx="2"/><rect x="3" y="14" width="18" height="6" rx="2"/><path d="M7 7h.01M7 17h.01"/></svg>',
        'cloud' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="'.esc_attr($classes).'" aria-hidden="true"><path d="M17.5 19a4.5 4.5 0 0 0 0-9 6 6 0 0 0-11.4 1.5A4 4 0 0 0 6 19h11.5z"/></svg>',
        'headset' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="'.esc_attr($classes).'" aria-hidden="true"><path d="M4 12a8 8 0 1 1 16 0v6a2 2 0 0 1-2 2h-1"/><rect x="3" y="11" width="4" height="7" rx="2"/><rect x="17" y="11" width="4" height="7" rx="2"/></svg>',
        'training' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="'.esc_attr($classes).'" aria-hidden="true"><path d="M12 3l9 5-9 5-9-5 9-5z"/><path d="M6 12v5l6 3 6-3v-5"/></svg>',
        'soc' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="'.esc_attr($classes).'" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a8 8 0 1 1-14.8 0"/></svg>'
    ];
    if (!isset($icons[$slug])) {
        return '';
    }
    return $icons[$slug];
}
}